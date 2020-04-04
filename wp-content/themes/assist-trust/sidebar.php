<?php $quote = get_field('quote'); ?>

<?php if ($quote['image']): ?>
  <img src="<?php echo $quote['image']; ?>" alt="" />
<?php endif; ?>

<blockquote>
  <p><?php echo $quote['text']; ?></p>
  <footer><?php echo $quote['author']; ?></footer>
</blockquote>