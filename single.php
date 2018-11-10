<?php
    get_header();

    if(have_posts()){

?>  
            <?php
                while (have_posts()) {

                    the_post();
                    
                    get_template_part('template_parts/header-single');

                    get_template_part('template_parts/content-single');

                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                }
            ?>
<?php
    } else {
        get_template_part('404.php');
    }
    get_footer();
?>