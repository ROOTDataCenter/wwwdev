<?php
$site_width = (int) $smof_data['site_width'];
$site_width_percent = false;
if( strpos( $smof_data['site_width'], '%' ) !== false ) {
	$site_width_percent = true;
}
?>
<?php	
$theme_info = wp_get_theme();
if ($theme_info->parent_theme) {
	$template_dir =  basename(get_template_directory());
	$theme_info = wp_get_theme($template_dir);
}
?>
<?php echo $theme_info->get( 'Name' ) . "_" . str_replace( '.', '', $theme_info->get( 'Version' ) ); ?>{color:green;}

<?php if( ! $smof_data['responsive'] ): ?>
.ua-mobile #wrapper{width: 100% !important; overflow: hidden !important;}
<?php endif; ?>


<?php
//IE11
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false):
?>
.avada-select-parent .select-arrow,.select-arrow, 
.wpcf7-select-parent .select-arrow{height:33px;line-height:33px;}
.gravity-select-parent .select-arrow{height:24px;line-height:24px;}

#wrapper .gf_browser_ie.gform_wrapper .button,
#wrapper .gf_browser_ie.gform_wrapper .gform_footer input.button{ padding: 0 20px; }
<?php endif; ?>

/*IE11 hack */
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
	.avada-select-parent .select-arrow,.select-arrow, 
	.wpcf7-select-parent .select-arrow{height:33px;line-height:33px;}
	.gravity-select-parent .select-arrow{height:24px;line-height:24px;}
	
	#wrapper .gf_browser_ie.gform_wrapper .button,
	#wrapper .gf_browser_ie.gform_wrapper .gform_footer input.button{ padding: 0 20px; }
}

<?php if($site_width_percent):
$hundredp_padding = $smof_data['hundredp_padding'];
$hundredp_padding_int = (int) $hundredp_padding;
if( get_post_meta( $c_pageID, 'pyre_hundredp_padding', true ) ) {
	$hundredp_padding = get_post_meta( $c_pageID, 'pyre_hundredp_padding', true );
	$hundredp_padding_int = (int) $hundredp_padding;		
}
?>

.fusion-secondary-header, .header-v4 #small-nav, .header-v5 #small-nav, #main { padding-left: 0px; padding-right: 0px; }
#slidingbar .fusion-row, .tfs-slider .slide-content, #main .fusion-row, .fusion-page-title-bar, .fusion-header { padding-left: <?php echo $hundredp_padding; ?>; padding-right: <?php echo $hundredp_padding; ?>; }
.fullwidth-box .fusion-row { padding-left: <?php echo $hundredp_padding_int; ?>px; padding-right: <?php echo $hundredp_padding_int; ?>px; }
.fullwidth-box .fusion-row .fusion-full-width-sep { margin-left: -<?php echo $hundredp_padding_int; ?>px; margin-right: -<?php echo $hundredp_padding_int; ?>px; }
.width-100 > .fusion-row { padding-left: 0; padding-right: 0; }

<?php endif; ?>
<?php if($smof_data['layout'] == 'Boxed'): ?>
html, body {
	<?php if(get_post_meta($c_pageID, 'pyre_page_bg_color', true)): ?>
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_page_bg_color', true); ?>;
	<?php else: ?>
	background-color:<?php echo $smof_data['bg_color']; ?>;
	<?php endif; ?>
}
body{
	<?php if(get_post_meta($c_pageID, 'pyre_page_bg_color', true)): ?>
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_page_bg_color', true); ?>;
	<?php else: ?>
	background-color:<?php echo $smof_data['bg_color']; ?>;
	<?php endif; ?>

	<?php if(get_post_meta($c_pageID, 'pyre_page_bg', true)): ?>
	background-image:url(<?php echo get_post_meta($c_pageID, 'pyre_page_bg', true); ?>);
	background-repeat:<?php echo get_post_meta($c_pageID, 'pyre_page_bg_repeat', true); ?>;
		<?php if(get_post_meta($c_pageID, 'pyre_page_bg_full', true) == 'yes'): ?>
		background-attachment:fixed;
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>
	<?php elseif($smof_data['bg_image']): ?>
	background-image:url(<?php echo $smof_data['bg_image']; ?>);
	background-repeat:<?php echo $smof_data['bg_repeat']; ?>;
		<?php if($smof_data['bg_full']): ?>
		background-attachment:fixed;
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>
	<?php endif; ?>
}
<?php if($smof_data['bg_pattern_option'] && $smof_data['bg_pattern'] && !(get_post_meta($c_pageID, 'pyre_page_bg_color', true) || get_post_meta($c_pageID, 'pyre_page_bg', true))): ?>
html, body {
	background-image:url("<?php echo get_template_directory_uri() . '/assets/images/patterns/' . $smof_data['bg_pattern'] . '.png'; ?>");
	background-repeat:repeat;
}
<?php endif; ?>		
#wrapper, 
.fusion-footer-parallax {
	max-width:<?php if( $site_width_percent ) { echo $smof_data['site_width']; } else { echo ( $site_width + 60 ) .  'px'; } ?>;
	margin:0 auto;
}
.wrapper_blank { display: block; }

@media (min-width: 1014px) {
	body #header-sticky.sticky-header {
		width:<?php if( $site_width_percent ) { echo $smof_data['site_width']; } else { echo ( $site_width + 60 ) .  'px'; } ?>;
		left: 0;
		right: 0;
		margin:0 auto;
	}	
}

<?php if($smof_data['responsive'] && $site_width_percent): ?>
#main .fusion-row, .fusion-footer-widget-area .fusion-row,#slidingbar-area .fusion-row, .fusion-footer-copyright-area .fusion-row, .fusion-page-title-row, .fusion-secondary-header .fusion-row, #small-nav .fusion-row, .fusion-header .fusion-row{ max-width: none; padding: 0 10px; }
<?php endif; ?>

<?php if( $smof_data['responsive'] ): ?>
@media only screen and (min-width: 801px) and (max-width: 1014px){
	#wrapper{
		width:auto;
	}
}
@media only screen and (min-device-width: 801px) and (max-device-width: 1014px){
	#wrapper{
		width:auto;
	}
}
<?php endif; ?>
<?php endif; ?>

<?php if($smof_data['layout'] == 'Wide'): ?>
#wrapper{
	width:100%;
	max-width: none;
}
@media only screen and (min-width: 801px) and (max-width: 1014px){
	#wrapper{
		width:auto;
	}
}
@media only screen and (min-device-width: 801px) and (max-device-width: 1014px){
	#wrapper{
		width:auto;
	}
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_page_bg_layout', true) == 'boxed'): ?>
html, body {
	<?php if(get_post_meta($c_pageID, 'pyre_page_bg_color', true)): ?>
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_page_bg_color', true); ?>;
	<?php else: ?>
	background-color:<?php echo $smof_data['bg_color']; ?>;
	<?php endif; ?>
}
body{
	<?php if(get_post_meta($c_pageID, 'pyre_page_bg_color', true)): ?>
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_page_bg_color', true); ?>;
	<?php else: ?>
	background-color:<?php echo $smof_data['bg_color']; ?>;
	<?php endif; ?>

	<?php if(get_post_meta($c_pageID, 'pyre_page_bg', true)): ?>
	background-image:url(<?php echo get_post_meta($c_pageID, 'pyre_page_bg', true); ?>);
	background-repeat:<?php echo get_post_meta($c_pageID, 'pyre_page_bg_repeat', true); ?>;
		<?php if(get_post_meta($c_pageID, 'pyre_page_bg_full', true) == 'yes'): ?>
		background-attachment:fixed;
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>
	<?php elseif($smof_data['bg_image']): ?>
	background-image:url(<?php echo $smof_data['bg_image']; ?>);
	background-repeat:<?php echo $smof_data['bg_repeat']; ?>;
		<?php if($smof_data['bg_full']): ?>
		background-attachment:fixed;
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>
	<?php endif; ?>

	<?php if($smof_data['bg_pattern_option'] && $smof_data['bg_pattern'] && !(get_post_meta($c_pageID, 'pyre_page_bg_color', true) || get_post_meta($c_pageID, 'pyre_page_bg', true))): ?>
	background-image:url("<?php echo get_template_directory_uri() . '/assets/images/patterns/' . $smof_data['bg_pattern'] . '.png'; ?>");
	background-repeat:repeat;
	<?php endif; ?>
}

#wrapper,
.fusion-footer-parallax {
	width:<?php if( $site_width_percent ) { echo $smof_data['site_width']; } else { echo ( $site_width + 60 ) .  'px'; } ?>;
	margin:0 auto;
	max-width: 100%;
}
.wrapper_blank { display: block; }
@media (min-width: 1014px) {
	body #header-sticky.sticky-header {
		width:<?php if( $site_width_percent ) { echo $smof_data['site_width']; } else { echo ( $site_width + 60 ) .  'px'; } ?>;
		left: 0;
		right: 0;
		margin:0 auto;
	}	
}
@media only screen and (min-width: 801px) and (max-width: 1014px){
	#wrapper{
		width:auto;
	}
}
@media only screen and (min-device-width: 801px) and (max-device-width: 1014px){
	#wrapper{
		width:auto;
	}
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_page_bg_layout', true) == 'wide'): ?>
#wrapper{
	width:100%;
	max-width: none;
}
@media only screen and (min-width: 801px) and (max-width: 1014px){
	#wrapper{
		width:auto;
	}
}
@media only screen and (min-device-width: 801px) and (max-device-width: 1014px){
	#wrapper{
		width:auto;
	}
}
body #header-sticky.sticky-header {
	width: 100%;
	left: 0;
	right: 0;
	margin:0 auto;
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_page_bg', true) || $smof_data['bg_image'] ): ?>
html { background: none; }
<?php endif; ?>		

<?php if( $smof_data['mobile_nav_padding'] ): ?>
@media only screen and (min-device-width: 768px) and (max-device-width: 1366px) and (orientation: portrait){
	#nav > ul > li, #sticky-nav > ul > li { padding-right: <?php echo $smof_data['mobile_nav_padding']; ?>px; }
}
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape){
	#nav > ul > li, #sticky-nav > ul > li { padding-right: <?php echo $smof_data['mobile_nav_padding']; ?>px; }
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_page_title_bar_bg', true)): ?>
.fusion-page-title-bar{
	background-image:url('<?php echo get_post_meta($c_pageID, 'pyre_page_title_bar_bg', true); ?>');
}
<?php elseif($smof_data['page_title_bg']): ?>
.fusion-page-title-bar{
	background-image:url('<?php echo $smof_data['page_title_bg']; ?>');
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_page_title_bar_bg_color', true)): ?>
.fusion-page-title-bar{
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_page_title_bar_bg_color', true); ?>;
}

<?php elseif($smof_data['page_title_bg_color']): ?>
.fusion-page-title-bar{
	background-color:<?php echo $smof_data['page_title_bg_color']; ?>;
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_page_title_bar_borders_color', true)): ?>
.fusion-page-title-bar{
	border-color: <?php echo get_post_meta($c_pageID, 'pyre_page_title_bar_borders_color', true); ?>;
}
<?php endif; ?>

.fusion-header, #side-header{
	<?php if($smof_data['header_bg_image']): ?>
	background-image:url('<?php echo $smof_data['header_bg_image']; ?>');
	<?php if($smof_data['header_bg_repeat'] == 'repeat-y' || $smof_data['header_bg_repeat'] == 'no-repeat'): ?>
	background-position: center center;
	<?php endif; ?>
	background-repeat:<?php echo $smof_data['header_bg_repeat']; ?>;
		<?php if($smof_data['header_bg_full']): ?>
		<?php if( $smof_data['header_position'] == 'Top' ): ?>
		background-attachment:scroll;
		<?php endif; ?>
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>

	<?php if($smof_data['header_bg_parallax'] && $smof_data['header_position'] == 'Top') : ?>
	background-attachment: fixed;
	background-position:top center;
	<?php endif; ?>
	<?php endif; ?>
}

.fusion-header, #side-header, .layout-boxed-mode .side-header-wrapper {
	<?php if(get_post_meta($c_pageID, 'pyre_header_bg_color', true)):
	if( get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) != '' ) {
		$header_bg_opacity = get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true );
	} else if( $smof_data['header_bg_color'] ) {
		$header_bg_opacity = $smof_data['header_bg_color']['opacity'];
	} else {
		$header_bg_opacity = 1;
	}	
	$header_bg_color_rgb = fusion_hex2rgb( get_post_meta($c_pageID, 'pyre_header_bg_color', true) );
	if( get_post_meta($c_pageID, 'pyre_header_bg_color', true) ):
	?>
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_header_bg_color', true); ?>;
	<?php if( ! is_archive() && ! is_404() && ! is_search() ): ?>
	background-color:<?php echo sprintf( 'rgba(%s,%s,%s,%s)', $header_bg_color_rgb[0], $header_bg_color_rgb[1], $header_bg_color_rgb[2], $header_bg_opacity ); ?>;
	<?php
	endif;
	endif;
	elseif( $smof_data['header_bg_color'] ):
	if( get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) != '' ) {
		$header_bg_opacity = get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true );
	} else if( $smof_data['header_bg_color'] ) {
		$header_bg_opacity = $smof_data['header_bg_color']['opacity'];
	} else {
		$header_bg_opacity = 1;
	}
	?>
	<?php $header_bg_color_rgb = fusion_hex2rgb( $smof_data['header_bg_color']['color'] );
	if( $smof_data['header_bg_color']['color'] ):
	?>
	background-color:<?php echo $smof_data['header_bg_color']['color']; ?>;
	<?php if( ! is_archive() && ! is_404() && ! is_search() ): ?>
	background-color:<?php echo sprintf( 'rgba(%s,%s,%s,%s)', $header_bg_color_rgb[0], $header_bg_color_rgb[1], $header_bg_color_rgb[2], $header_bg_opacity ); ?>;
	<?php
	endif;
	endif;
	endif; ?>
}


.fusion-secondary-main-menu {
	<?php if( $smof_data['menu_h45_bg_color'] ):
	if( get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) != '' ) {
		$header_bg_opacity = get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true );
	} else if( $smof_data['menu_h45_bg_color'] ) {
		$header_bg_opacity = $smof_data['header_bg_color']['opacity'];
	} else {
		$header_bg_opacity = 1;
	}
	?>
	<?php $header_bg_color_rgb = fusion_hex2rgb( $smof_data['menu_h45_bg_color'] );
	if( $smof_data['menu_h45_bg_color'] ): ?>
	background-color:<?php echo $smof_data['menu_h45_bg_color']; ?>;
	<?php if( ! is_archive() ): ?>		
	background-color:<?php echo sprintf( 'rgba(%s,%s,%s,%s)', $header_bg_color_rgb[0], $header_bg_color_rgb[1], $header_bg_color_rgb[2], $header_bg_opacity ); ?>;		
	<?php
	endif;
	endif;
	endif; ?>
}


.fusion-header, #side-header{	
	<?php if(get_post_meta($c_pageID, 'pyre_header_bg', true)): ?>
	background-image:url(<?php echo get_post_meta($c_pageID, 'pyre_header_bg', true); ?>);
	<?php if(get_post_meta($c_pageID, 'pyre_header_bg_repeat', true) == 'repeat-y' || get_post_meta($c_pageID, 'pyre_header_bg_repeat', true) == 'no-repeat'): ?>
	background-position: center center;
	<?php endif; ?>
	background-repeat:<?php echo get_post_meta($c_pageID, 'pyre_header_bg_repeat', true); ?>;
		<?php if(get_post_meta($c_pageID, 'pyre_header_bg_full', true) == 'yes'): ?>
		<?php if( $smof_data['header_position'] == 'Top' ): ?>
		background-attachment:fixed;
		<?php endif; ?>
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>
	<?php if($smof_data['header_bg_parallax'] && $smof_data['header_position'] == 'Top') : ?>
	background-attachment: fixed;
	background-position:top center;
	<?php endif; ?>
	<?php endif; ?>
}

<?php if( ( ( $smof_data['header_bg_color']['opacity'] < 1 && ! get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) ) || ( get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) != '' && get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) < 1 ) ) 
		  && ! is_search() 
		  && ! is_404()
		  && ! is_author()
		  && ( ! is_archive() || ( class_exists('Woocommerce') && is_shop() ) )
): ?>
	@media only screen and (min-width: 800px){
		.fusion-header, .fusion-secondary-header {border-top:none;}
		.fusion-header-v1 .fusion-header, .fusion-secondary-main-menu {border:none;}

		<?php if(fusion_get_option( 'layout', 'page_bg_layout', $c_pageID ) == 'boxed'): ?>
		<?php if( $site_width_percent ): ?>
		.fusion-header-wrapper{position: absolute;width:<?php echo $smof_data['site_width']; ?>;z-index: 10000;}
		<?php else: ?>
		.fusion-header-wrapper{position: absolute;width: <?php echo ( $site_width + 60 ); ?>px;z-index: 10000;}
		<?php endif; ?>	
		<?php else: ?>
		.fusion-header-wrapper{position: absolute;left:0;right:0;z-index: 10000;}
		<?php endif; ?>	
	}
<?php endif; ?>	

<?php if ( get_post_meta($c_pageID, 'pyre_avada_rev_styles', true) == 'no' || 
			( ! $smof_data['avada_rev_styles'] && get_post_meta($c_pageID, 'pyre_avada_rev_styles', true) != 'yes' ) ) : ?>

.rev_slider_wrapper{
	position:relative
}

<?php if( ( $smof_data['header_bg_color']['opacity'] == '1' && ! get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) ) || ( get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) && get_post_meta( $c_pageID, 'pyre_header_bg_opacity', true ) == 1 ) ): ?>
.rev_slider_wrapper .shadow-left{
	position:absolute;
	pointer-events:none;
	background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/shadow-top.png);
	background-repeat:no-repeat;
	background-position:top center;
	height:42px;
	width:100%;
	top:0;
	z-index:99;
}

.rev_slider_wrapper .shadow-left{top:-1px;}

<?php endif; ?>

.rev_slider_wrapper .shadow-right{
	position:absolute;
	pointer-events:none;
	background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/shadow-bottom.png);
	background-repeat:no-repeat;
	background-position:bottom center;
	height:32px;
	width:100%;
	bottom:0;
	z-index:99;
}

.avada-skin-rev{
	border-top: 1px solid #d2d3d4;
	border-bottom: 1px solid #d2d3d4;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
}

.tparrows{border-radius:0;}

.rev_slider_wrapper .tp-leftarrow, .rev_slider_wrapper .tp-rightarrow{
	opacity:0.8;
	position: absolute;
	top: 50% !important;
	margin-top:-31px !important;	
	width: 63px !important;
	height: 63px !important;
	background:none;
	background-color: rgba(0, 0, 0, 0.5) ;	
	color:#fff;
}

.rev_slider_wrapper .tp-leftarrow:before{
	content:"\e61e";
	-webkit-font-smoothing: antialiased;
}

.rev_slider_wrapper .tp-rightarrow:before{
	content:"\e620";
	-webkit-font-smoothing: antialiased;
}

.rev_slider_wrapper .tp-leftarrow:before, .rev_slider_wrapper .tp-rightarrow:before{
	position: absolute;
	padding:0;
	width: 100%;
	line-height: 63px;
	text-align: center;
	font-size: 25px;
	font-family: 'icomoon';

}

.rev_slider_wrapper .tp-leftarrow:before{
	margin-left: -2px;
}

.rev_slider_wrapper .tp-rightarrow:before{
	margin-left: -1px;
}

.rev_slider_wrapper .tp-rightarrow{
	left:auto;
	right:0;
}

.no-rgba .rev_slider_wrapper .tp-leftarrow, .no-rgba .rev_slider_wrapper .tp-rightarrow{
	background-color:#ccc ;
}

.rev_slider_wrapper:hover .tp-leftarrow,.rev_slider_wrapper:hover .tp-rightarrow{
	display:block;
	opacity:0.8;
}

.rev_slider_wrapper .tp-leftarrow:hover, .rev_slider_wrapper .tp-rightarrow:hover{
	opacity:1;
}

.rev_slider_wrapper .tp-leftarrow{
	background-position: 19px 19px ;
	left: 0;
	margin-left:0;
	z-index:100;
}

.rev_slider_wrapper .tp-rightarrow{
	background-position: 29px 19px ;
	right: 0;
	margin-left:0;
	z-index:100;
}

.rev_slider_wrapper .tp-leftarrow.hidearrows,
.rev_slider_wrapper .tp-rightarrow.hidearrows {
	opacity: 0;
}

.tp-bullets .bullet.last{
	clear:none;
}
<?php endif; ?>	

#main{
	<?php if($smof_data['content_bg_image'] && !get_post_meta($c_pageID, 'pyre_wide_page_bg_color', true)): ?>
	background-image:url(<?php echo $smof_data['content_bg_image']; ?>);
	background-repeat:<?php echo $smof_data['content_bg_repeat']; ?>;
		<?php if($smof_data['content_bg_full']): ?>
		background-attachment:fixed;
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>
	<?php endif; ?>

	<?php if($smof_data['main_top_padding'] && !get_post_meta($c_pageID, 'pyre_main_top_padding', true)): ?>
	padding-top: <?php echo $smof_data['main_top_padding']; ?>;
	<?php endif; ?>

	<?php if($smof_data['main_bottom_padding'] && !get_post_meta($c_pageID, 'pyre_main_bottom_padding', true)): ?>
	padding-bottom: <?php echo $smof_data['main_bottom_padding']; ?>;
	<?php endif; ?>
}

<?php if(get_post_meta($c_pageID, 'pyre_page_bg_layout', true) == 'wide' && get_post_meta($c_pageID, 'pyre_wide_page_bg_color', true)): ?>
html, body, #wrapper {
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_wide_page_bg_color', true); ?>;
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_wide_page_bg_color', true)): ?>
#main,#wrapper,
.fusion-separator .icon-wrapper, .bbp-arrow {
	background-color:<?php echo get_post_meta($c_pageID, 'pyre_wide_page_bg_color', true); ?>;
}
<?php endif; ?>

#main{
	<?php if(get_post_meta($c_pageID, 'pyre_wide_page_bg', true)): ?>
	background-image:url(<?php echo get_post_meta($c_pageID, 'pyre_wide_page_bg', true); ?>);
	background-repeat:<?php echo get_post_meta($c_pageID, 'pyre_wide_page_bg_repeat', true); ?>;
		<?php if(get_post_meta($c_pageID, 'pyre_wide_page_bg_full', true) == 'yes'): ?>
		background-attachment:fixed;
		background-position:center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		<?php endif; ?>
	<?php endif; ?>

	<?php if(get_post_meta($c_pageID, 'pyre_main_top_padding', true)): ?>
	padding-top:<?php echo get_post_meta($c_pageID, 'pyre_main_top_padding', true); ?>;
	<?php endif; ?>

	<?php if(get_post_meta($c_pageID, 'pyre_main_bottom_padding', true)): ?>
	padding-bottom:<?php echo get_post_meta($c_pageID, 'pyre_main_bottom_padding', true); ?>;
	<?php endif; ?>

}

<?php if ( get_post_meta( $c_pageID, 'pyre_sidebar_bg_color', true ) ): ?>
#main .sidebar { background-color: <?php echo get_post_meta($c_pageID, 'pyre_sidebar_bg_color', true); ?>; }
<?php endif; ?>

.fusion-page-title-bar{
	<?php if($smof_data['page_title_bg_full']): ?>
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	<?php endif; ?>

	<?php if(get_post_meta($c_pageID, 'pyre_page_title_bar_bg_full', true) == 'yes'): ?>
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	<?php elseif(get_post_meta($c_pageID, 'pyre_page_title_bar_bg_full', true) == 'no'): ?>
	-webkit-background-size: auto;
	-moz-background-size: auto;
	-o-background-size: auto;
	background-size: auto;
	<?php endif; ?>

	<?php if($smof_data['page_title_bg_parallax']): ?>
	background-attachment: fixed;
	background-position:top center;
	<?php endif; ?>

	<?php if(get_post_meta($c_pageID, 'pyre_page_title_bg_parallax', true) == 'yes'): ?>
	background-attachment: fixed;
	background-position:top center;
	<?php elseif(get_post_meta($c_pageID, 'pyre_page_title_bg_parallax', true) == 'no'): ?>
	background-attachment: scroll;
	<?php endif; ?>
}

<?php if(get_post_meta($c_pageID, 'pyre_page_title_height', true)): ?>
.fusion-page-title-bar{
	height:<?php echo get_post_meta($c_pageID, 'pyre_page_title_height', true); ?>;
}
<?php elseif($smof_data['page_title_height']): ?>
.fusion-page-title-bar{
	height:<?php echo $smof_data['page_title_height']; ?>;
}
<?php endif; ?>

<?php if( get_post_meta( $c_pageID, 'pyre_page_title_mobile_height', true) ): ?>
<?php endif; ?>

<?php if(is_single() && get_post_meta($c_pageID, 'pyre_fimg_width', true)): ?>
<?php if(get_post_meta($c_pageID, 'pyre_fimg_width', true) != 'auto'): ?>
#post-<?php echo $c_pageID; ?> .fusion-post-slideshow {max-width:<?php echo get_post_meta($c_pageID, 'pyre_fimg_width', true); ?>;}
<?php else: ?>
.fusion-post-slideshow .flex-control-nav{position:relative;text-align:left;margin-top:10px;}
<?php endif; ?>
#post-<?php echo $c_pageID; ?> .fusion-post-slideshow img{max-width:<?php echo get_post_meta($c_pageID, 'pyre_fimg_width', true); ?>;}
	<?php if(get_post_meta($c_pageID, 'pyre_fimg_width', true) == 'auto'): ?>
	#post-<?php echo $c_pageID; ?> .fusion-post-slideshow img{width:<?php echo get_post_meta($c_pageID, 'pyre_fimg_width', true); ?>;}
	<?php endif; ?>
<?php endif; ?>

<?php if(is_single() && get_post_meta($c_pageID, 'pyre_fimg_height', true)): ?>
#post-<?php echo $c_pageID; ?> .fusion-post-slideshow, #post-<?php echo $c_pageID; ?> .fusion-post-slideshow img{max-height:<?php echo get_post_meta($c_pageID, 'pyre_fimg_height', true); ?>;}
#post-<?php echo $c_pageID; ?> .fusion-post-slideshow .slides { max-height: 100%; }
<?php endif; ?>


<?php if(get_post_meta($c_pageID, 'pyre_page_title_bar_bg_retina', true)): ?>
@media only screen and ( -webkit-min-device-pixel-ratio: 1.5 ), 
		only screen and ( min-resolution: 144dpi ), 
		only screen and ( min-resolution: 1.5dppx )
{
	.fusion-page-title-bar {
		background-image: url(<?php echo get_post_meta($c_pageID, 'pyre_page_title_bar_bg_retina', true); ?>);
		-webkit-background-size:cover;
		   -moz-background-size:cover;
			 -o-background-size:cover;
				background-size:cover;
	}
}
<?php elseif($smof_data['page_title_bg_retina']): ?>
@media only screen and ( -webkit-min-device-pixel-ratio: 1.5 ), 
		only screen and ( min-resolution: 144dpi ), 
		only screen and ( min-resolution: 1.5dppx )
{
	.fusion-page-title-bar {
		background-image: url(<?php echo $smof_data['page_title_bg_retina']; ?>);
		-webkit-background-size:cover;
		   -moz-background-size:cover;
			 -o-background-size:cover;
				background-size:cover;
	}
}
<?php endif; ?>

<?php if ( ( $smof_data['page_title_bar'] == 'content_only' && get_post_meta( $c_pageID, 'pyre_page_title', true ) == 'default' ) || get_post_meta( $c_pageID, 'pyre_page_title', true ) == 'yes_without_bar' ): ?>
.fusion-page-title-bar {
	background: none;
	border: none;
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_hundredp_padding', true)): ?>
.width-100 .fullwidth-box, .width-100 .fusion-section-separator {
	margin-left: -<?php echo get_post_meta($c_pageID, 'pyre_hundredp_padding', true); ?>; margin-right: -<?php echo get_post_meta($c_pageID, 'pyre_hundredp_padding', true); ?>;
}
<?php elseif($smof_data['hundredp_padding']): ?>
.width-100 .fullwidth-box, .width-100 .fusion-section-separator {
	margin-left: -<?php echo $smof_data['hundredp_padding'] ?>; margin-right: -<?php echo $smof_data['hundredp_padding'] ?>;
}
<?php endif; ?>

<?php if((float) $wp_version < 3.8): ?>
#wpadminbar *{color:#ccc;}
#wpadminbar .hover a, #wpadminbar .hover a span{color:#464646;}
<?php endif; ?>

.woocommerce-invalid:after { content: '<?php echo __('Please enter correct details for this required field.', 'Avada'); ?>'; display: inline-block; margin-top: 7px; color: red; }

<?php if(get_post_meta($c_pageID, 'pyre_fallback', true)): ?>
@media only screen and (max-width: 940px){
	#sliders-container{display:none;}
	#fallback-slide{display:block;}
}
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait){
	#sliders-container{display:none;}
	#fallback-slide{display:block;}
}
<?php endif; ?>

<?php if($smof_data['side_header_width'] && get_post_meta( get_queried_object_id(), 'pyre_display_header', true) != 'no' ):
$side_header_width = $smof_data['side_header_width'];
$side_header_width = (int) str_replace('px', '', $side_header_width);
?>
body.side-header-left #wrapper, .side-header-left .fusion-footer-parallax{margin-left:<?php echo $smof_data['side_header_width']; ?>;}
body.side-header-right #wrapper, .side-header-right .fusion-footer-parallax{margin-right:<?php echo $smof_data['side_header_width']; ?>;}
body.side-header-left #side-header #nav > ul > li > ul, body.side-header-left #side-header #nav .login-box, body.side-header-left #side-header #nav .cart-contents, body.side-header-left #side-header #nav .main-nav-search-form{left:<?php echo ($side_header_width - 1); ?>px;}
body.rtl #boxed-wrapper{ position: relative; }
body.rtl.layout-boxed-mode.side-header-left #side-header{ position: absolute; left: 0; top: 0; margin-left:0px; }
body.rtl.side-header-left #side-header .side-header-wrapper{ position: fixed; width:<?php echo $smof_data['side_header_width']; ?>;}

<?php if( $smof_data['layout'] != 'Boxed' && get_post_meta($c_pageID, 'pyre_page_bg_layout', true) != 'boxed'): ?>
body.side-header-left #slidingbar .avada-row,
body.side-header-right #slidingbar .avada-row{max-width: none;}
<?php endif; ?>

<?php endif; ?>

<?php if( ( ( $smof_data['layout'] == 'Boxed' && get_post_meta( $c_pageID, 'pyre_page_bg_layout', true) != 'wide' ) || get_post_meta( $c_pageID, 'pyre_page_bg_layout', true ) == 'boxed' ) && $smof_data['header_position'] != 'Top' ): ?>
<?php if( ! $site_width_percent ): ?>
#boxed-wrapper,
.fusion-body .fusion-footer-parallax {
	margin: 0 auto;
	max-width: <?php echo (int) $smof_data['site_width'] + $smof_data['side_header_width'] + 60; ?>px;
}
#slidingbar-area .fusion-row{max-width: <?php echo (int) $smof_data['site_width'] + $smof_data['side_header_width']; ?>px;}
<?php else: ?>
#boxed-wrapper,
#slidingbar-area .fusion-row,
.fusion-footer-parallax {
	margin: 0 auto;
	max-width: -webkit-calc(<?php echo $smof_data['site_width'] . ' + ' . $smof_data['side_header_width']; ?>);
	max-width: -moz-calc(<?php echo $smof_data['site_width'] .  '+ ' . $smof_data['side_header_width']; ?>);
	max-width: -o-calc(<?php echo $smof_data['site_width'] . ' + ' . $smof_data['side_header_width']; ?>);
	max-width: calc(<?php echo $smof_data['site_width'] . ' + ' . $smof_data['side_header_width']; ?>);
}    
#wrapper {
   	max-width: none;
}
<?php endif; ?>	

<?php if( $smof_data['header_position'] == 'Left' ): ?>
body.side-header-left #side-header { 
    left: auto;
    margin-left: -<?php echo $smof_data['side_header_width'] ; ?>;
}

.side-header-left .fusion-footer-parallax{margin: 0 auto; padding-left:<?php echo $smof_data['side_header_width']; ?>;}
<?php else: ?>
#boxed-wrapper {
	position: relative;
}
body.admin-bar #wrapper #slidingbar-area {
    top: 0;
}

.side-header-right .fusion-footer-parallax{margin: 0 auto; padding-right:<?php echo $smof_data['side_header_width']; ?>;}

@media only screen and (min-width: 800px) {
    body.side-header-right #side-header { 
        position: absolute;
        top: 0;
    }    
    body.side-header-right #side-header .side-header-wrapper { 
        position: fixed;
    	width: <?php echo $smof_data['side_header_width'] ; ?>;
    }
}
<?php endif; ?>	

<?php endif; ?>	

<?php if(is_page_template('contact.php') && $smof_data['gmap_address'] && !$smof_data['status_gmap']): ?>
.avada-google-map{
	width:<?php echo $smof_data['gmap_width']; ?>;
	margin:0 auto;
	<?php if($smof_data['gmap_width'] != '100%'): ?>
	<?php if($smof_data['gmap_topmargin']): ?>
	margin-top:<?php echo $smof_data['gmap_topmargin']; ?>;
	<?php else: ?>
	margin-top:55px;
	<?php endif; ?>
	<?php endif; ?>

	<?php if($smof_data['gmap_height']): ?>
	height:<?php echo $smof_data['gmap_height']; ?>;
	<?php else: ?>
	height:415px;
	<?php endif; ?>
}
<?php endif; ?>

<?php if(is_page_template('contact-2.php') && $smof_data['gmap_address'] && !$smof_data['status_gmap']): ?>
.avada-google-map{
	margin:0 auto;
	margin-top:55px;
	height:415px !important;
	width:940px !important;		
}
<?php endif; ?>

<?php
if(get_post_meta($c_pageID, 'pyre_footer_100_width', true) == 'yes'): ?>
.layout-wide-mode .fusion-footer-widget-area > .fusion-row, .layout-wide-mode .fusion-footer-copyright-area > .fusion-row {
	max-width: 100% !important;
}
<?php elseif(get_post_meta($c_pageID, 'pyre_footer_100_width', true) == 'no'): ?>
.layout-wide-mode .fusion-footer-widget-area > .fusion-row, .layout-wide-mode .fusion-footer-copyright-area > .fusion-row {
	max-width: <?php echo $smof_data['site_width']; ?> !important;
}
<?php endif; ?>

<?php if( get_post_meta($c_pageID, 'pyre_page_title_font_color', true) && get_post_meta($c_pageID, 'pyre_page_title_font_color', true) != '' ): ?>
.fusion-page-title-bar h1, .fusion-page-title-bar h3{
	color:<?php echo get_post_meta( $c_pageID, 'pyre_page_title_font_color', true ); ?>;
}
<?php endif; ?>

<?php if( get_post_meta($c_pageID, 'pyre_page_title_text_size', true) && get_post_meta($c_pageID, 'pyre_page_title_text_size', true) != '' ): ?>
.fusion-page-title-bar h1{
	font-size:<?php echo get_post_meta( $c_pageID, 'pyre_page_title_text_size', true ); ?>;
	line-height:normal;
}
<?php endif; ?>

<?php if( get_post_meta($c_pageID, 'pyre_page_title_custom_subheader_text_size', true) && get_post_meta($c_pageID, 'pyre_page_title_custom_subheader_text_size', true) != '' ): ?>
.fusion-page-title-bar h3{
	font-size:<?php echo get_post_meta( $c_pageID, 'pyre_page_title_custom_subheader_text_size', true ); ?>;
	line-height: <?php echo intval($smof_data['page_title_subheader_font_size']) + 12;?>px;
}
<?php endif; ?>

<?php if( $smof_data['responsive'] && ! $smof_data['ipad_potrait'] && get_post_meta($c_pageID, 'pyre_page_title_height', true) ): ?>
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait) {
	#wrapper .fusion-page-title-bar{
		height:<?php echo get_post_meta($c_pageID, 'pyre_page_title_height', true); ?> !important;
	}
}
<?php endif; ?>

<?php if(get_post_meta($c_pageID, 'pyre_page_title_100_width', true) == 'yes'): ?>
.layout-wide-mode .fusion-page-title-row { max-width: 100%; }
<?php elseif(get_post_meta($c_pageID, 'pyre_page_title_100_width', true) == 'no'): ?>
.layout-wide-mode .fusion-page-title-row { max-width: <?php echo $site_width; ?>; }
<?php endif; ?>

<?php
$header_width = $smof_data['header_100_width'];
if(get_post_meta($c_pageID, 'pyre_header_100_width', true) == 'yes') {
	$header_width = true;
} elseif(get_post_meta($c_pageID, 'pyre_header_100_width', true) == 'no') {
	$header_width = false;
}
if($header_width): ?>
.layout-wide-mode .fusion-header-wrapper .fusion-row { max-width: 100%; }
<?php endif; ?>
@media only screen and (min-device-width: 768px) and (max-device-width: 1366px) and (orientation: portrait){
    .products .product-list-view { width: 100% !important; min-width:100% !important;}
}

<?php
$button_text_color_brightness = fusion_calc_color_brightness( $smof_data['button_accent_color'] );
if ( $button_text_color_brightness > 140 ): ?>
<?php endif;

$button_hover_text_color_brightness = fusion_calc_color_brightness( $smof_data['button_accent_hover_color'] );
if ( $button_hover_text_color_brightness > 140 ) {
	$text_shadow_color = '#333';
} else {
	$text_shadow_color = '#fff';
}
?>

<?php if( get_post_meta( $c_pageID, 'pyre_page_title_mobile_height', true ) ): ?>
@media only screen and ( max-width: 800px ) {
	<?php if( get_post_meta( $c_pageID, 'pyre_page_title_mobile_height', true ) != 'auto' ): ?>
	.fusion-body .fusion-page-title-bar {
		height: <?php echo get_post_meta( $c_pageID, 'pyre_page_title_mobile_height', true ); ?>
	}

	.fusion-page-title-row {
		display: table;
	}
	
	.fusion-page-title-wrapper {
		display: table-cell;
		vertical-align: middle;
	}
	<?php endif; ?>

	<?php if( get_post_meta( $c_pageID, 'pyre_page_title_mobile_height', true ) == 'auto' ): ?>
	.fusion-body .fusion-page-title-bar {
		padding-top: 10px;
		padding-bottom: 10px;
		height: auto;
	}
	<?php endif; ?>
}
<?php endif; ?>

<?php echo $smof_data['custom_css']; ?>