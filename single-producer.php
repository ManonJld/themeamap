<?php get_header(); ?>

<?php
$pictures = carbon_get_the_post_meta('photo_gallery');
$farmproducts= carbon_get_the_post_meta('products');
?>

<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="text-center mt-4 font-permanent-marker"><?php the_title(); ?></h1>
        <div class="row mt-4">

            <?php if (count($pictures)>0): ?>
                <div id="producer-carrousel" class="autoplay">
                    <div><?php the_post_thumbnail('single-producer'); ?></div>
                        <?php foreach ($pictures as $picture) : ?>

                            <div><?= wp_get_attachment_image($picture, 'single-producer'); ?></div>
                        <?php endforeach; ?>
                </div>
            <?php else:?>
                <div class="m-auto text-center"><?php the_post_thumbnail('single-producer'); ?></div>
            <?php endif; ?>

        </div>
        <div class="row mt-4">

            <?php the_content(); ?>
            <hr>
            <h2 class="text-center mt-4 font-permanent-marker">Ses produits</h2>
            <div class="mt-4 d-flex flex-wrap flex-row justify-content-around">
                <?php foreach ($farmproducts as $farmproduct) : ?>
                    <?php $current_product = get_post($farmproduct['id']); ?>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <?= get_the_post_thumbnail($current_product->ID, 'thumbnail'); ?>
                        <p><?= get_the_title($current_product->ID); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php endwhile; else : ?>
        <p>Aucun élément à afficher</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>