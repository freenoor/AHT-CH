<?php
/**
 * Template Name: Home
 */
get_header(); 
$mypost= $post;
?>
<section>
    <div class="slidersection desk-height">
        <div class="mySwiper swiper mySwiper1">
            <div class="swiper-wrapper ">
                <?php
                $args = array(
                'post_type' => 'sliserhome',
                'posts_per_page' => '-1',
                );
                $loop = new WP_Query($args);
                while($loop->have_posts()):
                $loop->the_post();
                ?>
                <div class="swiper-slide" style="background-image:url(<?php the_post_thumbnail_url();?>)"><div class="layer"></div>	
                    <!-- <img src="<?php the_post_thumbnail_url();?>" alt=""> -->
                    <div class="container">
                    <div class="slider__content">
                        
                            <h1><?php the_title();?></h1>
                            <h2><?php the_content();?></h2>
                            <!-- <h3><?php the_excerpt();?></h3> -->
                            <div class="button_welcomesection">
                                <a href="<?php the_permalink();?>">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="first_section_home">
        <div class="container">
            <div class="row">
                <div class="left col-lg-6">
                <h5><?php the_field('second-lineone'); ?></h5>
                <h4><?php the_field('second-linetwo'); ?></h4>
                <h3><?php the_field('second-subone'); ?></h3>
                
                <div class="line-withlogo"><div class="logo" style="background-image:url(<?php the_field('icontxt'); ?>)"></div><h1><?php the_field('second-subtwo'); ?></h1></div>
                </div>
                <div class="right col-lg-6">
                <img src="<?php the_field('img-secondsection'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="second_section_home">
        <div class="container">
            <div class="row">

                <div class="threeboxs" style="background-image:url(<?php the_field('img1'); ?>)">
                <div class="linktopage"><h5><?php the_field('img1txt'); ?></h5></div>
                </div>

                <div class="threeboxs" style="background-image:url(<?php the_field('img2'); ?>)">
                    <div class="linktopage"><h5><?php the_field('img2txt'); ?></h5></div>
                </div>

                <div class="threeboxs withbgr" style="background-image:url(<?php the_field('img3'); ?>)">
                <?php dynamic_sidebar('timings'); ?>
                <div class="icon"></div>
                <div class="button_welcomesection">
                    <?php dynamic_sidebar('onlynrtop');?>
                </div>
                </div>

            </div>
        </div>
    </div>
</section>
 

<section>
    <div class="third_section_home" style="background-image:url(<?php the_field('bgrimg'); ?>)">
        <div class="container">
            <div class="row">

            <div class="left col-lg-5">
                    <div class="callnr">
                        <div class="logo">
                        <img src="<?php the_field('leftsicon'); ?>" alt="">
                        </div>
                        <div class="nr">
                            <?php dynamic_sidebar('onlynr'); ?>
                        </div>
                    </div>
                </div>
                <div class="right col-lg-7">
                    <h1><?php the_field('fast-contact-section'); ?></h1>
                </div>

            </div>
        </div>
    </div>
</section>




<section>
    <div class="fourth_section_home">
        <div class="intro-title">
            <h2>Unsere neuesten Projekte</h2>
        </div>
        <div class="outside-cols">
            <?php 
            $args = array(
            'post_type'=> 'portfolio',
            'order'    => 'ASC',
            'posts_per_page' => 6,
            );    
            $the_query = new WP_Query( $args );
            if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?>
                <div class="inside-col noHover">
                    <div class="jsthvr"> 
                        <a href="<?php the_permalink(); ?>">
                        <div class="content-cat__inside">
                            <h3 class="text_title"><?php the_title(); ?></h3>
                        </div>
                        <img src="<?php the_post_thumbnail_url();?>" alt="">
                        </a>
                    </div>
            </div>
            <?php
            endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <a href="/referenz" class="view-all">Alle ansehen</a> 
    </div>
</section>



<section>
    <div class="fifth_section_home">
        <div class="intro-title">
            <h5><?php the_field('section_title_one-projects'); ?></h5>
            <h4><?php the_field('section_title_two-projects'); ?></h4> 
        </div>
        <div class="fifth__out">
        <div class="container">
        <div class="row">
        <div class="swiper mySwiper mySwipercat">
                <div class="swiper-wrapper ">
                    <?php 
                    $args = array(
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'exclude' => get_option('default_category'),
                    'hide_empty' => false // show empty categories

                );
                $terms = get_terms('category', $args );   
                $count = 0;
                foreach($terms as $term){ 
                $bg_img_url = get_field('category_background_img', $term);
                ?>
                    <div class="swiper-slide">
                        <ul class="inside-col noHover">
                            <a class="content-adv" href="/referenze">
                                <div class="jsthvr">
                                    <div class="nav-bg" style="background-image: url('<?php echo $bg_img_url;?>')"></div>
                                </div>
                                <div class="content">
                                <h3 class="text_title"><?php echo $term->name; ?></h3>
                                <h5 class="text_subt"><?php echo $term->description; ?></h3>
                                </div>
                            </a>
                        </ul>
                    </div>
                    <?php
                $count++;
                }  
                ?>
                </div>
            </div>

        </div>
        </div>
        </div>
    </div>
</section>





<?php get_footer(); ?>
