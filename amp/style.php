<?php
add_action('amp_post_template_css', 'ampforwp_additional_style_input');
function ampforwp_additional_style_input( $amp_template ) {
	global $redux_builder_amp;
	global $post;
	$post_id = '';
	$post_id = $post->ID;
	$get_customizer = new AMP_Post_Template( $post_id );
	$content_max_width       = absint( $get_customizer->get( 'content_max_width' ) );
	$theme_color             = $get_customizer->get_customizer_setting( 'theme_color' );
	$text_color              = $get_customizer->get_customizer_setting( 'text_color' );
	$muted_text_color        = $get_customizer->get_customizer_setting( 'muted_text_color' );
	$border_color            = $get_customizer->get_customizer_setting( 'border_color' );
	$link_color              = $get_customizer->get_customizer_setting( 'link_color' );
	$header_background_color = $get_customizer->get_customizer_setting( 'header_background_color' );
	$header_color            = $get_customizer->get_customizer_setting( 'header_color' );

if(false): ?>
<style rel="stylesheet" type="text/css">
<?php endif; ?>
@font-face {
  font-family: 'Abril Fatface';
  font-style: normal;
  font-weight: 400;
    src:  local('AbrilFatface Regular'), local('AbrilFatface-Regular'), url('<?php echo get_stylesheet_directory_uri() ?>/amp/fonts/AbrilFatface-Regular.ttf');
}
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
    src:  local('Lato Regular'), local('Lato-Regular'), url('<?php echo get_stylesheet_directory_uri() ?>/amp/fonts/Lato-Regular.ttf');
}
@font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 700;
    src:  local('Lato Bold'), local('Lato-Bold'), url('<?php echo get_stylesheet_directory_uri() ?>/amp/fonts/Lato-Bold.ttf');
}
/*  Widgets styling */
.amp-wp-content.widget-wrapper { margin: 20px 17px 17px 17px;}

#statcounter{width: 1px;height:1px;}
*, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
h1 {  font: normal 30px 'Abril Fatface'; color: #3d002b; line-height: 34px; margin: 14px 0 24px 0;}
h2 {font: normal 30px 'Abril Fatface', Georgia, 'Times New Roman', 'Bitstream Charter', Times ,serif; color: #6d6d6d}
    .single-post h2 { font-size: 28px; line-height: 30px; margin: 14px 0 }
.cb{clear:both}
.alignright{ float: right; }
.alignleft{ float: left; }
.aligncenter{ display: block; margin-left: auto; margin-right: auto; max-width: 100% }
.amp-wp-enforced-sizes{ max-width: 100%; margin: 0 auto; }
.amp-wp-unknown-size img{ object-fit: contain; }
amp-iframe{ max-width: 100%; margin-bottom : 20px; }
.amp-wp-content,.amp-wp-title-bar div {<?php if ( $content_max_width > 0 ) : ?> margin: 0 auto;max-width: <?php echo sprintf( '%dpx', $content_max_width ); ?>; <?php endif; ?> }
html{background: <?php echo sanitize_hex_color( $header_background_color ); ?>;} body{background: <?php echo sanitize_hex_color( $theme_color ); ?>;color: <?php echo sanitize_hex_color( $text_color ); ?>;font-family: 'Merriweather', 'Times New Roman', Times, Serif;font-weight: 300;line-height: 1.75em;}
p,ol,ul,figure {margin: 0 0 1em;padding: 0;} a,a:visited {color:<?php echo $redux_builder_amp['amp-opt-color-rgba-link-design1']['color']; ?>;}a:hover,a:active,a:focus {color: <?php echo sanitize_hex_color( $text_color ); ?>;} .wp-caption amp-img{max-width: 100%}
blockquote {color: <?php echo sanitize_hex_color( $text_color ); ?>;background: rgba(127,127,127,.125);border-left: 2px solid <?php echo sanitize_hex_color( $link_color ); ?>;margin: 8px 0 24px 0;padding: 16px;} blockquote p:last-child {margin-bottom: 0;}
.amp-wp-meta,.amp-wp-header .ampforwp-logo-area,.amp-wp-title,.wp-caption-text,.amp-wp-tax-category,.amp-wp-tax-tag,.amp-wp-comments-link,.amp-wp-footer p,.back-to-top {font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;}
.amp-wp-header {background-color: <?php echo sanitize_hex_color( $header_background_color ); ?>;}
.amp-wp-header .ampforwp-logo-area {color: <?php echo sanitize_hex_color( $header_color ); ?>;font-size: 1em;font-weight: 400;margin: 0 auto;max-width: calc(840px - 32px);padding: .875em 16px;position: relative;}  .amp-wp-header .amp-wp-site-icon {background-color: <?php echo sanitize_hex_color( $header_color ); ?>;border: 1px solid <?php echo sanitize_hex_color(  $header_color ); ?>;border-radius: 50%;position: absolute;right: 18px;top: 10px;}
.amp-wp-article {color: <?php echo sanitize_hex_color( $text_color ); ?>;font-weight: 400;margin: 1.5em auto;max-width: 840px;overflow-wrap: break-word;word-wrap: break-word;} .amp-wp-article-header {align-items: center;align-content: stretch;display: flex;flex-wrap: wrap;justify-content: space-between;margin: 1.5em 16px 1.5em;}
.amp-wp-title {color: <?php echo sanitize_hex_color( $text_color ); ?>;display: block;flex: 1 0 100%;font-weight: 900;margin: 0;width: 100%;}.amp-wp-meta {color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;display: inline-block;flex: 2 1 50%;font-size: .875em;line-height: 1.7em;margin: 0;padding: 0;}.ampforwp-meta-info{margin-top: 0px;}.amp-wp-article-header .amp-wp-meta:last-of-type {text-align: right;}.amp-wp-article-header .amp-wp-meta:first-of-type {text-align: left;}.amp-wp-byline amp-img,.amp-wp-byline .amp-wp-author {display: inline-block;vertical-align: middle;}.amp-wp-byline amp-img {border: 1px solid <?php echo sanitize_hex_color( $link_color ); ?>;border-radius: 50%;position: relative;margin-right: 6px;}.amp-wp-posted-on {text-align: right;}.hide-meta-info{ display: none; }
.amp-wp-article-featured-image {margin: 1.5em 16px 1.5em;}.amp-wp-article-featured-image amp-img {margin: 0 auto;}.amp-wp-article-featured-image.wp-caption .wp-caption-text, .ampforwp-gallery-item .wp-caption-text {margin: 0 18px;}.amp-wp-frontpage .the_content {padding: 10px;}
.ampforwp-gallery-item.amp-carousel-slide { padding-bottom: 20px;}
.amp-wp-frontpage .ampforwp-title {margin-left:10px;}.amp-wp-article a{text-decoration:none}.amp-wp-article-content, .amp-facebook-comments, .content-matching-ad {margin: 0 16px;}.amp-wp-article-content ul,.amp-wp-article-content ol {margin-left: 1em;}.amp-wp-article-content amp-img {margin: 0 auto;}.amp-wp-article-content amp-img.alignright {margin: 0 0 1em 16px;}.amp-wp-article-content amp-img.alignleft {margin: 0 16px 1em 0;} .amp-disqus-comments {}.amp-disqus-comments amp-iframe{background: none; margin: 0 0 15px 0;}.wp-caption {padding: 0;}.wp-caption.alignleft {margin-right: 16px;}.wp-caption.alignright { margin-left: 16px;}.wp-caption-text {border-bottom: 1px solid <?php echo sanitize_hex_color( $border_color ); ?>;color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;font-size: .875em;line-height: 1.5em;margin: 0;padding: .66em 10px .75em;text-align: center;} amp-carousel {background: <?php echo sanitize_hex_color( $border_color ); ?>;margin: 0 -16px 1.5em;} amp-iframe,amp-youtube,amp-instagram,amp-vine {background: <?php echo sanitize_hex_color( $border_color ); ?>;margin: 0 -16px 1.5em; } .amp-wp-article-content amp-carousel amp-img {border: none;} amp-carousel > amp-img > img {object-fit: contain; } .amp-wp-iframe-placeholder { background: <?php echo sanitize_hex_color( $border_color ); ?> url( <?php echo esc_url( $get_customizer->get( 'placeholder_image_url' ) ); ?> ) no-repeat center 40%;background-size: 48px 48px;min-height: 48px;} .amp-wp-article-footer .amp-wp-meta {display: block;} .amp-wp-tags{ list-style-type: none; padding: 0; margin: 0 0 9px 0; display: inline-flex; } .amp-wp-tags li{display:inline; padding-left: 5px; } .amp-wp-tax-category span{margin-right:5px;} .amp-wp-tax-category, .amp-wp-tax-tag { color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;font-size: .875em;line-height: 1.5em;margin: 1.5em 16px;}.ampforwp-comment-button {margin-bottom:20px;} .amp-wp-comments-link {color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;font-size: .875em;line-height: 1.5em;text-align: center;margin: 2.25em 0 1.5em;} .amp-wp-comments-link a { border-style: solid;border-color: <?php echo sanitize_hex_color( $border_color ); ?>;border-width: 1px 1px 2px;border-radius: 4px;background-color: transparent;color: <?php echo sanitize_hex_color( $link_color ); ?>;cursor: pointer; display: block;font-size: 14px;font-weight: 600;line-height: 18px;margin: 0 auto;max-width: 200px;padding: 11px 16px;text-decoration: none;width: 50%;-webkit-transition: background-color 0.2s ease;transition: background-color 0.2s ease;} .page-title {margin: 0 15px;}.amp-sub-archives li{width: 50%;} .amp-sub-archives ul{padding: 0;list-style: none;display: flex;font-size: 12px;line-height: 1.2;margin: 5px 1.5em 10px 1.5em;} .author-archive amp-img{border-radius: 50%;margin: 0px 8px 10px;display: block;}.author-archive{float: left;} .amp-wp-footer {border-top: 1px solid <?php echo sanitize_hex_color( $border_color ); ?>;margin: calc(1.5em - 1px) 0 0;padding-bottom:25px;}
.amp-wp-footer div{margin:0 auto;max-width:calc(840px - 32px);padding:1.25em 16px;position:relative}.amp-wp-footer h2{font-size:1em;line-height:1.375em;margin:0 0 .5em;}
.amp-wp-footer p {color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;font-size: .8em;line-height: 1.5em;margin: 0 15px 0 0;}
.amp-wp-footer a{text-decoration:none}.copyright_txt{float:left}.back-to-top{float:right}.amp-wp-header .nav_container{float: right;top: 16px;line-height: 1;   right: 65px; position: absolute}.toggle-text{position:absolute;right:0;height:22px;width:28px}.toggle-text span{display:block;position:absolute;height:2px;width:25px;background:#fff;border-radius:19px;opacity:1;left:0}.toggle-text span:nth-child(2){top:9px}.toggle-text span:nth-child(3){top:18px}.amp-wp-home .amp-wp-meta{margin:5px 0}.amp-wp-home .amp-wp-content p{width:100%}.ampforwp-custom-index .amp-wp-title a {text-decoration: none;color: <?php echo sanitize_hex_color( $text_color ); ?>;}.comment-button-wrapper a,.related_posts ol{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif}.amp-wp-meta{display:flex}.amp-wp-posted-on{display:initial}#pagination .next,#pagination .prev{display:inline-block}.ampforwp-custom-index .amp-wp-content{margin-bottom:30px}.pagination-holder{margin:1.5em 16px}#pagination .next{float:right}.home-post-image{float:right;margin:0 0 10px 20px}.amp-wp-article-content amp-img{max-width:100%}.amp-wp-meta.amp-wp-tax-category,.amp-wp-meta.amp-wp-tax-tag{margin:0}.amp-wp-meta.amp-wp-tax-tag{display:initial}.ampforwp-social-icons{margin:1.5em 16px}.amp-social-icon{ width: 35px; height: 35px; border-radius: 50%; display: inline-block; background: #5cbe4a;position: relative; vertical-align: top }
.amp-social-icon amp-img{ top: 4px; vertical-align: middle }
.custom-amp-socialsharing-line{background:#00b900}.custom-amp-socialsharing-vk{background:#45668e}.amp-social-odnoklassniki{background:#ed812b}.amp-social-reddit{background:#ff4500}.amp-social-telegram{background:#0088cc}.amp-social-tumblr{background:#35465c}.amp-social-digg{background:#005be2}.amp-social-stumbleupon{background:#eb4924}.amp-social-wechat{background:#7bb32e}.amp-social-viber{background:#8f5db7}.comment-button-wrapper a{border-style:solid;border-color:#c2c2c2;border-width:1px 1px 2px;border-radius:4px;background-color:transparent;color:#0a89c0;cursor:pointer;display:block;font-size:14px;font-weight:600;text-align:center;line-height:18px;margin:0 auto;max-width:200px;padding:11px 16px;text-decoration:none;width:50%;-webkit-transition:background-color .2s ease;transition:background-color .2s ease}.close-nav,.comments_list div,.related_posts ol li,.toggle-navigation ul,.toggle-navigationv2 ul li a{display:inline-block}main .amp-wp-content.comments_list{background:0 0;box-shadow:none;max-width:1030px}.comments_list h3{font-size:14px;font-weight:700;letter-spacing:.4px;margin:25px 0 10px;color:#333}.comments_list{margin:2.5em 16px}.comments_list ul{margin:0;padding:0}.comments_list ul.children{padding-bottom:10px;margin-left:4%;width:96%}
.comments_list ul li p{margin:0;font-size:14px;clear:both;padding-top:5px; word-break:break-word;}
.comments_list ul li{font-family:sans-serif;font-size:11px;list-style-type:none;margin-bottom:12px;background:#fefefe;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;-moz-box-shadow:0 2px 3px rgba(0,0,0,.05);-webkit-box-shadow:0 2px 3px rgba(0,0,0,.05);box-shadow:0 2px 3px rgba(0,0,0,.05);padding:0;max-width:1000px;width:96%}.comments_list ul li .says{margin-right:4px}.comments_list li li,.comments_list li li li{margin:20px 20px 10px}.comments_list ul li p{font-family:Merriweather,'Times New Roman',Times,Serif}.comments_list ul li .comment-body{padding:10px 0 15px}.comment-author{float:left}.single-post footer.comment-meta{padding-bottom:0;     line-height: 1.9;}.comments_list li li{background:#f7f7f7;box-shadow:none;border:1px solid #eee} .page-numbers{ padding: 9px 10px; background: #fff; font-size: 14px; } .comment-author-img{float: left; margin-right: 5px; border-radius: 60px;} .comment-content amp-img{max-width: 300px;} amp-sidebar{width:250px}.amp-sidebar-image{line-height:100px;vertical-align:middle}.amp-close-image{top:15px;left:225px;cursor:pointer}.toggle-navigationv2 ul{list-style-type:none;margin:0;font-family:sans-serif;padding:0}.toggle-navigationv2 ul ul li a{padding-left:35px;background:#fff;display:inline-block}.toggle-navigationv2 ul li a{padding:10px 15px 10px 25px;width:88%;text-decoration:none;background:#fafafa;font-size:13px;border-bottom:1px solid #efefef}.close-nav{font-size:12px;font-family:sans-serif;background:rgba(0,0,0,.25);letter-spacing:1px;padding:10px;border-radius:100px;line-height:8px;margin:14px;left:191px;color:#fff}.close-nav:hover{background:rgba(0,0,0,.45)}.toggle-navigation ul{list-style-type:none;margin:0;padding:0;width:100%}.menu-all-pages-container:after{content:"";clear:both}.toggle-navigation ul li{font-size:13px;border-bottom:1px solid rgba(0,0,0,.11);padding:11px 0;width:25%;float:left;text-align:center;margin-top:6px}.toggle-navigation ul ul{display:none}.toggle-navigation ul li a{color:#eee;padding:15px}.toggle-navigation{display:none;background:#444}.nav_container:hover+.toggle-navigation,.toggle-navigation:active,.toggle-navigation:focus,.toggle-navigation:hover{display:inline-block;width:100%}#amp-user-notification1 p{display:inline-block}amp-user-notification{padding:5px;text-align:center;background:#fff;border-top:1px solid} amp-user-notification button {padding: 8px 10px;background:  <?php echo sanitize_hex_color( $header_background_color ); ?>;color: <?php echo sanitize_hex_color( $header_color ); ?>;margin-left: 5px;border: 0;}amp-user-notification button:hover {cursor: pointer} .amp-ad-wrapper {text-align: center} <?php if( $redux_builder_amp['enable-single-social-icons'] == true && is_single() )  { ?>body {padding-bottom: 43px;}<?php } ?> .sticky_social a{text-decoration:none}.sticky_social{width:100%;bottom:0;display:block;left:0;box-shadow:0 4px 7px #000;background:#fff;padding:7px 0 0;position:fixed;margin:0;z-index:10;text-align:center}.whatsapp-share-icon{width:50px;height:28px;display:inline-block;background:#5cbe4a;padding:4px 0;position:relative;top:-4px}.amp-wp-tax-category span:first-child:after{content:' '}.amp-wp-tax-category span:after,.amp-wp-tax-tag span:after{content:', '}.amp-wp-tax-category span:last-child:after,.amp-wp-tax-tag span:last-child:after{content:' '}pre{white-space:pre-wrap}.amp-ad-wrapper.amp_ad_1{padding-top:20px}
.amp-wp-content-loop{width:100%}
.amp-wp-content-loop ul{margin:0}
.ampforwp_single_excerpt { margin-bottom:15px; }
.ampforwp-ad-above-related-post{padding-top:15px;}
.single-post .amp_author_area amp-img{ display: block; position: relative; margin: 0 auto; }
.single-post .amp_author_area .amp_author_area_wrapper{ display: inline-block; width: 100%; line-height: 1.4; margin-top: 22px; font-size: 13px; color:#333; font-family: sans-serif; }
/* Footer */
.footer_menu ul{ list-style-type: none; padding: 0; text-align: center; margin: 0px 20px 25px 20px; line-height: 27px; font-size: 13px }
.footer_menu ul li{ display:inline; margin:0 10px; }
.footer_menu ul li:first-child{ margin-left:0 }
.footer_menu ul li:last-child{ margin-right:0 }
.footer_menu ul ul{ display:none }
/* Category 1 */
.amp-category-block ul{ list-style-type:none }
.amp-category-block-btn{ display: block; text-align: center; font-size: 13px; margin-top: 15px; border-bottom: 1px solid #f1f1f1; text-decoration: none; }
.design_1_wrapper .amp-category-block, .category-widget-wrapper{ max-width: 840px; margin: 1.5em auto; }
.category-widget-gutter{ margin:1.5em 26px 3.5em }
.category-widget-gutter h4{ margin-bottom: 0px;}
.category-widget-gutter ul{ margin-top: 10px; list-style-type:none; padding:0 }
.amp-category-block ul{ margin: 1.5em 26px 3.5em; }
.amp-category-post{ width: 32%; display: inline-block; word-wrap: break-word;float: left;}
.amp-category-post a{ color:#555; text-decoration:none}
.amp-category-post amp-img{ margin-bottom:5px; }
.amp-category-block li:nth-child(3){ margin: 0 1%; }
@media screen and (max-width: 530px){ .amp-category-post {line-height: 1.45;font-size: 14px; } .amp-category-block li:nth-child(3) {margin:0 0.6%} }
@media screen and (max-width: 375px){ .amp-category-post {line-height: 1.45;font-size: 12px; } .amp-category-block li:nth-child(3) {margin:0%} }
.searchmenu{ margin-right: 15px; margin-top: 10px; position: absolute; top: 0; right: 91px; }
.searchmenu button{ background:transparent; border:none }
.closebutton{ background: transparent; border: 0; color: rgba(255, 255, 255, 0.7); border: 1px solid rgba(255, 255, 255, 0.7); border-radius: 30px; width: 32px; height: 32px; font-size: 12px; text-align: center; position: absolute; top: 12px; right: 20px; outline:none }
amp-lightbox{ background: rgba(0, 0, 0,0.85); }
<?php if( $redux_builder_amp['ampforwp-single-select-type-of-related'] ){ ?>
.related_posts span{display: block;}.related_posts ol{list-style-type:none;margin:0;padding:0}.related_posts ol li{width:100%;margin-bottom:12px;padding:0}.related_posts .related_link a{color:#000;font-size:18px}.related_posts ol li amp-img{width:100px;float:left;margin-right:15px}.related_posts ol li p{font-size:12px;color:#999;line-height:1.2;margin:12px 0 0}.no_related_thumbnail{padding:15px 18px} main .amp-wp-content.relatedpost{background:0 0;box-shadow:none;max-width:1030px}.relatedpost{margin:2em 16px}.related_posts span{font-size:14px;font-weight:700;letter-spacing:.4px;margin:25px 0 10px;color:#333}
.related_posts ol li{display:inline-block}
<?php } ?>
<?php if( is_singular() || is_home() && $redux_builder_amp['amp-frontpage-select-option'] && ampforwp_get_blog_details() == false ) { ?>
/* Tables */
table { display: -webkit-box; display: -ms-flexbox; display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; overflow-x: auto; }
table a:link { font-weight: bold; text-decoration: none; }
table a:visited { color: #999999; font-weight: bold; text-decoration: none; }
table a:active, table a:hover { color: #bd5a35; text-decoration: underline; }
table { font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 12px; text-shadow: 1px 1px 0px #fff; background: #eee; margin: 0px; width: 95%; }
table th { padding: 21px 25px 22px 25px; border-top: 1px solid #fafafa; border-bottom: 1px solid #e0e0e0; background: #ededed; background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb)); background: -moz-linear-gradient(top, #ededed, #ebebeb); }
table th:first-child { text-align: left; padding-left: 20px; }
table tr:first-child th:first-child { -moz-border-radius-topleft: 3px; -webkit-border-top-left-radius: 3px; border-top-left-radius: 3px; }
table tr:first-child th:last-child { -moz-border-radius-topright: 3px; -webkit-border-top-right-radius: 3px; border-top-right-radius: 3px; }
table tr { text-align: center; padding-left: 20px; }
table td:first-child { text-align: left; padding-left: 20px; border-left: 0; }
table td { padding: 18px; border-top: 1px solid #ffffff; border-bottom: 1px solid #e0e0e0; border-left: 1px solid #e0e0e0; background: #fafafa; background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa)); background: -moz-linear-gradient(top, #fbfbfb, #fafafa); }
table tr.even td { background: #f6f6f6; background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6)); background: -moz-linear-gradient(top, #f8f8f8, #f6f6f6); }
table tr:last-child td {border-bottom: 0;}
table tr:last-child td:first-child { -moz-border-radius-bottomleft: 3px; -webkit-border-bottom-left-radius: 3px; border-bottom-left-radius: 3px; }
table tr:last-child td:last-child { -moz-border-radius-bottomright: 3px; -webkit-border-bottom-right-radius: 3px; border-bottom-right-radius: 3px; }
table tr:hover td { background: #f2f2f2; background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0)); background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0); }
<?php } ?>
/* CSS3 icon */
[class*=icono-]:after, [class*=icono-]:before{ content: ''; pointer-events: none; }
.icono-search:before{ position: absolute; left: 50%; -webkit-transform: rotate(270deg); -ms-transform: rotate(270deg); transform: rotate(270deg); width: 2px; height: 9px; box-shadow: inset 0 0 0 32px; top: 0px; border-radius: 0 0 1px 1px; left: 14px; }
[class*=icono-]{ display: inline-block; vertical-align: middle; position: relative; font-style: normal; color: #f42; text-align: left; text-indent: -9999px; direction: ltr }
.icono-search{ -webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); transform: translateX(-50%) }
.icono-search{ border: 1px solid; width: 10px; height: 10px; border-radius: 50%; -webkit-transform: rotate(45deg); -ms-transform: rotate(45deg); transform: rotate(45deg); margin: 4px 4px 8px 8px; }
.searchform label{ color: #f7f7f7; display: block; font-size: 10px; line-height: 0; opacity:0.6 }
.searchform{ background: transparent; left: 20%; position: absolute; top: 35%; width: 60%; max-width: 100%; transition-delay: 0.5s; }
.searchform input{ background: transparent; border: 1px solid #666; color: #f7f7f7; font-size: 14px; font-weight: 400; line-height: 1; letter-spacing: 0.3px; text-transform: capitalize; padding: 20px 0px 20px 30px; margin-top: 15px; width: 100%; }
#searchsubmit{opacity:0}
.hide{display:none}
.amp-wp-header .ampforwp-search-nav-wrapper{ padding: 0; }
.ampforwp-search-nav-wrapper .searchmenu{ margin-top: 20px; }
.headerlogo a, [class*=icono-]{ top:0; }
.amp-logo h1{font-size: 1em; font-weight: 400; line-height: 1.75em; margin: 0;}
.amp-wp-header a, .headerlogo a, [class*=icono-] {color: <?php echo sanitize_hex_color( $header_color ); ?>;text-decoration: none;}
@media screen and (min-width: 650px) { table {display: inline-table;}  }
<?php if($redux_builder_amp['enable-single-social-icons'] && is_socialshare_or_socialsticky_enabled_in_ampforwp() ){ ?> .amp-wp-footer{padding-bottom: 60px;}<?php } ?>

<?php if($redux_builder_amp['amp-rtl-select-option'] == true) { ?>
header, amp-sidebar, article, footer{ direction: rtl;}
.home-post-image{float:left; margin: 0 10px 10px 20px;}
.amp-wp-header{text-align: right;}
.toggle-text{left: 40px; right: initial;}
.amp-wp-header .amp-wp-site-icon, .amp-wp-header .nav_container{right:0px;left: 18px;}
#pagination .next{float:left}
.back-to-top{float:left}
.amp-wp-footer p{margin:0 0 0 15px}
.amp-wp-article-header .amp-wp-meta:first-of-type{text-align:right}
.amp-wp-tax-category span{margin-left:5px; margin-right:0px}
.amp-wp-meta.amp-wp-tax-tag{display:inherit}
.amp-wp-article-header .amp-wp-meta:last-of-type{text-align:left}
.related_posts ol li amp-img{float:right; margin-left:15px; margin-right:0px}
.amp-wp-header .amp-wp-site-icon,.amp-wp-header .nav_container{float:left;right:0;left:18px}.amp-wp-header .amp-wp-site-icon{position:relative;top:-3px}
.toggle-navigationv2 ul li a{width:100%}
.searchform{direction:rtl}
.closebutton{right:0; left:20px;}
.amp-wp-byline amp-img{ margin:0px 0px 0px 6px;}
.comment-author{float: right;}
.amp-ad-wrapper,.amp-wp-article amp-ad{ direction: ltr; }
amp-carousel{direction: ltr;}
<?php } ?>
<?php if ($redux_builder_amp['ampforwp-callnow-button']) { ?>
.callnow{ position: relative; top: -27px; right: 100px; }
.callnow a:before { content: ""; position: absolute; right: 23px; width: 5px; height: 11px; border-width: 6px 0 6px 3px; border-style: solid; border-color:<?php echo $redux_builder_amp['amp-opt-color-rgba-colorscheme-call']['color']; ?>; background: transparent; transform: rotate(-30deg); box-sizing: initial; border-top-left-radius: 3px 5px; border-bottom-left-radius: 3px 5px; }
<?php } ?>
<?php
if ( class_exists('TablePress') ) { ?>
.tablepress-table-description{clear:both;display:block}.tablepress{border-collapse:collapse;border-spacing:0;width:100%;margin-bottom:1em;border:none}.tablepress td,.tablepress th{padding:8px;border:none;background:0 0;text-align:left}.tablepress tbody td{vertical-align:top}.tablepress tbody td,.tablepress tfoot th{border-top:1px solid #ddd}.tablepress tbody tr:first-child td{border-top:0}.tablepress thead th{border-bottom:1px solid #ddd}.tablepress tfoot th,.tablepress thead th{background-color:#d9edf7;font-weight:700;vertical-align:middle}.tablepress .odd td{background-color:#f9f9f9}.tablepress .even td{background-color:#fff}.tablepress .row-hover tr:hover td{background-color:#f3f3f3}@media (min-width:768px) and (max-width:1600px){.tablepress{overflow-x:none}}@media (min-width:320px) and (max-width:767px){.tablepress{display:inline-block;overflow-x:scroll}}
<?php }
if( !is_home() && $redux_builder_amp['ampforwp-bread-crumb'] == 1 ) { ?>
.breadcrumb{line-height: 1; margin: 0.1em 16px 1.5em;}
.breadcrumb ul{padding:0; margin:0;}
.breadcrumb ul li{display:inline;}
.breadcrumb ul li a{font-size:12px;}
.breadcrumb ul li a::after {content: "►";display: inline-block;font-size: 8px;padding: 0 6px 0 7px;vertical-align: middle;opacity: 0.5;position:relative;top: -1px;}
.breadcrumb ul li:hover a::after{color:#c3c3c3;}
.breadcrumb ul li:last-child a::after{display:none;}
<?php } ?>
.amp-wp-content.widget-wrapper{max-width:840px}
.amp_widget_above_the_footer {margin:0 10px;}
.widget-wrapper li { list-style-position: inside; }
.amp-menu > li > a > amp-img, .sub-menu > li > a > amp-img { display: inline-block; margin-right: 4px; }
.menu-item amp-img {width: 16px; height: 11px; display: inline-block; margin-right: 5px;}
.amp-carousel-container {position: relative;width: 100%;height: 100%;}
.amp-carousel-img img {object-fit: contain;}
.ampforwp-last-modified-date { display: none; }
amp-social-share { border-radius: 50%; }
.ampforwp-tax-tag { flex-wrap: wrap } .ampforwp-tax-tag > span:not(:first-child) { margin-left: 5px }
h1 {
    font: normal 38px 'Abril Fatface', Georgia, 'Times New Roman', 'Bitstream Charter', Times ,serif;
    color: #3d002b;
    margin-top: 14px;
    margin-bottom: 24px;
}

.clearfix:after, .textwidget:after {
    clear: both;
}

.clearfix:before, .clearfix:after, .textwidget:before, .textwidget:after {
    display: table;
    line-height: 0;
    content: "";
}

.justify p {
    text-align: justify;
}

p {
    margin-top: 16px;
    margin-bottom: 17px;
    display: inline-block;
}

body, p, div {
    font: normal 16px 'Lato';
}

p {
    line-height: 21px;
}

amp-sidebar {
    background-color: #000000;
}

.amp-wp-content {
    color: #777777;
}

.amp-wp-header .amp-wp-site-icon {
    display: none;
}

.amp-wp-header .nav_container {
    top: 22px;
    right: 21px;
}

.toggle-text span {
    height: 4px;
    width: 33px;
}

.toggle-text span:nth-child(2) {
    top: 11px;
}

.toggle-text span:nth-child(3) {
    top: 22px;
}

.toggle-text {
    height: 26px;
    width: 33px;
}

.toggle-navigationv2 ul li a {
    font-size: 14px;
    background-color: #000000;
    border-bottom: 1px solid #000000;
    color: #ffffff;
    font-weight: 600;
    text-transform: uppercase;
}

.amp-wp-article {
    margin-top: 0;
    margin-bottom: 0;
}

.amp-wp-frontpage .the_content {
    padding: 15px;
}

#mobile-head {
    position: relative;
    left: -15px;
    right: -15px;
    margin-top: -15px;
    width: 100vw;
    height: 400px;
    background-size: cover;
    background-position: center center;
    background-image: url(https://www.godates.co/wp-content/uploads/2016/09/Splash.jpg?id=5376);
    overflow: hidden;
}

#mobile-head h1 {
    margin: 0;
    padding: 0 15px;
    font: normal 28px 'Abril Fatface', Georgia, 'Times New Roman', 'Bitstream Charter', Times ,serif;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px rgba(0,0,0,0.8);
}

.vc_custom_1500808509904 {
    padding-top: 29px;
}

.wpb_button,
.wpb_content_element,
.wpb_thumbnails-fluid>li {
    margin-bottom: 35px;
}

.mobile-head-outer {
    position: absolute;
    bottom: 75px;
    z-index: 0;
}

.mobile-head-outer:after {
    position: absolute;
    content: "";
    left: -15px;
    right: 0;
    bottom: -90px;
    background: -moz-linear-gradient(top,rgba(76,0,61,0.01) 1%,rgba(76,0,61,1) 100%);
    background: -webkit-gradient(linear,left top,left bottom,color-stop(1%,rgba(76,0,61,0.01)),color-stop(100%,rgba(76,0,61,1)));
    background: -webkit-linear-gradient(top,rgba(76,0,61,0.01) 1%,rgba(76,0,61,1) 100%);
    background: -o-linear-gradient(top,rgba(76,0,61,0.01) 1%,rgba(76,0,61,1) 100%);
    background: -ms-linear-gradient(top,rgba(76,0,61,0.01) 1%,rgba(76,0,61,1) 100%);
    background: linear-gradient(to bottom,rgba(76,0,61,0.01) 1%,rgba(76,0,61,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6000000',endColorstr='#a6000000',GradientType=0);
    height: 200px;
    z-index: -1;
}

.amp-wp-frontpage .amp-wp-article h2 {
    font: normal 30px 'Abril Fatface', Georgia, 'Times New Roman', 'Bitstream Charter', Times ,serif;
    color: #3d002b;
    line-height: 30px;
    margin-top: 10px;
    font-size: 28px;
    margin-bottom: 35px;
    text-align: left;
}

.latest-posts .title,
.popular-cat-posts .cat-posts .title {
    color: #4c003d;
    font-size: 20px;
    margin-bottom: 25px;
    text-align: left;
    font-weight: 700;
}

.vc_col-has-fill>.vc_column-inner, .vc_row-has-fill+.vc_row-full-width+.vc_row>.vc_column_container>.vc_column-inner, .vc_row-has-fill+.vc_row>.vc_column_container>.vc_column-inner, .vc_row-has-fill+.vc_vc_row>.vc_row>.vc_vc_column>.vc_column_container>.vc_column-inner, .vc_row-has-fill+.vc_vc_row_inner>.vc_row>.vc_vc_column_inner>.vc_column_container>.vc_column-inner, .vc_row-has-fill>.vc_column_container>.vc_column-inner, .vc_row-has-fill>.vc_row>.vc_vc_column>.vc_column_container>.vc_column-inner, .vc_row-has-fill>.vc_vc_column_inner>.vc_column_container>.vc_column-inner, .vc_section.vc_section-has-fill, .vc_section.vc_section-has-fill+.vc_row-full-width+.vc_section, .vc_section.vc_section-has-fill+.vc_section {
    padding-top: 35px;
}

.vc_row[data-vc-full-width] {
    -webkit-transition: opacity .5s ease;
    -o-transition: opacity .5s ease;
    transition: opacity .5s ease;
    overflow: hidden;
    position: relative;
    left: -15px;
    right: -15px;
    width: 100vw;
    padding: 0 15px;
}

.vc_custom_1494258320440, .vc_custom_1504817756049, .vc_custom_1497210277850 {
    background-color: #f3f3f3;
}

.white-title, .contact-submit>div {
    padding-top: 35px;
}

.vc_custom_1485358896593 {
    background-color: #4c003d;
}

.title-popular {
    margin-bottom: 35px;
}

.amp-wp-frontpage .amp-wp-article .white-title h2 {
    color: #fff;
}

.popular-post h3 {
    color: #fff;
    font-family: "Lato";
    margin-top: 3px;
    line-height: 1.2em;
    font-size: 20px;
    text-align: left;
    margin-bottom: 25px;
}

#authors-carousel {
    text-align: left;
    position: relative;
    padding-bottom: 10px;
    padding-top: 0;
}

.slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

#authors-carousel .author-box {
    float: left;
}

#authors-carousel .saboxplugin-wrap {
    padding: 15px;
}
.author-box .saboxplugin-wrap {
    margin: 0px!important;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
    border: 1px solid #EEE;
    width: 100%;
    clear: both;
    display: block;
    overflow: hidden;
    word-wrap: break-word;
}

.saboxplugin-wrap .saboxplugin-gravatar {
    float: none;
    padding: 20px 0;
    text-align: center;
    margin: 0 auto;
    display: block;
    line-height: 10px;
    padding-bottom: 0;
}

.saboxplugin-wrap .saboxplugin-gravatar img {
    border-radius: 3px;
    float: none;
    display: inline-block;
    display: -moz-inline-stack;
    vertical-align: middle;
    zoom: 1;
}

.saboxplugin-wrap .saboxplugin-authorname {
    display: block;
    text-align: center;
    margin: 15px 0 0 20px;
    font-size: 24px;
    padding-top: 1px;
    font-family: 'Abril Fatface', Georgia, 'Times New Roman', 'Bitstream Charter', Times ,serif;
    line-height: 29px;
}

a:not(.button),
div#main a:not(.button):not(.elementor-button),
#header .form-footer a:not(.button) {
    color: #4c003d;
}

.saboxplugin-wrap .saboxplugin-authorname a,
.saboxplugin-wrap .saboxplugin-desc a,
.saboxplugin-wrap .saboxplugin-web a {
    text-decoration: none;
}

.saboxplugin-wrap .saboxplugin-desc {
    display: block;
    margin: 0 10px 13px 10px;
    text-align: center;
    font-family: Nunito;
    font-size: 10px;
    line-height: 17px;
}

.contact-submit .contact-button {
    background: #b90171;
    color: #fff!important;
    font-weight: 700;
    font-size: 20px;
    padding: 15px 30px;
    display: inline-block;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    -webkit-transition: background-color 0.15s ease-in-out;
    -moz-transition: background-color 0.15s ease-in-out;
    -o-transition: background-color 0.15s ease-in-out;
    transition: background-color 0.15s ease-in-out;
}

.contact-submit .contact-button:hover {
    background-color: #a00163;
}

.wpcf7-form-control-wrap {
    position: relative;
}

input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], textarea {
    background-color: white;
    font-family: inherit;
    border: 1px solid #ccc;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    color: rgba(0,0,0,0.75);
    display: block;
    font-size: 14px;
    margin: 0 0 12px 0;
    padding: 6px;
    height: 32px;
    width: 100%;
    -webkit-transition: all .15s linear;
    -moz-transition: all .15s linear;
    -o-transition: all .15s linear;
    transition: all .15s linear;
}

input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], textarea {
    border: 1px solid #ccc;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    color: rgba(0,0,0,0.75);
}

.wpcf7-submit, .wpcf7-form .wpcf7-submit, #subscription-sign-up {
    cursor: pointer;
    display: inline-block;
    font-family: inherit;
    font-size: 14px;
    font-weight: bold;
    line-height: 1;
    margin: 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    -webkit-transition: background-color .15s ease-in-out;
    -moz-transition: background-color .15s ease-in-out;
    -o-transition: background-color .15s ease-in-out;
    transition: background-color .15s ease-in-out;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    border: 1px solid #b90171;
    background: #b90171;
    color: #ffffff;
    padding: 10px 0 10px 0;
    width: 100%;
    letter-spacing: 0;
}

.button, ul.sub-nav li.current a, .item-list-tabs ul.sub-nav li.selected a, #subnav ul li.current a, .wpcf7-submit, #rtmedia-add-media-button-post-update, #rt_media_comment_submit, .rtmedia-container input[type="submit"] {
    border: 1px solid #b90171;
    background: #b90171;
    color: #ffffff;
}

textarea {
    height: auto;
}

.contact-submit .wpcf7 {
    max-width: 650px;
    margin: auto;
}

.amp-ad-wrapper {
    background: #f3f3f3;
    padding-top: 30px;
    position: relative;
    width: auto;
    margin: 0 -15px -15px -15px;
}

.amp-ad-4 {
    margin-top: 20px;
    margin-bottom: 40px;
}

.amp_widget_above_the_footer {
    background: #343337;
    padding: 46px 15px;
}

.amp_widget_above_the_footer,
.amp_widget_above_the_footer a {
    color: #bababa;
}

.amp_widget_above_the_footer a {
    text-decoration: none;
}

.amp_widget_above_the_footer .textwidget a {
    text-decoration: none;
}

.amp_widget_above_the_footer {
    margin: 0;
}

.amp_widget_above_the_footer h4 {
    font-family: "Lato";
    text-transform: uppercase;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    margin-top: 14px;
}

.amp_widget_above_the_footer .textwidget p {
    font: normal 14px 'Lato';
    margin: 0;
}

.textwidget ul {
    list-style: none;
}

.textwidget .social {
    margin: 0;
}

.textwidget .social li {
    padding-left: 0;
    float: left;
    margin-right: 20px;
}

.textwidget a, .textwidget li a {
    font-size: 14px;
}

.amp_widget_above_the_footer > ul {
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 13px;
    direction: ltr;
    line-height: 1.6;
}

.amp_widget_above_the_footer > ul > li {
    padding-left: 12px;
    margin-bottom: 5px;
}

.amp_widget_above_the_footer > ul > li:before {
    font-family: 'FontAwesome';
    content: "\f105";
    margin-left: -12px;
    float: left;
    display: block;
}

.copyright {
    display:block;
    padding-top: 46px;
    font-size: 12px;
    color: #777777;
}

.copyright a {
    color: #777777;
}

.amp-wp-footer, .hatom-extra {
    display: none;
}

.wpcf7-form br {
    display: none
}

.amp-wp-title {
    font: normal 38px 'Abril Fatface', Georgia, 'Times New Roman', 'Bitstream Charter', Times ,serif;
    margin-left: 0;
    margin-right: 0;
    font-size: 30px;
    line-height: 34px;
}

.searchmenu, .amp-wp-meta.amp-wp-byline amp-img, .mc4wp-checkbox.mc4wp-checkbox-contact-form-7 {
    display: none;
}

.amp-wp-header .ampforwp-logo-area {
    padding: 23px 16px 20px;
}

.amp-wp-header .nav_container {
    top: 24px;
    right: 37px;
}

.single-post .amp_author_area .amp_author_area_wrapper {
    margin-top: 0;
}

.amp-wp-content.amp_author_area {
    margin: 22px 15px;
    padding: 20px;
    border: 1px solid #EEE;
}

.single-post .amp_author_area amp-img {
    border-radius: 0;
    margin-bottom: 10px;
}

.single-post .amp_author_area a strong {
    font-family: 'Abril Fatface', Georgia, 'Times New Roman', 'Bitstream Charter', Times ,serif;
    line-height: 29px;
    padding-top: 1px;
    margin: 15px 0 0 0;
    font-size: 24px!important;
    display: block;
    text-align: center;
}

.amp-wp-content.widget-wrapper {
    margin: 0;
}

.amp-wp-article-content .cnss-social-icon {
    margin-left: 0;
}

    .amp-wp-content-loop .secondary {
        color: #676767!important;
        background-color: #e7e7e7!important;
        border: 1px solid #e7e7e7!important;
        font-size: 14px;
        padding: 10px 14px 8px;
        border-radius: 4px;
        font-weight: normal;
        display: block;
        text-align: center;
        margin-top: 20px;
    }

        hr {
            border: solid #ddd;
            border-width: 1px 0 0;
            clear: both;
            margin: 22px 16px 21px 16px;
            height: 0;
        }
<?php // Ads (sitewide)
if( ( isset($redux_builder_amp['enable-amp-ads-1'] ) && $redux_builder_amp['enable-amp-ads-1'] ) || ( isset($redux_builder_amp['enable-amp-ads-2'] ) && $redux_builder_amp['enable-amp-ads-2'] ) ){ ?> .amp-ad-wrapper {text-align: center} .amp-ad-wrapper.amp_ad_1{padding-top:20px} .amp-ad-wrapper,.amp-wp-article amp-ad{ direction: ltr; } <?php }
echo $redux_builder_amp['css_editor']; } ?>
<?php if(false): ?>
</style>
<?php endif; ?>