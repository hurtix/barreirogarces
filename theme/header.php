<?php

/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package barreirogarces
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="<?php echo wp_is_mobile() ? 'mobile' : 'desktop'; ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="page">
		<a href="#content" class="sr-only"><?php esc_html_e('Skip to content', 'barreirogarces'); ?></a>

		<?php get_template_part('template-parts/layout/header', 'content'); ?>

		
				<div id="content">

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const header = document.getElementById('masthead');
				// const brand = document.getElementById('brand');
				// const primary_menu = document.getElementById('primary-menu');
				
				const observer = new IntersectionObserver((entries) => {
					entries.forEach(entry => {
						if (entry.target.classList.contains('isLight') && entry.isIntersecting) {
							// brand.classList.remove('brightness-0', 'invert-100');
							// primary_menu.classList.remove('text-white');
							header.classList.add('bg-dark');
						} else {
							// brand.classList.add('brightness-0', 'invert-100');
							// primary_menu.classList.add('text-white');
							header.classList.remove('bg-dark');
						}
					});
				});

				document.querySelectorAll('.isLight').forEach((element) => {
					observer.observe(element);
				});
			});
		</script>

		