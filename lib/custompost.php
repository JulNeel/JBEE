<?php 


/*
* On utilise une fonction pour créer notre custom post type 'sections'
*/

function wpm_custom_post_type() {

  // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
  $labels_section = array(
    // Le nom au pluriel
    'name'                => _x( 'Sections', 'Post Type General Name'),
    // Le nom au singulier
    'singular_name'       => _x( 'Section', 'Post Type Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __( 'Sections de la page d\'accueil'),
    // Les différents libellés de l'administration
    'all_items'           => __( 'Toutes les sections'),
    'view_item'           => __( 'Voir les sections'),
    'add_new_item'        => __( 'Ajouter une nouvelle section'),
    'add_new'             => __( 'Ajouter'),
    'edit_item'           => __( 'Editer la section'),
    'update_item'         => __( 'Modifier la section'),
    'search_items'        => __( 'Rechercher une section'),
    'not_found'           => __( 'Non trouvée'),
    'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
  );
  
  // On peut définir ici d'autres options pour notre custom post type
  
  $args_section = array(
    'label'               => __( 'sections'),
    'description'         => __( 'Tout sur les sections'),
    'labels'              => $labels_section,
    // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
    /* 
    * Différentes options supplémentaires
    */  
    'hierarchical'        => false,
    'public'              => true,
    'has_archive'         => false,
    'rewrite'       => array( 'slug' => 'sections'),
    'menu_icon'   => 'dashicons-exerpt-view',


  );
  

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
  $labels_projet = array(
    // Le nom au pluriel
    'name'                => _x( 'Projets', 'Post Type General Name'),
    // Le nom au singulier
    'singular_name'       => _x( 'Projet', 'Post Type Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __( 'Portfolio'),
    // Les différents libellés de l'administration
    'all_items'           => __( 'Toutes les projets'),
    'view_item'           => __( 'Voir les projets'),
    'add_new_item'        => __( 'Ajouter un nouveau projet'),
    'add_new'             => __( 'Ajouter'),
    'edit_item'           => __( 'Editer le projet'),
    'update_item'         => __( 'Modifier le projet'),
    'search_items'        => __( 'Rechercher un projet'),
    'not_found'           => __( 'Non trouvé'),
    'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
  );
  
  // On peut définir ici d'autres options pour notre custom post type
  
  $args_projet = array(
    'label'               => __( 'projets'),
    'description'         => __( 'Tout sur les projet'),
    'labels'              => $labels_projet,
    // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
    /* 
    * Différentes options supplémentaires
    */  
    'hierarchical'        => false,
    'public'              => true,
    'has_archive'         => false,
    'rewrite'       => array( 'slug' => 'projets'),
    'menu_icon'   => 'dashicons-grid-view',


  );



  // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
  register_post_type( 'jbee_sections', $args_section );
  // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
  register_post_type( 'jbee_projets', $args_projet );

}



add_action( 'init', __NAMESPACE__ .'\\wpm_custom_post_type', 0 );



add_action( 'init', __NAMESPACE__ .'\\wpm_add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Année, Réalisateurs et Catégories de série.

function wpm_add_taxonomies() {
  
  // Taxonomie catégories projets

  // On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress

  
  // Catégorie de projet

  $labels_cat_projet = array(
    'name'                       => _x( 'Catégories de projet', 'taxonomy general name'),
    'singular_name'              => _x( 'Catégories de projet', 'taxonomy singular name'),
    'search_items'               => __( 'Rechercher une catégorie de projet'),
    'popular_items'              => __( 'Catégories populaires'),
    'all_items'                  => __( 'Toutes les catégories'),
    'edit_item'                  => __( 'Editer une catégorie'),
    'update_item'                => __( 'Mettre à jour une catégorie'),
    'add_new_item'               => __( 'Ajouter une nouvelle catégorie'),
    'new_item_name'              => __( 'Nom de la nouvelle catégorie'),
    'add_or_remove_items'        => __( 'Ajouter ou supprimer une catégorie'),
    'choose_from_most_used'      => __( 'Choisir parmi les catégories les plus utilisées'),
    'not_found'                  => __( 'Pas de catégories trouvées'),
    'menu_name'                  => __( 'Catégories de projet'),
  );

  $args_cat_projet = array(
  // Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
    'hierarchical'          => true,
    'labels'                => $labels_cat_projet,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'categories-projets' ),
  );


  
  // Mots clefs de projet

  $labels_tag_projet = array(
    'name'                       => _x( 'Mots-clés de projet', 'taxonomy general name'),
    'singular_name'              => _x( 'Mots-clés de projet', 'taxonomy singular name'),
    'search_items'               => __( 'Rechercher un mot-clé de projet'),
    'popular_items'              => __( 'Mots-clés populaires'),
    'all_items'                  => __( 'Toutes les mots-clés'),
    'edit_item'                  => __( 'Editer un mot-clé'),
    'update_item'                => __( 'Mettre à jour un mot-clé'),
    'add_new_item'               => __( 'Ajouter un nouveau mot-clé'),
    'new_item_name'              => __( 'Nom de le nouveau mot-clé'),
    'add_or_remove_items'        => __( 'Ajouter ou supprimer un mot-clé'),
    'choose_from_most_used'      => __( 'Choisir parmi les mots-clés les plus utilisés'),
    'not_found'                  => __( 'Pas de mots-clés trouvés'),
    'menu_name'                  => __( 'Mots-clés de projet'),
  );

  $args_tag_projet = array(
  // Si 'hierarchical' est défini à true, notre taxonomie se comportera comme un mot-clé standard
    'hierarchical'          => false,
    'labels'                => $labels_tag_projet,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'mots-cles-projets' ),
  );
  register_taxonomy( 'cat_jbee_projets', 'jbee_projets', $args_cat_projet );
  register_taxonomy( 'tag_jbee_projets', 'jbee_projets', $args_tag_projet );
}