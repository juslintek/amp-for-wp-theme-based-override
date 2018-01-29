<?php do_action( 'ampforwp_before_meta_info_hook', $this ); ?>
<?php global $redux_builder_amp; ?>
    <div class="amp-wp-article-header ampforwp-meta-info <?php if ( is_page() && ! $redux_builder_amp['meta_page'] ) { ?> hide-meta-info <?php } ?>">

        <div class="amp-wp-meta amp-wp-posted-on">
            <a href="<?php echo ampforwp_url_controller( get_the_permalink() ) ?>" title="<?php the_title() ?>" rel="bookmark">
                <time datetime="<?php echo esc_attr( date( 'c', $this->get( 'post_publish_timestamp' ) ) ); ?>">
					<?php if ( is_single() || ( is_page() && $redux_builder_amp['meta_page'] ) ) {
						global $redux_builder_amp;
						$date = get_the_date( get_option( 'date_format' ) );
						if ( 2 == $redux_builder_amp['ampforwp-post-date-global'] ) {
							$date = get_the_modified_date( get_option( 'date_format' ) ) . ', ' . get_the_modified_time();
						}
						echo apply_filters( 'ampforwp_modify_post_date',
							ampforwp_translation( $redux_builder_amp['amp-translator-on-text'] . ' ', 'On' ) . $date );
					} ?>
                </time>
            </a>
        </div>

		<?php $post_author = $this->get( 'post_author' ); ?>
		<?php if ( $post_author ) : ?>
            <div class="amp-wp-meta amp-wp-byline">
				<?php
				$author_image = get_avatar_url( $post_author->user_email, array( 'size' => 24 ) );
				if ( function_exists( 'get_avatar_url' ) && ( $author_image ) ) {
					if ( is_single() ) { ?>
                        <amp-img src="<?php echo esc_url( $author_image ); ?>" width="24" height="24"
                                 layout="fixed"></amp-img>
						<?php
						echo ampforwp_get_author_details( $post_author, 'meta-info' );
					}
					if ( is_page() && $redux_builder_amp['meta_page'] ) { ?>
                        <amp-img src="<?php echo esc_url( $author_image ); ?>" width="24" height="24"
                                 layout="fixed"></amp-img>
						<?php
						echo ampforwp_get_author_details( $post_author, 'meta-info' );
					}
				} ?>
            </div>
		<?php endif; ?>

	    <?php if( isset($redux_builder_amp['ampforwp-tags-single']) && $redux_builder_amp['ampforwp-tags-single']) { ?>
            <div class="amp-wp-content amp-wp-article-tags amp-wp-article-category ampforwp-meta-taxonomy ">
			    <?php
			    $ampforwp_tags=  get_the_terms( $this->ID, 'post_tag' );
			    if ( $ampforwp_tags && ! is_wp_error( $ampforwp_tags ) ) :?>
				    <?php do_action('ampforwp_before_meta_taxonomy_hook',$this); ?>
                    <div class="amp-wp-meta amp-wp-content ampforwp-tax-tag">
					    <?php
                        $tags = [];
                        foreach ($ampforwp_tags as $tag) {
						    if( isset($redux_builder_amp['ampforwp-archive-support']) && $redux_builder_amp['ampforwp-archive-support'] && isset($redux_builder_amp['ampforwp-cats-tags-links-single']) && $redux_builder_amp['ampforwp-cats-tags-links-single'] ) {
							    $tags[] = ('<span class="amp-tag-'.$tag->term_id.'"><a href="'. ampforwp_url_controller( get_tag_link( $tag->term_id ) ) .'" >'. $tag->name  .'</a></span>');//#934
						    }
						    else {
							    $tags[] = '<span>'. $tag->name .'</span>';
						    }
					    }

					    echo implode(', ', $tags);

					    ?>
                    </div>
			    <?php endif;?>
            </div> <?php } ?>

    </div>
<?php do_action( 'ampforwp_after_meta_info_hook', $this );