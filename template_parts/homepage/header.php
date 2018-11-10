
	<div class="al-container container1">
		<nav class="navbar">
			<div class="btn-group">
				<?php
                    if(theme_options('general_social') != ''){
						$social_icons = get_social_media_icons();
                        foreach (theme_options('general_social') as $key => $value) {

                            if(array_key_exists($key,$social_icons) && $value != '' && !empty($value)){
                                ?>
									<button class="btn-fab m-1" data-url="<?php echo $value; ?>" onclick="gotoURL(this)">
										<span class="mdi mdi-<?php echo $social_icons[$key]; ?>"></span>
									</button>
                                <?php
                            }

                        }
                    }
                ?>
			</div>
			
			<img src="<?php if(theme_options('general_nav_logo',false,'url') != ''){echo theme_options('general_nav_logo',false,'url');} ?>" alt="Jaime Logo" class="logo">

			<button class="btn-fab m-1" onclick="toggleSearchPage();">
				<span class="mdi mdi-magnify"></span>
			</button>
		</nav>
		<nav class="navbar center">
			<button class="m-2">Blog</button> -
			<button class="m-2">Jaime</button> -
			<button class="m-2">Contact</button>
		</nav>
		<div class="easeSwipe_slider slider">
			<div class="content">

				<div class="item active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/jaime-0.png')">
					<div class="centered_content">
						<div class="category">lifestyle</div>
						<div class="title">happy new year !</div>
						<div class="detail">
							by James Wilson <span class="divider">|</span> 01 January 2018
						</div>
					</div>
				</div>

				<div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/splash.jpg')">
					<div class="centered_content">
						<div class="category">fitness</div>
						<div class="title">test second slider</div>
						<div class="detail">
							by Unnamed <span class="divider">|</span> 20 December 2018
						</div>	
					</div>
				</div>

				<div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/img/bubble.jpg')">
					<div class="centered_content">
						<div class="category">technology</div>
						<div class="title">this is 3rd slider</div>
						<div class="detail">
							by You <span class="divider">|</span> 30 February 2018
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>