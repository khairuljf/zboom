<?php

	function hello('atts',''){
		echo hello;


	}
	add_shortcode('say','hello');







	function bartag_func( $atts ) {

    $a = shortcode_atts( array(), $atts );

    return "foo = {$a['foo']}";
}
add_shortcode( 'bartag', 'bartag_func' );





 ?>