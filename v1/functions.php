<?php
// Add Theme Customization Options
function myTM_customize_register_header_color($wp_customize) {
    // Backgroud-Color Customization
    // Creating Background-Color
    $wp_customize->add_setting('header_background_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    // Saving Background-Color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label' => __('Header Background Color', 'myTM-theme'),
        'section' => 'colors',
        'settings' => 'header_background_color',
    )));

    // Text-Color Customization
    // Creating Text-Color
    $wp_customize->add_setting('text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    // Saving Text-Color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Text Color', 'myTM-theme'),
        'section' => 'colors',
        'settings' => 'text_color',
    )));
}
add_action('customize_register', 'myTM_customize_register_header_color');


// Apply Customizations via Inline CSS
function myTM_custom_styles_header_color() {
    ?>
    <style type="text/css">
        .landing-header {
            background-color: <?php echo esc_attr(get_theme_mod('header_background_color', '#2c3e50')); ?>;
            color: <?php echo esc_attr(get_theme_mod('text_color', '#ecf0f1')); ?>;
            background-size: cover;
            background-position: center;
        }
    </style>
    <?php
}
add_action('wp_head', 'myTM_custom_styles_header_color');

?>
