<?php

/**
 * CPT Producer
 */

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('init', 'producer_cpt_init');
function producer_cpt_init()
{
    // Créer un nouveau type de contenu (post_type)
    register_post_type('producer', [
        'labels' => [
            'name' => _x('Producteurs', 'Post type general name', 'wpamap'),
            'singular_name' => _x('Producteur', 'Post type singular name', 'wpamap'),
            'menu_name' => _x('Producteurs', 'Admin Menu text', 'wpamap'),
            'name_admin_bar' => _x('Producteur', 'Add New on Toolbar', 'wpamap'),
            'add_new' => __('Ajouter nouveau', 'wpamap'),
            'add_new_item' => __('Ajouter Nouveau producteur', 'wpamap'),
            'new_item' => __('Nouveau producteur', 'wpamap'),
            'edit_item' => __('Modifier producteur', 'wpamap'),
            'view_item' => __('Voir producteur', 'wpamap'),
            'all_items' => __('Tous les producteurs', 'wpamap'),
            'search_items' => __('Rechercher des producteurs', 'wpamap'),
            'parent_item_colon' => __('Producteur parent :', 'wpamap'),
            'not_found' => __('Aucun producteur trouvé.', 'wpamap'),
            'not_found_in_trash' => __('Aucun producteur trouvé dans la corbeille.', 'wpamap'),
            'featured_image' => _x('Image à la une producteur', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wpamap'),
            'set_featured_image' => _x('Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wpamap'),
            'remove_featured_image' => _x('Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wpamap'),
            'use_featured_image' => _x('Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wpamap'),
            'archives' => _x('Archives des producteurs', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wpamap'),
            'insert_into_item' => _x('Insérer dans un producteur', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wpamap'),
            'uploaded_to_this_item' => _x('Uploader dans ce producteur', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wpamap'),
            'filter_items_list' => _x('Filtrer la liste des producteurs', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wpamap'),
            'items_list_navigation' => _x('Navigation liste des producteurs', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wpamap'),
            'items_list' => _x('Liste des producteurs', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wpamap'),
        ],
        'menu_icon' => 'dashicons-groups',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'producteur'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    ]);

    register_taxonomy('production', ['producer'], [
            'label' => 'Type de production',
            'rewrite' => ['slug' => 'production'],
            'hierarchical' => false
    ]);

}


/**
 * Ajouter des champs personnalisé (Custom Fields) sur les producteurs (post type "producer")
 */
add_action('carbon_fields_register_fields', 'producer_register_fields');
function producer_register_fields(){
    Container::make('post_meta', 'Informations producteur')
        ->where('post_type', '=', 'producer')
        ->add_fields([
            Field::make('text', 'address', 'Adresse'),
            Field::make('text', 'phone_number', 'Numéro de téléphone'),
            Field::make_association('products', 'Produits')
                ->set_types([[
                        'type' => 'post',
                        'post_type' => 'farmproduct'
                ]])
        ]);

// création du block Gutenberg - non utilisé
    Block::make('Liste des producteurs')
        ->add_fields([
            Field::make_text('title', 'Titre')
        ])
        ->set_category('wpamap', 'Amap')
        ->set_icon('groups')
        ->set_render_callback(function($fields) {
            $query = new WP_Query([
                'post_type' => 'producer',
                'post_per_page' => -1 // Pour retirer la pagination et récupérer tous les producteurs
            ]);

            ?>
            <h2><?= esc_html($fields['title']); ?></h2>
            <?php

            while($query->have_posts()){
                $query->the_post();
                ?>
                <div>
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <?php the_post_thumbnail('medium'); ?>
                    <?php the_terms(get_the_ID(), 'production', '<span>', ',', '</span>'); ?>
                </div>
                <?php
            }
            wp_reset_postdata(); //à mettre après une boucle avec wp_query
        })
    ;

    }