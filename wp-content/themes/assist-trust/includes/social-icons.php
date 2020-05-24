<?php

$youtube = get_field('youtube_url', 'option');
$twitter = get_field('twitter_url', 'option');
$facebook = get_field('facebook_url', 'option');
$instagram = get_field('instagram_url', 'option');

$youtubeId = uniqid('youtube');
$twitterId = uniqid('twitter');
$facebookId = uniqid('facebook');
$instagramId = uniqid('instagram');

?>

<ul class="social-icons--list">
  <?php if($youtube): ?>
    <li>
      <a href="<?php echo $youtube; ?>" target="_blank">
        <span id="<?php echo $youtubeId; ?>" class="visually-hidden">Youtube</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="<?php echo $youtubeId; ?>" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path d="M50.708 9H13.292A13.25 13.25 0 0 0 0 22.207v18.586A13.25 13.25 0 0 0 13.292 54h37.416A13.25 13.25 0 0 0 64 40.793V22.207A13.25 13.25 0 0 0 50.708 9zm-8.989 23.4l-17.501 8.3a.7.7 0 0 1-1.005-.63V22.962a.7.7 0 0 1 1.02-.623l17.5 8.812a.7.7 0 0 1-.015 1.253zm0 0" fill="currentColor"></path>
        </svg>
      </a>
    </li>
  <?php endif; if($twitter): ?>
    <li>
      <a href="<?php echo $twitter; ?>" target="_blank">
        <span id="<?php echo $twitterId; ?>" class="visually-hidden">Twitter</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="<?php echo $twitterId; ?>" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path d="M64 13.194a23.1 23.1 0 0 1-7.3 2.1 14.119 14.119 0 0 0 5.5-7.2c-1.9 1.2-6.1 2.9-8.2 2.9a13.782 13.782 0 0 0-9.6-4 13.187 13.187 0 0 0-13.2 13.2 13.576 13.576 0 0 0 .3 2.9c-9.9-.3-21.5-5.2-28-13.7a13.206 13.206 0 0 0 4 17.4c-1.5.2-4.4-.1-5.7-1.4-.1 4.6 2.1 10.7 10.2 12.9-1.6.8-4.3.6-5.5.4.4 3.9 5.9 9 11.8 9-2.1 2.4-9.3 6.9-18.3 5.5a39.825 39.825 0 0 0 20.7 5.8 36.8 36.8 0 0 0 37-38.6v-.5a22.861 22.861 0 0 0 6.3-6.7z" fill="currentColor"></path>
        </svg>
      </a>
    </li>
  <?php endif; if($facebook): ?>
    <li>
      <a href="<?php echo $facebook; ?>" target="_blank">
        <span id="<?php echo $facebookId; ?>" class="visually-hidden">Facebook</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="<?php echo $facebookId; ?>" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path d="M39.8 12.2H48V0h-9.7C26.6.5 24.2 7.1 24 14v6.1h-8V32h8v32h12V32h9.9l1.9-11.9H36v-3.7a3.962 3.962 0 0 1 3.8-4.2z" fill="currentColor"></path>
        </svg>
      </a>
    </li>
  <?php endif; if($instagram): ?>
    <li>
      <a href="<?php echo $instagram; ?>" target="_blank">
        <span id="<?php echo $instagramId; ?>" class="visually-hidden">Instagram</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="<?php echo $instagramId; ?>" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path d="M8.2 0h47.6A7.989 7.989 0 0 1 64 8.2v47.6a7.989 7.989 0 0 1-8.2 8.2H8.2A7.989 7.989 0 0 1 0 55.8V8.2A7.989 7.989 0 0 1 8.2 0zm38.4 7.1a2.9 2.9 0 0 0-2.9 2.9v6.9a2.9 2.9 0 0 0 2.9 2.9h7.2a2.9 2.9 0 0 0 2.9-2.9V10a2.9 2.9 0 0 0-2.9-2.9zm10.2 20h-5.6a19.758 19.758 0 0 1 .8 5.5c0 10.6-8.9 19.3-19.9 19.3s-19.9-8.6-19.9-19.3a19.758 19.758 0 0 1 .8-5.5H7.1v27a2.476 2.476 0 0 0 2.5 2.5h44.6a2.476 2.476 0 0 0 2.5-2.5l.1-27zm-24.7-7.7a12.723 12.723 0 0 0-12.9 12.5 12.64 12.64 0 0 0 12.9 12.4A12.723 12.723 0 0 0 45 31.8a12.64 12.64 0 0 0-12.9-12.4z" fill="currentColor"></path>
        </svg>
      </a>
    </li>
  <?php endif; ?>
</ul>