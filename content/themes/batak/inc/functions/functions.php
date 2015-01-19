<?php

/**
* This function defines the custom post type for Portfolio
*
* @since 1.0
*/
if ( ! function_exists( 'create_portfolio_post_type' ) )
{
    function create_portfolio_post_type()
    {
        register_post_type(
            batak_portfolio,
            array(
                "labels" => array(
                    "name" => __("Portfolio", "batak"),
                    "singular_name" => __("Portfolio", "batak")
                ),
                "public" => true,
                "menu_position" => 5,
                "menu_icon" => "dashicons-format-gallery",
                "rewrite" => array(
                    "slug" => "portfolio"
                ),
                "supports" => array(
                    'title',
                    'editor',
                    'author',
                    'thumbnail',
                    //'excerpt',
                    //'trackbacks',
                    //'custom-fields',
                    'comments',
                    'revisions',
                    'page-attributes',
                    'post-formats'
                )
            )
        );
    }
}

add_action("init", "create_portfolio_post_type");



function smashing_add_post_meta_boxes()
{
    add_meta_box(
        'smashing-post-class',      // Unique ID
        esc_html__( 'Post Class', 'batak' ),    // Title
        'smashing_post_class_meta_box',   // Callback function
        'batak_portfolio',         // Admin page (or post type)
        'advanced',         // Context
        'default'         // Priority
    );
}

add_action( 'add_meta_boxes_batak_portfolio', 'smashing_add_post_meta_boxes' );

/**
* Prints the custom meta box content.
*
* @param WP_Post $post The object for the current post/page.
*/
function smashing_post_class_meta_box( $object)
{ ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

    <p>
        <label for="smashing-post-class"><?php _e( "Add a custom CSS class, which will be applied to WordPress' post class.", 'example' ); ?></label>
        <br />
        <input class="widefat" type="text" name="smashing-post-class" id="smashing-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_class', true ) ); ?>" size="30" />
    </p>
<?php
}

/**
* When the post is saved, saves our custom data.
*
* @param int $post_id The ID of the post being saved.
*/
function smashing_save_post_class_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

    /* Get the posted data and sanitize it for use as an HTML class. */
    $new_meta_value = ( isset( $_POST['smashing-post-class'] ) ? sanitize_html_class( $_POST['smashing-post-class'] ) : '' );

    /* Get the meta key. */
    $meta_key = 'smashing_post_class';

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta( $post_id, $meta_key, true );

    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

    /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

    /* If there is no new meta value but an old value exists, delete it. */
    elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}


/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
