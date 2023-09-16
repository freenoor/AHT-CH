<?php
/**
 * Template Name: Referenze
 */
get_header(); 
$mypost= $post;
?>

<div class="welc__pages" id="sectionhome" style="background-image:url(<?php the_post_thumbnail_url();?>)">
    <div class="container">
    <div class="welc__content">
        <h1><?php echo esc_html(get_the_title()); ?></h1>
        <div class="breadcrumbs">
            <a class="breadcrumbs_item home" href="/">Home</a>
            <span class="breadcrumbs_delimiter"></span>
            <span class="breadcrumbs_item current"><?php echo esc_html(get_the_title()); ?></span>
        </div>
    </div>
    </div>
</div>





<section>
    <div class="first_section_projects">

    <div class="all-content">
        <div class="tabbb">
            <nav >
                <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
                <?php 
                $args = array(
                    'orderby' => 'ID',
                    'order' => 'ASC' 
                );
                $terms = get_terms('category', $args ); 
                $count = 0;
                foreach($terms as $term){ 
                    ?>
                    <li class="nav-item"  data-aos="flip-up">
                        <a class="nav-link <?php echo $count == 0 ? 'active' : ''?>" data-toggle="tab" href='#<?php echo $term->slug;?>' id="<?php echo $term->slug;?>-tab" role="tab" aria-controls="<?php echo $term->slug;?>" aria-selected="true">
                           
                        <?php 
                        echo $term->name;
                        ?>

                        </a>
                    </li>
                <?php
                $count++; }  
                ?>
                </ul>
            </nav>
        </div>
 
   
        <div class="col-12 contenttd"> 
            <div class="tab-content">
                <?php $termstwo = get_terms('category', $args ); 
                $count = 0;
                foreach($termstwo as $term): 
                ?>
                <div class="tab-pane fade <?php echo $count == 0 ? 'active show' : ''?>" id="<?php echo $term->slug;?>" role="tabpanel" aria-labelledby="<?php echo $term->slug;?>-tab">
                    <div class="all">
                    <div class="row"> 
                    <?php
                        $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => '-1',
                        'order' => 'ASC',
                        'category' => $term->slug,
                        'orderby' => 'rand'
                        );
                        $loop = new WP_Query($args);
                        while($loop->have_posts()):
                        $loop->the_post();
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="inside-col noHover">
                        <div class="jsthvr"> 
                            <a href="<?php the_permalink(); ?>"> 
                                <div class="content-cat">
                                <div class="content-cat__inside">
                                <h3 class="text_title"><?= the_title(); ?></h3>
                                </div>
                                </div>
                                <img src="<?php the_post_thumbnail_url();?>" alt="">
                            </a>
                        </div>
                        </div>
                        </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                        </div>
                    </div>
                </div>      

                <?php 
                $count++;
                endforeach;
                ?>
            </div>
            </div>
            </div>
    </div>
</section>

<?php get_footer(); ?>







