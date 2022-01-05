<?php
 /*
 * Template Name: ACF Partners Landing
 * Custom template used for custom php code display with partners
 * @package   Divi custom child theme
 * @author    Matthew Payne
 * @copyright Copyright Artesianbuilds.com
 * @link      http://www.Artesianbuilds.com
 */
?>


<?php get_header(); ?>

<?php

$other_partner_list_args = [
	'post_type' => 'partners',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key' => 'featured',
			'value' => '',
			'compare' => 'NOT EXISTS',
		),
		array(
			'key' => 'featured',
			'value' => '1',
			'compare' => '!=',
		)
	)
];

$featured_partner_list_args = [
	'post_type' => 'partners',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'meta_query' => array(array(
		'key' => 'featured',
		'value' => '1',
		'compare' => '=',
	))
];

$featured_partner_list = new WP_Query($featured_partner_list_args);
$other_partner_list = new WP_Query($other_partner_list_args);
?>

<main class="archive-container">
	<header class="text-container">
		<h1>
			Check Out Our Partners
		</h1>
			
		<p>
			All builds completed on <a href="https://twitch.tv/artesianbuilds" target="_blank" style="color: #cc99ff">twitch.tv/artesianbuilds</a>. Come watch us building all our partners’ and our communities’ builds live.  See a list of our partners along with some of their fantastic builds!</p>
		<a href="https://www.twitch.tv/artesianbuilds" class="custom-partner-button">View Our Twitch</a>
		</header>
	<section class="featured-partners">
		
		
		<?php
		if ($featured_partner_list->have_posts()) {
    		while ($featured_partner_list->have_posts()) {
        		
				$featured_partner_list->the_post();
				
        		$name = get_field('name');
				$banner_image = get_field('banner_image');
				if (!$banner_image){
					$banner_image = artesian_default_partner_banner();
				}
				$page_link = get_field('link');
				if (!$page_link){
					$page_link = get_permalink();
				} 
				
				echo artesian_create_partner_button_html($name, $banner_image, $page_link, true);
			}
		}
		?>
		
	</section>
	<br>
	<header class="text-container">
			<h2>All Partners</h2>
		</header>
	<section class="all-partners">
		
		<?php
		if ($other_partner_list->have_posts()) {
    		while ($other_partner_list->have_posts()) {
        		
				$other_partner_list->the_post();
				
        		$name = get_field('name');
				$banner_image = get_field('banner_image');
				if (!$banner_image){
					$banner_image = artesian_default_partner_banner();
				}
				$page_link = get_field('link');
				if (!$page_link){
					$page_link = get_permalink();
				}
				
				echo artesian_create_partner_button_html($name, $banner_image, $page_link, false);
			}
		}
		?>
		
	</section>	
</main>

<?php get_footer(); ?>

<?php
function artesian_create_partner_button_html($name, $banner_image, $page_link, $is_featured)
{
	$style = "
		background: url(" . $banner_image . ");
		background-position: center;
		background-size: cover;
	";
	
	$class = $is_featured ? "landing-page-featured-button" : "landing-page-partner-button";
	
	return '<a href="' . $page_link . '" style="' . $style . '" class="' . $class . '">' . $name . '</a>';
}

function artesian_default_partner_banner()
{
	return 'https://ahsjd123.wpengine.com/wp-content/uploads/2021/08/Screenshot-2021-08-15-162513.png';
}