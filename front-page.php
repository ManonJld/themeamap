<?php get_header(); ?>

<header class="home-header p-5 mb-3 fp-header-bg-image d-flex align-items-center">
    <div class="container text-center">

        <?php while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php endwhile; ?>

    </div>
</header>
<main class="container mt-4">
    <div class="row">
        <aside class="col-4">
            <?php if (is_active_sidebar('home-sidebar')): ?>
                <?php dynamic_sidebar('home-sidebar'); ?>
            <?php endif; ?>

        </aside>
        <div class="col-8">
            <section id="distribution" class="mx-3 px-3">
                <?php
                $query = new WP_Query([
                        'post_type' => 'post',
                        'category_name' => 'distribution',
                        'order_by' => 'date',
                        'order' => 'DESC',
                        'post_per_page' => 3
                ])
                ; ?>

                    <?php while($query->have_posts()) : $query->the_post(); ?>
                        <div class="border border-1 rounded p-3">
                            <h1><?php the_title(); ?></h1>
                            <hr>
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>

                <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>
            </section>
        </div>

    </div>
</main>


<?php get_footer(); ?>