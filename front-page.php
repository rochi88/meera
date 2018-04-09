<?php
/*
Front page
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section id="who">
				<div class="indent clear">
				<?php 
				$query = new WP_Query( 'pagename=who' );
				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						echo '<h2 class="section-title">' . get_the_title() . '</h2>';
						echo '<div class="entry-content">';
						the_content();
						echo '</div>';
					}
				}
				
				/* Restore original Post Data */
				wp_reset_postdata();
				?>
				</div><!-- .indent -->
			</section><!-- who -->
			
			<section id="what">
				<div class="indent clear"><?php 
					$query = new WP_query('pagename=what-i-do');
					$what_id = $query->queried_object->ID;
					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<h2 class="section-title">';
							the_title();
							echo '</h2>';
							echo '<div class="entry-content">';
							the_content();
							echo '</div>';
						}// while
					} // if
					
					wp_reset_postdata();

					/* Get the children of the What I Do page */
					$args = array(
						'post_type' => 'page',
						'post_parent' => $what_id
						);
					$what_query = new WP_query($args);

					// The Loop
					if ($what_query->have_posts()) {
						echo '<ul class="what-list">';
						while ( $what_query->have_posts()){
							$what_query->the_post();
							echo '<li class="clear">';
							echo '<a href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
							echo '<h3 class="what-title" id="' . $post->post_name . '">' . get_the_title() . '</h3>';
							echo '</a>';
							echo '<div class="what-lede">';
							the_content('Read more <i class="fa fa-angle-double-right"></i>');
							echo '</div>';
							echo '</li>';
						}
						echo '</ul>';
					}

					wp_reset_postdata();
					?>
				</div><!-- indent -->
			</section><!-- what -->



			<section id="portfolio">
				<div class="indent clear">
				<h2 class="section-title">WORK // PORTFOLIO</h2>
					<div class="portfolio_nav">
						<a class="websites">WEB</a> / 
						<a class="print">PRINT</a> 
					<!-- 	<a class="identity">Identity</a> -->
					</div>
				
					<div id="showcases">
						<?php
						get_template_part('portfolio');
						?>
					</div><!-- showcases -->
					
				</div><!-- indent -->
			</section><!-- portfolio -->



			<section id="resume">
			Like what you see?
				<a href="#">View my CV</a>
			</section>

			<section id="why">
				<div class="indent clear">
					<h2 class="section-title">Why // Hire Me</h2>
					<ul class="why-list">
						<li>
							<i class="fa fa-bolt"></i>
							<h3 class="quality-title">Creative Vision</h3>
							I think, see, and speak with visual fleuncy, helping to imagine new perspectives and aesthetics. Basically, I dream big.
						</li>
						<li>
							<i class="fa fa-fire-extinguisher"></i>
							<h3 class="quality-title">Problem-Solving Skills</h3>
							Although programming has made me more pragmatic, I've always had a knack for trouble-shooting and conflict resolution.
						</li>
						<li>
							<i class="fa fa-tachometer"></i>
							<h3 class="quality-title">Inner Drive</h3>
							I am an autodidact, relentlessly pursuing old knowledge and new concepts. I am a passionate and dedicated person.
						</li>
						<li>
							<i class="fa fa-sliders"></i>
							<h3 class="quality-title">Self-Moderation</h3>
							My passions I temper with mindful practices, both mental and physical in nature. I meditate and exercise regularly.
						</li>
						<li>
							<i class="fa fa-hand-peace-o"></i>
							<h3 class="quality-title">Universal Friendliness</h3>
							With mindfulness comes compassion and respect for all others. I love meeting and connecting with new people, everyday.
						</li>
						<li>
							<i class="fa fa-diamond"></i>
							<h3 class="quality-title">Professional Class</h3>
							I always conduct myself with courtesy and civility when necessary. On the other hand, I know when it's okay to let my hair down.
						</li>
					</ul>
				</div>
			</section><!-- qualities -->

			<section id="contact">
				<div class="indent clear"><?php 
					$query = new WP_query('pagename=contact'); 
					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<h2 class="section-title">' . get_the_title() . '</h2>';
							the_content();
						}// while
					} // if
					
					wp_reset_postdata();
					?></div>
			</section><!-- contact -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>