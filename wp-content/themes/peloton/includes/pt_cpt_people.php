<?php
    // ==============================================================
    // CORPORATE TRANSACTIONS (CUSTOM POST TYPE)
    // ==============================================================
    
    // ==============================================================
    // CREATE CPT
    // ==============================================================
    function pt_create_cpt_team() {
        register_post_type('team',
            array(
                'labels' => array(
                    'name' => __('Team'),
                    'singular_name' => __('Team'),
                    'menu_name' => __('Team'),
                    'all_items' => __('All Team Members'),
                    'view_item' => __('View Team'),
                    'add_new_item' => __('Add New Team Member'),
                    'edit_item' => __('Edit Team Member'),
                    'update_item' => __('Update Team Member'),
                    'search_items' => __('Search Team Member'),
                ),
                'supports' => array('thumbnail', 'title'),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'team'),
                'hierarchical' => false,
            )
        );
    }
    add_action('init', 'pt_create_cpt_team');

    // ==============================================================
    // ADD META BOXES TO THE CPT
    // ==============================================================
    function pt_add_team_metabox() {
        add_meta_box('pt_team_member_details', 'Team Member Details', 'pt_show_team_member_details', 'team', 'advanced', 'high');
    }
    add_action('add_meta_boxes', 'pt_add_team_metabox');

    // ==============================================================
    // CALLBACK FOR THE METABOX
    // ==============================================================
    function pt_show_team_member_details($post) {
        wp_nonce_field('pt_add_team_member_details', 'pt_team_member_details');
        $position = get_post_meta($post->ID, '_team_member_position', true);
        ?>
        <label for="position_txt"><strong>Position</strong></label>
        <input type="text" name="_team_member_position" class="widefat" value="<?php echo $position; ?>" id="position_txt">
        <?php
    }

    // ==============================================================
    // SAVING THE METABOX
    // ==============================================================
    function pt_save_team_meta_box_data( $post_id ) {

        /*
         * We need to verify this came from our screen and with proper authorization,
         * because the save_post action can be triggered at other times.
         */

        // Check if our nonce is set.
        if ( ! isset( $_POST['pt_team_member_details'] ) ) {
            return;
        }

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['pt_team_member_details'], 'pt_add_team_member_details' ) ) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check the user's permissions.
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }

        /* OK, it's safe for us to save the data now. */
        
        // Make sure that it is set.
        if ( ! isset( $_POST['_team_member_position'] ) ) {
            return;
        }

        // Sanitize user input.
        $my_data = sanitize_text_field( $_POST['_team_member_position'] );

        // Update the meta field in the database.
        update_post_meta( $post_id, '_team_member_position', $my_data );
    }
    add_action( 'save_post', 'pt_save_team_meta_box_data' );

    // ==============================================================
    // CHANGE THE PLACEHOLDER FOR TITLE
    // ==============================================================
    function pt_change_team_title_text( $title ){
         $screen = get_current_screen();
     
         if  ( 'team' == $screen->post_type ) {
              $title = 'Enter the member\'s Name';
         }
     
         return $title;
    }
     
    add_filter( 'enter_title_here', 'pt_change_team_title_text' );
    
?>