<?php
// Navbar-Customization
function myTM_customize_register_navbar_color($wp_customize) {
    // Backgroud-Color Customization
    // Creating Background-Color
    $wp_customize->add_setting('navbar_background_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    // Saving Background-Color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navbar_background_color', array(
        'label' => __('NavBar Background Color', 'myTM-theme'),
        'section' => 'colors',
        'settings' => 'navbar_background_color',
    )));

    // navbar_Text-Color Customization
    // Creating navbar_Text-Color
    $wp_customize->add_setting('navbar_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    // Saving navbar_Text-Color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navbar_text_color', array(
        'label' => __('NavBar Text Color', 'myTM-theme'),
        'section' => 'colors',
        'settings' => 'navbar_text_color',
    )));
}
add_action('customize_register', 'myTM_customize_register_navbar_color');


// Apply Customizations via Inline CSS
function myTM_custom_styles_navbar_color() {
    ?>
    <style type="text/css">
        .navbar-header {
            background-color: <?php echo esc_attr(get_theme_mod('navbar_background_color', '#2c3e50')); ?>;
            color: <?php echo esc_attr(get_theme_mod('navbar_text_color', '#ecf0f1')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'myTM_custom_styles_navbar_color');

?>