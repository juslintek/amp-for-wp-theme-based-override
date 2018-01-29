<?php
/**
 * Created by PhpStorm.
 * User: Juslintek
 * Date: 2018-01-25
 * Time: 00:48
 */

add_filter( 'ampforwp_modify_the_content', function ( $ampforwp_the_content ) {
	if ( is_single() && ( get_post_type() == 'post' || get_post_type() == 'questions' ) ) {
		$document      = new DiDom\Document( $ampforwp_the_content, false );
		$childElements = $document->find( 'p' );
		$maxElements   = $document->count( 'p' ) - 1;
		if ( $maxElements > 3 ) {
			$randomPosition = rand( 3, $maxElements - 2 );
		} else {
			$randomPosition = rand( 0, $maxElements );
		}

		ob_start();
		?>

		<?php if ( get_post_type() !== 'questions' ) { ?>
            <amp-ad type="adsense"
                    layout="responsive"
                    format="fluid"
                    height=100
                    width=300
                    data-ad-client="ca-pub-2404521673534795"
                    data-ad-slot="1889815335">
                <div placeholder>Loading...</div>
            </amp-ad>
		<?php } ?>
		<?php
		$in_article = ob_get_clean();

		$wrapper = new \DiDom\Element( 'div' );
		$wrapper->setInnerHtml( $in_article );
		if ( isset( $childElements[ $randomPosition ] ) && ! is_null( $childElements[ $randomPosition ] ) ) {
			$childElements[ $randomPosition ]->insertAfter( $wrapper );
		}
		if ( $document->has( '.adsbygoogle' ) ) {
			$ampforwp_the_content = $document->html();
		}
	}

	return $ampforwp_the_content;
}, 50 );

//add_action( 'ampforwp_after_post_content', function ( $amp_post_template ) {
/**
 * @var AMP_Post_Template $amp_post_template
 */

/*?>
<amp-ad
		layout="responsive"
		width=300
		height=400
		type="adsense"
		data-ad-client="ca-pub-2404521673534795"
		data-ad-slot="8429380947">
	<div placeholder>Loading...</div>
</amp-ad>
<?php*/
//}, 150 );


add_filter('amp_post_template_dir', function($current_dir) {
    return get_stylesheet_directory() . '/amp';
},30);


add_action( 'wp_loaded', function () {

	// 2. Custom Design Override

	// Add Homepage AMP file code

	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		// Custom Homepage and Archive file

		global $redux_builder_amp;
		$slug                  = array();
		$current_url_in_pieces = array();

		$ampforwp_custom_post_page = ampforwp_custom_post_page();

		// Homepage and FrontPage
		if ( is_home() ) {
			if ( 'single' === $type ) {

				$file = get_stylesheet_directory() . '/amp/index.php';
				if ( ! file_exists( $file ) ) {
					$file = AMPFORWP_PLUGIN_DIR . '/templates/design-manager/design-' . ampforwp_design_selector() . '/index.php';
				}

				if ( $redux_builder_amp['amp-frontpage-select-option'] == 1 ) {
					$file = get_stylesheet_directory() . '/amp/frontpage.php';
					if ( ! file_exists( $file ) ) {
						$file = AMPFORWP_PLUGIN_DIR . '/templates/design-manager/design-' . ampforwp_design_selector() . '/frontpage.php';
					}
				}


				if ( $ampforwp_custom_post_page == "page" && ampforwp_name_blog_page() ) {
					$current_url           = home_url( $GLOBALS['wp']->request );
					$current_url_in_pieces = explode( '/', $current_url );

					if ( in_array( ampforwp_name_blog_page(), $current_url_in_pieces ) ) {
						$file = get_stylesheet_directory() . '/amp/index.php';
						if ( ! file_exists( $file ) ) {
							$file = AMPFORWP_PLUGIN_DIR . '/templates/design-manager/design-' . ampforwp_design_selector() . '/index.php';
						}
					}
				}
			}
		}


		// Archive Pages
		/*if ( is_archive() && $redux_builder_amp['ampforwp-archive-support'] ) {
			$file = get_stylesheet_directory() . '/amp/archive.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . '/templates/design-manager/design-' . ampforwp_design_selector() . '/archive.php';
			}
		}*/


		// Search pages
		if ( is_search() &&
		     ( $redux_builder_amp['amp-design-1-search-feature'] ||
		       $redux_builder_amp['amp-design-2-search-feature'] ||
		       $redux_builder_amp['amp-design-3-search-feature'] )
		) {
			$file = get_stylesheet_directory() . '/amp/search.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . '/templates/design-manager/design-' . ampforwp_design_selector() . '/search.php';
			}
		}


		// Custom Single file
		if ( is_single() || is_page() ) {

			if ( 'single' === $type ) {
				$file = get_stylesheet_directory() . '/amp/single.php';
				if ( ! file_exists($file)) {
				$file = AMPFORWP_PLUGIN_DIR . '/templates/design-manager/design-' . ampforwp_design_selector() . '/single.php';
				}
			}
		}

		return $file;
	}, 15, 3 );

	// 4. Custom Header files override
	remove_filter( 'amp_post_template_file', 'ampforwp_custom_header', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'header-bar' === $type ) {
			$file = get_stylesheet_directory() . '/amp/header-bar.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . '/templates/design-manager/design-' . ampforwp_design_selector() . '/header-bar.php';
			}
		}

		return $file;
	}, 10, 3 );

//Last modified override
	remove_action( 'ampforwp_after_post_content', 'ampforwp_add_modified_date' );
	add_action( 'ampforwp_after_post_content', function ( $post_object ) {
		global $redux_builder_amp;
		if ( is_single() && $redux_builder_amp['post-modified-date'] ) { ?>
            <div class="ampforwp-last-modified-date">
                <p> <?php
					if ( $post_object->get( 'post_modified_timestamp' ) !== $post_object->get( 'post_publish_timestamp' ) ) {
						echo esc_html(
							sprintf(
								_x( ampforwp_translation( $redux_builder_amp['amp-translator-modified-date-text'],
										'This article was last modified on ' ) . ' %s ',
									'%s = human-readable time difference', 'accelerated-mobile-pages' ),
								date( "F j, Y, g:i a", $post_object->get( 'post_modified_timestamp' ) )
							)
						);
					} ?>
                </p>
            </div> <?php
		}
	} );

	//35. Disqus Comments Support Override
	remove_action( 'ampforwp_post_after_design_elements', 'ampforwp_add_disqus_support' );
	add_action( 'ampforwp_post_after_design_elements', function () {
		global $redux_builder_amp;
		//if ( !comments_open() ){
		//	return;
		//}//931
		if ( $redux_builder_amp['ampforwp-disqus-comments-support'] ) {
			if ( $redux_builder_amp['ampforwp-disqus-comments-name'] !== '' ) {
				global $post;
				$post_slug = $post->post_name;

				$disqus_script_host_url = "https://ampforwp.appspot.com/?api=" . AMPFORWP_DISQUS_URL;

				if ( $redux_builder_amp['ampforwp-disqus-host-position'] == 0 ) {
					$disqus_script_host_url = esc_url( $redux_builder_amp['ampforwp-disqus-host-file'] );
				}

				$disqus_url = $disqus_script_host_url . '?disqus_title=' . $post_slug . '&url=' . get_permalink() . '&disqus_name=' . esc_url( $redux_builder_amp['ampforwp-disqus-comments-name'] ) . "/embed.js";
				?>
                <section class="amp-wp-content post-comments amp-wp-article-content amp-disqus-comments" id="comments">
                    <amp-iframe
                            height=200
                            width=300
                            layout="responsive"
                            sandbox="allow-forms allow-modals allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"
                            frameborder="0"
                            resizable
                            src="<?php echo $disqus_url ?>">
                        <div overflow tabindex="0" role="button"
                             aria-label="Read more"><?php echo __( 'Disqus Comments Loading...',
								'accelerated-mobile-pages' ) ?></div>
                    </amp-iframe>
                </section>
				<?php
			}
		}
	} );


// style.php override
	remove_action( 'pre_amp_render_post', 'ampforwp_stylesheet_file_insertion', 12 );
	add_action( 'pre_amp_render_post', function () {
		if ( ! ampforwp_design_selector() ) {
			$ampforwp_design_selector = 2;
		} else {
			$ampforwp_design_selector = ampforwp_design_selector();
		}
		// Add StyleSheet
		if ( file_exists( get_stylesheet_directory() . '/amp/style.php' ) ) {
			require get_stylesheet_directory() . '/amp/style.php';
		} else if ( file_exists( AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . $ampforwp_design_selector . '/style.php' ) ) {
			require AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . $ampforwp_design_selector . '/style.php';
		} else {
			$plugin_data = get_plugins();
			if ( count( $plugin_data ) > 0 ) {
				foreach ( $plugin_data as $key => $data ) {
					if ( $data['TextDomain'] == $ampforwp_design_selector ) {
						if ( ! file_exists( AMPFORWP_MAIN_PLUGIN_DIR . "/" . $key ) ) {
							echo "plugin theme not exists";
						}
						break;
					}
				}
			}
			require AMPFORWP_PLUGIN_DIR . "/components/theme-loader.php";
		}
	}, 12 );


	// Post Title
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_the_title', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-the-title' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/title.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/title.php';
			}
		}

		return $file;
	}, 10, 3 );


// Meta Info
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_meta_info', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-meta-info' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/meta-info.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/meta-info.php';
			}
		}

		return $file;
	}, 10, 3 );

// Featured Image
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_featured_image', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-featured-image' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/featured-image.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/featured-image.php';
			}
		}

		return $file;
	}, 10, 3 );

// Bread-Crumbs
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_bread_crumbs', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-bread-crumbs' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/bread-crumbs.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/bread-crumbs.php';
			}
		}

		return $file;
	}, 10, 3 );
// The Content
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_the_content', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-the-content' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/content.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/content.php';
			}
		}

		return $file;
	}, 10, 3 );

// Taxonomy meta
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_meta_taxonomy', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-meta-taxonomy' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/meta-taxonomy.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/meta-taxonomy.php';
			}
		}

		return $file;
	}, 10, 3 );

// Social Icons
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_social_icons', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-social-icons' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/social-icons.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/social-icons.php';
			}
		}

		return $file;
	}, 10, 3 );

// Comments
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_comments', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-comments' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/comments.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/comments.php';
			}
		}

		return $file;
	}, 10, 3 );

// simple comment button
	/*remove_filter( 'amp_post_template_file', 'ampforwp_design_element_simple_comment_button', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-simple-comment-button' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/simple-comment-button.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/simple-comment-button.php';
			}
		}

		return $file;
	}, 10, 3 );*/

// Related Posts
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_related_posts', 10 );
	add_filter( 'amp_post_template_file', function ( $file, $type, $post ) {
		if ( 'ampforwp-related-posts' === $type ) {
			$file = get_stylesheet_directory() . '/amp/elements/related-posts.php';
			if ( ! file_exists( $file ) ) {
				$file = AMPFORWP_PLUGIN_DIR . 'templates/design-manager/design-' . ampforwp_design_selector() . '/elements/related-posts.php';
			}
		}

		return $file;
	}, 10, 3 );

} );


add_filter('get_the_archive_title', function($title) {
	if ( is_category() ) {
		/* translators: Category archive title. 1: Category name */
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		/* translators: Tag archive title. 1: Tag name */
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		/* translators: Author archive title. 1: Author name */
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_year() ) {
		/* translators: Yearly archive title. 1: Year */
		$title = sprintf( __( 'Year: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
	} elseif ( is_month() ) {
		/* translators: Monthly archive title. 1: Month name and year */
		$title = sprintf( __( 'Month: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
	} elseif ( is_day() ) {
		/* translators: Daily archive title. 1: Date */
		$title = sprintf( __( 'Day: %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title' );
		}
	} elseif ( is_post_type_archive() ) {
		/* translators: Post type archive title. 1: Post type name */
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives' );
	}

	return $title;
}, 100);

add_filter('ampforwp_modify_index_content', function ($content, $excerpt_length) {
	$content = wp_trim_words( strip_shortcodes( $content ) ,  56, ' […]' );
	$content .= "<a class=\"radius small button secondary\" href=\"" . get_the_permalink() . "/\">Continue reading</a>";
    return $content;
}, 30, 2);

add_action('ampforwp_between_loop',function($count,$template_object) {
    if ($count > 1) {
	    echo "<hr/>";
    }
});