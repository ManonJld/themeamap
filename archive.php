<?php get_header(); ?>

<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div>
        <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
        <?php the_post_thumbnail('medium'); ?>
        <?php the_content(); ?>
        <?php the_terms(get_the_ID(), 'production', '<span>', ',', '</span>'); ?>
    </div>
<?php endwhile; else : ?>
    <p>Aucun élément à afficher</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>