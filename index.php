<?php
    get_header();

    $currentPageNumber = (int)get_query_var('paged');
    $olderPageNumber = $currentPageNumber < 2 ? false : true ;
    $nextPageNumber = new WP_Query( array(
        'posts_per_page' => 3,
        'paged' => $currentPageNumber + 1
    ));
    
    if(have_posts()){ ?>
        <div class="al-card-columns">
            <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('template_parts/content');
                }
            ?>
        </div>
    <?php
    } else {
        get_template_part('404.php');
    }

    get_template_part('template_parts/before-footer');

    get_footer();
?>