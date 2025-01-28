<?php
/*
Plugin Name: External Link Annotator
Version: 1.0
Description: Adds numbered markers for external links and creates references section
*/

function ela_add_markers_to_content($content) {
    if(!is_single()) return $content;
    
    global $ela_links;
    $ela_links = array();
    $counter = 1;
    
    // Find and process external links
    $content = preg_replace_callback('/<a(.*?)href=["\'](.*?)["\'](.*?)>(.*?)<\/a>/i', 
    function($matches) use (&$counter, &$ela_links) {
        $url = $matches[2];
        $site_url = site_url();
        
        if(strpos($url, $site_url) === false && filter_var($url, FILTER_VALIDATE_URL)) {
            $ela_links[] = array(
                'number' => $counter,
                'url' => $url,
                'text' => strip_tags($matches[4])
            );
            
            $marker = '<sup class="ela-marker" data-number="'.$counter.'">'.$counter.'</sup>';
            $counter++;
            return $matches[0].$marker;
        }
        return $matches[0];
    }, $content);

    // Add references section
    if(!empty($ela_links)) {
        $references = '<div id="ela-references"><h3>منابع</h3><ol>';
        foreach($ela_links as $link) {
            $references .= '<li id="ref-'.$link['number'].'"><a href="'.$link['url'].'" target="_blank" rel="noopener noreferrer">'.$link['text'].'</a></li>';
        }
        $references .= '</ol></div>';
        $content .= $references;
    }

    return $content;
}
add_filter('the_content', 'ela_add_markers_to_content', 20);

function ela_enqueue_scripts() {
    ?>
    <style>
        .ela-marker {
            display: inline-block;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #0073aa;
            color: white;
            text-align: center;
            line-height: 18px;
            font-size: 12px;
            margin-right: 3px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .ela-marker:hover {
            background: #005177;
            transform: scale(1.1);
        }
        #ela-references {
            margin-top: 50px;
            padding: 20px;
            border-top: 2px solid #eee;
        }
    </style>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.ela-marker').forEach(marker => {
            marker.addEventListener('click', function(e) {
                e.preventDefault();
                const refNumber = this.getAttribute('data-number');
                const target = document.querySelector(`#ref-${refNumber}`);
                if(target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Add highlight effect
                    target.style.backgroundColor = '#fff9e6';
                    setTimeout(() => {
                        target.style.backgroundColor = '';
                    }, 1000);
                }
            });
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'ela_enqueue_scripts');

// Shortcode for placing references
function ela_references_shortcode() {
    return '<div id="ela-references"></div>';
}
add_shortcode('references', 'ela_references_shortcode');
?>
