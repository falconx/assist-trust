<?php if (count(array_filter($rows))): ?>
  <?php foreach($rows as $row): ?>
    <div>
      <?php if ($row['content']): ?>
        <?php echo $row['content']; ?>
      <?php elseif ($row['grid']): ?>
        <div class="layout-grid">
          <div class="row mx-sm-n5">
            <?php foreach($row['grid'] as $gridItem): ?>
              <div class="col col-12 col-sm-6 px-sm-5">
                <?php echo $gridItem['content']; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>