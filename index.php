<?php get_header(); ?>
<div class="container">
    <h1 class="text-center mt-4 font-permanent-marker"><?= get_queried_object()->name;?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="m-3 border border-1 rounded text-center p-3">
            <?php the_post_thumbnail(); ?>
            <h2 class="font-permanent-marker mt-3"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </section>
    <?php endwhile; else : ?>
        <p>Aucun élément à afficher</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>