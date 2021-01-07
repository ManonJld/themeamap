<?php get_header(); ?>

<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div>
        <a class="title-producer" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
        <?php the_post_thumbnail('medium'); ?>
        <?php
        $terms = get_the_terms(get_the_ID(), 'production');
        if (is_array($terms)) {
            foreach ($terms as $term) {
                echo '<div>Exploitation : ' . $term->name . '</div>';
            }
        }
        ; ?>
        <?php the_excerpt(); ?>

    </div>
<?php endwhile; else : ?>
    <p>Aucun élément à afficher</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>