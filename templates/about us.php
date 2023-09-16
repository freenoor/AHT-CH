<?php
/**
 * Template Name: About Us
 */
get_header(); 
$mypost= $post;
?>

<div class="welc__pages" id="sectionhome" style="background-image:url(<?php the_field('img-secondsection', 7);?>)">
    <div class="container">
    <div class="welc__content">
        <h1>About</h1>
        <div class="breadcrumbs"> 
            <a class="breadcrumbs_item home" href="/">Home</a>
            <span class="breadcrumbs_delimiter"></span>
            <span class="breadcrumbs_item current"><?php echo esc_html(get_the_title()); ?></span>
        </div>
    </div>
    </div>
</div>




<section>
    <div class="first_section_about">
        <div class="container"> 
            <div class="row">
                <div class="left col-lg-6">
                <img src="<?php the_field('img-secondsection-second', 7); ?>" alt="">
                </div>
                <div class="right col-lg-6">
                <h5><?php the_field('second-lineone', 7); ?></h5>
                <h4><?php the_field('second-linetwo', 7); ?></h4>
                <h3><?php the_field('second-exper', 7); ?></h3>
                <h2><?php the_field('second-subone', 7); ?></h2>
                <h1><?php the_field('checked_listabout', 7); ?></h1>
                </div>

            </div>
        </div>
    </div>
</section>


<section>
    <div class="third_section_home fourth_section_about">
        <div class="container">
            <div class="row">

            <div class="left col-lg-5">
                    <div class="callnr">
                        <div class="logo">
                        <img src="<?php the_field('leftsicon', 7); ?>" alt="">
                        </div>
                        <div class="nr">
                            <?php dynamic_sidebar('onlynr'); ?>
                        </div>
                    </div>
                </div>
                <div class="right col-lg-7">
                    <h1><?php the_field('fast-contact-section', 7   ); ?></h1>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>







