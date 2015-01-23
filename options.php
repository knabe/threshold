<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

    // Social Array
	$social_multicheck_array = array(
		'facebook' => __('Facebook', 'options_check'),
		'twitter' => __('Twitter', 'options_check'),
		'google' => __('Google+', 'options_check')
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

     // Begin General Settings
    $options[] = array(
		'name' => __('General Settings', 'options_check'),
		'type' => 'heading');

    $options[] = array(
		"name" => "Logo",
		"desc" => "Upload your logo here.",
		"id" => "logo",
		"type" => "upload" );

    // Begin Footer Section
	$options[] = array(
		'name' => __('Footer', 'options_check'),
		'type' => 'heading');

    // Footer Address
	$options[] = array(
		'name' => __('Address', 'options_check'),
		'desc' => __('Enable Address Box', 'options_check'),
		'id' => 'footer_address_check',
        'class' => 'has_hidden_child',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Your Address', 'options_check'),
		'id' => 'footer_address',
		'class' => 'hidden',
		'type' => 'text');


    // Footer E-mail
    $options[] = array(
		'name' => __('E-mail', 'options_check'),
		'desc' => __('Enable E-mail Box', 'options_check'),
		'id' => 'footer_email_check',
        'class' => 'has_hidden_child',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Your E-mail', 'options_check'),
		'id' => 'footer_email',
		'class' => 'hidden',
		'type' => 'text');

    // Footer Telephone
    $options[] = array(
		'name' => __('Telephone', 'options_check'),
		'desc' => __('Enable Telephone Box', 'options_check'),
		'id' => 'footer_telephone_check',
        'class' => 'has_hidden_child',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Your Telephone', 'options_check'),
		'id' => 'footer_telephone',
		'class' => 'hidden',
		'type' => 'text');

    // Footer Social
    $options[] = array(
		'name' => __('Social Media', 'options_check'),
		'desc' => __('Enable Social Media', 'options_check'),
		'id' => 'footer_social_check',
        'class' => 'has_hidden_child',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Social Networks', 'options_check'),
		'desc' => __('Choose which social networks to display.', 'options_check'),
		'id' => 'footer_social',
        'class' => 'hidden',
		'type' => 'multicheck',
		'options' => $social_multicheck_array);

    // Begin Social Media
    $options[] = array(
		'name' => __('Social Media', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'desc' => __('Full Facebook Page URL', 'options_check'),
		'id' => 'facebook',
		'std' => '',
		'type' => 'text');

    $options[] = array(
        'name' => __('Twitter', 'options_check'),
        'desc' => __('Full Twitter Page URL', 'options_check'),
        'id' => 'twitter',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Google+', 'options_check'),
        'desc' => __('Full Google+ URL', 'options_check'),
        'id' => 'google-plus',
        'std' => '',
        'type' => 'text');

	return $options;
}
