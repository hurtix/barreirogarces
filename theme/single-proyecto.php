<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(); ?>


<div id="deslizador" class="swiper proyecto-vertical h-screen overflow-hidden">
    <div class="swiper-wrapper">
        <div id="uno" class="swiper-slide">
            <div class="swiper slider-proyecto">
                <?php if (have_rows('rep-slider')) : ?>
                    <div class="swiper-wrapper h-screen">
                        <?php while (have_rows('rep-slider')) : the_row(); ?>
                            <?php if (get_sub_field('proyecto-slider-imagen')) : ?>
                                <div class="swiper-slide">

                                    <img class="object-cover w-full h-full" src="<?php the_sub_field('proyecto-slider-imagen'); ?>" alt="slider">
                                    <!-- <div class="absolute top-0 left-0 w-full h-full bg-black/40"></div> -->

                                </div>
                            <?php endif ?>
                        <?php endwhile; ?>
                        <div class="absolute inset-0 flex flex-col items-center justify-center gap-y-4">
                            <img class="block mx-auto w-[125px] border border-white p-2 rounded-tr-[30%] rounded-bl-[30%]" src="<?php the_field('proyecto-logo'); ?>" alt="slider">
                            <h2 class="text-center text-white text-4xl lg:text-7xl font-bold"><?php the_title(); ?></h2>
                            <h3 class="text-center text-white text-2xl lg:text-4xl font-normal"><?php the_field('proyecto-subtitulo'); ?></h3>
                            <div class="swiper2-button-next flex items-center justify-center">
                                <div class="mouse cursor-pointer"></div>
                            </div>
                        </div>
                        <div class="absolute bottom-[5vh] left-0 w-full">
                            <?php if (get_field('proyecto-descripcion')) : ?>
                                <div class="text-white mx-auto text-center w-3/4 text-lg">
                                    <?php the_field('proyecto-descripcion'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (have_rows('rep-cifras')) : ?>
                                <ul class="list-none m-0 text-white text-center flex items-center justify-center gap-5 [&>li:not(:last-child)]:border-r [&>li:not(:last-child)]:pr-8 [&>li:not(:last-child)]:border-white">
                                    <?php while (have_rows('rep-cifras')) : the_row(); ?>
                                        <li>
                                            <span class="block text-4xl"><?php the_sub_field('cifra'); ?></span>
                                            <small class="block text-xl"><?php the_sub_field('detalle_cifra'); ?></small>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div id="dos" class="swiper-slide bg-white flex-col isLight">
            <div class="w-full h-full">
                <div class="w-full h-full">
                    <?php if (have_rows('proyecto-planos-rep')) : ?>
                        <?php $x = 1; ?>
                        <div class="h-full" id="pills-tabContent">
                            <?php while (have_rows('proyecto-planos-rep')) : the_row(); ?>
                                <div class="hidden [&.active]:block h-full" id="pills-<?php echo $x; ?>" role="tabpanel">
                                    <div class="grid grid-cols-12 h-full">
                                        <div class="col-span-12 lg:col-span-9 flex items-center justify-center">
                                            <img src="<?php the_sub_field('proyecto-imagen-plano'); ?>" class="max-h-[80%]" alt="planos" />
                                        </div>
                                        <div class="col-span-12 lg:col-span-3 flex items-start justify-start border-l border-[#efefef] h-auto lg:h-full">
                                            <div class="w-full pt-5 pl-3">
                                                <div class="flex gap-4 justify-between items-center mt-0 lg:mt-20 mb-4">
                                                    <p class="text-3xl">Planos</p>
                                                    <hr class="w-full mr-4">
                                                </div>
                                                <h3 class="font-bold text-2xl mb-4"><?php the_sub_field('proyecto-titulo-pestana'); ?></h3>
                                                <div class="[&_ul]:list-disc [&_ul]:py-4 [&_li]:ml-5">
                                                    <?php the_sub_field('descripcion_plano'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $x++; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-full bg-gray-100 absolute bottom-0">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-9 bg-white relative">
                        <?php if (have_rows('proyecto-planos-rep')) : ?>
                            <?php $y = 1; ?>
                            <div class="flex items-center justify-center" role="tablist">
                                <div class="swiper-button-next text-[var(--rojo)]"></div>
                                <div class="swiper carrusel-planos mx-5 w-full">
                                    <div class="swiper-wrapper">
                                        <?php while (have_rows('proyecto-planos-rep')) : the_row(); ?>
                                            <div class="swiper-slide cursor-pointer">
                                                <button
                                                    class="w-full px-4 py-8 text-center border-b-2 cursor-pointer transition-colors duration-300 
                                            <?php if ($y == 1) echo 'border-[var(--rojo)] text-[var(--rojo)]';
                                            else echo 'border-transparent hover:border-[var(--rojo)] hover:text-[var(--rojo)]'; ?>"
                                                    onclick="showTab('pills-<?php echo $y; ?>')"
                                                    type="button"
                                                    role="tab">
                                                    <?php the_sub_field('proyecto-titulo-pestana'); ?>
                                                </button>
                                            </div>
                                            <?php $y++; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <div class="swiper-button-prev text-[var(--rojo)]"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-span-3 <?php echo wp_is_mobile() ? 'hidden' : ''; ?>">
                        <div class="w-full h-full flex justify-center items-center gap-4 [&_svg]:mr-2">
                            <?php if (get_field('brochure_desktop')) : ?>
                                <a class="bg-[var(--rojo)] text-white border hover:bg-black transition-colors px-4 py-2 rounded inline-flex items-center" href="<?php the_field('brochure_desktop'); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                    </svg> Descargar brochure
                                </a>
                            <?php endif; ?>
                            <?php if (get_field('vista_360')) : ?>
                                <a class="bg-white text-black border hover:bg-black hover:text-white transition-colors px-4 py-2 rounded inline-flex items-center mt-2" href="<?php the_field('vista_360'); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-badge-vr" viewBox="0 0 16 16">
                                        <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
                                        <path d="M4.508 11h1.429l1.99-5.999H6.61L5.277 9.708H5.22L3.875 5.001H2.5zm6.387-5.999H8.5V11h1.173V8.763h1.064L11.787 11h1.327L11.91 8.583C12.455 8.373 13 7.779 13 6.9c0-1.147-.773-1.9-2.105-1.9zm-1.222 2.87V5.933h1.05c.63 0 1.05.347 1.05.989 0 .633-.408.95-1.067.95z" />
                                    </svg> Vista 360º
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showTab(tabId) {
                // Ocultar todos los paneles
                document.querySelectorAll('[role="tabpanel"]').forEach(panel => {
                    panel.classList.remove('active');
                });

                // Mostrar el panel seleccionado
                document.getElementById(tabId).classList.add('active');

                // Actualizar estados de los botones
                document.querySelectorAll('[role="tab"]').forEach(tab => {
                    tab.classList.remove('border-[var(--rojo)]', 'text-[var(--rojo)]');
                    tab.classList.add('border-transparent');
                });

                // Actualizar el botón activo
                event.currentTarget.classList.add('border-[var(--rojo)]', 'text-[var(--rojo)]');
                event.currentTarget.classList.remove('border-transparent');
            }

            // Activar la primera pestaña por defecto
            document.addEventListener('DOMContentLoaded', function() {
                const firstTab = document.querySelector('[role="tabpanel"]');
                if (firstTab) {
                    firstTab.classList.add('active');
                }
            });
        </script>

        <div id="tres" class="swiper-slide relative flex-col">
            <?php if (have_rows('rep-carrusel')) : ?>
                <div class="swiper galeria">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('rep-carrusel')) : the_row(); ?>
                            <div class="swiper-slide h-screen">
                                <img class="object-cover w-full h-full" src="<?php the_sub_field('proyecto-carrusel-imagen'); ?>" alt="carrusel" />
                                <div class="absolute top-0 left-0 w-full h-full bg-black/0"></div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="w-full bg-white absolute bottom-0 z-10">
                    <div class="grid grid-cols-12">
                        <div class="hidden lg:flex col-span-2 text-left px-4 py-3 justify-center flex-col">
                            <p class="text-xl">Galería</p>
                            <h3 class="font-bold text-3xl">Conoce los espacios</h3>
                        </div>
                        <div class="col-span-12 lg:col-span-10">
                            <div class="swiper galeria-mini">
                                <div class="swiper-button-next text-[var(--rojo)]"></div>
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('rep-carrusel')) : the_row(); ?>
                                        <div class="swiper-slide">
                                            <img class="p-4 rounded-3xl" src="<?php the_sub_field('proyecto-carrusel-imagen'); ?>" alt="carrusel" />
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="swiper-button-prev text-[var(--rojo)]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php get_template_part('template-parts/layout/cifras'); ?>
        <?php get_template_part('template-parts/layout/interesado'); ?>
    </div>
</div>




<script>
    window.addEventListener('load', function() {
        if (typeof Swiper === 'undefined') {
            console.error('Swiper no está cargado correctamente');
            return;
        }
        var swiper = new Swiper(".proyecto-vertical", {
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
            navigation: {
                nextEl: ".swiper2-button-next",
                prevEl: ".swiper2-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper2 = new Swiper(".slider-proyecto", {
            effect: "fade",
            spaceBetween: 0,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper(".galeria-mini", {
            loop: true,
            spaceBetween: 0,
            slidesPerView: 2,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                768: {
                    slidesPerView: 6,
                    spaceBetween: 0,
                }
            },
        });

        var swiper2 = new Swiper(".galeria", {
            loop: true,
            spaceBetween: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        var swiper = new Swiper(".carrusel-planos", {
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                }
            },
            spaceBetween: 0,
            allowSlideNext: true,
            slidesPerView: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>