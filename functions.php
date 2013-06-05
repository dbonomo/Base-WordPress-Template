<?php
/******Let's Create some default menu areas add more if you need to!***/
function register_custom_menus() {
	register_nav_menus( 
	array(
		'left' => 'Left Navigation',
		'footer' => 'Footer Navigation'
	) );
}
	
	add_action( 'init', 'register_custom_menus' );

/* Removes the version number to annoy hackers */
function nerdy_remove_version() {
return '';
}
add_filter('the_generator', 'nerdy_remove_version');

/**
 * Register our sidebars and widgetized areas.
 *
 */
function nerdy_widgets_init() {
	register_sidebar( array(
		'name' => 'Left Sidebar 1',
		'id' => 'Left1',
		'before_widget' => '<div class="LeftSidebar1">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'Header Box 1',
		'id' => 'Box1',
		'before_widget' => '<div class="Box B1">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Header Box 2',
		'id' => 'Box2',
		'before_widget' => '<div class="Box B2">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Header Box 3',
		'id' => 'Box3',
		'before_widget' => '<div class="Box B3">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Header Box 4',
		'id' => 'Box4',
		'before_widget' => '<div class="Box B4">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
	
		register_sidebar( array(
		'name' => 'Header Box 5',
		'id' => 'Box5',
		'before_widget' => '<div class="Box B5">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Header Box 6',
		'id' => 'Box6',
		'before_widget' => '<div class="Box B6">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Header Box 7',
		'id' => 'Box7',
		'before_widget' => '<div class="Box B7">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Header Box 8',
		'id' => 'Box8',
		'before_widget' => '<div class="Box B8">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="BoxH2">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'nerdy_widgets_init' );

add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 960, 400, true ); // 960 pixels wide by 400 pixels tall, crop mode
add_image_size( 'category-thumb', 316, 500, true ); //300 pixels wide (and unlimited height)

function strlen_utf8 ($str) {
	$i = 0;
	$count = 0;
	$len = strlen ($str);
	while ($i < $len) {
		$chr = ord ($str[$i]);
		$count++;
		$i++;
		if ($i >= $len)
			break;
		if ($chr & 0x80) {
			$chr <<= 1;
			while ($chr & 0x80) {
				$i++;
				$chr <<= 1;
			}
		}
	}
	return $count;
}
function check_email($email) {
	// First, we check that there's one @ symbol, and that the lengths are right
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
		return false;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
			return false;
		}
	}
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false; // Not enough parts to domain
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
				return false;
			}
		}
	}
	return true;
}

?>
