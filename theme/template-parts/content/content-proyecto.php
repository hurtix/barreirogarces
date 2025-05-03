<?php

/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<?php 
$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
<?php //$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>

<div <?php post_class('bg-center bg-no-repeat bg-cover'); ?> id="post-<?php the_ID(); ?>" style="background-image: url(<?php echo $image[0]; ?>);">
    <div class="bg-black/40 flex flex-row lg:flex-col items-end pb-8 lg:pb-0 lg:items-center justify-center h-full gap-3 px-4 lg:px-0">
        <img class="block mx-auto w-[75px] lg:w-[125px] border border-white p-2 rounded-tr-[30%] rounded-bl-[30%]" src="<?php the_field('proyecto-logo'); ?>" alt="<?php the_title(); ?>">
        <h1 class="text-white font-normal text-2xl"><?php the_title(); ?></h1>
        <a class="lg:hidden border text-white hover:bg-[var(--rojo)] hover:text-white px-4 py-2 rounded transition-colors text-lg text-nowrap" href="<?php the_permalink(); ?>">Más info</a>
        <a class="hidden lg:block border text-white hover:bg-[var(--rojo)] hover:text-white px-4 py-2 rounded transition-colors text-lg" href="<?php the_permalink(); ?>">Más información</a>
    </div>
</div>