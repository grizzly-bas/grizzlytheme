<?php
function grizzly_page() {
    add_menu_page( 'Grizzly', 'Grizzly', 'manage_options', 'grizzly', 'grizzly_page_content', get_template_directory_uri()  . '/includes/images/favicon.png', 3 );
}
add_action( 'admin_menu', 'grizzly_page' );

function grizzly_page_content() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    $message = '';

    if ($_POST['submit']) {
        foreach($_POST as $index => $value) {
            if ($index != 'submit') {
                //if (get_option($index)) {
                    update_option($index, $value );
                // } else {
                //     add_option($index, $value, '', 'yes' );
                // }
            }
        }

        $message = '<div class="notice notice-success"><p>De gegevens van de klant zijn verwerkt<a href="" style="float:right;">Close</a></p></div>';
    }
?>


<div class="wrap">
    <h1 class="wp-heading-inline">Grizzly opties</h1>

    <h2 class="nav-tab-wrapper" id="wpseo-tabs">
        <a class="nav-tab nav-tab-active" id="dashboard-tab" href="#top#dashboard">Site opties</a>
        <a class="nav-tab" id="features-tab" href="#top#features">Header</a>
        <a class="nav-tab" id="webmaster-tools-tab" href="#top#webmaster-tools">Footer</a>
    </h2>

    <?php if($message){echo $message;} ?>
    
    <div id="dashboard" class="wpseotab nosave active">
        <form action="" method="post" novalidate="novalidate">
            <div class="welcome-panel">
                <h2>Klantgegevens</h2>

                <table class="form-table">
                    <tbody>
                        <tr class="user-first-name-wrap">
                            <th><label for="addres">Adres</label></th>
                            <td><input type="text" name="address" id="addres" value="<?php if (get_option('address')) {echo get_option('address');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="post">Postcode</label></th>
                            <td><input type="text" name="post" id="post" value="<?php if (get_option('post')) {echo get_option('post');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="place">Woonplaats</label></th>
                            <td><input type="text" name="place" id="place" value="<?php if (get_option('place')) {echo get_option('place');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="tel">Telefoon</label></th>
                            <td><input type="text" name="tel" id="tel" value="<?php if (get_option('tel')) {echo get_option('tel');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="mail">E-mail</label></th>
                            <td><input type="text" name="mail" id="mail" value="<?php if (get_option('mail')) {echo get_option('mail');} ?>" class="regular-text"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="features" class="wpseotab save">
            <div class="welcome-panel">
                <h2>Openingstijden</h2>

                <table class="form-table">
                    <tbody>
                        <tr class="user-first-name-wrap">
                            <th><label for="open-ma">Maandag</label></th>
                            <td><input type="text" name="open-ma" id="open-ma" value="<?php if (get_option('open-ma')) {echo get_option('open-ma');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="open-di">Dinsdag</label></th>
                            <td><input type="text" name="open-di" id="open-di" value="<?php if (get_option('open-di')) {echo get_option('open-di');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="open-wo">Woensdag</label></th>
                            <td><input type="text" name="open-wo" id="open-wo" value="<?php if (get_option('open-wo')) {echo get_option('open-wo');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="open-do">Donderdag</label></th>
                            <td><input type="text" name="open-do" id="open-do" value="<?php if (get_option('open-do')) {echo get_option('open-do');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="open-vr">Vrijdag</label></th>
                            <td><input type="text" name="open-vr" id="open-vr" value="<?php if (get_option('open-vr')) {echo get_option('open-vr');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="open-za">Zaterdag</label></th>
                            <td><input type="text" name="open-za" id="open-za" value="<?php if (get_option('open-za')) {echo get_option('open-za');} ?>" class="regular-text"></td>
                        </tr>
                        <tr class="user-first-name-wrap">
                            <th><label for="open-zo">Zondag</label></th>
                            <td><input type="text" name="open-zo" id="open-zo" value="<?php if (get_option('open-zo')) {echo get_option('open-zo');} ?>" class="regular-text"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <input type="submit" name="submit" class="button button-primary" value="Bijwerken">
    </form>
</div>

<?php }