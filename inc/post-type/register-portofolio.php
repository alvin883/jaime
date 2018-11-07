<?php
    include_once 'CPT.php';
    $portofolio = new CPT(array(
        'post_type_name' => 'portofolio',
        'singular' => __('Portofolio','bootstraptheme'),
        'plural' => __('Portofolio','bootstraptheme'),
        'slug' => 'portofolio'
    ),
        array(
            'supports' => array('title','editor','thumbnail','comments'),
            'menu_icon' => 'dashicons-media-default'
        )
    );

    $portofolio->register_taxonomy(array(
        'taxonomy_name' => 'portofolio tags',
        'singular' => __('Portofolio Tag','bootstraptheme'),
        // plural => For displaying in WP Dashboard
        'plural' => __('Portofolio Tags','bootstraptheme'),
        'slug' => 'portofolio-tag'
    ));
?>