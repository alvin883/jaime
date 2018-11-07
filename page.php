<?php
    get_header();
    if(have_posts()){

?>  
            <?php
                while (have_posts()) {
                    the_post();
            ?>
                    <div class="page_header">
                        <div class="content">
                            <div class="title">
                                <?php the_title(); ?>
                            </div>
                            <div class="count" style="opacity: 1;">
                                <div class="detail">
                                    <div class="avatar">
                                        <span class="mdi mdi-account"></span>
                                    </div>
                                    <div class="opacity">
                                        By
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta("ID"));?>" style="color: #ffffff;">
                                            <?php the_author();?>
                                        </a>
                                    </div>
                                    <div class="opacity">
                                        <?php echo 'on ';the_time('d F Y'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Wrapper for Content -->
                    <div id="wrapper" class="wPageHeader">
            <?php
                    get_template_part('template_parts/content-single');
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                }
            ?>
                    <!-- Close Wrapper for Content -->
                    </div>
<?php
    } else {
        get_template_part('404.php');
    }
    get_footer();
?>