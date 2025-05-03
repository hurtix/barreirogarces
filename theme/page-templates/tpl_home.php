<?php

/**
 * Template Name: UI Homepage
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




<div class="swiper vertical h-screen">
  <div class="swiper-wrapper">
    <?php if (have_rows('sliders')) : ?>
      <?php while (have_rows('sliders')) : the_row(); ?>
        <div class="swiper-slide h-screen bg-cover bg-center bg-no-repeat" style="background-image:url('<?php the_sub_field('imagen'); ?>')">
          <div class="relative h-full flex flex-col justify-center items-center gap-y-4 bg-black/40">
            <?php $enlace = get_sub_field('enlace'); ?>
            <?php if ($enlace) : ?>
              <a href="<?php echo esc_url($enlace); ?>">
                <span class="sr-only">Ir a <?php echo get_sub_field('titulo'); ?></span>
                <img class="block mx-auto w-[125px] border border-white p-2 rounded-tr-[30%] rounded-bl-[30%] hover:p-0 transition-all" src="<?php the_sub_field('logo'); ?>" alt="<?php echo get_sub_field('titulo'); ?>" />
              </a>
            <?php endif; ?>
            <h2 class="text-center text-white text-4xl lg:text-5xl font-bold mt-4"><?php the_sub_field('titulo'); ?></h2>
            <p class="text-center text-white text-3xl lg:text-4xl mb-0"><?php the_sub_field('subtitulo'); ?></p>
          </div>
          <div class="absolute w-full bottom-[5vh] left-0">
            <?php if (get_field('proyecto-descripcion')): ?>
              <div class="w-3/4 text-white text-lg block mx-auto text-center">
                <?php the_field('proyecto-descripcion'); ?>
              </div>
            <?php endif; ?>
            <?php if (have_rows('caracteristicas-rep')) : ?>
              <ul class="list-none text-center text-white m-0 grid grid-cols-2 lg:flex items-center justify-center gap-4 lg:gap-8 lg:[&>li:not(:last-child)]:border-r lg:[&>li:not(:last-child)]:pr-8 lg:[&>li:not(:last-child)]:border-white">
                <?php while (have_rows('caracteristicas-rep')) : the_row(); ?>
                  <li>
                    <span class="block text-2xl lg:text-4xl"><?php the_sub_field('cifra'); ?></span>
                    <span class="block text-lg lg:text-xl leading-none lg:leading-normal"><?php the_sub_field('texto_cifra'); ?></span>
                  </li>
                <?php endwhile; ?>
                <li class="flex items-center justify-center">
                  <?php $enlace = get_sub_field('enlace'); ?>
                  <?php if ($enlace) : ?>
                    <a class="btn text-white border border-white py-2 px-5 rounded hover:bg-white hover:text-black text-lg transition-all" href="<?php echo esc_url($enlace); ?>"><?php the_sub_field('texto_enlace'); ?></a>
                  <?php endif; ?>
                </li>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part('template-parts/layout/cifras'); ?>
    <?php get_template_part('template-parts/layout/interesado'); ?>
  </div>
</div>



<!-- Initialize Swiper -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const swiper = new Swiper(".vertical", {
    direction: "vertical",
    slidesPerView: 1,
    spaceBetween: 0,
    rewind: true,
    mousewheel: true,
    mousewheelControl: true,
    parallax: false,
    speed: 1000,
    effect: "slide",
    keyboard: {
      enabled: true,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
});
</script>

<?php get_footer();