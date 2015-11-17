<?php
    // ==============================================================
    // CORPORATE TRANSACTIONS (CUSTOM POST TYPE)
    // ==============================================================
    
    // ==============================================================
    // CREATE CPT
    // ==============================================================
    function pt_create_cpt_corp() {
        register_post_type('corp_trans',
            array(
                'labels' => array(
                    'name' => __('Transactions'),
                    'singular_name' => __('Transaction'),
                    'menu_name' => __('Transactions'),
                    'all_items' => __('All Transactions'),
                    'view_item' => __('View Transaction'),
                    'add_new_item' => __('Add New Transaction'),
                    'edit_item' => __('Edit Transaction'),
                    'update_item' => __('Update Transaction'),
                    'search_items' => __('Search Transaction'),
                ),
                'supports' => array('thumbnail', 'revisions', 'title'),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'corps'),
                'hierarchical' => false,
            )
        );
    }
    add_action('init', 'pt_create_cpt_corp');
    
    
    
?>