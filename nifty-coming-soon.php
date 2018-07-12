<?php
/*
Plugin Name: Nifty Coming Soon and Maintenance page
Plugin URI:  https://wordpress.org/plugins/nifty-coming-soon-and-under-construction-page/
Description: Easy to setup Coming soon, Maintenance and Under Construction page. It features Responsive design, Countdown timer, Animations, Live Preview, Background Slider, Subscription form and more.
Version:     1.1.3
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

function nifty_cs_dashboard_widget_function() {

// Message to our beloved users :)

	$nifty_cs_banner_url = 'https://themeadviser.com/static/nifty-coming-soon-admin-baner.png';
	$nifty_cs_support_url = 'https://wordpress.org/support/plugin/nifty-coming-soon-and-under-construction-page';
	$nifty_cs_theme1_banner_url = 'https://themeadviser.com/static/pinhole_screenshot.jpg';
	$nifty_cs_theme1_demo_url = 'http://demo.mekshq.com/?theme=pinhole&utm_source=themeadviser&utm_campaign=nifty-coming-soon';
	$nifty_cs_theme2_banner_url = 'https://themeadviser.com/static/vlog_screenshot.jpg';
	$nifty_cs_theme2_demo_url = 'http://demo.mekshq.com/?theme=vlog&utm_source=themeadviser&utm_campaign=nifty-coming-soon';
	$nifty_cs_theme3_banner_url = 'https://themeadviser.com/static/herald_screenshot.jpg';
	$nifty_cs_theme3_demo_url = 'http://demo.mekshq.com/?theme=herald&utm_source=themeadviser&utm_campaign=nifty-coming-soon';
	$nifty_cs_theme4_banner_url = 'https://themeadviser.com/static/voice_screenshot.jpg';
	$nifty_cs_theme4_demo_url = 'http://demo.mekshq.com/?theme=voice&utm_source=themeadviser&utm_campaign=nifty-coming-soon';
	$nifty_cs_theme5_banner_url = 'https://themeadviser.com/static/gridlove_screenshot.jpg';
	$nifty_cs_theme5_demo_url = 'http://demo.mekshq.com/?theme=gridlove&utm_source=themeadviser&utm_campaign=nifty-coming-soon';
	

	echo "<img style='max-width:100%; margin-top:5px;' src='".$nifty_cs_banner_url."'>";
	echo "<p>You have succefully installed Nifty Coming soon plugin and you can freely work on your website while the coming soon mode is active. </br> If you need help with the plugin, feel free to drop us the message, <a href=".$nifty_cs_support_url." target='_blank'/>right here</a><hr>In the meantime, you are most likely looking for a <u>good theme</u> to start you work. So, we picked some worthy themes for you if you don't mind. :)</p>";
	echo "<h3 style='padding-top:10px;'><strong>*** AMAZING 5 STAR RATED THEMES ***</strong></h3>";
	echo "<div style='width:100%;'>";
	echo "<div style='width:49%;float:left;padding-top:15px;'><a target='_blank' href='".$nifty_cs_theme1_demo_url."'><img style='max-width:95%;' src='".$nifty_cs_theme1_banner_url."'></a></div><div style='width:49%;float:right;'><p><strong><a target='_blank' href='".$nifty_cs_theme1_demo_url."'>PINHOLE</a></strong></br> Top Tier Gallery theme for Photographers. Perfect gallery theme for WordPress with unique image features.</p></div><div style='clear:both;'></div>";
	echo "<div style='width:49%;float:left;padding-top:15px;'><a target='_blank' href='".$nifty_cs_theme2_demo_url."'><img style='max-width:95%;' src='".$nifty_cs_theme2_banner_url."'></a></div><div style='width:49%;float:right;'><p><strong><a target='_blank' href='".$nifty_cs_theme2_demo_url."'>VLOG</a></strong></br> Vloggers gonna love this one, imagine fully featured magazine theme specialized in videos and vlogging.</p></div><div style='clear:both;'></div>";
	echo "<div style='width:49%;float:left;padding-top:15px;'><a target='_blank' href='".$nifty_cs_theme3_demo_url."'><img style='max-width:95%;' src='".$nifty_cs_theme3_banner_url."'></a></div><div style='width:49%;float:right;'><p><strong><a target='_blank' href='".$nifty_cs_theme3_demo_url."'>HERALD</a></strong></br> Start your news portal or magazine in a bold manner. Herald offers everything that successful magazines need.</p></div><div style='clear:both;'></div>";
	echo "<div style='width:49%;float:left;padding-top:15px;'><a target='_blank' href='".$nifty_cs_theme4_demo_url."'><img style='max-width:95%;' src='".$nifty_cs_theme4_banner_url."'></a></div><div style='width:49%;float:right;'><p><strong><a target='_blank' href='".$nifty_cs_theme4_demo_url."'>VOICE</a></strong></br> Best rated and most popular personal blog / magazine WordPress theme with the trust of a couple of thousands users.</p></div><div style='clear:both;'></div>";
	echo "<div style='width:49%;float:left;padding-top:15px;'><a target='_blank' href='".$nifty_cs_theme5_demo_url."'><img style='max-width:95%;' src='".$nifty_cs_theme5_banner_url."'></a></div><div style='width:49%;float:right;'><p><strong><a target='_blank' href='".$nifty_cs_theme5_demo_url."'>GRIDLOVE</a></strong></br> Modern material design and grid inspired magazine theme. Powerful and easy to use, 5 star rated.</p></div><div style='clear:both;'></div>";
	
	
	echo "</div>";
}



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