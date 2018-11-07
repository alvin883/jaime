<?php
    get_header();
?>

    <div class="page_header">
        <div class="content">
            <div class="title">
                Showing result for : <span class="s"><?php echo get_search_query();?></span>
            </div>
            <div class="count">
                <?php echo 'Found ' . $wp_query->found_posts . ' items'; ?>
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