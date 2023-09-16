<?php
/**
 * Template Name: Jobs
 */
get_header(); 
$mypost= $post;
?>

<div class="welc__pages" id="sectionhome" style="background-image:url(<?php echo get_the_post_thumbnail_url(13); ?>)">
    <div class="container">
    <div class="welc__content">
        <h1>Jobs</h1>
        <div class="breadcrumbs">
            <a class="breadcrumbs_item home" href="/">Home</a>
            <span class="breadcrumbs_delimiter"></span>
            <span class="breadcrumbs_item current"><?php echo esc_html(get_the_title()); ?></span>

        </div>
    </div>
    </div>
</div>

<div class="jobspp">
    <div class="container">
<div class="intro-title">
    <h5>Work With Us</h5>
    <h4>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
    </div>
</div>
<div class="container-fluid">
    <?php if(have_posts()):
        while(have_posts()) : the_post();?>
            <div class="row">
                <div class="ld_kontakt ld_jobs" data-aos="flip-down">
                    <div class="container">
                            <?php the_content();?>
                    </div>
                </div>
            </div>
        <?php endwhile;
    endif;?>
</div>  
</div>
<?php get_footer(); ?>







