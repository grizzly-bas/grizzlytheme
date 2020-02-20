<?php
    function grizzly_page() {
        add_menu_page( 'Grizzly', 'Grizzly', 'manage_options', 'grizzly', 'grizzly_page_content', get_template_directory_uri()  . '/includes/images/favicon.png', 3 );
    }
    add_action( 'admin_menu', 'grizzly_page' );

    function grizzly_page_content() {
        // FUNCTION TO SET ALL FIELDS
        function get_fields($tab) {
            $fields = [
                'Algemeen' => [
                    'Back-to-top' => [
                        'name' => 'backtotop',
                        'input' => 'checkbox'
                    ],
                ],

                'Typografie' => [
                    'Fonts' => [
                        'name' => 'fonts',
                        'input' => 'textarea',
                        'placeholder' => 'https://fonts.googleapis.com/css?family=Roboto&display=swap'
                    ],
                ],

                'Klantgegevens' => [
                    'Bedrijfsnaam' => [
                        'name' => 'bedrijfsnaam',
                        'input' => 'text'
                    ],
                    'Adres' => [
                        'name' => 'adres',
                        'input' => 'text'
                    ],
                    'Postcode' => [
                        'name' => 'postcode',
                        'input' => 'text'
                    ],
                    'Woonplaats' => [
                        'name' => 'woonplaats',
                        'input' => 'text'
                    ],
                    'Telefoon' => [
                        'name' => 'telefoon',
                        'input' => 'text'
                    ],
                    'E-mail' => [
                        'name' => 'email',
                        'input' => 'text'
                    ],
                ],

                'Openingstijden' => [
                    'Maandag' => [
                        'name' => 'maandag',
                        'input' => 'text'
                    ],
                    'Dinsdag' => [
                        'name' => 'dinsdag',
                        'input' => 'text'
                    ],
                    'Woensdag' => [
                        'name' => 'woensdag',
                        'input' => 'text'
                    ],
                    'Donderdag' => [
                        'name' => 'donderdag',
                        'input' => 'text'
                    ],
                    'Vrijdag' => [
                        'name' => 'vrijdag',
                        'input' => 'text'
                    ],
                    'Zaterdag' => [
                        'name' => 'zaterdag',
                        'input' => 'text'
                    ],
                    'Zondag' => [
                        'name' => 'zondag',
                        'input' => 'text'
                    ],

                ],

                'Header opties' => [
                    'Fixed' => [
                        'name' => 'headerfixed',
                        'input' => 'checkbox'
                    ],

                    'Full width' => [
                        'name' => 'headerfullwidth',
                        'input' => 'checkbox'
                    ],

                    'Mobiele bottom bar' => [
                        'name' => 'headermobilebottombar',
                        'input' => 'checkbox'
                    ],

                    'Global header' => [
                        'name' => 'headerglobal',
                        'input' => 'text'
                    ],
                ],

                'Footer opties' => [
                    'Full width' => [
                        'name' => 'footerfullwidth',
                        'input' => 'checkbox'
                    ],
                ],

                'Footer widgets' => [
                    'Blok 1' => [
                        'name' => 'footerblok1',
                        'input' => 'select',
                        'value' => [
                            'flex' => 'col',
                            '1/1' => 'et_pb_column_4_4',
                            '1/2' => 'et_pb_column_1_2',
                            '1/3' => 'et_pb_column_1_3',
                            '2/3' => 'et_pb_column_2_3',
                            '1/4' => 'et_pb_column_1_4',
                            '3/4' => 'et_pb_column_3_4',
                            '1/5' => 'et_pb_column_1_5',
                            '2/5' => 'et_pb_column_2_5',
                            '3/5' => 'et_pb_column_3_5',
                            '4/5' => 'et_pb_column_4_5',
                            '1/6' => 'et_pb_column_1_6',
                            '5/6' => 'et_pb_column_5_6',
                            'Uit' => 'off'
                        ]
                    ],

                    'Blok 2' => [
                        'name' => 'footerblok2',
                        'input' => 'select',
                        'value' => [
                            'flex' => 'col',
                            '1/1' => 'et_pb_column_4_4',
                            '1/2' => 'et_pb_column_1_2',
                            '1/3' => 'et_pb_column_1_3',
                            '2/3' => 'et_pb_column_2_3',
                            '1/4' => 'et_pb_column_1_4',
                            '3/4' => 'et_pb_column_3_4',
                            '1/5' => 'et_pb_column_1_5',
                            '2/5' => 'et_pb_column_2_5',
                            '3/5' => 'et_pb_column_3_5',
                            '4/5' => 'et_pb_column_4_5',
                            '1/6' => 'et_pb_column_1_6',
                            '5/6' => 'et_pb_column_5_6',
                            'Uit' => 'off'
                        ]
                    ],

                    'Blok 3' => [
                        'name' => 'footerblok3',
                        'input' => 'select',
                        'value' => [
                            'flex' => 'col',
                            '1/1' => 'et_pb_column_4_4',
                            '1/2' => 'et_pb_column_1_2',
                            '1/3' => 'et_pb_column_1_3',
                            '2/3' => 'et_pb_column_2_3',
                            '1/4' => 'et_pb_column_1_4',
                            '3/4' => 'et_pb_column_3_4',
                            '1/5' => 'et_pb_column_1_5',
                            '2/5' => 'et_pb_column_2_5',
                            '3/5' => 'et_pb_column_3_5',
                            '4/5' => 'et_pb_column_4_5',
                            '1/6' => 'et_pb_column_1_6',
                            '5/6' => 'et_pb_column_5_6',
                            'Uit' => 'off'
                        ]
                    ],

                    'Blok 4' => [
                        'name' => 'footerblok4',
                        'input' => 'select',
                        'value' => [
                            'flex' => 'col',
                            '1/1' => 'et_pb_column_4_4',
                            '1/2' => 'et_pb_column_1_2',
                            '1/3' => 'et_pb_column_1_3',
                            '2/3' => 'et_pb_column_2_3',
                            '1/4' => 'et_pb_column_1_4',
                            '3/4' => 'et_pb_column_3_4',
                            '1/5' => 'et_pb_column_1_5',
                            '2/5' => 'et_pb_column_2_5',
                            '3/5' => 'et_pb_column_3_5',
                            '4/5' => 'et_pb_column_4_5',
                            '1/6' => 'et_pb_column_1_6',
                            '5/6' => 'et_pb_column_5_6',
                            'Uit' => 'off'
                        ]
                    ],

                    'Blok 5' => [
                        'name' => 'footerblok5',
                        'input' => 'select',
                        'value' => [
                            'flex' => 'col',
                            '1/1' => 'et_pb_column_4_4',
                            '1/2' => 'et_pb_column_1_2',
                            '1/3' => 'et_pb_column_1_3',
                            '2/3' => 'et_pb_column_2_3',
                            '1/4' => 'et_pb_column_1_4',
                            '3/4' => 'et_pb_column_3_4',
                            '1/5' => 'et_pb_column_1_5',
                            '2/5' => 'et_pb_column_2_5',
                            '3/5' => 'et_pb_column_3_5',
                            '4/5' => 'et_pb_column_4_5',
                            '1/6' => 'et_pb_column_1_6',
                            '5/6' => 'et_pb_column_5_6',
                            'Uit' => 'off'
                        ]
                    ],
                ],

                'Analytics' => [
                    'Header' => [
                        'name' => 'headerhtml',
                        'input' => 'textarea',
                        'placeholder' => ''
                    ],

                    'Body' => [
                        'name' => 'bodyhtml',
                        'input' => 'textarea',
                        'placeholder' => ''
                    ],

                    'Footer' => [
                        'name' => 'footerhtml',
                        'input' => 'textarea',
                        'placeholder' => ''
                    ],
                ],
            ];

            echo '<div class="grizzly-plugin-content-block"><h2>' . $tab . '</h2><table class="form-table">';
            
            if(!get_option('grizzly_fields')) {
                foreach($fields[$tab] as $value) {
                    echo '<tr><th><label for="' . $value['name'] . '">' . $value['name'] . '</label></th>';
                    echo '<td><input type="' . $value['input'] . '" name="' . $value['name'] . '"></td></tr>';
                }
            } else {
                $grizzly_fields = get_option('grizzly_fields');
                $json = json_decode($grizzly_fields);
                
                foreach($fields[$tab] as $value) {
                    $name = $value['name'];

                    echo '<tr><th><label for="' . $value['name'] . '">' . $value['name'] . '</label></th>';
                    
                    // IF INPUT IS TEXT
                    if($value['input'] == 'text') {
                        echo '<td><input type="' . $value['input'] . '" name="' . $value['name'] . '" value="';
                        
                        if(!empty($json->$name)){ 
                            echo $json->$name;
                        }

                        echo '">';
                    }

                    // IF INPUT IS CHECKBOX
                    elseif($value['input'] == 'checkbox') {
                        echo '<td><input value="1" type="' . $value['input'] . '" name="' . $value['name'] . '"';
                        
                        if(!empty($json->$name)){ 
                            if($json->$name){ 
                                echo 'checked';
                            }
                        }

                        echo '>';
                    }

                    // IF INPUT IS TEXTAREA
                    elseif($value['input'] == 'textarea') {
                        echo '<td><textarea name="' . $value['name'] . '" placeholder="' . $value['placeholder'] . '">';
                        
                        if(!empty($json->$name)){ 
                            echo $json->$name;
                        }

                        echo '</textarea>';
                    }

                    // IF INPUT IS SELECT
                    elseif($value['input'] == 'select') {
                        echo '<td><select name="' . $value['name'] . '">';
                        
                        foreach($value['value'] as $title => $value) {
                            echo '<option value="' . $value . '"';

                            if(!empty($json->$name)){ 
                                if($json->$name == $value) {
                                    echo 'selected';
                                }
                            }

                            echo '>' . $title . '</option>';
                        }
                        echo '</select>';
                    }
                    
                    echo '</td></tr>';
                } 
            }
            
            echo '</table></div>';
        }

        // UPLOAD ALL FIELDS TO DB
        if(isset($_POST['grizzlyupload'])) {
            if(!get_option('grizzly_fields')) {
                add_option('grizzly_fields', 'first_default_value');
            }
            $input = new \stdClass();
            foreach($_POST as $index => $value) {
                $input->$index = $value;
            }
            $json = json_encode($input);
            update_option('grizzly_fields', $json);
        }
?>

<div class="wrap">
    <a href="" id="top"></a>
    <h1 class="wp-heading-inline">Grizzly opties</h1>

    <h2 class="nav-tab-wrapper" id="wpseo-tabs">
        <a class="nav-tab nav-tab-active" href="#top#grizzly-options-general">Algemeen</a>
        <a class="nav-tab" href="#top#grizzly-options-data">Klant gegevens</a>
        <a class="nav-tab" href="#top#grizzly-options-header">Header</a>
        <a class="nav-tab" href="#top#grizzly-options-footer">Footer</a>
        <a class="nav-tab" href="#top#grizzly-options-analytics">Analytics</a>
        <a class="nav-tab" href="#top#grizzly-options-help">Help</a>
    </h2>

    <div class="grizzly-plugin-content-block">
        <h2>Het thema installeren</h2>
        <form action="" method="post" novalidate="novalidate">
            <input type="submit" name="grizzlyinstall" class="button button-primary" value="Installeer thema">
        </form>
    </div>

    <form action="" method="post" novalidate="novalidate">

        <?php 
            include_once('pages/general.php');
            include_once('pages/customerdata.php');
            include_once('pages/header.php');
            include_once('pages/footer.php');
            include_once('pages/analytics.php');
            include_once('pages/help.php');
            //print_r(glob(""));
        ?>

        <input type="submit" name="grizzlyupload" class="button button-primary" value="Bijwerken">
    </form>
</div>

<script>
jQuery(document).ready(function($){

    //switch tabs
    $('.nav-tab').on('click', function(){
        $('.nav-tab').removeClass('nav-tab-active');
        $('.grizzly-options').hide(0);
        $(this).addClass('nav-tab-active');
        
        var href = $(this).attr('href');
        var page = href.substring(4, href.length);

        $(page).show(0);
    });
});
</script>

<?php }