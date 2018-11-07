
<div class="card">
    <div class="flying-bookmark">
        <?php if(get_comments_number() > 0 ){ ?>
            <div class="al-badge" style="display: unset;"><span class="mdi mdi-forum" style="margin-right: 10px;"></span><?php echo comments_number('No Response','1 Response','% Responses'); ?></div>
        <?php } ?>
        <button class="al-fab" style="margin-right: 5px;"><span class="mdi mdi-share-variant"></span></button>
        <button class="al-fab"><span class="mdi mdi-bookmark-outline"></span></button>
    </div>
    <div class="title">
        <?php the_title(); ?>
    </div>
    <div class="detail">
        <div class="avatar">
            <span class="mdi mdi-account"></span>
        </div>
        <div class="opacity">
            By
            <a href="<?php echo get_author_posts_url(get_the_author_meta("ID"));?>">
                <?php the_author();?>
            </a>
        </div>
        <div class="opacity">
            <?php echo 'on ';the_time('d F Y'); ?>
        </div>
    </div>
    <article>
        <p>
            <?php the_excerpt();//the_content('',true);echo '...'; ?>
        </p>
    </article>
    <div class="action">
        <button class="al" data-url="<?php the_permalink();?>" onclick="gotoURL(this);">Read More <span class="mdi mdi-rotate-180 mdi-keyboard-backspace" style="margin-left: 8px;"></span></button>
    </div>
</div>