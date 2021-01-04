<?php
// Template Name: Contact

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?= do_shortcode('[contact-form-7 id="' . carbon_get_the_post_meta('form_id') . '" title="Formulaire de contact"]'); ?>

<?php endwhile; else : ?>
    <p>Aucun élément à afficher</p>
<?php endif; ?>

<?php get_footer(); ?>