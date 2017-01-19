<?php

function zboom(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnail');
    add_theme_support('custom-background');
    load_theme_textdomain('boom',get_template_directory_uri().'/language');
   
  
};

add_action('after_theme_setup','zboom');


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
    'supports'=> array('thumbnail','editor','author')
    
));
        
register_post_type('block',array(
    'labels' => array(
        'name' => ' block'
        
    ),
    'public' => true,
    'supports' => array( 'editor','title','thumbnail' ),
))
?>

