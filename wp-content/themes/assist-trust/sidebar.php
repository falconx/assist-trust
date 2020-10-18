<?php $quote = get_field('quote'); ?>

<?php if ($quote['image']): ?>
  <div class="mb-2">
    <?php echo wp_get_attachment_image($quote['image']['ID'], 'quote-thumbnail'); ?>
  </div>
<?php endif; ?>

<blockquote>
  <p><?php echo $quote['text']; ?></p>
  <footer><?php echo $quote['author']; ?></footer>
</blockquote>