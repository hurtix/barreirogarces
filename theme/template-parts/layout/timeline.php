<?php

/**
 * Linea de tiempo
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit; ?>

      
<div id="tres" class="swiper-slide relative h-screen isLight">
            
    <div class="swiper timeline h-full">
        <?php if ( have_rows( 'rep-hitos' ) ) : ?>
            <div class="swiper-wrapper h-full">
                <?php while ( have_rows( 'rep-hitos' ) ) : the_row(); ?>
                    <div class="swiper-slide h-full">
                        <div class="flex flex-wrap h-full">
                            <div class="w-full lg:w-3/4 h-[50%] lg:h-full relative">
                        <img class="w-full h-full object-cover" 
                             src="<?php the_sub_field( 'hito-imagen' ); ?>" 
                             alt="foto timeline" />
                             <div class="absolute top-0 left-0 w-full h-full bg-black/40"></div>
                        </div>
                        <div class="w-full lg:w-1/4 h-[50%]  lg:h-full items-start justify-center px-10 bg-white flex flex-col">
                            <span class="text-left w-full text-4xl mb-4">Año <?php the_sub_field( 'hito-anho' ); ?></span>
                            <div class="text-lg [&_p]:mb-4">
                                <?php the_sub_field( 'hito-descripcion' ); ?>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="w-full bg-white absolute bottom-0 border-t border-gray-300 z-[1]">
        <div class="grid grid-cols-12 items-center">
            <div class="hidden col-span-2 text-left px-4 py-3 lg:flex justify-center flex-col">
                <p class="text-xl m-0 <?php if(wp_is_mobile()) echo 'hidden'; ?>">Experiencia</p>
                <h3 class="font-bold text-3xl">Nuestra trayectoria</h3>
            </div>
            <div class="col-span-12 lg:col-span-10 h-full">
                <div class="swiper timeline-mini h-full">
                    <div class="swiper-button-next text-white lg:text-black top-0 h-full right-0 px-4 mt-0"></div>
                    <?php if ( have_rows( 'rep-hitos' ) ) : ?>
                        <div class="swiper-wrapper">
                            <?php while ( have_rows( 'rep-hitos' ) ) : the_row(); ?>
                                <div class="swiper-slide border-r border-gray-300 h-full flex items-center justify-center">
                                    <span class="text-2xl font-medium <?php if(wp_is_mobile()) echo 'py-3'; ?>">
                                        <?php the_sub_field( 'hito-anho' ); ?>
                                    </span>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <div class="swiper-button-prev text-white lg:text-black top-0 h-full left-0 px-4 mt-0"></div>    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var swiper = new Swiper(".timeline-mini", {
        breakpoints: {
          768: {
            slidesPerView: 5,
            spaceBetween: 0,
          }
        },
        loop: false,
        rewind: true,
        spaceBetween: 0,
        slidesPerView: 1,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".timeline", {
        loop: false,
        rewind: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>