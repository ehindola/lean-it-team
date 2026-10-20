<?php
/**
 * Title: Logo (light, for dark backgrounds)
 * Slug: lean-it/logo-light
 * Inserter: no
 */
$lean_logo = get_theme_file_uri( 'assets/images/logo-light' );
?>
<!-- wp:html -->
<a class="pgx-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="pgxtudio home">
	<picture>
		<source srcset="<?php echo esc_url( $lean_logo . '.webp' ); ?>" type="image/webp">
		<img src="<?php echo esc_url( $lean_logo . '.png' ); ?>" width="185" height="30" alt="pgxtudio" loading="lazy">
	</picture>
</a>
<!-- /wp:html -->
