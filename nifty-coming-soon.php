<?php
/*
Plugin Name: Nifty Coming Soon and Maintenance page
Plugin URI:  https://wordpress.org/plugins/nifty-coming-soon-and-under-construction-page/
Description: Easy to setup Coming soon, Maintenance and Under Construction page. It features Responsive design, Countdown timer, Animations, Live Preview, Background Slider, Subscription form and more.
Version:     1.1.4
Author:      Davor Veselinovic
Author URI:  https://themeadviser.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: niftycs
*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



// Display status of the coming soon page in the admin bar

add_action('admin_bar_menu', 'nifty_cs_custom_menu', 1000);

function nifty_cs_custom_menu()
{
    global $wp_admin_bar;
	$value=ot_get_option( 'coming_soon_mode_on___off' );
    if ( $value != "off" ) {

    $argsParent=array(
        'id' => 'niftycs_custom_menu',
        'title' => 'Nifty Coming Soon Enabled',
        'href' => admin_url('?page=niftycs-options#section_general_settings'),
		'meta'   => array( 'class' => 'red-hot-button' ),

    );
    $wp_admin_bar->add_menu($argsParent);
	}
}

// Coming soon awareness button color

function nifty_cs_admin_custom_colors() {
   echo '<style type="text/css">
           #wp-admin-bar-niftycs_custom_menu a{
	background:#80002E !important;
-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
    color:#FFFFFF !important;
}
#wp-admin-bar-niftycs_custom_menu a:active {
background:#88143E !important;
color:#F3F3F3 !important;
-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;}
	#page-niftycs_options {
    max-width: 80% !important;
}
.wrap.settings-wrap .ui-tabs-nav li a {color:#353535 !important}
#option-tree-header {background:#80002E !important;border-bottom:#620b2a solid 10px !important; color:#FFFFFF !important;padding: 15px 0 !important;}
#option-tree-header #option-tree-version span {border-left:none !important;font-size: 16px !important;
text-transform: uppercase;}
.format-setting-wrap, .option-tree-sortable .format-settings {padding: 10px 0 10px 0 !important;}
.wp-not-current-submenu.menu-top.toplevel_page_niftycs-options.menu-top-last:hover {background: #80002E !important;color: #FFF !important;}
#page-niftycs_options h2 {display: none !important;}
         </style>';
}

add_action('admin_head', 'nifty_cs_admin_custom_colors');

// Admin widget

function nifty_cs_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'nifty_cs_dashboard_widget',
                 'Nifty Coming Soon - Need a help?',
                 'nifty_cs_dashboard_widget_function'
        );
}
add_action( 'wp_dashboard_setup', 'nifty_cs_add_dashboard_widgets' );

// Redirection starts here

function nifty_cs_redirect()
        {

			// Check if the coming soon mode is enabled in the general settings

			$value = ot_get_option( 'coming_soon_mode_on___off' );

			if ( $value != "off" ) {

				if(!is_feed())
				{
                	// Guests are redirected to the coming soon page
	            	if ( !is_user_logged_in()  )
                	{
                        // Path to custom coming soon page
                    	$template_path = plugin_dir_path(__FILE__).'template/index.php';
	                	include($template_path);
			        	exit();
                	}
				}
                // Check user assigned role
	            if (is_user_logged_in() )
                {
                    // Get logined in user role
		            global $current_user;
		            $LoggedInUserID = $current_user->ID;
		            $UserData = get_userdata( $LoggedInUserID );
		            // If user is not having administrator, editor, author or contributor role he will be server the coming soon page too :)
		            if($UserData->roles[0] == "subscriber")
		            {
                        if(!is_feed())
                        {
		                    $template_path = plugin_dir_path(__FILE__).'template/index.php';
	                       include($template_path);
			               exit();
		                }
                    }
		        }
            }
		}

// Live Preview

add_action('init','nifty_cs_get_preview');

function nifty_cs_get_preview ()
{

	 if (  (isset($_GET['get_preview']) && $_GET['get_preview'] == 'true') )
		{

			 $template_path = plugin_dir_path(__FILE__).'template/index.php';
			 include($template_path);
			 exit();
		}
}

// Prevent wp-login.php to be blocked by the Coming soon page.

add_action('init','nifty_cs_skip_redirect_on_login');

function nifty_cs_skip_redirect_on_login ()
{
	global $currentpage;
	if ('wp-login.php' == $currentpage)
		{
		return;
		} else
			{
			 add_action( 'template_redirect', 'nifty_cs_redirect' );
			}
}

// Calling plugins option panel
include_once 'admin/main-options.php';

include_once 'admin/ot-loader.php';

// Calling Google fonts array

include_once 'admin/includes/google-fonts.php';

?>
