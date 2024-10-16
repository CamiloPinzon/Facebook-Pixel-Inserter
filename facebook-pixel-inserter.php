<?php
/*
Plugin Name: Facebook Pixel Inserter
Description: A plugin to insert Facebook Pixel ID via admin panel and apply it to the website.
Version: 1.0
Author: Camilo Pinzón
Author URI: https://camilopinzon.tech/
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Add Admin Menu
function fb_pixel_inserter_menu()
{
    add_menu_page(
        'Facebook Pixel Settings', // Page title
        'FB Pixel Inserter', // Menu title
        'manage_options', // Capability
        'fb-pixel-inserter', // Menu slug
        'fb_pixel_inserter_settings_page', // Function to display page
        'dashicons-admin-generic', // Icon
        100 // Position
    );
}
add_action('admin_menu', 'fb_pixel_inserter_menu');

// Create the settings page content
function fb_pixel_inserter_settings_page()
{
?>
    <div class="wrap">
        <h1>Facebook Pixel Inserter</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('fb_pixel_inserter_group');
            do_settings_sections('fb-pixel-inserter');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

// Register the setting
function fb_pixel_inserter_settings_init()
{
    register_setting('fb_pixel_inserter_group', 'fb_pixel_id');

    add_settings_section(
        'fb_pixel_inserter_section',
        'Enter your Facebook Pixel ID',
        null,
        'fb-pixel-inserter'
    );

    add_settings_field(
        'fb_pixel_id',
        'Facebook Pixel ID',
        'fb_pixel_inserter_id_callback',
        'fb-pixel-inserter',
        'fb_pixel_inserter_section'
    );
}
add_action('admin_init', 'fb_pixel_inserter_settings_init');

// Callback to render the Pixel ID input field
function fb_pixel_inserter_id_callback()
{
    $fb_pixel_id = get_option('fb_pixel_id');
    echo '<input type="text" id="fb_pixel_id" name="fb_pixel_id" value="' . esc_attr($fb_pixel_id) . '" />';
}

// Add the Facebook Pixel script to the site
function fb_pixel_inserter_add_pixel_code()
{
    $fb_pixel_id = get_option('fb_pixel_id');

    if ($fb_pixel_id) {
        echo "
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '$fb_pixel_id'); 
        fbq('track', 'PageView');
        </script>
        <noscript><img height='1' width='1' style='display:none'
        src='https://www.facebook.com/tr?id=$fb_pixel_id&ev=PageView&noscript=1'
        /></noscript>
        <!-- End Facebook Pixel Code -->
        ";
    }
}
add_action('wp_head', 'fb_pixel_inserter_add_pixel_code');
