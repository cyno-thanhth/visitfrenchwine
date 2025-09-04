<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cyno
 */

?>

<footer id="colophon" class="site-footer bg-dark text-light py-4">
  <div class="container">
    <div class="row">
      <!-- Cột trái -->
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <a href="<?php echo esc_url(__('https://wordpress.org/', 'cyno')); ?>" class="text-decoration-none text-light">
          <?php
          printf(esc_html__('Proudly powered by %s', 'cyno'), 'WordPress');
          ?>
        </a>
      </div>

      <!-- Cột phải -->
      <div class="col-md-6 text-center text-md-end">
        <?php
        printf(esc_html__('Theme by CYNO.', 'cyno'));
        ?>
      </div>
    </div>
  </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>