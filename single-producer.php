<?php get_header(); ?>
<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="text-center mt-4 font-permanent-marker"><?php the_title(); ?></h1>
        <div id="producer-carrousel" class="col-md-6">
            <div><?php the_post_thumbnail('single-producer'); ?></div>
            <?php

            $postmeta = get_post_meta(get_the_ID());
            $array_pictures = [];
            for($i=0; $i<3; $i++){
                $array_pictures[$i] = $postmeta['_photo_gallery|||'.$i.'|value']  ;
            }

             ?>
        <?php foreach ($array_pictures as $array_picture) : ?>

            <div><?= wp_get_attachment_image($array_picture[0], 'single-producer'); ?></div>
        <?php endforeach; ?>
        </div>

        <?php the_excerpt(); ?>
        <?php the_content(); ?>
    <?php endwhile; else : ?>
        <p>Aucun élément à afficher</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>