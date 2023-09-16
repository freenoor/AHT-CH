<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Puzzle
 */

?>
<footer id="colophon" class="site-footer">
  <section>
    <div class="container">
      <div class="row">

          <div class="footers1 allinonefooter col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <?php dynamic_sidebar('footer1');?>
          </div>

          <div class="footers2 allinonefooter col-xl-2 col-lg-6 col-md-6 col-sm-12">
          <h1>Links</h1>
            <?php dynamic_sidebar('footer2');?>
          </div>

          <div class="footers3 allinonefooter col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <h1>Dienstleistungen</h1>
            <?php dynamic_sidebar('footer3');?>
          </div>

          <div class="footers4 allinonefooter col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <h1>Soziale Media</h1>
            <?php dynamic_sidebar('footer4');?> 
          </div>
          
		</div>
	</div>
</section>
	
		<div class="underfooter">
		<div class="container" data-aos="fade-right" data-aos-anchor="#example-anchor" data-aos-offset="1000"data-aos-duration="1000">      
		  <p><?php echo date(' Y ') ;?> &copy; ALL RIGHTS ARE RESERVED.</p>
		</div>
		</div>
	
	
		</footer><!-- #colophon -->

		
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>