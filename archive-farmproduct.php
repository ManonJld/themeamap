<?php get_header(); ?>

<?php
$products = new WP_Query([
    'post_type' => 'farmproduct',
    'nopaging' => true,
    'sort_column' => "post_title",
    'sort_order' => 'ASC'
]);
; ?>
<div class="container">
    <h1 class="text-center mt-5 font-permanent-marker">Tous nos produits</h1>
    <div class="mt-4 d-flex flex-wrap flex-row justify-content-around">

    <?php while($products->have_posts()) : ?>
        <?php $products->the_post(); ?>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <?php the_post_thumbnail('medium'); ?>
            <?php the_title(); ?>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_postdata(); //à mettre après une boucle avec wp_query; ?>
<?php get_footer(); ?>