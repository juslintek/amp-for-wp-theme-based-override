<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>

   
<body <?php ampforwp_body_class('single-post design_1_wrapper');?>>
	<?php do_action('ampforwp_body_beginning', $this); ?>
	<?php $this->load_parts( array( 'header-bar' ) ); ?>
	<?php do_action( 'below_the_header_design_1', $this ); ?>

	<article class="amp-wp-article">
		<?php do_action('ampforwp_post_before_design_elements') ?>
		<?php $this->load_parts( apply_filters( 'ampforwp_design_elements', array( 'empty-filter' ) ) ); ?>

		<?php do_action('ampforwp_post_after_design_elements') ?>
	</article>

	<?php do_action( 'amp_post_template_above_footer', $this ); ?>
	<?php $this->load_parts( array( 'footer' ) ); ?>
	<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>

