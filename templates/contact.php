<?php
/**
 * Template Name: Contact
 */
get_header(); 
$mypost= $post;
?>

<div class="welc__pages" id="sectionhome" style="background-image:url(<?php the_post_thumbnail_url();?>)">
    <div class="container">
    <div class="welc__content">
        <h1>Contact</h1>
        <div class="breadcrumbs">
            <a class="breadcrumbs_item home" href="/">Home</a>
            <span class="breadcrumbs_delimiter"></span>
            <span class="breadcrumbs_item current"><?php echo esc_html(get_the_title()); ?></span>
        </div>
    </div>
    </div>
</div>


<section>
    <div class="first_section_contact">
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar('contacttype'); ?>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="second_section_contact">
    <div class="intro-title">
            <h5><?php the_field('contact1'); ?></h5>
            <h4><?php the_field('contact2'); ?></h4>
        </div>
        <div class="container">
            <div class="outside-contact">
                <div class="leftimg col-lg-4"><img class="img-fl" src="<?php the_field('contact_form_image'); ?>"></div>
                <div class="rightss col-lg-8"><?php dynamic_sidebar('conactformpg'); ?></div>
            </div>
        </div>
    </div>
</section>
<div id="map" ></div>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVu3FMyk485eNAMGE6uc5ttRxS1PYDFJE"></script>
        <script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);
            function init() {
                var mapOptions = {
                    zoom: 13,
                    center: new google.maps.LatLng(<?php the_field('latitude');?>, <?php the_field('longitude');?>),
                    styles: [{"featureType": 'water',"elementType": 'labels.text.fill',"stylers": 
                    [{"color": '#686868'}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},
                    {"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},
                    {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},
                    {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
                    {"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},
                    {"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},
                    {"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},
                    {"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#000000"}]},
                    {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
                    {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
                    {"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},
                    {"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},
                    {"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},
                    {"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
                    {"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},
                    {"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},
                    {"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},
                    {"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]
                };
                var mapElement = document.getElementById('map');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php the_field('latitude');?>, <?php the_field('longitude');?>),
                    map: map,
                });            }
        </script>
<?php get_footer(); ?>







