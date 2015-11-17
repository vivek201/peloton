<?php
    
    // ======================================
    // ADD METABOXES FOR PROPER PAGE HEADERS    
    // ======================================
    function pt_add_metaboxes() {
        add_meta_box('page_header_section', 'Page Headers', 'pt_pageheader_metabox_callback', 'page', 'left');
        
    }
    add_action('add_meta_boxes', 'pt_add_metaboxes');
    
    // ======================================
    // DISPLAY METABOX
    // WILL HAVE METAS 'ALTERNATE HEADINGS' AND 'SUBHEADINGS'
    // ======================================
    function pt_pageheader_metabox_callback($post) {
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'pt_pageheader_save_metabox', 'pt_pageheader_nonce' );
        
        // Use get_post_meta() to retrieve an existing value
        // from the database and use the value for the form.
        $alt_heading = get_post_meta($post->ID, 'pt_alt_heading', true);
        $subheading = get_post_meta($post->ID, 'pt_sub_heading', true);
        $use_ft_image = get_post_meta($post->ID, 'pt_use_ft_image', true);
        $page_details = get_post_meta($post->ID, 'pt_page_details', true);
        
        // DISPLAY THE INPUT BOXES
        ?>
        <table class="form-table">
            <tr>
                <td><label for="alt_heading_txt"><strong>Alternate Heading</strong></label></td>
                <td><input type="text" id="alt_heading_txt" class="large-text" name="pt_alt_heading" value="<?php echo $alt_heading; ?>"/>
                    <span class="description">If empty, the page title will be displayed</span>
                </td>
            </tr>
            <tr class="alternate">
                <td><label for="subheading_textarea"><strong>Subheading</strong></label></td>
                <td><textarea id="subheading_textarea" rows="5" class="large-text" name="pt_sub_heading"><?php echo $subheading; ?></textarea></td>
            </tr>   
            <tr>
                <td><label for="pt_feat_image_chck"><strong>Use Featured Image as Header Background</strong></label></td>
                <td><input id="pt_feat_image_chck" type="checkbox" name="pt_use_ft_image" value="yes" <?php checked($use_ft_image,'yes'); ?> /></td>
            </tr>   
            <tr class="alternate">
                <td><label for="pt_page_details_wpeditor"><strong>Page Details</strong></label></td>
                <td>
                    <?php
                        wp_editor($page_details,
                                  'pt_page_details_wpeditor',
                                  array(
                                        'wpautop' => false,
                                        'media_buttons' => false,
                                        'textarea_rows' => 4,
                                        'textarea_name' => 'pt_page_details',
                                        'quicktags' => false
                                        ));
                    ?>
                </td>
            </tr>        
        </table>
        <?php
    }
    
    // ======================================
    // SAVE OUR DATA WHEN THE POST IS SAVED
    // ======================================
    function pt_pageheader_metabox_savedata($post_id) {
        // CHECK IF THE NONCE IS SET
        if (!isset($_POST['pt_pageheader_nonce']))
            return;
        // VERIFY THAT THE NONCE IS VALID
        if (!wp_verify_nonce($_POST['pt_pageheader_nonce'], 'pt_pageheader_save_metabox'))
            return;
        // IF THE FORM WAS AUTOSAVED, DO NOTHING
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;
        // CHECK USER PERMISSIONS
        if (!current_user_can('edit_page', $post_id))
            return;
        
        $alt_heading = $_POST['pt_alt_heading'];
        $subheading = $_POST['pt_sub_heading'];
        $use_ft_image = (isset($_POST['pt_use_ft_image'])) ? $_POST['pt_use_ft_image'] : "No";
        $page_details = $_POST['pt_page_details'];

        update_post_meta($post_id, 'pt_alt_heading', $alt_heading);
        update_post_meta($post_id, 'pt_sub_heading', $subheading);
        update_post_meta($post_id, 'pt_use_ft_image', $use_ft_image);
        update_post_meta($post_id, 'pt_page_details', $page_details);
    }
    add_action( 'save_post', 'pt_pageheader_metabox_savedata' );
?>