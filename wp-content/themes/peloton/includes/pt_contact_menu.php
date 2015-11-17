<?php
    // =====================================================================
    // TO CREATE A MENU PAGE TO CHANGE THE CONTACT DETAILS OF THE COMPANY
    // =====================================================================

    // =====================================================================
    // CREATE THE MENU PAGE
    // =====================================================================
    add_action( 'admin_menu', 'pt_contact_detail_menu' );    
    function pt_contact_detail_menu() {
        add_menu_page( 'Contact Details', 'Contact Us Info', 'manage_options', 'pt_contact_details_page', 'pt_show_contact_details_menu' );
    }
    
    // =====================================================================
    // DISPLAY THE MENU PAGE
    // =====================================================================
    function pt_show_contact_details_menu() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        ?>
        <div class="wrap">
            <h2>Contact Us Information</h2>
            <form action="options.php" method="post">
                <?php settings_fields('pt_contact_details'); ?>
                <div class="wrap">
                    <?php for ($i = 1; $i <= 2; $i++):
                        $pt_contact_details = get_option('pt_contact_details' . $i);
                        ?>
                        <div class="postbox my-postbox">
                            <h3>Location <?php echo $i ?></h3>
                            <table class="form-table">
                                <col width="50%">
                                <col width="50%">
                                <tr>
                                    <td class="row-title"><label for="pt_loc_name_txt<?php echo $i ?>" >Location Name</label></td>
                                    <td><input type="text" class="large-text" name="pt_contact_details<?php echo $i ?>[location]" id="pt_loc_name_txt<?php echo $i ?>"
                                    value="<?php echo isset($pt_contact_details['location']) ? $pt_contact_details['location'] : "" ?>" /></td>
                                </tr>
                                <tr class="alternate">
                                    <td class="row-title"><label for="pt_address<?php echo $i ?>-1_txt">Address</legend></td>
                                    <td>
                                        <input type="text" class="large-text"
                                               id="pt_address<?php echo $i ?>-1_txt"
                                               name="pt_contact_details<?php echo $i ?>[address1]"
                                               value="<?php echo isset($pt_contact_details['address1']) ? $pt_contact_details['address1'] : "" ?>" />
                                        <input type="text" class="large-text"
                                               id="pt_address<?php echo $i ?>-2_txt"
                                               name="pt_contact_details<?php echo $i ?>[address2]"
                                               value="<?php echo isset($pt_contact_details['address2']) ? $pt_contact_details['address2'] : "" ?>" />
                                        <input type="text" class="large-text"
                                               id="pt_address<?php echo $i ?>-3_txt"
                                               name="pt_contact_details<?php echo $i ?>[address3]"
                                               value="<?php echo isset($pt_contact_details['address3']) ? $pt_contact_details['address3'] : "" ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="row-title"><label for="pt_contact_no_txt<?php echo $i ?>">Contact no.</label></td>
                                    <td>
                                        <input type="tel"
                                               id="pt_contact_no_txt<?php echo $i ?>"
                                               name="pt_contact_details<?php echo $i ?>[contact_no]"
                                               value="<?php echo isset($pt_contact_details['contact_no']) ? $pt_contact_details['contact_no'] : ""; ?>" /></td>
                                </tr>
                                <tr class="alternate">
                                    <td class="row-title"><label for="pt_fax_no_txt<?php echo $i ?>">Fax</label></td>
                                    <td>
                                        <input type="tel"
                                               id="pt_fax_no_txt<?php echo $i ?>"
                                               name="pt_contact_details<?php echo $i ?>[fax_no]"
                                               value="<?php echo isset($pt_contact_details['fax_no']) ? $pt_contact_details['fax_no'] : "" ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="row-title"><label for="pt_email_txt<?php echo $i ?>">Email</label></td>
                                    <td>
                                        <input type="email"
                                               class="large-text"
                                               id="pt_email_txt<?php echo $i ?>"
                                               name="pt_contact_details<?php echo $i ?>[email]"
                                               value="<?php echo isset($pt_contact_details['email']) ? $pt_contact_details['email'] : "" ?>" /></td>
                                </tr>
                                <tr class="alternate">
                                    <td class="row-title">
                                        <label for="pt_google_map_embed<?php echo $i ?>">Embed Map</label>
                                    </td>
                                    <td>
                                        <textarea
                                               class="large-text"
                                               id="pt_google_map_embed<?php echo $i ?>"
                                               name="pt_contact_details<?php echo $i ?>[google_map]"><?php echo isset($pt_contact_details['google_map']) ? $pt_contact_details['google_map'] : "" ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                        
                    <?php endfor; ?>
                </div>
                <input name="submit" type="submit" value="Save Changes" class="button-primary" />
            </form>
        </div>
        <?php
    }
    
    // =====================================================================
    // REGISTER THE SETTINGS FOR THE MENU PAGE
    // =====================================================================
    add_action('admin_init', 'pt_contact_details_init');
    function pt_contact_details_init() {
        register_setting( 'pt_contact_details', 'pt_contact_details1');
        register_setting( 'pt_contact_details', 'pt_contact_details2');
    }
?>