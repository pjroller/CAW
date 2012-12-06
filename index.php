<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php toolbox_content_nav( 'nav-above' ); ?>

		
		
		
			
			
			
				<?php
					//The Query
					$my_slider_param = array (
						'cat' => '5',
						'posts_count' => '5',
					);
				$the_query = new WP_Query( $my_slider_param );

				//The Loop
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
					<a href="<?php $my_slider_url = get_post_custom_values('url');
						echo $my_slider_url[0];?>" title=" <?php the_title(); ?>"><?php the_post_thumbnail('slider'); ?></a>
						<?php
						endwhile; endif;

						// Reset Post Data
						wp_reset_postdata();
						?>
			
				
			
			
			
			
			
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

<!-- adding post-thumb below -pr -->
<?php the_post_thumbnail( 'post-thumb' ); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

<!-- adding post-thumb below -pr -->
<?php if( !get_the_post_thumbnail() ) the_excerpt(); ?>


				<?php endwhile; ?>

				<?php toolbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'toolbox' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toolbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

						
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>