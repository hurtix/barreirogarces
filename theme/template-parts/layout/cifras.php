<?php

/**
 * Interesado?
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>


<div class="swiper-slide bg-dark text-white">
  <div class="container mx-auto px-4">
    <?php if (have_rows('rep_cifras_globales', 3901)) : ?>
      <div class="flex items-center justify-center">
        <ul id="cifras-globales" class="h-screen list-none items-center m-0 p-0 grid grid-cols-1 lg:grid-cols-3 gap-1 lg:gap-5">
          <?php while (have_rows('rep_cifras_globales', 3901)) : the_row(); ?>
            <li class="text-center text-white text-4xl lg:text-5xl">
              <?php if (have_rows('rep-frase', 3901)) : ?>
                <?php while (have_rows('rep-frase', 3901)) : the_row(); ?>
                  <span class="<?php the_sub_field('resaltar'); ?>"><?php the_sub_field('texto-frase', 3901); ?></span>
                <?php endwhile; ?>
              <?php endif; ?>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</div>

