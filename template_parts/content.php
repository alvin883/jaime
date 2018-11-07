<div class="al-card">
	<div class="header">
    <?php if(has_post_thumbnail()){ ?>
		<img src="<?php the_post_thumbnail_url('banner'); ?>" alt="" width="100%">
        
    <?php } ?>
		<div class="category">
			<?php
				$categories = get_the_category();
				if($categories){ ?>
					<?php
						$iteration = 0;
						foreach ($categories as $category) {
							if($iteration != 0){echo ' - ';}
							echo $category->cat_name;
							$iteration ++;
						}
				} 
			?>
		</div>
		<div class="title"><?php the_title(); ?></div>
	</div>
	<div class="content">
		<?php the_excerpt(); ?>
	</div>
	<div class="footer">
		<button class="btn">read more</button>
	</div>
</div>
<!--
	<div class="al-card">
		<div class="header">
			<img src="<?php //echo get_template_directory_uri(); ?>/src/img/jaime-6.png" alt="" width="100%">
			<div class="category">lifestyle</div>
			<div class="title">new photoshot session</div>
		</div>
		<div class="content">
			These cases are perfectly simple and easy to distinguish. In a free hour, when our power choice is untrammelled and when ...
		</div>
		<div class="footer">
			<button class="btn">read more</button>
		</div>
	</div>
	
	<div class="al-card">
		<div class="header">
			<img src="<?php //echo get_template_directory_uri(); ?>/src/img/jaime-6.png" alt="" width="100%">
			<div class="category">lifestyle</div>
			<div class="title">new photoshot session</div>
		</div>
		<div class="content">
			These cases are perfectly simple and easy to distinguish. In a free hour, when our power choice is untrammelled and when ...
		</div>
		<div class="footer">
			<button class="btn">read more</button>
		</div>
	</div>
	
	<div class="al-card">
		<div class="header">
			<img src="<?php //echo get_template_directory_uri(); ?>/src/img/jaime-1.jpg" alt="" width="100%">
			<div class="category">lifestyle - fitness</div>
			<div class="title">s.a.p cup finals 2017</div>
		</div>
		<div class="content">
			Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally ...
		</div>
		<div class="footer">
			<button class="btn">read more</button>
		</div>
	</div>
	
	<div class="al-card">
		<div class="header">
			<img src="<?php //echo get_template_directory_uri(); ?>/src/img/jaime-5.png" alt="" width="100%">
			<div class="category">lifestyle - fitness</div>
			<div class="title">s.a.p cup finals 2017</div>
		</div>
		<div class="content">
			Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally ...
		</div>
		<div class="footer">
			<button class="btn">read more</button>
		</div>
	</div>
	
	<div class="al-card">
		<div class="header">
			<img src="<?php //echo get_template_directory_uri(); ?>/src/img/jaime-4.jpg" alt="" width="100%">
			<div class="category">lifestyle - health - fitness</div>
			<div class="title">this is how we roll</div>
		</div>
		<div class="content">
			Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally ...
		</div>
		<div class="footer">
			<button class="btn">read more</button>
		</div>
	</div>
	
	<div class="al-card">
		<div class="header">
			<img src="<?php //echo get_template_directory_uri(); ?>/src/img/jaime-4.jpg" alt="" width="100%">
			<div class="category">lifestyle - health - fitness</div>
			<div class="title">this is how we roll</div>
		</div>
		<div class="content">
			Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally ...
		</div>
		<div class="footer">
			<button class="btn">read more</button>
		</div>
	</div>
-->