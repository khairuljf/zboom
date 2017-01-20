<?php get_header();?>
<?php
/*
Template Name: Home
   */

?>

<div class="featured">
	<div class="wrap-featured zerogrid">
		<div class="slider">
			<div class="rslides_container">

			<?php
				$sliderstore = new WP_Query(array(
					'post_type'=>'zbooms',
					'posts_per_page'=>5,
				));
			 ?>

			
				<ul class="rslides" id="slider">
					<?php while($sliderstore->have_posts()) : $sliderstore->the_post(); ?>
						<li> <?php the_post_thumbnail();  ?> </li>
					<?php  endwhile; ?>
				</ul>
			


			</div>
		</div>
	</div>
</div>


<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block01">
                    
                    
                    <?php 
                        $blockstore = new WP_Query(array(
                            'post_type' => 'block',
                            'posts_per_page' => 3,
                        ));
                    ?>
                    
                    <?php while($blockstore->have_posts()) : $blockstore->the_post()?>
			<div class="col-1-3">
				<div class="wrap-col box">
					<h2><?php the_title();?></h2>
					<p><?php readmore(15);?></p>
					<div class="more"><a href="<?php the_permalink(); ?>">[...]</a></div>
				</div>
			</div>
                    <?php endwhile; ?>
                    
                    
		</div>
		<div class="row block02">
			<div class="col-2-3">
				<div class="wrap-col">
					<div class="heading"><h2>Latest Blog</h2></div>
					<?php 
                                        
                                        $homepstore =new WP_Query(array(
                                            'post_type' => 'post',
                                        ));
                                        
                                        ?>
                                        
                                        <?php while($homepstore->have_posts()) : $homepstore->the_post(); ?>
                                            <article class="row">
                                                    <div class="col-1-3">
                                                            <div class="wrap-col">
                                                                <?php the_post_thumbnail(); ?>
                                                            </div>
                                                    </div>
                                                    <div class="col-2-3">
                                                            <div class="wrap-col">
                                                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                                    <div class="info">By <?php the_author(); ?> on <?php the_time('F m - Y'); ?>  with <?php comments_popup_link('No Comment','1 Comments','% Comments','','') ?></div>
                                                                    <p><?php the_content(); ?></p>
                                                            </div>
                                                    </div>
                                            </article>
                                        <?php endwhile; ?>
					
				</div>
			</div>

			<div class="col-1-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>