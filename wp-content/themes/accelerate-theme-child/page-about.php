<?php
/**
 * Template: Custom About Page - yeah!
 *
 * This page will override the generic page.php 
 * for the About Page
 * 
 * It pulls in several fields defined in the Advanced Custom Fields Plug-in
 *
 */

get_header(); ?>

	<?php
		//$services_intro_title = get_field('services_intro_title');
		$services_intro_title  = get_post_meta($post->ID, "services_intro_title", true);
		//$services_intro_text = get_field('services_intro_text');
		$services_intro_text  = get_post_meta($post->ID, "services_intro_text", true);
		//$service_1_title = get_field('service_1_title');
		$service_1_title  = get_post_meta($post->ID, "service_1_title", true);
		//$service_1_description = get_field('service_1_desc');
		$service_1_description  = get_post_meta($post->ID, "service_1_desc", true);
		//$service_1_image = get_field('service_1_image');
		$service_1_image  = get_post_meta($post->ID, "service_1_image", true);
		//$service_2_title = get_field('service_2_title');
		$service_2_title  = get_post_meta($post->ID, "service_2_title", true);
		//$service_2_description = get_field('service_2_desc');
		$service_2_description  = get_post_meta($post->ID, "service_2_desc", true);
		//$service_2_image = get_field('service_2_image');
		$service_2_image  = get_post_meta($post->ID, "service_2_image", true);
		//$service_3_title = get_field('service_3_title');
		$service_3_title  = get_post_meta($post->ID, "service_3_title", true);
		//$service_3_description = get_field('service_3_desc');
		$service_3_description  = get_post_meta($post->ID, "service_3_desc", true);
		//$service_3_image = get_field('service_3_image');
		$service_3_image  = get_post_meta($post->ID, "service_3_image", true);
		//$service_4_title = get_field('service_4_title');
		$service_4_title  = get_post_meta($post->ID, "service_4_title", true);
		//$service_4_description = get_field('service_4_desc');
		$service_4_description  = get_post_meta($post->ID, "service_4_desc", true);
		//$service_4_image = get_field('service_4_image');
		$service_4_image  = get_post_meta($post->ID, "service_4_image", true);
		//$about_contact_title = get_field('about_contact_title');
		$about_contact_title  = get_post_meta($post->ID, "about_contact_title", true);
		//$contact_button_text = get_field('contact_button_text');
		$contact_button_text  = get_post_meta($post->ID, "contact_button_text", true);
		$size = "small";
	?>
	<section class="hero-about">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="hero-text">
				<h3><?php the_content(); ?></h3>
			</div>
			<?php endwhile; // end of the loop. ?>
	</section>

	<div class="site-content">

		<section class="about-intro">
			<h5><?php echo $services_intro_title; ?></h5>
			<?php echo $services_intro_text; ?>
		</section>

		<section class="about-section">
			<div class="service-image align-left">
				<?php echo wp_get_attachment_image( $service_1_image, $size ); ?>
			</div>
			<div class="service-description">
					<h2><?php echo $service_1_title; ?></h2>
					<p><?php echo $service_1_description; ?></2>
			</div>
		</section>

		<section class="about-section">
			<div class="service-description">
					<h2><?php echo $service_2_title; ?></h2>
					<p><?php echo $service_2_description; ?></p>
			</div>
			<div class="service-image align-right">
				<?php echo wp_get_attachment_image( $service_2_image, $size ); ?>
			</div>
		</section>

		<section class="about-section">
			<div class="service-image align-left">
				<?php echo wp_get_attachment_image( $service_3_image, $size ); ?>
			</div>
			<div class="service-description">
					<h2><?php echo $service_3_title; ?></h2>
					<p><?php echo $service_3_description; ?></p>
			</div>
		</section>

		<section class="about-section">
			<div class="service-description">
				<h2><?php echo $service_4_title; ?></h2>
				<p><?php echo $service_4_description; ?></p>
			</div>
			<div class="service-image align-right">
				<?php echo wp_get_attachment_image( $service_4_image, $size ); ?>
			</div>
		</section>

		<section class="about-contact">
			<div class="contact-description">
				<h4><?php echo $about_contact_title; ?></h4>
			</div>
			<div class="contact-button">	
				<a class="button" href="<?php echo esc_url( home_url() ); ?>/contact"><?php echo $contact_button_text; ?></a>
			</div>
		</section>
	</div>

<?php get_footer(); ?>