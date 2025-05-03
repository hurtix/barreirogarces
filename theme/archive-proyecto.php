<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(); ?>

<div class="swiper vertical h-screen overflow-hidden">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<!-- <div class="space-10 bg-dark w-full position-absolute top-0"></div> -->
			<div class="grid grid-cols-1 lg:grid-cols-2 h-screen gap-[1px]">
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/content/content-proyecto');
					}
				} 
				?>
				<!-- <div class="swiper2-button-next down d-flex align-items-center justify-content-center fit-width">
				<div class="mouse"></div>
			</div> -->
			</div>
		</div>
		<?php
		get_template_part('template-parts/layout/cifras');
		get_template_part('template-parts/layout/interesado');
		?>
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