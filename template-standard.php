<?php
// Template Name: Standard

get_header(); ?>
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_excerpt(); ?>
            <?php the_content(); ?>
        <?php endwhile; else : ?>
            <p>Aucun élément à afficher</p>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>