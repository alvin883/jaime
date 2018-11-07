
<div class="card<?php 
    if(has_post_thumbnail()){ 
        echo ' has_thumb';
    }
?>" style="padding: 40px;">
    <div class="flying-bookmark" style="top: -20px;">
        <?php
            if( current_user_can('administrator') ){
                echo '<button class="al-fab" style="margin-right: 5px;" data-url="' . get_edit_post_link(get_the_ID()) . '" onclick="gotoURL(this);"><span class="mdi mdi-pencil"></span></button>';
            }
        ?>
        <button class="al-fab" style="margin-right: 5px;"><span class="mdi mdi-share-variant"></span></button>
        <button class="al-fab"><span class="mdi mdi-bookmark-outline"></span></button>
    </div>
    <?php if(has_post_thumbnail()){ ?>
        <div class="image" style="background: url('<?php the_post_thumbnail_url('banner'); ?>') center / cover;"></div>
    <?php } ?>
    <article style="text-indent: 40px;">
        <p>
            <?php the_content(); ?>
        </p>
    </article>
        <?php 
            $categories = get_the_category();
            if($categories){ ?>
                <h5>Category</h5>
                <div class="action" style="display: flex;margin-top: -10px;">
                    <?php
                        foreach ($categories as $category) {
                    ?>
                        <button class="al al-mini margin-1 " data-url="<?php echo get_category_link($category->term_id);?>" onclick="gotoURL(this);"><?php echo $category->cat_name; ?></button>
                    <?php } ?>        
                </div>
            <?php } ?>
        <?php 
            $tags = get_the_tags();
            if($tags){
            ?>

            <h5>Tagged</h5>
            <div class="action" style="display: flex;margin-top: -10px;">

            <?php foreach ($tags as $tag) { ?>
                <button class="al al-mini margin-1 " data-url="<?php echo get_tag_link($tag);?>" onclick="gotoURL(this);"># <?php echo $tag->name; ?></button>
                <?php } ?>
            </div>
            <?php } ?>
</div>