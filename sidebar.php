<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?>



		<div id="secondary" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>


				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'toolbox' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						<?php the_post_thumbnail( 'sm-post-thumbnail' ); ?>
					</ul>
					
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'toolbox' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>



			<?php endif; // end sidebar widget area ?>
			
			
			<aside id="meta" class="widget">
				<h1 class="widget-title">Foo</h1>
				<ul>
				
					<?php
						$recent_posts = wp_get_recent_posts();
						foreach( $recent_posts as $recent ){
							// echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
							// echo $recent["ID"]. "<br/>";
							
							if (has_post_thumbnail( $recent["ID"] ) ):
								
								// $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'single-post-thumbnail' );	
								// // 
								// echo '<img src="' . $image[0] . '" />';
								
								// echo the_post_thumbnail( array(100,100) );
								echo '<a href="' . get_permalink( $recent["ID"] ) .'">' . get_the_title( $recent["ID"] ) . '</a>';
								echo get_the_post_thumbnail( $recent["ID"], 'sm-post-thumb' ) . '<br/>';
								
							endif;
						}
					?>
				
				
				</ul>
			</aside>
			
			
		</div><!-- #secondary .widget-area -->

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="widget-area" role="complementary">
			
	
		
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>
		
		
		