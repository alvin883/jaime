<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

    <!-- Favicon --->
    <link rel="shortcut icon" href="<?php
        if(theme_options('general=nav_logo',false,'url') != ''){echo theme_options('general=nav_logo',false,'url'); }
    ?>" type="image/x-icon">
    
    <title><?php bloginfo('name'); ?></title>
</head>
<body <?php body_class(); ?>>
	<div class="al-container container1">
		<nav class="navbar">
			<div class="btn-group">
				<button class="btn-fab m-1">
					<span class="mdi mdi-facebook"></span>
				</button>
				<button class="btn-fab m-1">
					<span class="mdi mdi-instagram"></span>
				</button>
				<button class="btn-fab m-1">
					<span class="mdi mdi-youtube"></span>
				</button>
				<button class="btn-fab m-1">
					<span class="mdi mdi-twitter"></span>
				</button>
				<button class="btn-fab m-1">
					<span class="mdi mdi-pinterest"></span>
				</button>
			</div>
			
			<img src="<?php if(theme_options('general=nav_logo',false,'url') != ''){echo theme_options('general=nav_logo',false,'url');} ?>" alt="Jaime Logo" class="logo">

			<button class="btn-fab m-1">
				<span class="mdi mdi-magnify"></span>
			</button>
		</nav>
		<nav class="navbar center">
			<button class="m-2">Blog</button> -
			<button class="m-2">Jaime</button> -
			<button class="m-2">Contact</button>
		</nav>
		<div class="center_content">
			<div class="category">lifestyle</div>
			<div class="title">happy new year !</div>
			<div class="detail">
				by James Wilson <span class="divider">|</span> 01 January 2018
			</div>
		</div>
		<button class="next"></button>
		<button class="prev"></button>
	</div>