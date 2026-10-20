<?php
/**
 * Title: Logo
 * Slug: lean-it/logo
 * Inserter: no
 */
$lean_logo = get_theme_file_uri( 'assets/images/logo' );
?>
<!-- wp:html -->
<a class="pgx-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="pgxtudio home">
	<picture>
		<source srcset="<?php echo esc_url( $lean_logo . '.webp' ); ?>" type="image/webp">
		<img src="<?php echo esc_url( $lean_logo . '.png' ); ?>" width="185" height="30" alt="pgxtudio">
	</picture>
</a>
<!-- /wp:html -->
