<?php
    get_header();
?>

    <?php 
        $titleText = '';
        $fadeOut = true;
        $detail = '';

        // Define what this archieve refers to
        if(is_category()){
            // Category
            $titleText = ' Archive for <span class="s">' . single_cat_title('',false) . '</span> Category';
            $detail = 'Showing ' . $wp_query->found_posts .' items';
        }else if(is_tag()){
            // Tag
            $titleText = ' Archive for <span class="s">#' . single_cat_title('',false) . '</span>';
            $detail = 'Showing ' . $wp_query->found_posts .' items';
        }else if(is_author()){
            // Author
            $titleText = 'Author archive ( <span class="s">' . get_the_author() . '</span> )';
            $fadeOut = false;
            $detail = '
                <div class="detail">
                    <div class="avatar">
                        <span class="mdi mdi-account"></span>
                    </div>
                    <div class="opacity">
                        <a href=" ' . get_author_posts_url(get_the_author_meta("ID")) . '" style="color: #ffffff;">
                            ' . get_the_author() . '
                        </a>
                        <div class="opacity">
                            Showing ' . $wp_query->found_posts .' items
                        </div>
                    </div>
                </div>';
        }else if(is_day()){
            // Day
            $titleText = ' Archive for Date <span class="s">' . get_the_date() . '</span>';
            $detail = 'Showing ' . $wp_query->found_posts .' items';
        }else if(is_month()){
            // Month
            $titleText = ' Archive for Month <span class="s">' . get_the_date('F') . '</span> at <span class="s">' . get_the_date('Y') . '</span>';
            $detail = 'Showing ' . $wp_query->found_posts .' items';
        }else if(is_year()){
            // Year
            $titleText = ' Archive for Year <span class="s">' . get_the_date('Y') . '</span>';
            $detail = 'Showing ' . $wp_query->found_posts .' items';
        }
    ?>
    <div class="page_header">
        <div class="content">
            <div class="title">
                <?php echo $titleText; ?>
            </div>
            <div class="count" style="<?php echo ($fadeOut) ? '':'opacity: 1;padding-top: 15px;'; ?>">
                <?php echo $detail; ?>
            </div>
        </div>
    </div>

<?php
    if(have_posts()){
?>
        <!-- Wrapper for Content -->
        <div id="wrapper" class="wPageHeader">
            <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('template_parts/content');
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