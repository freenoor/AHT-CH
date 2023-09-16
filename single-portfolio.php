<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package Puzzle
 */
get_header(); ?>

<div class="postss-single">
		
		<div class="welc__pages single__proj" id="sectionhome" style="background-image:url(<?php the_post_thumbnail_url();?>)">
			<div class="container">
			<div class="welc__content">
				<h1><?php the_title(); ?></h1>
				<div class="breadcrumbs">
					<a class="breadcrumbs_item home" href="/">Home</a>
					<span class="breadcrumbs_delimiter"></span>
					<span class="breadcrumbs_item current"><a class="breadcrumbs_item home" href="/referenze">Referenze</a></span>
					<span class="breadcrumbs_delimiter"></span>
					<span class="breadcrumbs_item current"><?php echo esc_html(get_the_title()); ?></span>

				</div>
			</div>
			</div>
		</div>
		<div class="container">


		<div class="firstsec">

			<img class="img-fl" src="<?php the_post_thumbnail_url();?>" alt="">

			<div class="absolute-left1">
				<div class="date">
				<h5>Datum:</h5>
				<span><?php echo get_the_date( get_option('date_format') ); ?></span>
				</div>
			</div>
			<div class="absolute-left2">
				<div class="catname">
				<h5>Kategorie:</h5>
				<span><?php foreach((get_the_category()) as $category) 
				{
					echo $category->cat_name . ' '; 
				}?></span>
				</div>
			</div>

		</div>


		<div class="secsec">
			<h1><?php the_title(); ?></h1>
			<h2>
			<div class="galery">
			<link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/lightgallery/latest/css/lightgallery.css'>   
			<ul id="lightgallery">
				<div class="swiper-container swiper-container33">
					<div class="swiper-wrapper">
					<?php getGallery(); ?> 
					<?php
					wp_reset_query();
					if (have_posts()) {
						while (have_posts()) {
							the_post();
							getGallery();
						}
					}
					function getGallery(){
						$gallery = get_post_gallery(get_the_ID(), false);
						$gids = explode(",", $gallery['ids']);
						
						foreach ($gids as $id) {
							?>    
							<div class="thumbnail swiper-slide" style="background-image:url(<?php echo wp_get_attachment_url($id); ?>)"> 
								<li data-src="<?php echo wp_get_attachment_url($id); ?>" class="gallery-item img-fluid">
									<div class="light-gallery-poster"></div>
									<img class="img-fluid thumbnail d-none" src="<?php echo wp_get_attachment_url($id); ?>">
								</li>
							</div>
							<?php
						}
					}
					?>
					</div>
				</div>
			</ul>
		</div>
		<?php the_field('conten'); ?>
		</h2>
		</div>


		
		

		




</div>
</div>
	<?php
	$current_post_categories = get_the_category();
	$exclude_categories = array();
	foreach ($current_post_categories as $category) {
		$exclude_categories[] = $category->cat_ID;
	}
	$current_post_id = get_the_ID();
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 3,
		'orderby' => 'rand',
		'cat' => implode(',', $exclude_categories),
		'post__not_in' => array($current_post_id),
	);
	$loop = new WP_Query($args);
	if ($loop->have_posts()) :
	?>
	<div class="projects__section_single">
		<div class="container">
			<div class="title-intro">
				<h5>Sie können auch mögen</h5>
			</div>
			<div class="in-post">
				<div class="row">
					<?php
					while ($loop->have_posts()) : $loop->the_post();
					?>
					<div class="col-lg-4 col-md-4 col-sm-4 klas scale-hover">
						<div class="under">
							<a href="<?php the_permalink(); ?>">
								<div class="img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)"></div>
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					</div>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
	endif;
	?>

</div>
<?php get_footer(); ?>