<?php

/**
 * 
 */
class LocalSyncFileSystem
{
	public $last_error;
	public $DOWNLOAD_CHUNK_SIZE = 5000000;
	public $UPLOAD_CHUNK_SIZE = 1024 * 1024;

	public function __construct() {
		$this->local_sync_options = new Local_Sync_Options();
	}

	public function multi_call_download_using_curl($URL, $file, &$downloadResponseHeaders, $prevResult = array(), $wpContentURL= false){
		if (!function_exists('curl_init') || !function_exists('curl_exec')){
			return false;
		}

		$backup_dir = dirname($file);
		if (!is_dir($backup_dir) && !mkdir($backup_dir, 0755)) {
			$this->last_error = "Could not create backup directory ($backup_dir)";
			return false;
		}

		if(!file_exists($file)){
			touch($file);
		}

		if(!file_exists($file)){

			local_sync_log($file, "--------not able to touch file 22--------");

			$this->last_error = "Could not touch download file ($file)";

			return false;
		}

		if(empty($prevResult['file'])){
			$fp = fopen ($file, 'wb');
		} else{
			$file = $prevResult['file'];
			$fp = fopen ($file, 'rb+');
			fseek($fp, $prevResult['startRange']);
		}
		if(!$fp){
			$this->last_error = "Could not open download file ($file)";

			return false;
		}

		$isBreak = false;
		$isMultiPart = false;

		$startRange = (empty($prevResult['startRange']) && empty($prevResult['file']))? 0 : $prevResult['startRange'];
		$endRange = (empty($prevResult['endRange']) && empty($prevResult['file']))? $this->DOWNLOAD_CHUNK_SIZE : $prevResult['endRange'];

		// if ($wpContentURL && !strpos($URL, $GLOBALS['WPVersionName'])) {
		// 	$URL = $wpContentURL.'/infinitewp/backups/'.$URL;
		// 	if (!empty($GLOBALS['URLParseData'])) {
		// 		$URL = $this->build_folder_auth_url($GLOBALS['URLParseData'], $URL);
		// 	}
		// }

		$totalFileSize = $this->curl_get_file_size($URL);
		
		// if (strpos($URL, $GLOBALS['WPVersionName'])) {
		// 	$endRange = $totalFileSize;
		// }

		status_losy("Downloading file ".$URL, $success=true, $return=false);
		status_losy("Total size of the file ".$totalFileSize, $success=true, $return=false);
		status_losy("Download start from ".$startRange, $success=true, $return=false);

		if ( !empty($_REQUEST['oneShotdownlaod']) ) {
			$endRange = $totalFileSize;
		}

		do{
			local_sync_log('', "--------sleeping  during download--------");

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko Firefox/16.0');
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
														'Connection: Keep-Alive',
														'Keep-Alive: 115'
													));
			$rangeVariable = $startRange . '-' . $endRange;
			curl_setopt($ch, CURLOPT_RANGE, $rangeVariable);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
			$callResponse = curl_exec($ch);
			//write in file
			$currentOffest = (empty($startRange)) ? 0 : $startRange;
			@fseek($fp, $currentOffest, SEEK_SET);
			@fwrite($fp, $callResponse);
			$info = curl_getinfo($ch);
			curl_close($ch);

			if($info['http_code'] == '206'){
				//multiCallDownloadUsingCURL($URL, $file, $downloadResponseHeaders);
				$isMultiPart = true;
				$startRange = ftell($fp);
				$endRange = ($startRange + $this->DOWNLOAD_CHUNK_SIZE);
				if($endRange >= $totalFileSize){
					$endRange = $totalFileSize;
				}
				if($startRange == $endRange){
					$isMultiPart = false;
				}
			}
			$rangeVariable = $startRange . '-' . $endRange;
			$isBreak = is_local_sync_timeout_cut();
		}
		while(!($isBreak) && $isMultiPart);

		fclose($fp);
		
		$currentResult = array();

		$this->initialize_response_array($currentResult);
		
		$currentResult['file'] = $file;
		$currentResult['startRange'] = $startRange;
		$currentResult['endRange'] = $endRange;

		status_losy("File Downloaded size:".$startRange, $success=true, $return=false);

		if($isBreak == true){
			$currentResult['status'] = 'partiallyCompleted';
			$currentResult['is_download_multi_call'] = true;
		}

		if(!$isMultiPart){
			$currentResult['is_download_multi_call'] = false;
		}

		$downloadResponseHeaders[] = "HTTP/1.1 ".$info['http_code']." SOMETHING";
		$downloadResponseHeaders[] = "Content-Type: ".$info['content_type'];

		return $currentResult;
	}

	public function build_folder_auth_url($URLParseData, $bkURL){
		if (!empty($URLParseData['user']) && !empty($URLParseData['pass'])) {
			$URLParts = parse_url($bkURL);
			$URLParts['user'] = $URLParseData['user'];
			$URLParts['pass'] = $URLParseData['pass'];
			$bkURL = $this->http_build_url_custom($URLParts);
			return $bkURL;
		}else{
			return $bkURL;
		}
	}

	public function http_build_url_custom($parts){
		
		if(is_array($parts['query'])){
			$parts['query'] = http_build_query($parts['query'], NULL, '&');
		}
		$URL = $parts['scheme'].'://'
			.($parts['user'] ? $parts['user'].':'.$parts['pass'].'@' : '')
			.$parts['host']
			.((!empty($parts['port']) && $parts['port'] != 80) ? ':'.$parts['port'] : '')
			.($parts['path'] ? $parts['path'] : '')
			.($parts['query'] ? '?'.$parts['query'] : '')
			.($parts['fragment'] ? '#'.$parts['fragment'] : '');
		return $URL;
	}

	public function initialize_response_array(&$response_arr){
		// $response_arr['db_table_prefix'] = $GLOBALS['db_table_prefix'];
		// $response_arr['temp_unzip_dir'] = $_REQUEST['temp_unzip_dir'];
		// $response_arr['temp_pclzip'] = $_REQUEST['temp_pclzip'];
		// $response_arr['bkfile'] = $_REQUEST['bkfile'];
		// $response_arr['extractParentHID'] = $_REQUEST['extractParentHID'];
		// $response_arr['is_download_multi_call'] = false;
		// $response_arr['is_file_append'] = false;
		// $response_arr['DBDetails']['DB_HOST'] = DB_HOST;
		// $response_arr['DBDetails']['DB_NAME'] = DB_NAME;
		// $response_arr['DBDetails']['DB_USER'] = DB_USER;
		// $response_arr['DBDetails']['DB_PASSWORD'] = DB_PASSWORD;
		// $response_arr['DBDetails']['prefix'] = $GLOBALS['db_table_prefix'];
		// $response_arr['dbModification'] = false;
		// $response_arr['URLParseData'] = $GLOBALS['URLParseData'];
		// $response_arr['wp_content_url'] = $GLOBALS['wp_content_url'];
		// $response_arr['is_new_backup'] = $GLOBALS['is_new_backup'];
		// $response_arr['isStagingToLive'] = $GLOBALS['isStagingToLive'];
		// $response_arr['isExistingSite'] = $GLOBALS['isExistingSite'];
		// $response_arr['dbBkFile'] = $GLOBALS['dbBkFile'];
		// $response_arr['backup_meta_files'] = $GLOBALS['backup_meta_files'];
		// $response_arr['WPVersionName'] = $GLOBALS['WPVersionName'];
		// $response_arr['oldURLReplacement'] = false;
		// $response_arr['next_extract_id'] = 0;
		// $response_arr['file_iterator'] = false;
		// $response_arr['isStaging'] = $_REQUEST['isStaging'];
		// $response_arr['oneShotdownlaod'] = $_REQUEST['oneShotdownlaod'];
		// $response_arr['status'] = 'completed';
		// $response_arr['break'] = false;

	}

	public function curl_get_file_size($url) {
	  // Assume failure.

	  $result = -1;

	  $curl = curl_init( $url );

	  // Issue a HEAD request and follow any redirects.
	  curl_setopt( $curl, CURLOPT_NOBODY, true );
	  curl_setopt( $curl, CURLOPT_HEADER, true );
	  curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
	  curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
	  curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, false );
	  curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
	  curl_setopt( $curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko Firefox/16.0' );

	  $data = curl_exec( $curl );
	  $curlInfo = array();
	  $curlInfo['info'] = curl_getinfo($curl);
	  if(curl_errno($curl)){
	  	$curlInfo['errorNo'] = curl_errno($curl);
	  	$curlInfo['error'] = curl_error($curl);
	  }
	  curl_close( $curl );
	  if( $data ) {
	    $content_length = "unknown";
	    $status = "unknown";

	    if( preg_match( "/Content-Length: (\d+)/", $data, $matches ) ) {
	      $content_length = (int)$matches[1];
	    }
	    if ($content_length == 'unknown' && preg_match( "/content-length: (\d+)/", $data, $matches )) {
	    	$content_length = (int)$matches[1];
	    }
	    $status = $curlInfo['info']['http_code'];
	    // http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
	    if( $status == 200 || ($status > 300 && $status <= 308) ) {
	      $result = $content_length;
	    }
	  }
	  if ($result == -1) {
	  	$headers = @get_headers($url, 1);
		if (!empty($headers["Content-Length"]) && $headers["Content-Length"]>0) {
			return $headers["Content-Length"];
		}
	  }
	  if ($result == -1) {
	  		$content_length = (int)$curlInfo['info']['download_content_length'];
	  		if ($content_length >0) {
	  			return $content_length;
	  		}
	  }
	  return $result;
	}

	public function multi_call_upload_using_curl($URL, $file, &$uploadResponseHeaders, $prevResult = array(), $wpContentURL= false, $file_list_or_full = 'full'){
		if (!function_exists('curl_init') || !function_exists('curl_exec')){
			return false;
		}

		if(!file_exists($file)){

			$this->last_error = "Local file list dump file not found for upload ($file)";
			
			return false;
		}

		if(empty($prevResult['file'])){
			$fp = fopen ($file, 'rb');
		} else{
			$file = $prevResult['file'];
			$fp = fopen ($file, 'rb');
			fseek($fp, $prevResult['startRange']);
		}

		if(!$fp){
			$this->last_error = "Could not open zip file for upload ($file)";

			return false;
		}

		$isBreak = false;
		$isMultiPart = false;

		$startRange = (empty($prevResult['startRange']) && empty($prevResult['file']))? 0 : $prevResult['startRange'];
		$endRange = (empty($prevResult['endRange']) && empty($prevResult['file']))? $this->UPLOAD_CHUNK_SIZE : $prevResult['endRange'];

		$totalFileSize = filesize($file);
		
		status_losy("Uploading file ".$file, $success=true, $return=false);
		status_losy("Total size of the file ".$totalFileSize, $success=true, $return=false);
		status_losy("Upload start from ".$startRange, $success=true, $return=false);

		if ( !empty($_REQUEST['oneShotdownlaod']) ) {
			$endRange = $totalFileSize;
		}

		$current_sync_unique_id = $this->local_sync_options->get_option('current_sync_unique_id');

		do{

			//read from file
			$currentOffest = (empty($startRange)) ? 0 : $startRange;
			@fseek($fp, $currentOffest, SEEK_SET);
			$file_data = @fread($fp, $this->UPLOAD_CHUNK_SIZE);

			// local_sync_log($file_data, "--------file_data_binary--------");

			$file_data_enc = bin2hex($file_data);

			$upload_action = 'handle_upload_file';

			if( $file_list_or_full == 'full' ){
				$upload_action = 'handle_upload_zip_file';
			}

			$post_arr = array(
				'is_local_sync' => true,
				'start_range' => $startRange,
				'end_range' => $endRange,
				'action' => $upload_action,
				'file_data' => $file_data_enc,
				'current_sync_unique_id' => $current_sync_unique_id,
			);

			$post_arr['prod_key_random_id'] = $this->local_sync_options->get_option('prod_key_random_id');

			$post_arr_copy = array(
				'is_local_sync' => true,
				'start_range' => $startRange,
				'end_range' => $endRange,
				'action' => $upload_action,
			);

			local_sync_log($post_arr_copy, "--------post_arr_copy--------");

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko Firefox/16.0');
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Keep-Alive', 'Keep-Alive: 115'));
			// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Keep-Alive', 'Keep-Alive: 115', 'Content-Type: text/plain'));

			// $rangeVariable = $startRange . '-' . $endRange;
			// curl_setopt($ch, CURLOPT_RANGE, $rangeVariable);

			curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );

			curl_setopt($ch, CURLOPT_POST, 1); // enable posting
			curl_setopt($ch, CURLOPT_POSTFIELDS, base64_encode(json_encode($post_arr)) ); // post images 

			$callResponse = curl_exec($ch);

			local_sync_log($callResponse, "--------callResponse----multi_call_upload_using_curl----");

			$callResponse = parse_local_sync_response_from_raw_data_php($callResponse);

			local_sync_log($callResponse, "----parsed----callResponse----multi_call_upload_using_curl----");

			if(!empty($callResponse)){
				$callResponse = json_decode($callResponse, true);
			}

			$info = curl_getinfo($ch);
			curl_close($ch);

			// local_sync_log($info, "--------info--------");

			if( !empty($callResponse['success']) ){

				// local_sync_log('', "--------http_code is 206 ya--------");

				//multiCallDownloadUsingCURL($URL, $file, $uploadResponseHeaders);
				$isMultiPart = true;
				$startRange = ftell($fp);
				$endRange = ($startRange + $this->UPLOAD_CHUNK_SIZE);
				if($endRange >= $totalFileSize){
					$endRange = $totalFileSize;
				}
				if($startRange == $endRange){
					$isMultiPart = false;
				}
			} else {
				local_sync_log($callResponse, "--------multicall upload response error--------");
			}

			$rangeVariable = $startRange . '-' . $endRange;
			$isBreak = is_local_sync_timeout_cut();
		}
		while(!($isBreak) && $isMultiPart);

		fclose($fp);
		
		$currentResult = array();

		$this->initialize_response_array($currentResult);
		
		$currentResult['file'] = $file;
		$currentResult['startRange'] = $startRange;
		$currentResult['endRange'] = $endRange;

		status_losy("File Uploaded size:".$endRange, $success=true, $return=false);

		if($isBreak == true){
			$currentResult['status'] = 'partiallyCompleted';
			$currentResult['is_upload_multi_call'] = true;
		}

		if(!$isMultiPart){
			$currentResult['is_upload_multi_call'] = false;
		}

		$uploadResponseHeaders[] = "HTTP/1.1 ".$info['http_code']." SOMETHING";
		$uploadResponseHeaders[] = "Content-Type: ".$info['content_type'];

		return $currentResult;
	}
}
