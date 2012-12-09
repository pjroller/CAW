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
				
				<ul>
				
				<p class="sidebar">	<?php
						$recent_posts = wp_get_recent_posts();
						foreach( $recent_posts as $recent ){


							if (has_post_thumbnail( $recent["ID"] ) ):


								echo '<a href="' . get_permalink( $recent["ID"] ) .'">' . get_the_post_thumbnail( $recent["ID"], 'sm-post-thumb' ) . '</a>'; 

								echo '<a href="' . get_permalink( $recent["ID"] ) .'">' . get_the_title( $recent["ID"] ) . '</a>'; '<br/>';


							endif;
						}
					?>

				</p>
				
				
				</ul>
			</aside>
			
			
		</div><!-- #secondary .widget-area -->

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="widget-area" role="complementary">
			
	
		
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>
		
		
		