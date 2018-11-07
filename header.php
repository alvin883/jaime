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
		<div class="slider" data-slider="1">
			<div class="content">

				<div class="item active" data-id="1" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/jaime-0.png')">
					<div class="centered_content">
						<div class="category">lifestyle</div>
						<div class="title">happy new year !</div>
						<div class="detail">
							by James Wilson <span class="divider">|</span> 01 January 2018
						</div>
					</div>
				</div>

				<div class="item" data-id="2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/splash.jpg')">
					<div class="centered_content">
						<div class="category">fitness</div>
						<div class="title">test second slider</div>
						<div class="detail">
							by Unnamed <span class="divider">|</span> 20 December 2018
						</div>	
					</div>
				</div>

				<div class="item" data-id="3" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/bubble.jpg')">
					<div class="centered_content">
						<div class="category">technology</div>
						<div class="title">this is 3rd slider</div>
						<div class="detail">
							by You <span class="divider">|</span> 30 February 2018
						</div>	
					</div>
				</div>
			</div>
			<button class="next" onclick="easeSwipe_slider_next(this);"></button>
			<button class="prev" onclick="easeSwipe_slider_prev(this);"></button>
		</div>
	</div>