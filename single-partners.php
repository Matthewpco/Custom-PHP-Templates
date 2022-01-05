<?php
 /*
 * Template Name: ACF Partners
 * Custom template used for custom php code display with partners
 * @package   Divi custom child theme
 * @author    Matthew Payne
 * @copyright Copyright Artesianbuilds.com
 * @link      http://www.Artesianbuilds.com
 */
?>

<?php get_header(); ?>

<?php

$name = get_field('name');
$bio = get_field('bio');
$facebook_link = get_field('facebook_link');
$twitter_link = get_field('twitter_link');
$instagram_link = get_field('instagram_link');
$youtube_link = get_field('youtube_link');
$twitch_name = get_field('twitch_name');
$pc_image = get_field('pc_image');
$partner_build_link = get_field('partner_build_link');
$inspired_build_link = get_field('inspired_build_link');
$merch_link = get_field('merch_link');

?>

<main class="acf-container">

	<section class="two-thirds-container">

		<h1><?php echo $name; ?></h1>
		<p>
			<?php echo $bio; ?>
		</p>
		<?php
		if ($twitch_name != ''){
			echo 
				'<div id="twitch-embed"></div>
				<script src="https://player.twitch.tv/js/embed/v1.js"></script>
				
				<script type="text/javascript">
				  new Twitch.Player("twitch-embed", {
					width: 940,
					height: 530,
					muted: "true",
					theme: "Light",
					allowfullscreen: "false",
					channel: "'. $twitch_name .'"
				  });
			</script>';
		}
		?>

	</section>
	
	<section class="one-third-container">
	
		<div class="social-container">
			
		<?php
			if($facebook_link)
			{
				echo '<a href="' . $facebook_link . '"><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/facebook_logo.png"></a>';
			}else{
				echo '<a><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/facebook_logo_grey.png"></a>';
			}

			if($twitter_link)
			{
				echo '<a href="' . $twitter_link . '"><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/twitter_logo.png"></a>';
			}else{
				echo '<a><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/twitter_logo_grey.png"></a>';
			}

			if($instagram_link)
			{
				echo '<a href="' . $instagram_link . '"><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/instagram_logo.png"></a>';
			}else{
				echo '<a><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/instagram_logo_grey.png"></a>';
			}

			if($youtube_link)
			{
				echo '<a href="' . $youtube_link . '"><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/youtube_logo.png"></a>';
			}else{
				echo '<a><img src="https://artesianbuilds.com/wp-content/uploads/2021/09/youtube_logo_grey.png"></a>';
			}
		?>
			
		</div>
		
		
		<div class="pcimage-container">
			<image src="<?php echo $pc_image; ?>"/>
		</div>
		
		
		
		<div class="link-container">
			
		<?php
			if( $partner_build_link != '')
			{
				echo '<a href="' . $partner_build_link . '" class="custom-partner-button">View Partner Build</a>';
			} 
			if( $inspired_build_link != '')
			{
				echo '<a href="' . $inspired_build_link . '" class="custom-partner-button">View Inspired Build</a>';
			} 
			if( $merch_link != '')
			{
				echo '<a href="' . $merch_link . '" class="custom-partner-button">View Partner Merch</a>';
			} 
		?>
			
		</div>	
	</section>
</main>
<?php get_footer(); ?>