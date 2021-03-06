<?php
// Template Name: Contact

get_header(); ?>

<div class="container mt-4 d-flex justify-content-center">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="border border-1 rounded px-5 py-4 bg-form">
    <h1 class="mb-3 font-permanent-marker"><?php the_title(); ?></h1>
    <?= do_shortcode('[contact-form-7 id="' . carbon_get_the_post_meta('form_id') . '" title="Formulaire de contact"]'); ?>
</div>
<?php endwhile; else : ?>
    <p>Aucun élément à afficher</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>