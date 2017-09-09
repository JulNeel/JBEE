<?php 
function jbee_get_meta_box( $meta_boxes ) {
  $prefix = 'jbee-';

  $meta_boxes[] = array(
    'id' => 'images_projet',
    'title' => esc_html__( 'Images du projet', 'sage' ),
    'post_types' => array( 'jbee_projets' ),
    'context' => 'side',
    'priority' => 'high',
    'autosave' => false,
    'fields' => array(
      array(
        'id' => $prefix . 'image_advanced_1',
        'type' => 'image_advanced',
        'name' => esc_html__( 'Images du projet', 'sage' ),
        'max_file_uploads' => '5',
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'jbee_get_meta_box' );

function infos_get_meta_box( $meta_boxes ) {
  $prefix = 'jbee-';

  $meta_boxes[] = array(
    'id' => 'infos-projet',
    'title' => esc_html__( 'Informations about the project', 'sage' ),
    'post_types' => array( 'jbee_projets' ),
    'context' => 'side',
    'priority' => 'high',
    'autosave' => false,
    'fields' => array(
      array(
        'id' => $prefix . 'url_1',
        'type' => 'url',
        'name' => esc_html__( 'URL du site', 'sage' ),
      ),
      array(
        'id' => $prefix . 'text_2',
        'type' => 'text',
        'name' => esc_html__( 'Client', 'sage' ),
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'infos_get_meta_box' );