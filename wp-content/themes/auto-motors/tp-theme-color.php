<?php

	$automobile_hub_tp_color_option = get_theme_mod('automobile_hub_tp_color_option');
	$automobile_hub_tp_color_option_link = get_theme_mod('automobile_hub_tp_color_option_link');

	$automobile_hub_tp_theme_css = '';

	if($automobile_hub_tp_color_option != false){
		$automobile_hub_tp_theme_css .='.prev.page-numbers, .next.page-numbers, .page-numbers, #theme-sidebar button[type="submit"], #footer button[type="submit"], #theme-sidebar .tagcloud a:hover, .headerbox i, .headerbox i:after, #comments input[type="submit"], span.meta-nav, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, #return-to-top, .error-404 [type="submit"], button[type="submit"],.car-button a, .more-btn{';
			$automobile_hub_tp_theme_css .='background-color: '.esc_attr($automobile_hub_tp_color_option).';';
		$automobile_hub_tp_theme_css .='}';
	}
	if($automobile_hub_tp_color_option != false){
		$automobile_hub_tp_theme_css .='a, .box-content a, #theme-sidebar .textwidget a, #footer .textwidget a, .comment-body a, .entry-content a, .entry-summary a, .main-navigation a:hover, .search-box i, #theme-sidebar h3, #theme-sidebar a:hover, .headerbox i:hover, .headerbox i:hover:after, p.infotext, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .social-media i:hover, #about h3, #featured-car h6{';
			$automobile_hub_tp_theme_css .='color: '.esc_attr($automobile_hub_tp_color_option).';';
		$automobile_hub_tp_theme_css .='}';
	}
	if($automobile_hub_tp_color_option != false){
		$automobile_hub_tp_theme_css .='.woocommerce-info,.woocommerce-message{';
			$automobile_hub_tp_theme_css .='border-color: '.esc_attr($automobile_hub_tp_color_option).';';
		$automobile_hub_tp_theme_css .='}';
	}

	if($automobile_hub_tp_color_option_link != false){
		$automobile_hub_tp_theme_css .='a:hover,#theme-sidebar a:hover{';
			$automobile_hub_tp_theme_css .='color: '.esc_attr($automobile_hub_tp_color_option_link).';';
		$automobile_hub_tp_theme_css .='}';
	}
	