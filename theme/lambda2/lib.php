<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package   theme_lambda2
 * @copyright 2024 redPIthemes
 *
 */

defined('MOODLE_INTERNAL') || die();

function theme_lambda2_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    $theme = theme_config::load('lambda2');

    if ($context->contextlevel == CONTEXT_SYSTEM ) {
        if ($filearea === 'page_bg_img') {
        	return $theme->setting_file_serve('page_bg_img', $args, $forcedownload, $options);
        } else if (preg_match("/slideshow_image_[1-9][0-9]*/", $filearea) !== false) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if ($filearea === 'login_bg_img_1') {
            return $theme->setting_file_serve('login_bg_img_1', $args, $forcedownload, $options);
    	} else if ($filearea === 'login_bg_img_2') {
            return $theme->setting_file_serve('login_bg_img_2', $args, $forcedownload, $options);
    	} else if ($filearea === 'login_bg_img_3') {
            return $theme->setting_file_serve('login_bg_img_3', $args, $forcedownload, $options);
    	} else if ($filearea === 'login_bg_img_4') {
            return $theme->setting_file_serve('login_bg_img_4', $args, $forcedownload, $options);
    	} else if ($filearea === 'login_bg_vid') {
            return $theme->setting_file_serve('login_bg_vid', $args, $forcedownload, $options);
    	} else if ($filearea === 'favicon') {
            return $theme->setting_file_serve('favicon', $args, $forcedownload, $options);
    	} else if ($filearea === 'header_background') {
        	return $theme->setting_file_serve('header_background', $args, $forcedownload, $options);
    	} else if ($filearea === 'fonts_file_body') {
        	return $theme->setting_file_serve('fonts_file_body', $args, $forcedownload, $options);
    	} else if ($filearea === 'fonts_file_headings') {
        	return $theme->setting_file_serve('fonts_file_headings', $args, $forcedownload, $options);
		} else {
        	send_file_not_found();
    	}
    } else {
        send_file_not_found();
    }
}

function theme_lambda2_get_main_scss_content($theme) {
    global $CFG;
  	global $OUTPUT;

    $scss = file_get_contents($CFG->dirroot . '/theme/lambda2/scss/main.scss');
	$logoheight = $theme->settings->logo_height;
	$google_fonts = $theme->settings->fonts_source;
		if ($google_fonts == 1) {
			$font_body = $theme->settings->font_body;
			$font_body = str_replace("+", " ", $font_body);
			$font_heading = $theme->settings->font_heading;
			$bodyweight = 400;
			$headingweight = 700;
			switch ($font_heading) {
				case "Abril+Fatface":
				$headingweight = 400;
				break;
				case "Bevan":
				$headingweight = 400;
				break;
				case "Bree+Serif":
				$headingweight = 400;
				break;
				case "Cantata+One":
				$headingweight = 400;
				break;
				case "Imprima":
				$headingweight = 400;
				break;
				case "Lobster":
				$headingweight = 400;
				break;
				case "Pacifico":
				$headingweight = 400;
				break;
				case "Pontano+Sans":
				$headingweight = 400;
				break;
				case "Raleway":
				$headingweight = 500;
				break;
				case "Roboto":
				$headingweight = 500;
				break;
				case "Sansita+One":
				$headingweight = 400;
				break;
			}
			$font_heading = str_replace("+", " ", $font_heading);
		}
		else {
			$font_heading = 'custom_heading_font';
			$headingweight = $theme->settings->font_headings_weight;
			if (!is_null($theme->setting_file_url('fonts_file_headings', 'fonts_file_headings'))) {
                $font_heading_src = "url(".$theme->setting_file_url('fonts_file_headings', 'fonts_file_headings').")";
            }
			$font_body = 'custom_body_font';
			if (!is_null($theme->setting_file_url('fonts_file_body', 'fonts_file_body'))) {
                $font_body_src = "url(".$theme->setting_file_url('fonts_file_body', 'fonts_file_body').")";
            }
		}

        $scss = theme_lambda2_set_headingfont($scss, $font_heading, $headingweight);
        $scss = theme_lambda2_set_bodyfont($scss, $font_body);
        $scss = theme_lambda2_set_fontface($scss, $google_fonts, $font_heading, $font_body, $font_heading_src, $font_body_src, $linearicons);
		
	$page_layout = $theme->settings->page_layout;
	
	if (!is_null($theme->setting_file_url('page_bg_img', 'page_bg_img'))) {
		$pagebackground = $theme->setting_file_url('page_bg_img', 'page_bg_img');
		if ($theme->settings->page_bg_repeat == 0) {$repeat = 'no-repeat fixed 0 0'; $size = 'cover';}
		else {$repeat = 'repeat fixed 0 0'; $size = 'auto';}
        $opacity = $theme->settings->page_bg_img_opacity;
        $bgcolor = $theme->settings->page_bg_color;
		$scss = theme_lambda2_set_backgroundimage($scss, $page_layout, $pagebackground, $repeat, $size, $bgcolor, $opacity);
	}
	
	if (!is_null($theme->setting_file_url('header_background', 'header_background'))) {
		$headerbackground = $theme->setting_file_url('header_background', 'header_background');
		$repeat = $theme->settings->header_bg_repeat;
		$scss = theme_lambda2_set_headerbackgroundimage($scss, $headerbackground, $repeat);
	}

    $login_bg_type = $theme->settings->login_bg_type;

    if (($login_bg_type == 0) && (!is_null($theme->setting_file_url('login_bg_img_1', 'login_bg_img_1')))) {
		$loginbgimg = $theme->setting_file_url('login_bg_img_1', 'login_bg_img_1');
		$repeat = $theme->settings->login_bg_repeat;
		$scss = theme_lambda2_set_loginbgimg($scss, $loginbgimg, $repeat);
	}
    if ($login_bg_type == 3) {
		$col1 = $theme->settings->login_bgcolor_gradient;
		$col2 = $theme->settings->login_bgcolor;
		$scss = theme_lambda2_set_loginbgcol($scss, $col1, $col2);
	}
	
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();
    $context = context_system::instance();
    if ($filename == 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/lambda2/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/lambda2/scss/preset/plain.scss');
    } else if ($filename == 'legacy.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/lambda2/scss/preset/legacy.scss');
    } else {
        $scss .= file_get_contents($CFG->dirroot . '/theme/lambda2/scss/preset/default.scss');
    }

    return $scss;
}

function theme_lambda2_get_pre_scss($theme) {
    global $CFG;
	static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('lambda2');
    }

    $scss = '';
    $configurable = [
        // Config key => [variableName, ...].
        'maincolor' => ['maincolor'],
        'page_bg_color' => ['page_bg_color'],
		'link_color' => ['link_color'],
		'secondcolor' => ['secondcolor'],
        'button_border_radius' => ['button_border_radius'],
		'headercolor' => ['headercolor'],
        'headerfontcolor' => ['headerfontcolor'],
		'menufirstlevelcolor' => ['menufirstlevelcolor'],
		'menufirstlevel_linkcolor' => ['menufirstlevel_linkcolor'],
		'menusecondlevelcolor' => ['menusecondlevelcolor'],
		'menusecondlevel_linkcolor' => ['menusecondlevel_linkcolor'],
        'drawer_bg_color' => ['drawer_bg_color'],
        'drawer_font_color' => ['drawer_font_color'],
		'socials_icons_color' => ['socials_icons_color'],
        'socials_text_color' => ['socials_text_color'],
		'font_body_size' => ['font_body_size'],
        'body_color' => ['body_color'],
        'heading_color' => ['heading_color'],
		'footercolor' => ['footercolor'],
		'footerheadingcolor' => ['footerheadingcolor'],
		'footertextcolor' => ['footertextcolor'],
		'copyrightcolor' => ['copyrightcolor'],
		'copyright_textcolor' => ['copyright_textcolor'],
        'page_width' => ['page_width'],
        'logo_height' => ['logo_height'],
        'compact_logo_height' => ['compact_logo_height'],
        'header_border_width' => ['header_border_width']
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        array_map(function($target) use (&$scss, $value) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }, (array) $targets);
    }

    return $scss;
}

function theme_lambda2_get_extra_scss($theme) {
    global $SITE, $CFG;
    $xscss = '';
	
	$socials_lambda_bg = $theme->settings->socials_lambda_bg;
    if($theme->settings->socials_position == '1') {
        $xscss .= '#footer-top > .container-fluid {background: ';
    } else if($theme->settings->socials_position == '2') {
        $xscss .= '.socials-lambda {background: ';
    }
    if ($xscss !== '') {
        switch ($socials_lambda_bg) {
            case 0:
                $xscss .= 'transparent;}';
                break;
            case 1:
                $xscss .= 'rgba(0,0,0,0.025);}';
                break;
            case 2:
                $xscss .= $theme->settings->maincolor.';}';
                break;
            case 3:
                $xscss .= $theme->settings->secondcolor.';}';
                break;
            case 4:
                $xscss .= $theme->settings->copyrightcolor.';}';
                break;
        }
    }

    $home_button = $theme->settings->home_button;
    $shortsitename = format_string($SITE->shortname);
    if ($home_button == 1) {
        $xscss .= '.lambda-nav .moremenu .navbar-nav > li[data-key="home"] > a::before {content: "'.$shortsitename.'"; font-size: 1rem;} .lambda-nav .moremenu .navbar-nav > li[data-key="home"] > a {font-size: 0;}';
    }
    if ($home_button == 2) {
        $xscss .= '.lambda-nav .moremenu .navbar-nav > li[data-key="home"] > a::before {content: "\e907"; font-family: lambda-icons; font-size: 1.15rem; border-radius: 50%; width: 30px; height: 30px; text-align: center; line-height: 30px;} .lambda-nav .moremenu .navbar-nav > li[data-key="home"] > a {font-size: 0;}';
    }
    if ($home_button == 3) {
        $xscss .= '.lambda-nav .moremenu .navbar-nav > li[data-key="home"] {display: none;}';
    }

    $activity_icons = $theme->settings->activity_icons;
    if ($activity_icons == 2) {
        $xscss .= '.activity-item, .page-context-header {.activityiconcontainer {background-color: transparent; padding: 0; width: 24px !important; height: 24px !important;} .activityiconcontainer img.activityicon {filter: none !important;} .text-uppercase.small {display: none;}} .pagelayout-incourse .page-context-header {align-items: center;} .pagelayout-incourse .page-context-header .page-header-image {display: flex;} .activity-item .activity-grid {align-items: baseline !important;}';
    }
    if ($activity_icons == 3) {
        $xscss .= '.activity-item, .page-context-header {.activityiconcontainer {background-color: '.$theme->settings->maincolor.';} .activityiconcontainer img.activityicon {filter: none !important;} .text-uppercase.small {display: none;}} .pagelayout-incourse .page-context-header {align-items: center;} .pagelayout-incourse .page-context-header .page-header-image {display: flex;} .activity-item .activity-grid {align-items: baseline !important;} .activity-item .activity-grid .activityiconcontainer {margin-right: 16px !important;} .activity-item .activityiconcontainer {width: 24px !important; height: 24px !important; min-width: 24px !important;} .page-context-header .activityiconcontainer {width: 26px !important; height: 26px !important; min-width: 26px !important;}';
    }
    if ($activity_icons == 4) {
        $xscss .= '.activity-item, .page-context-header {.activityiconcontainer {background-color: '.$theme->settings->maincolor.';} .activityiconcontainer img.activityicon {filter: brightness(0) invert(1) !important;} .text-uppercase.small {display: none;}} .pagelayout-incourse .page-context-header {align-items: center;} .pagelayout-incourse .page-context-header .page-header-image {display: flex;} .activity-item .activity-grid {align-items: baseline !important;} .activity-item .activity-grid .activityiconcontainer {margin-right: 14px !important;} .activity-item .activityiconcontainer {width: 28px !important; height: 28px !important; min-width: 28px !important;} .page-context-header .activityiconcontainer {width: 34px !important; height: 34px !important; min-width: 34px !important;}';
    }
    if ($activity_icons == 5) {
        $xscss .= '.activity-item, .page-context-header {.activityiconcontainer {background-color: '.$theme->settings->secondcolor.';} .activityiconcontainer img.activityicon {filter: none !important;} .text-uppercase.small {display: none;}} .pagelayout-incourse .page-context-header {align-items: center;} .pagelayout-incourse .page-context-header .page-header-image {display: flex;} .activity-item .activity-grid {align-items: baseline !important;} .activity-item .activity-grid .activityiconcontainer {margin-right: 16px !important;} .activity-item .activityiconcontainer {width: 24px !important; height: 24px !important; min-width: 24px !important;} .page-context-header .activityiconcontainer {width: 26px !important; height: 26px !important; min-width: 26px !important;}';
    }
    if ($activity_icons == 6) {
        $xscss .= '.activity-item, .page-context-header {.activityiconcontainer {background-color: '.$theme->settings->secondcolor.';} .activityiconcontainer img.activityicon {filter: brightness(0) invert(1) !important;} .text-uppercase.small {display: none;}} .pagelayout-incourse .page-context-header {align-items: center;} .pagelayout-incourse .page-context-header .page-header-image {display: flex;} .activity-item .activity-grid {align-items: baseline !important;} .activity-item .activity-grid .activityiconcontainer {margin-right: 14px !important;} .activity-item .activityiconcontainer {width: 28px !important; height: 28px !important; min-width: 28px !important;} .page-context-header .activityiconcontainer {width: 34px !important; height: 34px !important; min-width: 34px !important;}';
    }
    if ($activity_icons == 7) {
        if ($CFG->version >= 2024042200) {
            $xscss .= '.activityiconcontainer:not(.isbranded) .activityicon:not(.nofilter) {filter: brightness(0) invert(1) !important;} .activityiconcontainer.smaller {width: 40px; height: 40px; max-width: 40px; max-height: 40px;} .activityiconcontainer.isbranded {background-color: #d4d4d4 !important;} .activityiconcontainer.assessment {background-color: #eb66a2;} .activityiconcontainer.content, .activityiconcontainer.interactivecontent {background-color: #399be2;} .activityiconcontainer.communication {background-color: #11a676;} .activityiconcontainer.collaboration {background-color: #f7634d;}';
        } else {
            $xscss .= '.activity-item, .page-context-header {.activityiconcontainer {background-color: transparent; padding: 0; width: 24px !important; height: 24px !important;} .text-uppercase.small {display: none;}} .pagelayout-incourse .page-context-header {align-items: center;} .pagelayout-incourse .page-context-header .page-header-image {display: flex;} .activity-item .activity-grid {align-items: baseline !important;} .activityiconcontainer.assessment:not(.isbranded) .activityicon:not(.nofilter) {filter: invert(36%) sepia(98%) saturate(6969%) hue-rotate(315deg) brightness(90%) contrast(119%);} .activityiconcontainer.content:not(.isbranded) .activityicon:not(.nofilter) {filter: invert(49%) sepia(52%) saturate(4675%) hue-rotate(156deg) brightness(89%) contrast(102%);} .activityiconcontainer.communication:not(.isbranded) .activityicon:not(.nofilter) {filter: invert(48%) sepia(74%) saturate(4887%) hue-rotate(11deg) brightness(102%) contrast(101%);} .activityiconcontainer.collaboration:not(.isbranded) .activityicon:not(.nofilter) {filter: invert(25%) sepia(54%) saturate(6226%) hue-rotate(245deg) brightness(100%) contrast(102%);}';
        }        
    }

    $category_layout = $theme->settings->category_layout;
    if ($category_layout != 0) {
        $xscss .= '.frontpage-course-list-enrolled, .courses.frontpage-course-list-all, .course_category_tree .category-browse {display: flex; flex-wrap: wrap; justify-content: space-evenly;}';
    }

    $maincolor = $theme->settings->maincolor;
    $headerborderwidth = $theme->settings->header_border_width;
    $headerbordercolor = $theme->settings->header_border_color;
    switch ($headerbordercolor) {
        case 0:
            $bordercolor = $maincolor;
            break;
        case 1:
            $bordercolor = $theme->settings->secondcolor;
            break;
        case 2:
            $bordercolor = 'rgba(0,0,0,.1)';
            break;
        case 3:
            $bordercolor = 'rgba(255,255,255,.1)';
            break;
    }

	if($theme->settings->header_border == 0) {
        if($theme->settings->header_style == 2) {
            $xscss .= '.lambda-nav {border-top: '.$headerborderwidth.' solid '.$bordercolor.';}';
        } else {
            $xscss .= '.wrapper-lambda {border-top: '.$headerborderwidth.' solid '.$bordercolor.';}';
        }
    } else if($theme->settings->header_border == 1) {
        if($theme->settings->header_style == 2) {
            $xscss .= '.lambda-nav {border-bottom: '.$headerborderwidth.' solid '.$bordercolor.' !important;}';
        } else {
            $xscss .= '#main-header {border-bottom: '.$headerborderwidth.' solid '.$bordercolor.';}';
        }
    }

    if($theme->settings->login_hide_userpw_form) {
        $xscss .= '#page-login-index form#login {display: none;}';
    }

    if($theme->settings->socials_monochrome) {
        $xscss .= '.socials-lambda .social_icons a.social {background: transparent !important;color: #a9a9a9 !important;width: auto;height: auto;border: none !important;}';
        $xscss .= '#main-header .socials-lambda .social_icons a.social {font-size: 1.35rem;}';
        $xscss .= '.socials-lambda .social_icons a.social:hover {color: '.$maincolor.' !important;}';
    }

    if($theme->settings->site_home_items_headings == '02') {
        $xscss .= '#frontpage-available-course-list > h2, #frontpage-category-names > h2, #frontpage-category-combo > h2, #site-news-forum > h2, #frontpage-course-list > h2 {margin-top: 2rem;}';
        $xscss .= '#frontpage-available-course-list > h2:after, #frontpage-category-names > h2:after, #frontpage-category-combo > h2:after, #site-news-forum > h2:after, #frontpage-course-list > h2:after {background: '.$maincolor.' none repeat scroll 0 0; border-radius: 4px; content: ""; display: block; height: 4px; position: relative; width: 85px; margin: 1rem 0 0 0;}';
    }
    if($theme->settings->site_home_items_headings == '03') {
        $xscss .= '#frontpage-available-course-list > h2, #frontpage-category-names > h2, #frontpage-category-combo > h2, #site-news-forum > h2, #frontpage-course-list > h2 {text-align: center;}';
    }
    if($theme->settings->site_home_items_headings == '04') {
        $xscss .= '#frontpage-available-course-list > h2, #frontpage-category-names > h2, #frontpage-category-combo > h2, #site-news-forum > h2, #frontpage-course-list > h2 {text-align: center; margin-top: 2rem;}';
        $xscss .= '#frontpage-available-course-list > h2:after, #frontpage-category-names > h2:after, #frontpage-category-combo > h2:after, #site-news-forum > h2:after, #frontpage-course-list > h2:after {background: '.$maincolor.' none repeat scroll 0 0; border-radius: 4px; content: ""; display: block; height: 4px; position: relative; width: 85px; margin: 1rem auto 0 auto;}';
    }
    
    if($theme->settings->fp_clean_layout) {
        $xscss .= '.pagelayout-incourse.course-1 #page {background: #fff !important;} .pagelayout-incourse.course-1 #page-content {border: none;} .pagelayout-incourse.course-1 #footer-top, .pagelayout-frontpage #footer-top {background-color: '.$theme->settings->page_bg_color.';}';
    }

    if($theme->settings->fp_no_page_header) {
        $xscss .= '.course-1.path-mod-page, .course-1.path-mod-book {.page-header-headings h1.h2 {display: none;} #page-header.header-maxwidth .mr-auto {margin-top: 1rem !important; margin-bottom: 1rem !important;}} .course-1.path-mod-page.notloggedin #lambda-incourse-header .d-flex.align-items-center, .course-1.path-mod-book.notloggedin #lambda-incourse-header .d-flex.align-items-center {display: block !important;}';
    }

    if($theme->settings->footerlinkcolor == '1') {
        $xscss .= '#page-footer a:not(.btn):not(.dropdown-item) {color: '.$maincolor.';}';
    }
    if($theme->settings->footerlinkcolor == '2') {
        $xscss .= '#page-footer a:not(.btn):not(.dropdown-item) {color: '.$theme->settings->footertextcolor.'; text-decoration: underline;}';
    }

    $iconsbg = 'transparent';
    if($theme->settings->header_style == 2) {
        $hexCode = $theme->settings->headercolor;
    }
    else {
        $hexCode = $theme->settings->menufirstlevelcolor;
    }
    $r = hexdec(substr($hexCode, 0, 2)) / 255;
    $g = hexdec(substr($hexCode, 2, 2)) / 255;
    $b = hexdec(substr($hexCode, 4, 2)) / 255;
    if ($r <= 0.03928) {
        $r = $r / 12.92;
    } else {
        $r = pow((($r + 0.055) / 1.055), 2.4);
    }
    if ($g <= 0.03928) {
        $g = $g / 12.92;
    } else {
        $g = pow((($g + 0.055) / 1.055), 2.4);
    }
    if ($b <= 0.03928) {
        $b = $b / 12.92;
    } else {
        $b = pow((($b + 0.055) / 1.055), 2.4);
    }
    $luminosity = 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;
    if ($luminosity > .6) {
        $iconsbg = 'rgba(0,0,0,.05)';
    } else if ($luminosity > .475) {
        $iconsbg = 'rgba(0,0,0,.075)';
    } else if ($luminosity > .35) {
        $iconsbg = 'rgba(0,0,0,.1)';
    } else {
        $iconsbg = 'rgba(255,255,255,.1)';
    }
    if($theme->settings->home_button == 2) {
        $xscss .= '.lambda-nav .moremenu .navbar-nav li[data-key="home"]>a::before, .lambda-search-bar i.lambda {background-color: '.$iconsbg.' !important;}';
    }
    $xscss .= '.lambda-search-bar:focus-within #lambda-navbarsearch-form, .navbar .editmode-switch-form .custom-control-label::before {background-color: '.$iconsbg.';}';

    $pagecolor = $theme->settings->page_bg_color;
    $pagecolor = strtolower($pagecolor);
    if ($pagecolor === '#fff' || $pagecolor === '#ffffff') {
        $xscss .= '#page #page-content {border: none;}';
    }

    $headercolor = $theme->settings->headercolor;
    $headercolor = strtolower($headercolor);
    if (!($headercolor === '#fff' || $headercolor === '#ffffff')) {
        $xscss .= '.lambda-login input#username, .lambda-login input#password {background-color: rgba(255, 255, 255, .2) !important; border-radius: .2rem !important; color: '.$theme->settings->headerfontcolor.';} .lambda-login .login-form .login-form-username:before, .lambda-login .login-form .login-form-password:before {left: 3px !important;} .lambda-login input#username::placeholder, .lambda-login input#password::placeholder {color: '.$theme->settings->headerfontcolor.' !important; opacity: .75 !important}';
    }
	
	$xscss .= $theme->settings->customscss;
	
    return $xscss;
}

function theme_lambda2_set_fontface($scss, $google_fonts, $font_heading, $font_body, $font_heading_src, $font_body_src) {
    global $CFG;

    $tag = '[[setting:fontface]]';
	$replacement = '';
    if ($google_fonts == 1) {
        if ($font_heading == 'Open Sans') {
            $replacement .= '@font-face {font-weight: bold; font-family: "Open Sans"; src: url([[font:theme|OpenSans-Bold.ttf]]) format("truetype");}';
        }
        if ($font_body == 'Open Sans') {
            $replacement .= '@font-face {font-weight: normal; font-family: "Open Sans"; src: url([[font:theme|OpenSans-Regular.ttf]]) format("truetype");}';
        }
    } else {
        if ($font_heading_src != '') {$replacement .= '@font-face {font-family: "custom_heading_font"; src: '.$font_heading_src.';}';}
        if ($font_body_src != '') {$replacement .= ' @font-face {font-family: "custom_body_font"; src: '.$font_body_src.';}';}
    }
    $scss = str_replace($tag, $replacement, $scss);

    $tag = '[[setting:fontawesome]]';
	$replacement = 'FontAwesome';
    if ($CFG->version >= 2023042400) {$replacement = '"Font Awesome 6 Free"';}
    $scss = str_replace($tag, $replacement, $scss);

    return $scss;
}

function theme_lambda2_set_headingfont($scss, $font_heading, $headingweight) {
    $tag = '[[setting:font_heading]]';
    $replacement = $font_heading;
    if (is_null($replacement)) {
        $replacement = 'Open Sans';
    }
    $scss = str_replace($tag, $replacement, $scss);
    $tag = '[[setting:headingweight]]';
    $replacement = $headingweight;
    if (is_null($replacement)) {
        $replacement = '700';
    }
    $scss = str_replace($tag, $replacement, $scss);
    return $scss;
}

function theme_lambda2_set_bodyfont($scss, $font_body) {
    $tag = '[[setting:font_body]]';
    $replacement = $font_body;
    if (is_null($replacement)) {
        $replacement = 'Open Sans';
    }
    $scss = str_replace($tag, $replacement, $scss);
    return $scss;
}

function theme_lambda2_set_backgroundimage($scss, $page_layout, $pagebackground, $repeat, $size, $bgcolor, $opacity) {
	$content = '';
    if ($page_layout == 0) {
        $content = '.layout-full #page {background: url("'.$pagebackground.'") '.$repeat.'; background-size: '.$size.';}';
        if ($opacity > 0) {$hexopac = dechex($opacity); $content .= '#page-wrapper-outer .wrapper-lambda {background: '.$bgcolor.$hexopac.';}';}
    }
	if ($page_layout == 1) {
        $content = '.layout-boxed {background: url("'.$pagebackground.'") '.$repeat.'; background-size: '.$size.';}';
        if ($opacity > 0) {$hexopac = dechex($opacity); $content .= '.wrapper-lambda-outer {background: '.$bgcolor.$hexopac.';}';}
    }
	$scss .= $content;
    return $scss;
}

function theme_lambda2_set_headerbackgroundimage($scss, $headerbackground, $repeat) {
	$content = '';
	if ($repeat == 0) {$content = '#main-header {background: url("'.$headerbackground.'") no-repeat 0 50%; background-size: cover;}';}
	if ($repeat == 1) {$content = '#main-header {background: url("'.$headerbackground.'");}';}
	$scss .= $content;
    return $scss;
}

function theme_lambda2_set_loginbgimg($scss, $loginbgimg, $repeat) {
	$content = '.path-login.lambda-login.bg-img #page {background: url("'.$loginbgimg.'")';
	if ($repeat == 0) {$content .= ' no-repeat 0 50%; background-size: cover';}
    $content .= ';}';
	$scss .= $content;
    return $scss;
}

function theme_lambda2_set_loginbgcol($scss, $col1, $col2) {
	$content = '.path-login.lambda-login.bg-color {background-image: linear-gradient(to right,'.$col1.' 0%,'.$col2.' 100%);}';
    $scss .= $content;
    return $scss;
}

function theme_lambda2_get_setting($setting, $format = false) {
    global $CFG;
    require_once($CFG->dirroot . '/lib/weblib.php');
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('lambda2');
    }
    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}

function theme_lambda2_get_pagetype() {
    global $PAGE;
    return $PAGE->pagetype;
}

function theme_lambda2_get_moodle_version() {
    global $CFG;
    if ($CFG->version >= 2024042200) {
        return 'm-44';
    } else if ($CFG->version >= 2023100900) {
        return 'm-43';
    } else if ($CFG->version >= 2023042400) {
        return 'm-42';
    } else if ($CFG->version >= 2022112800) {
        return 'm-41';
    } else {
        return 'm-40';
    }
}

function theme_lambda2_check_enrolment() {
	global $PAGE, $COURSE;
	if ( $COURSE->id > 1 && $PAGE->pagetype === 'enrol-index')
	{
		return theme_lambda2_get_setting('course_enrolment_page');
	} else {
		return 0;
	}
}

function theme_lambda2_check_site_announcements()
{
	global $PAGE, $COURSE;
	if ( $COURSE->id == 1 && $PAGE->pagetype === 'mod-forum-discuss')
	{
		return 1;
	} else {
		return 0;
	}
}

function theme_lambda2_get_course_custom_fields()
{
    global $COURSE;
    $courseid = $COURSE->id;

    $content = '';
    $hasvalues = FALSE;
    $customcoursefields = array();
	$handler = \core_customfield\handler::get_handler('core_course', 'course');
	$customcoursefields = $handler->get_instance_data( $courseid, FALSE);

	if (!count($customcoursefields))
	{
		return $content;
	}

	$content .= '<div class="customfields-container">';

	foreach ( $customcoursefields as $currentfield )
	{
        $currenttype = $currentfield->get_field()->get('type');
        $currentfieldvalue = '';
        if ($currenttype == 'checkbox') {
            $currentfieldvalue = $currentfield->get_value() == 1 ? get_string('yes') : get_string('no');
        } else if ($currenttype == 'select') {
                $currentfieldvalue = $currentfield->get_field()->get_options()[$currentfield->get_value()];
        } else if ($currenttype == 'text') {
                $currentfieldvalue = $currentfield->get_value();
        } else if ($currenttype == 'date') {
                $currentfieldvalue = userdate( $currentfield->get_value(), get_string('strftimedatefullshort'));
        } else {
                $currentfieldvalue = $currentfield->get_value();
        }
        if(!empty($currentfieldvalue)) {
            $hasvalues = TRUE;
            $content .= '<div class="customfield customfield_'.$currenttype.'">';
            $content .= '<span class="customfieldname">'.format_text($currentfield->get_field()->get('name'), FORMAT_PLAIN).': </span>';
            $content .= '<span class="customfieldvalue">'.format_text($currentfieldvalue, FORMAT_MOODLE).'</span>';
            $content .= '</div>';
        }
	}
    if(!$hasvalues) {return '';}
	$content .= '</div>';
	return $content;
}

function theme_lambda2_get_fp_slideshow_ratio() {
    $ratio = '';
    $numberofslides = theme_lambda2_get_setting('slideshow_number_slides');
    
    for ($i = 1; $i <= $numberofslides; $i++) {
        $current_image = 'slideshow_image_'.$i;
        if (!empty(theme_lambda2_get_setting($current_image))) {
            $context = context_system::instance();
            $filename = theme_lambda2_get_setting($current_image);
            $fs = get_file_storage();
            $file = $fs->get_file($context->id, 'theme_lambda2', $current_image, 0, '/', $filename);
            $imageinfo = $file->get_imageinfo();
            $height = $imageinfo['height'];
            $width = $imageinfo['width'];
            $ratio = 'ratio: '.$width.':'.$height.'; ';
            
        }
            break;
    }
    if ($ratio == '') {
        $ratio = 'ratio: 16:9; ';
    }
    if (theme_lambda2_get_setting('slideshow_advanced_ratio') != '') {
        $ratio = 'ratio: '.theme_lambda2_get_setting('slideshow_advanced_ratio').'; ';
    }
    return $ratio;
}

function theme_lambda2_check_adminrole() {
    if (is_siteadmin()) {
        return TRUE;
    } else {
        return FALSE;
    }
}