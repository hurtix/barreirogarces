<?php

/**
 * Template Name: UI Sobre Nosotros
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(); ?>


<div id="uno" class="swiper vertical h-screen overflow-hidden">
  <div class="swiper-wrapper">
    <?php if (have_rows('sliders')) : ?>
      <?php while (have_rows('sliders')) : the_row(); ?>

        <div class="swiper-slide main" style="background:url(<?php the_sub_field('imagen'); ?>) no-repeat center /cover">
            
            <div class="relative h-screen text-white text-2xl lg:text-3xl w-full lg:w-1/2 px-4 lg:px-0 mx-auto gap-y-4 flex flex-col justify-center items-center text-center">
              <?php the_sub_field( 'subtitulo' ); ?>
              <div class="swiper2-button-next down flex items-center justify-center">
                <div class="mouse cursor-pointer"></div>
              </div>
              
            </div>
          

        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <?php // No rows found 
      ?>
    <?php endif; ?>
    <!-- <div class="swiper-pagination"></div> -->
    <?php 
      get_template_part('template-parts/layout/timeline');
      get_template_part('template-parts/layout/cifras'); 
      get_template_part('template-parts/layout/interesado'); 
     ?>



  </div>
</div>
<!-- Initialize Swiper -->
<script>
  var swiper2 = new Swiper(".vertical", {
    direction: "vertical",
    slidesPerView: 1,
    spaceBetween: 0,
    rewind: true,
    // autoplay: {
    //   delay: 2500,
    //   disableOnInteraction: false,
    // },
    mousewheel: true,
    mousewheelControl: true,
    parallax: false,
    speed: 1000,
    effect: "slide",
    keyboard: {
      enabled: true,
    },
    navigation: {
          nextEl: ".swiper2-button-next",
          prevEl: ".swiper2-button-prev",
        },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>