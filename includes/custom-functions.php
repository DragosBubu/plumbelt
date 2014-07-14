<?php

/*
*   Pagination
*/
function pagination ($pages = '', $range = 4) {
    $showitems = ($range * 2)+1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if(!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class=\"pagination\">";
        if($paged > 1) {
            echo previous_posts_link();
        }
        echo "<span><b>".$paged."</b> ". __( 'of', 'ti' ) ." <b>".$pages."</b></span>";
        echo next_posts_link();
        echo "</div>\n";
    }
}

/*
*   Post Gallery
*/
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';
    // Here's your actual output, you may customize it to your need
    $output = "<div id='custom-gallery gallery-". $post->ID ."' class='gallery galleryid-". $post->ID ." gallery-columns-". $columns ."'>\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');

        $output .= "<dl class='gallery-item gallery-columns-". $columns ."'>";
        $output .= "<a href=\"{$img[0]}\" rel='post-". $post->ID ."' class=\"fancybox\" title='". $attachment->post_excerpt ."'>\n";
        $output .= "<div class='gallery-item-thumb'><img src=\"{$img[0]}\" alt='". $attachment->post_excerpt ."' /></div>\n";
        $output .= "<div class='wp-caption-text'>";
        $output .= $attachment->post_excerpt;
        $output .= "</div>";
        $output .= "</a>\n";
        $output .= "</dl>";
    }

    $output .= "</div>\n";

    return $output;
}

/*
*   Comments List
*/
if ( ! function_exists( 'comments_list' ) ) :
function comments_list( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'ti' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'ti' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <article id="comment-<?php comment_ID(); ?>">
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment cf'); ?>>
            <div class="comment-avatar">
                <?php echo get_avatar( $comment, 60 ); ?>
            </div><!--/.comment-avatar-->
            <div class="comment-entry">
                <span>
                    <?php printf( __( 'by %s', 'ti' ), sprintf( '%s', get_comment_author_link() ) ); ?>
                    <?php _e( 'on', 'ti' ); ?>
                    <time pubdate datetime="<?php comment_time( 'c' ); ?>">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="">
                            <?php printf( __( '%1$s at %2$s', 'shape' ), get_comment_date(), get_comment_time() ); ?>
                        </a><!--/a-->
                        <?php edit_comment_link( __( '(Edit)', 'shape' ), ' ' ); ?>
                    </time><!--/time-->
                </span><!--/span-->
                <?php comment_text(); ?>
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!--/.comment-entry-->
    </article>

    <?php
            break;
    endswitch;
}
endif;

/*
*   Excerpt Limit Length
*/
function excerpt_limit_length($string, $limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $limit));
}

?>