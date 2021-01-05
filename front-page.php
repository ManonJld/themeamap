<?php get_header(); ?>

<main class="container">
<?php while(have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
<?php endwhile; ?>

<aside class="col-4">
    <?php if (is_active_sidebar('home-sidebar')): ?>
        <?php dynamic_sidebar('home-sidebar'); ?>
    <?php endif; ?>

</aside>
</main>


<?php get_footer(); ?>