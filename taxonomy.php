<?php get_header(); ?>
<div class="container mt-4 d-flex flex-wrap flex-row justify-content-around">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <?php the_post_thumbnail('medium'); ?>
        <?php the_title(); ?>
    </div>

<?php endwhile; else : ?>
    <p>Aucun élément à afficher</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>