<?php
/**
 * Sample implementation of the Custom Post feature
 * 
 * Register a custom post type called "projects".
 *
 * @see get_post_type_labels() for label keys.
 *
 * @package meera
 */

/**
 * Show post thumbnail
 */
if (!function_exists('meera_the_thumbnail')): 
    function meera_the_thumbnail() {
        global $post;
    
        $id = (int) $post->ID;
        if ( $id == 0 ) {
            return false;
        }
    
        $html = get_the_post_thumbnail($id, array(300,175));
        if(!empty($html)){
            echo $html;
        }
    }
    endif;
    
    
    /**
     * Register a Custom Post Type 
     * 
     * Label: Project (for portfolio items)
     */
         
    add_action( 'init', 'create_post_type' );
        
    if (!function_exists('create_post_type')):
        
        function create_post_type() {
                register_post_type( 'project',
                        array(
                                'labels' => array(
                                        'name' => __( 'Projects','meera' ),
                                        'singular_name' => __( 'Project','meera' )
                                ),
                        'public' => true,
                        'has_archive' => true,
                        'show_in_menu' => true, 
                        'query_var' => true,
                        'rewrite' => true,
                        'capability_type' => 'post',
                        'has_archive' => true,
                        'menu_icon' => 'dashicons-forms', 
                        'hierarchical' => false,
                        'menu_position' => '5',
                        'supports' => array('title',
                            'editor',
                            'author',
                            'thumbnail',
                            'excerpt',
                            'comments'
                            )
                        )
                );
        }
        
    endif;
    
    // Custom Categories for Projects
    register_taxonomy( 'project_type', 
            array('project'),
            array('hierarchical' => true,     /* if this is true, it acts like categories */             
                'labels' => array(
                    'name' => __( 'Project Type', 'meera' ), /* name of the custom taxonomy */
                    'singular_name' => __( 'Project Type', 'meera' ), /* single taxonomy name */
                    'search_items' =>  __( 'Search Project Types', 'meera' ), /* search title for taxomony */
                    'all_items' => __( 'All Project Types', 'meera' ), /* all title for taxonomies */
                    'parent_item' => __( 'Parent Project Type', 'meera' ), /* parent title for taxonomy */
                    'parent_item_colon' => __( 'Parent Project Type:', 'meera' ), /* parent taxonomy title */
                    'edit_item' => __( 'Edit Project Type', 'meera' ), /* edit custom taxonomy title */
                    'update_item' => __( 'Update Project Type', 'meera' ), /* update title for taxonomy */
                    'add_new_item' => __( 'Add New Project Type', 'meera' ), /* add new title for taxonomy */
                    'new_item_name' => __( 'New Project Type', 'meera' ) /* name title for taxonomy */
                ),
                'show_admin_column' => true, 
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'project_type' ),
            )
        ); 
    
    // Custom Tags for Projects
    register_taxonomy( 'skills', 
            array('project'), 
            array('hierarchical' => false,    /* if this is false, it acts like tags */                
                'labels' => array(
                    'name' => __( 'Skills', 'meera' ), /* name of the custom taxonomy */
                    'singular_name' => __( 'Skill', 'meera' ), /* single taxonomy name */
                    'search_items' =>  __( 'Search Skills', 'meera' ), /* search title for taxomony */
                    'all_items' => __( 'All Skills', 'meera' ), /* all title for taxonomies */
                    'parent_item' => __( 'Parent Skill', 'meera' ), /* parent title for taxonomy */
                    'parent_item_colon' => __( 'Parent Skill:', 'meera' ), /* parent taxonomy title */
                    'edit_item' => __( 'Edit Skill', 'meera' ), /* edit custom taxonomy title */
                    'update_item' => __( 'Update Skill', 'meera' ), /* update title for taxonomy */
                    'add_new_item' => __( 'Add New Skill', 'meera' ), /* add new title for taxonomy */
                    'new_item_name' => __( 'New Skill Name', 'meera' ) /* name title for taxonomy */
                ),
                'show_admin_column' => true,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'skills' ),
            )
        );   