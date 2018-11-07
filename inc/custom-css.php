<?php
    if(!function_exists('theme_custom_css')){
        function theme_custom_css(){
            $custom_css = '';
            if(theme_options('custom_css') != ''){
                $custom_css .= theme_options('custom_css');

                // Remove whitespace `\s` for faster loading
                $custom_css = preg_replace('/\s+/', '', $custom_css);

                // Output HTML
                $custom_css = "<!-- Custom CSS -->\n<style type=\"text/css\"> " . $custom_css . "</style>";
            }

            // Outputing
            if(!empty($custom_css) && $custom_css != ''){
                echo $custom_css;
            }
        }
    }
    
    add_action('wp_head','theme_custom_css');
?>