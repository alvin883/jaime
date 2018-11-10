
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
        <div class="content">
            <div class="fixed_header" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                <div class="centered_content">
                    <div class="category">
                        <?php
                            $categories = get_the_category();
                            if($categories){
                                    $iteration = 0;
                                    foreach ($categories as $category) {
                                        if($iteration != 0){echo ' - ';}
                                        echo $category->cat_name;
                                        $iteration ++;
                                    }
                            }
                        ?>
                    </div>
                    <div class="title"><?php echo get_the_title(); ?></div>
                    <div class="detail">
                        by <a href="<?php echo get_author_posts_url(get_the_author_meta("ID"));?>">
                            <?php the_author(); ?>
                        </a> 
                        <span class="divider">|</span> <?php the_time("d F Y"); ?>
                    </div>
                </div>
            </div>
        </div>
	</div>