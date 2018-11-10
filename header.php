<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

    <!-- Favicon --->
    <link rel="shortcut icon" href="<?php
        if(theme_options('general_nav_logo',false,'url') != ''){echo theme_options('general_nav_logo',false,'url'); }
	?>" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    
    <title><?php bloginfo('name'); ?></title>
</head>
<body <?php body_class(); ?>>
	<?php get_search_form(); ?>