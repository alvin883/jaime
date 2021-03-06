<?php
    if(post_password_required()) return;
?>

<div id="comments">
    <?php if(have_comments()) { ?>
        <div class="title">
            <?php 
                $comments_number = get_comments_number();

                printf(
                    _nx( 'One Comment',
                        '%1$s Comments',
                        get_comments_number(), 
                        'comments title', 
                        'alvin'
                    ),
                    number_format_i18n( get_comments_number() ),
                    '<span>' . get_the_title() . '</span>' );
            ?>
        </div>
        
		<div class="comment-list">
            <?php
                wp_list_comments( array(
                    'type' => 'comment',
                    'style' => 'div',
                    'callback' => 'mytheme_comment'
                ));
			?>
        </div>
    <?php }
    
    


    if ( comments_open() ) : ?>

        <form action="<?php echo site_url('/wp-comments-post.php') ?>" method="post">

            <div class="card">
                <div class="title">Your Comment</div>

                <?php if(is_user_logged_in()){ ?>
                	<div class="detail" style="padding-left: 0;padding-bottom: 10px;">Logged in as <?php echo get_user_option('user_nicename'); ?></div>
				<?php }else{ ?>
					<div class="detail" style="padding-left: 0;padding-bottom: 10px;">Fill all field !</div>

					<div class="comment_box">
						<div class="comment_label">Name</div>
						<input type="text" name="author" class="comment_input" id="comment-author" required  onkeypress="inputCheck(this);" onblur="inputCheck(this);" placeholder="Your full name ..."/>
					</div>

					<div class="comment_box">
						<div class="comment_label">Email</div>
						<input type="text" name="email" class="comment_input" id="comment-email" required  onkeypress="inputCheck(this);" onblur="inputCheck(this);" placeholder="Your email address ..."/>
					</div>

				<?php } ?>

                <textarea class="comment_input" onkeypress="inputCheck(this);" onblur="inputCheck(this);" name="comment" id="comment-body" required placeholder="Write your comment ..."></textarea>

                <div class="action">
                    <button type="submit" class="al" data-url="<?php the_permalink();?>" onclick="gotoURL(this);">Submit <span class="mdi mdi-rotate-180 mdi-keyboard-backspace" style="margin-left: 8px;"></span></button>
                </div>
            </div>
			<?php comment_form_hidden_fields() ?>
		</form>

	<?php else : ?>

		<hr />

		<p class="nocomments">
			Comments are closed for this article.
		</p>

	<?php endif ?>

</div>