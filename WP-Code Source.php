


<html lang="<?php language_attributes(); ?>">
<meta charset="UTF-8">
<meta charset="<?php bloginfo( 'charset' ); ?>">

<?php language_attributes(); ?>
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
    
    <body <?php body_class(); ?>>

=========================================

===========================================
// how show blog title
<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
===========================================


<?php 

	//Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)
 
//With WooCommerce
the_post_thumbnail( 'shop_thumbnail' ); // Shop thumbnail (180 x 180 hard cropped)
the_post_thumbnail( 'shop_catalog' );   // Shop catalog (300 x 300 hard cropped)
the_post_thumbnail( 'shop_single' );    // Shop single (600 x 600 hard cropped)

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only
add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies


add_image_size('slider_img',1920,1152);

 ?>



========================================
<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
 
<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">

=========================================
<div style="background-image: url(<?php echo get_field('background'); ?>);"><div>
=========================================

<div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" style="background: url(<?php echo get_template_directory_uri();?>/assets/img/about-img.jpg) center center no-repeat;" data-aos="fade-right">
	<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
</div>

========================================

=======================
<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
=======================

<?php
  if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
  }
  if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' );
  }
?>



<?php 
	if( file_exists(dirname(__FILE__)) . '/lib/metabox/coment_cmb.php' ){
	require_once( dirname(__FILE__) . '/lib/metabox/coment_cmb.php' );
}

 ?>


// While loop

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        ... Display post content
    <?php endwhile; ?>
<?php endif; ?>

------------------------------------------

<?php
  $query = new WP_Query(array(
      'posts_per_page'   => 4,
  ));

  while ($query->have_posts()): $query->the_post(); ?>
     <ul>
         <li><?php the_title(); ?></li>
         <li><?php echo get_the_date(); ?></li>
         <li><?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('thumbnail');
            } ?>
         </li>
     </ul>
  <?php endwhile;
  wp_reset_postdata();
  ?>

  ---------------------------------------

  <?php
  $basicpost = null;
  $basicpost = new WP_query(array(
  	'post_type' => 'slider',
  	'posts_per_page' => -1,
  ));
  if( $basicpost->have_posts() ){
  	while ($basicpost->have_posts() ){
  		$basicpost->the_post();
  		$slider_dec = get_post_meta(get_the_ID(),'_moderna_prefix_slider_desc', true);
  		?>

  		// enter your code here
  		

  	<?php }
  }
  else{
  	echo "No Post";
  }
  wp_reset_postdata();

  ?>




// how to show formats wise content from while loop using

   <?php while (have_posts()) : the_post(); ?>
   	<?php get_template_part('formats/content', get_post_format()); ?>
   <?php endwhile; ?> 


<?php
echo wp_trim_words( get_the_content(), 40, '...' );
?>



// This link for wordpress Tags dynamic
<?php $args = array(
    'numberposts' => 3,
    'post_status' => 'publish',
    'tag' => 'travel' //how to give a dynamic value
);
?>

<?php 
	$args = array(
        'post_type' => 'post',
        'meta_key' => 'pb_issue_featured',
        'orderby'   => 'meta_value',
        'order' => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => $posts,
        'paged' => $paged,
        'meta_query' => array(
            array(
                'key' => 'headline',
                'value' => 1,
                'compare' => '!=' 
                )
            )
        );
$q = new WP_Query($args);
 ?>


 // Order wise

<?php 
	$args = array(
    'order' => 'ASC', or 'order' => 'DESC',
    'orderby' => 'ID',
);
 ?>





<?php
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'modernas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Moderna', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Post Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Moderna', 'text_domain' ),
		'description'           => __( 'This is for moderna description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'moderna' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'moderna_key', $args );

}
add_action( 'init', 'custom_post_type', 0 );
?>

<?php 

	// custom post register

function eterna_custom_post_register(){

register_post_type('slider',
	array(
		'labels' => array(
			'name' =>'Slider',
			'menu_name' =>'Slider Menu',
			'add_new' =>'Add new slider',
			'add_new_item' =>'Add new slider',
			'edit_item' =>'Enter your Slider Title',
			'all_items' =>'All Slider'
		),
		'public' =>true,
		'supports' => array(
			'title','editor','excerpt','thumbnail'
		)
	)
);

register_post_type(
	'eterna_information',
	array(
			'labels'			=>array(
			'name'				=>'Enter Info',
			'menu_name'			=>'Enter Information',
			'add_new'			=>'Add New Enter Info',
			'add_new_item'		=>'Add Enter New Info',
			'edit_item'			=>'Edit Your Eterna Information',
			'all_items'			=>'All Enter Information',	
		),
			'public'			=>true,
			'supports'			=>array(
				'title','editor'
			)
	)
);

register_post_type(
	'eterna_inf_with_img',
	array(
		'labels'					=>array(
			'name'					=>'Enter Info two',
			'menu_name'				=>'Enter Info two',
			'add_new'				=>'Add New Enter Info two',
			'add_new_item'			=>'Add New Enter Info two',
			'edit_item'				=>'Edit Your Enter Info two',
			'all_items'				=>'All Enter Info two',		
	),
		'public'					=>true,
		'supports'					=>array(
			'title','editor','thumbnail'
			)
		)
);
register_post_type(
	'eterna_service',
	array(
		'labels'					=>array(
			'name'					=>'Service',
			'menu_name'				=>'Services',
			'add_new'				=>'Add New Services',
			'add_new_item'			=>'Add New Services',
			'edit_item'				=>'Edit Your Services',
			'all_items'				=>'All Enter Services',		
	),
		'public'					=>true,
		'supports'					=>array(
			'title','editor'
			)
		)
);
register_post_type(
	'clients',
	array(
		'labels'					=>array(
			'name'					=>'Clients',
			'menu_name'				=>'Clients',
			'add_new'				=>'Add New Clients',
			'add_new_item'			=>'Add New Clients',
			'edit_item'				=>'Edit Your Clients',
			'all_items'				=>'All Enter Clients',		
	),
		'public'					=>true,
		'supports'					=>array(
			'thumbnail'
			)
		)
);

}
add_action('init','eterna_custom_post_register');
 ?>



<?php
// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'modernas', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'moderna', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'moderna', array( 'moderna_post' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

?>



<?php 
	// Register taxonomy for custom post

 register_taxonomy('recordings',array('portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'recordings' ),
  ));
	
 ?>






<?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo $tag->name . ' '; 
  }
}
?>


<?php
	$post_tags = get_the_tags();
if ( $post_tags ) {
    echo $post_tags[0]->name; 
}

?>


<p><?php the_tags(); ?></p>

//Displays links to tags with an arrow (>) separating the tags and preceded with the text Social tagging:
<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>

//Displays a list of the tags as an unordered list
<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>


//
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'wordpress',
    'posts_per_page' => 5,
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            if ( has_post_thumbnail() ) :
                the_post_thumbnail();
            endif;
            ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </div>
        </article>
        <?php
    endwhile;
endif;

//Try this code and just change your page_id:

<?php $my_query = new WP_Query('page_id=20');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;?>
 <h3><?php the_title(); ?></h3>
    <div class="text">

  <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
 <a href="<?php echo get_page_link(); ?>" class="read-more">Read More</a>
    </div>

 <?php endwhile; ?>
 
 // While loop
 <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        ... Display post content
    <?php endwhile; ?>
<?php endif; ?>


<?php
// Wordpress - Show metabox on a specific page only
// Add this to functions.php
// Link : https://stackoverflow.com/questions/38285560/wordpress-show-metabox-on-a-specific-page-only

add_action('admin_init','my_meta_init');
function my_meta_init()
{
$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
// checks for post/page ID
if ($post_id == '84')
{
    add_meta_box('my_all_meta_1', 'My Custom Meta Box 1', 'my_meta_setup_1', 'page', 'normal', 'high');
}
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
// check for a template type
if ($template_file == 'home.php')
{
    add_meta_box('my_meta_2', 'My Custom Meta Box 2', 'my_meta_setup_2', 'page', 'normal', 'high');
}


?>

// this link for create custom metabox setup

https://rudrastyh.com/wordpress/meta-boxes.html


<?php
// I have a custom meta box that I want to display on only 3 specific page IDs.
function mf_1_remove_meta_boxes() {

    if( !in_array($_GET['post'], array('194','185','2') ) ):
        remove_meta_box( 'mf_1', 'page', 'normal' );
}
?>

//
<?php
// UPDATE 2 The code above has been modified to correct the 
//issue with the meta box appearing on a new (unsaved) page. It has also been modified to a complete and working code. 
//The meta box will be removed for all users.
//To remove the meta box for everyone except admins:

function mf_1_remove_meta_boxes() {

    if( !is_admin())
        return;

    if( !in_array($_GET['post'], array('194','185','2') ) ):
        remove_meta_box( 'mf_1', 'page', 'normal' );
}
?>



<?php 

// CMB2 intrigation

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}
 ?>

 <?php 
 	if ( !class_exists( 'redux-framework' ) && file_exists( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' );
  }
  if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/eterna_redux_theme_options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/eterna_redux_theme_options.php' );
  }
  ?>

<?php 
// This is for PHP file call

 if( file_exists(dirname(__FILE__)) . '/lib/eterna-custompost.php' ){
	require_once( dirname(__FILE__) . '/lib/eterna-custompost.php' );
}
 ?>




<?php 

/**
* Template Name: Full Width Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
 ?>

<?php 
	/*
Template Name: Full-width layout
Template Post Type: post, page, event
*/
// Page code here...
 ?>



<?php the_author(); ?>
<?php the_time( 'l, F jS, Y' ); ?>
<?php the_date(); ?>
<?php the_date( 'Y-m-d', '<h2>', '</h2>' ); ?>



<?php

add_action( 'widgets_init', 'morderna_register_sdebar' );
function morderna_register_sdebar() {
    register_sidebar(
        array(
            'id'            => 'moderna_catagory_sidebar',
            'name'          => esc_html__( 'Main Sidebar' ),
            'description'   => esc_html__( 'Moderna Main Sidebar' ),
            'before_widget' => '<div class="sidebar-item categories">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="sidebar-title">',
            'after_title'   => '</h3>',
        )
    );
  
}

?>



<div class="card-image">
	<a href=" <?php echo the_permalink(); ?>">
		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"
		alt="Card Image">
	</a>    
</div>





<?php 
// this code for permalink theme activation korar shathey shathey Auto refresh hobey
	register_activation_hook( __FILE__, 'flush_activision_korbo' );
 
function flush_activision_korbo() {
    flush_rewrite_rules();
}
 ?>


 <?php 
/** Redirect after login */
    function mysite_login_redirect(){
        if ( current_user_can( 'manage_options' ) ) {
           return 'http://mysite.com/wp-admin/index.php';}
        else {
           return 'http://mysite.com/wp-admin/post-new.php';}
    }
add_action( 'login_redirect', 'mysite_login_redirect');
  ?>






// This code for wordpress widget

<?php

class My_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'my-text',  // Base ID
            'Eterna Recent Post'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'My_Widget' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="textwidget">';
 
        echo esc_html__( $instance['text'], 'text_domain' );
 
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
 
}
$my_widget = new My_Widget();
?>



<?php 
	 

<!doctype html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <?php wp_head(); ?>

</head>

 

<body <?php body_class(); ?>>

    <header class="<?php dynamic_header_class(); ?>">


    </header>

    <main class="<?php dynamic_main_class(); ?>">

        <div id="content" class="site-content">

---------------------------------------------------

<?php

/*

Template Name: About Page

*/

// Add header-interior class to <header>

set_header_class('header-interior');

// Add main-map-container class to <main>

set_main_class('main-map-container');

?>

---------------------------------------------------

<?php

/*

Template Name: Contact Page

*/

// Add header-exterior class to <header>

set_header_class('header-exterior');

// Add main-no-footer class to <main>

set_main_class('main-no-footer');

?>



==================================================================

// secessuful widget code

<?php 

add_action('widgets_init', 'themename_widgets_init');
function themename_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Firest Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="sidebar-item recent-posts">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar-title">',
        'after_title'   => '</h3>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Secondary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );


}


// start backend show funciton
class My_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'eterna_cus_post',  // Base ID
            'Eterna Recent Post'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'My_Widget' );
        });
 
    }

    // end backend show function


// start output show funciton

    public function widget($args, $instance){ 

    	$title = $instance['title'];
    	?>
    	<?php echo $args['before_title']; ?><?php echo $title; ?><?php echo $args['after_title']; ?>
    	<?php echo $args['before_widget']; ?>
    	
    	<?php  $eter_post     = new WP_Query(array(
    		'post_type'	        =>'post',
    		'posts_per_page'    => -1,
        'order'             =>'DESC',
    	)); while ($eter_post->have_posts()): $eter_post->the_post(); ?>
    			<div class="post-item clearfix">
            <?php the_post_thumbnail('eterna_wid'); ?>    				
                 
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                  <time datetime="2020-01-01"><?php the_time('F j, Y'); ?></time>
                </div>
                 <?php endwhile;
  			wp_reset_postdata();
  			?>
    		
    	
    	<?php echo $args['after_widget']; ?>
   <?php }

   // end output show funciton


// start form function for input value

   public function form($instance){ ?>
   	<p>
   		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
   		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>">
   	</p>
   <?php }
}

$my_widget = new My_Widget();



===================================================================


//  Plugin description

/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Your Name
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */


========================================================

/**
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */



============================



/**
 * Create A Simple Theme Options Panel
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', 'text-domain' ),
				esc_html__( 'Theme Settings', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Checkbox
				if ( ! empty( $options['checkbox_example'] ) ) {
					$options['checkbox_example'] = 'on';
				} else {
					unset( $options['checkbox_example'] ); // Remove from options if not checked
				}

				// Input
				if ( ! empty( $options['input_example'] ) ) {
					$options['input_example'] = sanitize_text_field( $options['input_example'] );
				} else {
					unset( $options['input_example'] ); // Remove from options if empty
				}

				// Input
				if ( ! empty( $options['input_example_2'] ) ) {
					$options['input_example_2'] = sanitize_text_field( $options['input_example_2'] );
				} else {
					unset( $options['input_example_2'] ); // Remove from options if empty
				}

				// Select
				if ( ! empty( $options['select_example'] ) ) {
					$options['select_example'] = sanitize_text_field( $options['select_example'] );
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">

						<?php // Checkbox example ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Checkbox Example', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'checkbox_example' ); ?>
								<input type="checkbox" name="theme_options[checkbox_example]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Checkbox example description.', 'text-domain' ); ?>
							</td>
						</tr>

						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'input example', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_example' ); ?>
								<input type="text" name="theme_options[input_example]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>




						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'input example', 'text-domain' ); ?></th>
							<td>
								<?php $value_2 = self::get_theme_option( 'input_example_2' ); ?>
								<input class="widefat" type="text" name="theme_options[input_example_2]" value="<?php echo esc_attr( $value_2 ); ?>">

							</td>
						</tr>


						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'input example', 'text-domain' ); ?></th>
							<td>
								<?php $value_2 = self::get_theme_option( 'input_example_2' ); ?>
								<input class="widefat" size="100" type="text" name="theme_options[input_example_2]" value="<?php echo esc_attr( $value_2 ); ?>">

							</td>
						</tr>



					
						




						<?php // Select example ?>
						<tr valign="top" class="wpex-custom-admin-screen-background-section">
							<th scope="row"><?php esc_html_e( 'Select Example', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'select_example' ); ?>
								<select name="theme_options[select_example]">
									<?php
									$options = array(
										'1' => esc_html__( 'Option 1', 'text-domain' ),
										'2' => esc_html__( 'Option 2', 'text-domain' ),
										'3' => esc_html__( 'Option 3', 'text-domain' ),
									);
									foreach ( $options as $id => $label ) { ?>
										<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $value, $id, true ); ?>>
											<?php echo strip_tags( $label ); ?>
										</option>
									<?php } ?>
								</select>
							</td>
						</tr>

					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}


=================================



// another theme option code


//register settings
function theme_options_add(){
    register_setting( 'theme_settings', 'theme_settings' );
}
 
//add settings page to menu
function add_options() {
add_menu_page( __( 'Theme Options' ), __( 'Theme Options' ), 'manage_options', 'settings', 'theme_options_page');
}
//add actions
add_action( 'admin_init', 'theme_options_add' );
add_action( 'admin_menu', 'add_options' );
 
//start settings page
function theme_options_page() {
 
if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
 
//get variables outside scope
global $color_scheme;
?>
<div> 
<form method="post" action="options.php">
<h2>Theme Options</h2>
<?php settings_fields( 'theme_settings' ); ?>
<?php $options = get_option( 'theme_settings' ); ?>
<table>
<tr valign="top">
<th scope="row"><?php _e( 'Leaderboard Ad' ); ?></th>
<td><label for="theme_settings[leadad728]"><?php _e( 'Enter your advertisement code' ); ?></label>
<br />
<textarea id="theme_settings[leadad728]" name="theme_settings[leadad728]" rows="5" cols="36"><?php esc_attr_e( $options['leadad728'] ); ?></textarea></td>
</tr>
<tr valign="top">
<th scope="row"><?php _e( 'Tracking Code' ); ?></th>
<td><label for="theme_settings[tracking]"><?php _e( 'Enter your analytics tracking code' ); ?></label>
<br />
<textarea id="theme_settings[tracking]" name="theme_settings[tracking]" rows="5" cols="36"><?php esc_attr_e( $options['tracking'] ); ?></textarea></td>
</tr>
<tr valign="top">
<th scope="row"><?php _e( 'Custom Logo' ); ?></th>
<td><input id="theme_settings[custom_logo]" type="text" size="36" name="theme_settings[custom_logo]" value="<?php esc_attr_e( $options['custom_logo'] ); ?>" />
<label for="theme_settings[custom_logo]"><?php _e( 'Enter the URL to your custom logo' ); ?></label></td>
</tr>
<tr valign="top">
<th scope="row"><?php _e( 'Twitter URL' ); ?></th>
<td><input id="theme_settings[twitterurl]" type="text" size="36" name="theme_settings[twitterurl]" value="<?php esc_attr_e ($options['twitterurl'] ); ?>" />
<label for="theme_settings[twitterurl]"><?php _e( 'Enter Twitter URL' ); ?></label> </td>
</tr>
</table>
<p><input name="submit" id="submit" value="Save Changes" type="submit"></p>
</form>
 
</div><!-- END wrap -->
 
<?php
}





===============================

// custom metabox



/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function offer_add_meta_box() {

    $screen = 'offers';

        add_meta_box(
            'offer_meta',//section id
            __( 'Offer Details' ),//section heading
            'offer_meta_box_callback',// call callback function
            $screen//post or page to show
        );//end of add meta box function
}
add_action( 'add_meta_boxes', 'offer_add_meta_box' );//adding to action meta box

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function offer_meta_box_callback( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'offer_meta_box', 'offer_meta_box_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $value = get_post_meta( $post->ID, '_my_meta_value_key', true );

    echo '<label for="offer_details">';
    _e( 'Offer Details' );
    echo '</label> ';
    echo '<textarea id="offer_details" name="offer_details" value="' . esc_attr( $value ) . '" size="25"></textarea>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function offer_save_meta_box_data( $post_id ) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['offer_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['offer_meta_box_nonce'], '_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'offers' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        } 
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( ! isset( $_POST['offer_details'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['offer_details'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_my_meta_value_key', $my_data );
}
add_action( 'save_post', 'offer_save_meta_box_data' );




// working metabox code

// slider button metabox

function slider_button_metabox_one(){
	add_meta_box(
		'slider_bt_one',
		'Slider First Button Metabox',
		'slider_btn_one_call_back',
		'slider',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'slider_button_metabox_one');


// slider first button call back function

function slider_btn_one_call_back(){ ?>
	<p>
		<label>Slider First Button Title</label>
		<input class="widefat" type="text" name="first_btn_title" value="<?php echo get_post_meta(get_the_ID(), 'first_btn_title', true); ?>">
	</p>
<?php }

// slider button first value save

function slider_btn_first_value_save(){
	update_post_meta(get_the_ID(), 'first_btn_title', $_POST['first_btn_title']);
}
add_action('save_post', 'slider_btn_first_value_save');



