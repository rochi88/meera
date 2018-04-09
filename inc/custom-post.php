<?php
/**
 * Sample implementation of the Custom Post feature
 * 
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 *
 * @package meera
 */

function wpdocs_codex_book_init() {
    $labels = array(
        'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Book', 'textdomain' ),
        'new_item'              => __( 'New Book', 'textdomain' ),
        'edit_item'             => __( 'Edit Book', 'textdomain' ),
        'view_item'             => __( 'View Book', 'textdomain' ),
        'all_items'             => __( 'All Books', 'textdomain' ),
        'search_items'          => __( 'Search Books', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
        'not_found'             => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-book',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'book', $args );
}
 
add_action( 'init', 'wpdocs_codex_book_init' );


/**
 * Book-specific update messages.
 *
 * @see /wp-admin/edit-form-advanced.php
 *
 * @param array $messages Existing post update messages.
 * @return array Amended post update messages with new CPT update messages.
 */
function wpdocs_codex_book_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );
 
    $messages['book'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => __( 'Book updated.', 'textdomain' ),
        2  => __( 'Custom field updated.', 'textdomain' ),
        3  => __( 'Custom field deleted.', 'textdomain' ),
        4  => __( 'Book updated.', 'textdomain' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Book restored to revision from %s', 'textdomain' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => __( 'Book published.', 'textdomain' ),
        7  => __( 'Book saved.', 'textdomain' ),
        8  => __( 'Book submitted.', 'textdomain' ),
        9  => sprintf(
            __( 'Book scheduled for: <strong>%1$s</strong>.', 'textdomain' ),
            // translators: Publish box date format, see http://php.net/date
            date_i18n( __( 'M j, Y @ G:i', 'textdomain' ), strtotime( $post->post_date ) )
        ),
        10 => __( 'Book draft updated.', 'textdomain' ),
    );
 
    if ( $post_type_object->publicly_queryable ) {
        $permalink = get_permalink( $post->ID );
 
        $view_link = sprintf( '&nbsp;<a href="%s">%s</a>', esc_url( $permalink ), __( 'View book', 'textdomain' ) );
        $messages['book'][1] .= $view_link;
        $messages['book'][6] .= $view_link;
        $messages['book'][9] .= $view_link;
 
        $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
        $preview_link      = sprintf( '<a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview book', 'textdomain' ) );
        $messages[ $post_type ][8] .= $preview_link;
        $messages[ $post_type ][10] .= $preview_link;
    }
 
    return $messages;
}
 
add_filter( 'post_updated_messages', 'wpdocs_codex_book_updated_messages' );

add_action( 'contextual_help', 'wpdocs_codex_add_help_text', 10, 3 );
/**
 * Display contextual help for the Book post type
 */
function wpdocs_codex_add_help_text( $contextual_help, $screen_id, $screen ) {
 
    // $contextual_help .= var_dump( $screen ); // use this to help determine $screen->id
    if ( 'book' == $screen->id ) {
        $contextual_help =
            '<p>' . __('Things to remember when adding or editing a book:', 'your_text_domain') . '</p>' .
            '<ul>' .
                '<li>' . __('Specify the correct genre such as Mystery, or Historic.', 'your_text_domain') . '</li>' .
                '<li>' . __('Specify the correct writer of the book.  Remember that the Author module refers to you, the author of this book review.', 'your_text_domain') . '</li>' .
            '</ul>' .
            '<p>' . __('If you want to schedule the book review to be published in the future:', 'your_text_domain') . '</p>' .
            '<ul>' .
                '<li>' . __('Under the Publish module, click on the Edit link next to Publish.', 'your_text_domain') . '</li>' .
                '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.', 'your_text_domain') . '</li>' .
            '</ul>' .
            '<p><strong>' . __('For more information:', 'your_text_domain') . '</strong></p>' .
            '<p>' . __('<a href="https://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>', 'your_text_domain') . '</p>' .
            '<p>' . __('<a href="https://wordpress.org/support/" target="_blank">Support Forums</a>', 'your_text_domain') . '</p>' ;
    } elseif ( 'edit-book' == $screen->id ) {
        $contextual_help = '<p>' . __('This is the help screen displaying the table of books blah blah blah.', 'your_text_domain') . '</p>';
    }
     
    return $contextual_help;
}