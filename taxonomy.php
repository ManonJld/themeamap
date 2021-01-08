<?php get_header(); ?>

    <div class="container ">
        <h1 class="text-center mt-5 font-permanent-marker"><?= get_queried_object()->name;?></h1>
        <div class="mt-4 d-flex flex-wrap flex-row justify-content-around">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <?php the_post_thumbnail('medium'); ?>
                    <?php the_title(); ?>
                </div>

            <?php endwhile; else : ?>
                <p>Aucun élément à afficher</p>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>