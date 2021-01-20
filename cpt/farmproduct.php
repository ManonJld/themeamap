<?php

/**
 * CPT farmproduct
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('init', 'farm_product_cpt_init');
function farm_product_cpt_init()
{
    // Créer un nouveau type de contenu (post_type)
    register_post_type('farmproduct', [
        'labels' => [
            'name' => _x('Produits', 'Post type general name', 'wpamap'),
            'singular_name' => _x('Produit', 'Post type singular name', 'wpamap'),
            'menu_name' => _x('Produits', 'Admin Menu text', 'wpamap'),
            'name_admin_bar' => _x('Produit', 'Add New on Toolbar', 'wpamap'),
            'add_new' => __('Ajouter nouveau', 'wpamap'),
            'add_new_item' => __('Ajouter Nouveau produit', 'wpamap'),
            'new_item' => __('Nouveau produit', 'wpamap'),
            'edit_item' => __('Modifier produit', 'wpamap'),
            'view_item' => __('Voir produit', 'wpamap'),
            'all_items' => __('Tous les produits', 'wpamap'),
            'search_items' => __('Rechercher des produits', 'wpamap'),
            'parent_item_colon' => __('Produit parent :', 'wpamap'),
            'not_found' => __('Aucun produit trouvé.', 'wpamap'),
            'not_found_in_trash' => __('Aucun produit trouvé dans la corbeille.', 'wpamap'),
            'featured_image' => _x('Image à la une produit', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wpamap'),
            'set_featured_image' => _x('Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wpamap'),
            'remove_featured_image' => _x('Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wpamap'),
            'use_featured_image' => _x('Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wpamap'),
            'archives' => _x('Archives des produits', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wpamap'),
            'insert_into_item' => _x('Insérer dans un produit', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wpamap'),
            'uploaded_to_this_item' => _x('Uploader dans ce produit', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wpamap'),
            'filter_items_list' => _x('Filtrer la liste des produits', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wpamap'),
            'items_list_navigation' => _x('Navigation liste des produits', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wpamap'),
            'items_list' => _x('Liste des produits', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wpamap'),
        ],
        'menu_icon' => 'dashicons-carrot',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'produit'],
        'supports' => ['title', 'thumbnail'],
//      Cette ligne ne permet pas l'affichage par taxonomy!!
//        'exclude_from_search' => true,
//      cette ligne ne permet plus de voir les posts en page single mais pas non plus en page archive
//        'publicly_queryable' => false,
    ]);


    //    ajouter une taxonomy et organiser les produits par type
    register_taxonomy('product-type', ['farmproduct'], [
        'label' => 'Type de produit',
        'rewrite' => ['slug' => 'type'],
        'hierarchical' => true
    ]);
}

/**
 * Ajouter des champs personnalisé (Custom Fields) sur les produits (post type "farmproduct")
 */
add_action('carbon_fields_register_fields', 'farmproduct_register_fields');
function farmproduct_register_fields()
{
    Container::make_post_meta('Infos produits')
        ->where('post_type', '=', 'farmproduct')
        ->add_fields([
           Field::make_association('produce_by', 'Produit par')
            ->set_types([[
                'type' => 'post',
                'post_type' => 'producer'
            ]])
        ]);
}
