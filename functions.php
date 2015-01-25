<?php
/*
Author: Pixelarity
URL: http://pixelarity.com
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

require_once( 'options-functions.php' );

if ( !function_exists( 'of_get_option' ) ) {
    function of_get_option($name, $default = false) {
        $optionsframework_settings = get_option('optionsframework');
        // Gets the unique option id
        $option_name = $optionsframework_settings['id'];
        if ( get_option($option_name) ) {
            $options = get_option($option_name);
        }
        if ( isset($options[$name]) ) {
            return $options[$name];
        } else {
            return $default;
        }
    }
}

/*********************
Bones Initialization
*********************/

function bones_ahoy() {

  // Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // Language Support
  load_theme_textdomain( 'threshold', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // Enqueue Scripts and Styles
  add_action( 'wp_enqueue_scripts', 'crystalline_scripts_init', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

add_action( 'after_setup_theme', 'bones_ahoy' );

/************* Register and Enqueue Scripts and Styles *************/

function crystalline_scripts_init(){
    wp_enqueue_script('vendors', get_template_directory_uri() . '/library/dest/js/vendors.js');

    wp_register_script('init', get_template_directory_uri() . '/library/dest/js/init.js', 'vendors');

    $initTrans = array( 'directory' => get_template_directory_uri());
    wp_localize_script( 'init', 'skelWP', $initTrans );

    // Enqueue Initialize
    wp_enqueue_script('init');
}

/************* oEmbed Size Options *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* Thumbnail Size Options *************/

// Thumbnail sizes
add_image_size( 'crystalline-thumb-600', 600, 600, true );

/*
To call the 600 x 600 sized image,
we would use the function:
<?php the_post_thumbnail( 'crystalline-thumb-600' ); ?>
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'crystalline-thumb-600' => __('600px by 600px'),
    ) );
}

/************* Theme Customize *********************/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* Sidebars ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'main-sidebar',
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<header><h2 class="widget-title">',
		'after_title' => '</h2></header>',
	) );
}


/************* Comment Layout *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'threshold' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'threshold' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'threshold' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'threshold' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
}


/* Call Google Fonts here */
function bones_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

// Contact sections in footer of Threshold. Depends on Options Framework.
function threshold_footer_sections(){

    // Could probably pull these in dynamically via options.php or a separate function
    $sections = array(
        'footer_address' => 'footer_address_check',
        'footer_email' => 'footer_email_check',
        'footer_telephone' => 'footer_telephone_check',
        'footer_social' => 'footer_social_check'
    );

    // Start output
    $markup = '';
    $markup .= '<ul class="row">';

    foreach($sections as $section => $id){
        // Is the 'enable' box checked?
        if(of_get_option($id)){
            $markup .= '<li class="3u" class="row">';

            // Will change to corresponding section icons.


            if($section == 'footer_address'){
                $markup .= '<div class="p-icon 4u"><span class="fa fa-cog"></span></div>';
                $markup .= '<span class="8u">';
                $markup .= '<a href="mailto:'. of_get_option($section) .'">' . of_get_option($section) . '</a><br/>';
            }

            if($section == 'footer_email'){
                $markup .= '<div class="p-icon 4u"><span c class="fa fa-anchor"></span></div>';
                $markup .= '<span class="8u">';
                $markup .= '<a href="mailto:'. of_get_option($section) .'">' . of_get_option($section) . '</a>';
            }

            if($section == 'footer_telephone'){
                $markup .= '<div class="p-icon 4u"><span class="fa fa-user"></span></div>';
                $markup .= '<span class="8u">';
                $markup .= '<a href="tel:'. of_get_option($section) .'">' . of_get_option($section) . '</a>';
            }

            // Add social links. Create an array of all enabled social networks?
            if($section == 'footer_social'){
                $markup .= '<div class="p-icon 4u"><span class="fa fa-envelope"></span></div>';
                $markup .= '<span class="8u"><br/><br/>';

            }

            $markup .= '</span>';
            $markup .= '</li>';
        }
    }

    $markup .= '</ul>';

    echo $markup;
}


function threshold_get_feature_banner(){
    $feature_banner = array(
        'heading' => of_get_option('feature-banner-heading'),
        'subheading' => of_get_option('feature-banner-subheading'),
        'image' => of_get_option('feature-banner-image-one')
    );

    $feature_box['page'] = array(
        'page' => of_get_option('feature-banner-page'),
        'link' => get_permalink(of_get_option('feature-banner-page'))
    );

    return $feature_banner;
}

function get_fontawesome_icons(){
    $pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
    $subject = file_get_contents(get_template_directory_uri() . '/library/dest/css/font-awesome.min.css');

    preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

    $icons = array();

    foreach($matches as $match){
        $icons[$match[1]] = $match[2];
    }

    $icons = var_export($icons, TRUE);
    $icons = stripslashes($icons);

    print_r($icons);
}

?>
