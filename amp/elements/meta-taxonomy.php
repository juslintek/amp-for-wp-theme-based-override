<?php global $redux_builder_amp;
if ( array_key_exists( 'amp-author-description', $redux_builder_amp ) && is_single() ) {
	if ( $redux_builder_amp['amp-author-description'] ) { ?>
        <div class="amp-wp-content amp_author_area ampforwp-meta-taxonomy">
            <div class="amp_author_area_wrapper">
				<?php $post_author = $this->get( 'post_author' );
				if ( $post_author ) {
					//If Avatar is set up in WP user avatar: grab it
					$author_avatar_url = ampforwp_get_wp_user_avatar();
					//Else : Get the Gravatar
					if ( $author_avatar_url == null ) {
						$author_avatar_url = get_avatar_url( $post_author->user_email, array( 'size' => 100 ) );
					}
					if ( $author_avatar_url ) { ?>
                        <amp-img src="<?php echo $author_avatar_url; ?>" width="100" height="100"
                                 layout="fixed"></amp-img>
						<?php
					}

					echo str_replace( ':', '', ampforwp_get_author_details( $post_author, 'meta-taxonomy' ) );
					echo '<p>' . $post_author->description . '</p>';
				} ?>
            </div>
        </div> <?php
	}
}

do_action( 'ampforwp_before_meta_taxonomy_hook', $this );
