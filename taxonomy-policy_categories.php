<?php

/** Template Name: Policy Categories View
 * The template to display policy categories
 */

$keyword = get_query_var( 'policy_categories' );
$keyword_term = get_term_by( 'slug', $keyword, 'policy_categories' );
$keyword_title = ucwords($keyword_term->name);

//Make ascending by title
global $query_string;
query_posts( $query_string . '&orderby=title&order=ASC' );


get_header(); ?>
<div class="row" id="subnav-wrap">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="section-content page-title-section">
					<a class="dept-title-small" href="<?php echo site_url('/policies/alphabetical/'); ?>">Policies</a>
					<h1 class="prog-title"><?php echo $keyword_title; ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="main-section" class = "main">
	<div class="container" id="wrap">
		<div class="row">
			<div class="section-content">
				<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 left-sidebar ">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inner-item clearfix noborder">
						<span class="section-title"><span><h2>Categories</h2></span></span>
						<?php
						$terms = get_terms('policy_categories');
						if ( !empty( $terms ) && !is_wp_error( $terms ) ) : ?>
							<section id="policy-cats">
							<?php foreach ($terms as $term) : ?>
								<a href="<?php echo get_term_link( $term ); ?>" title="View all policies filed under <?php echo $term->name; ?>">
									<button type="button" class="btn btn-primary btn-sm">
										<?php echo $term->name; ?>
									</button>
								</a>
							<?php endforeach;?>
							</section>
						<?php endif; ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inner-item clearfix noborder">
						<span class="section-title"><span><h2>Keywords</h2></span></span>
						<?php
						$terms = get_terms('policy_tags');
						if ( !empty( $terms ) && !is_wp_error( $terms ) ) : ?>
							<section id="policy-tags">
							<?php foreach ($terms as $term) : ?>
								<a href="<?php echo get_term_link( $term ); ?>" title="View all policies filed under <?php echo $term->name; ?>">
									<button type="button" class="btn btn-success btn-sm">
										<?php echo $term->name; ?>
									</button>
								</a>
							<?php endforeach;?>
							</section>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
				
					<h2 class="policy-page-title"> Policies by Category: <span class="tax-name"><?php echo $keyword_title; ?></span></h2>
				
					<?php if(have_posts()): while (have_posts()) : the_post(); ?>
					
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inner-item clearfix">
							<a class="csun-subhead" href="<?php the_permalink(); ?>"><h3 class="csun-subhead"><?php the_title(); ?></h3></a>
							<p><?php the_excerpt(); ?></p>
							<a title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="read-more" href="<?php the_permalink(); ?>">[ View Policy ]</a>
						</div>

					<?php endwhile; else: ?>

						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

					<?php endif; ?>
				
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>