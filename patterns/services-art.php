<?php
/**
 * Title: Services hero art (wordmark + cabinet)
 * Slug: lean-it/services-art
 * Inserter: no
 */
$lean_img = get_theme_file_uri( 'assets/images/' );
?>
<!-- wp:html -->
<div class="pgx-svc-art">
	<h1 class="pgx-svc-wordmark"><img src="<?php echo esc_url( $lean_img . 'services-wordmark.svg' ); ?>" width="1000" height="70" alt="Services"></h1>
	<img class="pgx-svc-cabinet" src="<?php echo esc_url( $lean_img . 'services-cabinet.svg' ); ?>" width="420" height="470" alt="" fetchpriority="high">
</div>
<!-- /wp:html -->
