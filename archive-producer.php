<?php get_header(); ?>
<div class="container">
    <h1 class="text-center mt-4 font-permanent-marker">Nos producteurs</h1>

    <div class="d-flex flex-wrap flex-row justify-content-around">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="d-flex flex-column m-4 justify-content-center align-items-center text-center">


            <?php the_post_thumbnail('medium'); ?>



            <a class="btn btn-outline--green mt-4" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

            <?php
            $terms = get_the_terms(get_the_ID(), 'production');
            if (is_array($terms)) {
                foreach ($terms as $term) {
                    echo '<div class="mt-3"><h3>Exploitation :</h3>'. $term->name .'</div>';
                }
            }
            ; ?>
            <div class="mt-3"><h3>Production : </h3><?php the_excerpt(); ?></div>

        </div>
<?php endwhile; else : ?>
    <p>Aucun élément à afficher</p>
<?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>