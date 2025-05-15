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

namespace theme_lambda2\output;
defined('MOODLE_INTERNAL') || die;

use html_writer;
use stdClass;
use moodle_url;
use context_course;
use theme_config;
use core_tag_collection;

use core_course_category;
use coursecat_helper;
use core_course_list_element;

class core_renderer extends \theme_boost\output\core_renderer {

	public function headerloginform() {
		global $CFG;
		
		$wwwroot = '';
		if (empty($CFG->loginhttps)) {$wwwroot = $CFG->wwwroot;}
		else {$wwwroot = str_replace("http://", "https://", $CFG->wwwroot);}
	
		$headerloginform = '';	
		$login_link_url = '';
		$login_link_txt = '';
		if (theme_lambda2_get_setting('login_link') == '1') {$login_link_url = $wwwroot.'/login/signup.php'; $login_link_txt = get_string('startsignup');}
		else if (theme_lambda2_get_setting('login_link') == '2') {$login_link_url = $wwwroot.'/login/forgot_password.php'; $login_link_txt = get_string('forgotten');}
		else if (theme_lambda2_get_setting('login_link') == '3') {$login_link_url = $wwwroot.'/login/index.php'; $login_link_txt = get_string('moodle_login_page','theme_lambda2');}
		if (theme_lambda2_get_setting('custom_login_link_url') != '') {$login_link_url = theme_lambda2_get_setting('custom_login_link_url');}
		if (theme_lambda2_get_setting('custom_login_link_txt') != '') {$login_link_txt = theme_lambda2_get_setting('custom_login_link_txt');}
		$lambda_login_link = '';
		if ($login_link_url != '' && $login_link_txt != '') {$lambda_login_link = '<a target="_self" href="'.$login_link_url.'">'.$login_link_txt.'</a>';}
		
		$headerloginoauth2 = '';
		if (theme_lambda2_get_setting('auth_googleoauth2')) {
			$authsequence = get_enabled_auth_plugins(true);
            $potentialidps = array();
            foreach ($authsequence as $authname) {
            	$authplugin = get_auth_plugin($authname);
   	    		$potentialidps = array_merge($potentialidps, $authplugin->loginpage_idp_list($this->page->url->out(false)));
       		}
			if (!empty($potentialidps)) {
				$headerloginoauth2 .= '<div class="lambda-oauth2"><h6 class="mb-0">'.get_string('potentialidps', 'auth').'</h6><div class="potentialidplist">';
				foreach ($potentialidps as $idp) {
					$headerloginoauth2 .= '<div class="potentialidp">';
					$headerloginoauth2 .= '<a class="btn login-identityprovider-btn btn-block" href="'.$idp['url']->out().'" title="'.s($idp['name']).'">';
					if (!empty($idp['iconurl'])) {
						$headerloginoauth2 .= '<img src="'.s($idp['iconurl']).'" width="24" height="24" class="mr-2"/>';
					}
					$headerloginoauth2 .= s($idp['name']);
					$headerloginoauth2 .= '</a></div>';
				}
				$headerloginoauth2 .= '</div>';
			}			
			$headerloginoauth2 .= '<div class="forgotpass oauth2">'.$lambda_login_link.'</div>';
			if (!empty($potentialidps)) {$headerloginoauth2 .= '</div>';}
		}
		
		$lambdaloginform = '<form class="navbar-form pull-right" method="post" action="'.$wwwroot.'/login/index.php">
									<div id="block-login">
										<div class="user-form">
											<div id="user"><i class="lambda icon-person" aria-hidden="true"></i></div>
											<label for="inputName" class="lambda-sr-only">'.get_string('username').'</label>
											<input type="hidden" name="logintoken" value="'.s(\core\session\manager::get_login_token()).'" />
											<input id="inputName" type="text" name="username" placeholder="'.get_string('username').'" class="mr-2">
										</div>
										<div class="pw-form">
											<div id="pass"><i class="lambda icon-https" aria-hidden="true"></i></div>
											<label for="inputPassword" class="lambda-sr-only">'.get_string('password').'</label>
											<input id="inputPassword" type="password" name="password" placeholder="'.get_string('password').'" class="mr-2">
											<button type="submit" id="submit"><span class="lambda-sr-only">'.get_string('login').'</span><i class="fa fa-angle-right" aria-hidden="true"></i></button>
										</div>
									</div>
									<div class="forgotpass">'.$lambda_login_link.'</div>
									</form>';
		
			if (theme_lambda2_get_setting('auth_googleoauth2')) {
				$headerloginform .= $headerloginoauth2;
			} else {
				$headerloginform .=	$lambdaloginform;
			}
		
		return $headerloginform;
    }

	public function lambda2loginbutton() {
		global $CFG;

		$wwwroot = '';
		if (empty($CFG->loginhttps)) {$wwwroot = $CFG->wwwroot;}
		else {$wwwroot = str_replace("http://", "https://", $CFG->wwwroot);}
		
		$loginbuttontype = '';
		if (theme_lambda2_get_setting('login_button_dest') == '0') {
			$loginbuttontype .= '<a href="'.$wwwroot.'/login/index.php" id="btn-lambda-login" class="btn btn-primary"><span>'.get_string('login').'</span></a>';
		} else {
			$loginbuttontype = '<button type="button" id="btn-lambda-login" class="btn btn-primary" data-toggle="modal" data-target="#lambdaModalLogin"><span>'.get_string('login').'</span></button>';
		}
		$loginbutton = '<div class="lambda-login-button">'.$loginbuttontype.'</div>';
			
		return $loginbutton;
	}

	public function lambda2loginmodal() {
		global $CFG;

		$wwwroot = '';
		if (empty($CFG->loginhttps)) {$wwwroot = $CFG->wwwroot;}
		else {$wwwroot = str_replace("http://", "https://", $CFG->wwwroot);}

		$loginmodal = '';
		if (theme_lambda2_get_setting('login_button_dest') !== '0') {
			$login_link_url = '';
			$login_link_txt = '';
			if (theme_lambda2_get_setting('login_link') == '1') {$login_link_url = $wwwroot.'/login/signup.php'; $login_link_txt = get_string('startsignup');}
			else if (theme_lambda2_get_setting('login_link') == '2') {$login_link_url = $wwwroot.'/login/forgot_password.php'; $login_link_txt = get_string('forgotten');}
			else if (theme_lambda2_get_setting('login_link') == '3') {$login_link_url = $wwwroot.'/login/index.php'; $login_link_txt = get_string('moodle_login_page','theme_lambda2');}
			if (theme_lambda2_get_setting('custom_login_link_url') != '') {$login_link_url = theme_lambda2_get_setting('custom_login_link_url');}
			if (theme_lambda2_get_setting('custom_login_link_txt') != '') {$login_link_txt = theme_lambda2_get_setting('custom_login_link_txt');}
			$lambda_login_link = '';
			if ($login_link_url != '' && $login_link_txt != '') {$lambda_login_link = '<a target="_self" href="'.$login_link_url.'">'.$login_link_txt.'</a>';}
			
			$loginmodal .= '
			<div class="modal fade" id="lambdaModalLogin" tabindex="-1" aria-labelledby="lambdaModalLogin" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content lambda-login">
						<div class="modal-header">
							<h5 class="modal-title">Login</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
						<div class="modal-body">

						<form class="login-form" action="/login/index.php" method="post">
							<input type="hidden" name="logintoken" value="'.s(\core\session\manager::get_login_token()).'" />
							<div class="login-form-username form-group">
								<label for="username" class="sr-only">'.get_string('username').'</label>
								<input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="'.get_string('username').'">
							</div>
							<div class="login-form-password form-group">
								<label for="password" class="sr-only">'.get_string('password').'</label>
								<input type="password" name="password" id="password" value="" class="form-control form-control-lg" placeholder="'.get_string('password').'">
							</div>
							<div class="login-form-submit form-group">
								<button class="btn btn-primary w-100 btn-lg my-2 mx-0" type="submit" id="loginbtn">'. get_string('login').'</button>
							</div>
							<div class="login-form-forgotpassword form-group">'.$lambda_login_link.'</div>
						</form>

				</div>
			</div>
			</div>
			</div>';
		}

		return $loginmodal;
	}

	public function lambdasearch() {
		global $CFG;
		
		if (empty($CFG->enableglobalsearch) || !has_capability('moodle/search:query', \context_system::instance())) {
            $moodle_global_search = 0;
        } else {
			$moodle_global_search = 1;
		}

		$search_action = $CFG->wwwroot.'/course/search.php';
		if ($moodle_global_search) {
			$search_action = $CFG->wwwroot.'/search/index.php';
		}
		$search_label = get_string('searchcourses');
		if ($moodle_global_search) {
			$search_label = get_string('search', 'search');
		}

		$navbarsearch = '<form id="lambda-navbarsearch-form" autocomplete="off" method="get" action="'.$search_action.'" >
							<div class="search-container">
								<i class="lambda icon-search1" aria-hidden="true"></i>
								<input id="navbarsearchbox" type="text" name="q" data-region="input" autocomplete="off" aria-label="'.$search_label.'" placeholder="'.$search_label.'">
								<label for="navbarsearchbox" class="lambda-sr-only">'.$search_label.'</label>
							</div>
						</form>';

		return $navbarsearch;
	}

	public function lambda2_get_main_logo_url() {
		global $CFG, $OUTPUT;
        $logo = get_config('core_admin', 'logo');
        if (!empty($logo)) {
			return $OUTPUT->get_logo_url();
		} else {
			$logo = get_config('core_admin', 'logocompact');
			if (!empty($logo)) {
				return $OUTPUT->get_compact_logo_url();
			}
		}
		return false;
	}

	public function lambda2_has_main_logo() {
        $logo = $this->lambda2_get_main_logo_url();
        return !empty($logo);
	}

	public function lambda2_socials_links() {
		$socials_links = '';
	
		for ($i = 1; $i <= 3; $i++) {
			$socials_links_i = '';
			if ((theme_lambda2_get_setting('socials_link_icon_'.$i) != '') || (theme_lambda2_get_setting('socials_link_text_'.$i) != '')) {
				$socials_links_i = theme_lambda2_get_setting('socials_link_icon_'.$i).' <span>'.theme_lambda2_get_setting('socials_link_text_'.$i).'</span>';
				if (theme_lambda2_get_setting('socials_link_url_'.$i) != '') {
					$socials_links_i = '<a href="'.theme_lambda2_get_setting('socials_link_url_'.$i).'" target="_blank">'.$socials_links_i.'</a>';
				}
			}
			$socials_links .= $socials_links_i;
		}
		return $socials_links;
	}

	public function lambda2_socials_icons() {
		$socials_icons = '';
	
		for ($i = 1; $i <= 5; $i++) {
			$socials_icons_i = '';
			if ((theme_lambda2_get_setting('socials_icontypes_'.$i) != '') && (theme_lambda2_get_setting('socials_url_'.$i) != '')) {
				$socials_icons_i = '<a class="social '.theme_lambda2_get_setting('socials_icontypes_'.$i).'" href="'.theme_lambda2_get_setting('socials_url_'.$i).'" target="_blank"> </a>';
			}
			$socials_icons .= $socials_icons_i;
		}
		return $socials_icons;
	}

	public function lambda2mobilemenuitems() {
		global $CFG;
		$content = '';	
		if ($CFG->enabledashboard) {
			if (isloggedin() || (isguestuser() && $CFG->allowguestmymoodle)) {
				$content .= '<li class="nav-item"><a class="nav-link" href="'.$CFG->wwwroot.'/my/">'.get_string('myhome').'</a></li>';
			}
		}
		if (isloggedin()) {
			$content .= '<li class="nav-item"><a class="nav-link" href="'.$CFG->wwwroot.'/my/courses.php">'.get_string('mycourses').'</a></li>';
		}
		if (is_siteadmin()) {
			$content .= '<li class="nav-item"><a class="nav-link" href="'.$CFG->wwwroot.'/admin/search.php">'.get_string('administrationsite').'</a></li>';
		}
		return $content;
	}

	public function lambda2_get_course_fullname() {
		global $PAGE;
		$course = $PAGE->course;
		$coursecontext = context_course::instance($PAGE->course->id);
		return format_string($course->fullname, true, ['context' => $coursecontext]);
	}

	public function lambda2_get_course_category() {
		global $PAGE, $DB;
		$catid = $PAGE->course->category;
		$coursecontext = context_course::instance($PAGE->course->id);
		$category = $DB->get_record('course_categories', ['id' => $catid]);
		return format_string($category->name, true, ['context' => $coursecontext]);
	}

	public function lambda2_course_header() {
		global $PAGE;		
		$lambda2_course_header = $this->full_header();
		$coursetitlesetting = theme_lambda2_get_setting('course_title');
		if ($coursetitlesetting == '03') {
			$lambda2_course_header = str_replace('<h1 class="h2">', '<h1 class="h2 sr-only">', $lambda2_course_header);
			$lambda2_course_header = str_replace('class="w-100"', 'class="w-100 my-3"', $lambda2_course_header);
		} else if ($coursetitlesetting == '02') {
			$course = $PAGE->course;
			$coursecontext = context_course::instance($course->id);
			$coursename = format_string($course->fullname, true, ['context' => $coursecontext]);
			if ($course instanceof stdClass) {
				$course = new \core_course_list_element($course);
			}
			$coursefiles = $course->get_course_overviewfiles();
			foreach ($coursefiles as $file) {
				if ($isimage = $file->is_valid_image()) {
					$imgurl = file_encode_url("/pluginfile.php", '/' . $file->get_contextid() . '/' . $file->get_component()
							. '/' . $file->get_filearea() . $file->get_filepath() . $file->get_filename() , !$isimage);
					$imgurl = new moodle_url($imgurl);
					break;
				}
			}
			if (empty($imgurl)) {
				global $OUTPUT;
				$imgurl = $OUTPUT->get_generated_image_for_id($course->id);
			}
			$lambda2_course_header = str_replace('id="page-header" class="', 'id="page-header" class="w-img ', $lambda2_course_header);
			$inlinestyle = 'style="background-image: url('.$imgurl.');"';
			$lambda2_course_header = str_replace('<div class="w-100">', '<div class="courseheaderimage my-4 w-100" '. $inlinestyle .'>', $lambda2_course_header);
		}
		return $lambda2_course_header;
    }

	public function back_to_course_button() {
		global $CFG, $PAGE;
		$back_to_course_button = '';
		$url = $CFG->wwwroot.'/course/view.php?id='.$PAGE->course->id;
		$string = get_string('course');
		$back_to_course_button = '<p class="text-center mt-4 lambda-btc"><a class="btn btn-primary" href="'.$url.'">'.get_string('backto', '', $string).'</a></p>';
		return $back_to_course_button;
    }

	function theme_lambda2_get_coursename()
	{
		global $PAGE;
		$course = $PAGE->course;
		return format_string($course->fullname, true);
	}

	function theme_lambda2_get_coursestartdate() {
		global $PAGE;
		if (!empty($PAGE->course->startdate)) {
			$coursestartdate = get_string('activitydate:opens','course').' ';
			$coursestartdate .= userdate($PAGE->course->startdate, get_string('strftimedatefullshort'));
			return $coursestartdate;
		} else {
			return get_string('nocoursestarttime');
		}
	}

	function theme_lambda2_get_courseenddate() {
		global $PAGE;
		if (!empty($PAGE->course->enddate)) {
			$courseenddate = get_string('activitydate:closes','course'). ' ';
			$courseenddate .= userdate($PAGE->course->enddate, get_string('strftimedatefullshort'));
		} else {
			$courseenddate = get_string('nocourseendtime', 'course');
		}
		return $courseenddate;
	}

	function theme_lambda2_show_courseprice() {
		global $DB, $COURSE;
		$courseid = $COURSE->id;
		$usedpayment = '';

		$enrol_methods = $DB->get_records( 'enrol', array( 'courseid' => $courseid, 'status' => ENROL_INSTANCE_ENABLED ), '', 'id, enrol, name, sortorder' );
		$hascourseprice = FALSE;
		foreach ($enrol_methods as $method) {
			if (in_array($method->enrol, array('paypal', 'fee', 'stripepayment'))) {
				$hascourseprice = TRUE;
				$usedpayment = $method->enrol;
			}
		}
		if ($hascourseprice) {
			$courseprice = $DB->get_record_sql('SELECT cost, currency FROM {enrol} WHERE courseid = ? AND enrol = ?', array($courseid, $usedpayment));
			return '<h6 class="price font-weight-light">'.get_string('cost','enrol_fee'). ': <em>'.$courseprice->currency.' '.number_format($courseprice->cost, 2, '.', '').'</em></h6>';
		} else {
			if (empty(theme_lambda2_get_setting('course_free_txt')) or theme_lambda2_get_setting('course_free_txt') == "") {
				return;
			} else {
				return '<h6 class="price font-weight-light">'.format_string(theme_lambda2_get_setting('course_free_txt')).'</h6>';
			}
		}
	}

	function theme_lambda2_show_coursetags() {
		global $PAGE, $OUTPUT;
		$contid = $PAGE->context->id;
		$taglist = core_tag_collection::get_tag_cloud(0, FALSE, 80, 'name', '', $contid, $contid, 1);
		$taglist = $OUTPUT->render_from_template('core_tag/tagcloud', $taglist->export_for_template($OUTPUT));
		$coursetags = strip_tags($taglist, '<ul><li>');
		return str_replace('<li> ', '<li>', $coursetags);
	}

	function theme_lambda2_show_sharebuttons() {
		global $PAGE, $CFG;
		$showfacebook = theme_lambda2_get_setting('sharebuttons_facebook');
		$showtwitterx = theme_lambda2_get_setting('sharebuttons_twitterx');
		//$showthreads = theme_lambda2_get_setting('sharebuttons_threads');
		$showwhatsapp = theme_lambda2_get_setting('sharebuttons_whatsapp');
		$showlinkedin = theme_lambda2_get_setting('sharebuttons_linkedin');
		$showpinterest = theme_lambda2_get_setting('sharebuttons_pinterest');
		$sharebuttons = '';
		$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

		$coursename = format_string($PAGE->course->fullname, true);
		if ($showfacebook || $showtwitter || $showwhatsapp || $showlinkedin || $showpinterest) {
			$sharebuttons .= '<ul class = "lambda-sharebuttons">';
			if ($showfacebook) {
				$sharebuttons .= '<li class="share-button facebook">';
				$sharebuttons .= '<a href="https://www.facebook.com/sharer/sharer.php?u'.$siteurl.'"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>';
			}
			if ($showtwitterx) {
				$sharebuttons .= '<li class="share-button twitter-x">';
				$sharebuttons .= '<a href="https://twitter.com/intent/tweet?text='.$coursename.'&amp;url='.$siteurl.'"><i class="lambda icon-x-twitter" aria-hidden="true"></i> '.get_string('share_on','theme_lambda2').' X</a></li>';
			}
			if ($showwhatsapp) {
				$sharebuttons .= '<li class="share-button whatsapp">';
				$sharebuttons .= '<a href="whatsapp://send?text='.$coursename.'%20'.$siteurl.'"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a></li>';
			}
			if ($showlinkedin) {
				$sharebuttons .= '<li class="share-button linkedin">';
				$sharebuttons .= '<a href="https://www.linkedin.com/shareArticle?mini=true&amp;summary=&amp;title='.$coursename.'&amp;url='.$siteurl.'"><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</a></li>';
			}
			/*
			if ($showthreads) {
				$sharebuttons .= '<li class="share-button threads">';
				$sharebuttons .= '<a href="https://twitter.com/intent/tweet?text='.$coursename.'&amp;url='.$siteurl.'"><i class="lambda icon-threads" aria-hidden="true"></i> Threads</a></li>';
			}
			*/
			if ($showpinterest) {
				$sharebuttons .= '<li class="share-button pinterest">';
				$logo = $this->lambda2_get_main_logo_url();
				if (empty($logo)) {
					$logo = $CFG->wwwroot.'/pix/moodlelogo.png';
				}
				$sharebuttons .= '<a href="http://pinterest.com/pin/create/button/?url='.$siteurl.'&media='.$logo.'&description='.$coursename.'"><i class="fa fa-pinterest" aria-hidden="true"></i> pinterest</a></li>';
			}
			$sharebuttons .= '</ul>';
		}
		return $sharebuttons;
	}

	function theme_lambda2_get_coursesummary() {
		global $PAGE;
		$coursecontext = context_course::instance($PAGE->course->id);
		return format_text($PAGE->course->summary, FORMAT_HTML, ['noclean' => true]);
	}

	public function theme_lambda2_get_courseimage() {
		global $PAGE;
		$course = $PAGE->course;
		$context = context_course::instance($course->id);
		if ($course instanceof stdClass) {
			$course = new \core_course_list_element($course);
		}
		$coursefiles = $course->get_course_overviewfiles();
		foreach ($coursefiles as $file) {
			if ($isimage = $file->is_valid_image()) {
				$imgurl = file_encode_url("/pluginfile.php", '/' . $file->get_contextid() . '/' . $file->get_component()
						. '/' . $file->get_filearea() . $file->get_filepath() . $file->get_filename() , !$isimage);
				$imgurl = new moodle_url($imgurl);
				break;
			}
		}
		if (empty($imgurl)) {
			global $OUTPUT;
			$imgurl = $OUTPUT->get_generated_image_for_id($course->id);
		}
		return $imgurl;
	}

	function theme_lambda2_get_coursecategory() {
		global $PAGE, $DB;
		$categoryname;

		if (empty($PAGE->course->category)) {
			$catid = optional_param('categoryid', 0, PARAM_INT);
		} else {
			$catid = $PAGE->course->category;
		}
		if (!empty($catid)) {
			$category = $DB->get_record('course_categories', ['id' => $catid]);
			$categoryname = $category->name;
		}

		return $categoryname;
	}

    public function fp_slideshow() {
	    global $PAGE;
		$theme = $PAGE->theme;
		
		$slideshow = '';
		
		$slideshowparams = '';
		$slideshowclasses = '';
		$ratio = theme_lambda2_get_fp_slideshow_ratio();
		$slideshowparams .= $ratio;
		if (theme_lambda2_get_setting('slideshow_autoplay') == 1) {
			$slideshowparams .= 'autoplay: true; pause-on-hover: true; ';
			$slideshowparams .= 'autoplay-interval: '.theme_lambda2_get_setting('slideshow_autoplay_delay').'; ';
		}
		$transitionfx = theme_lambda2_get_setting('slideshow_transition');
		switch ($transitionfx) {
    		case 1:
        		$slideshowparams .= 'animation: slide; ';
        		break;
    		case 2:
        		$slideshowparams .= 'animation: fade; ';
        		break;
    		case 3:
        		$slideshowparams .= 'animation: scale; ';
        		break;
			case 4:
				$slideshowparams .= 'animation: pull; ';
				break;
		}
		$navstyle = theme_lambda2_get_setting('slideshow_navigation_style');
		$slideshowclasses .= 'navstyle-'.$navstyle;
		if (theme_lambda2_get_setting('slideshow_nav_hover') == 1) {$slideshowclasses .= ' uk-visible-toggle';}
		
		$slideshow .= '<div class="uk-position-relative uk-visible-toggle-custom uk-slideshow '.$slideshowclasses.'" tabindex="-1" uk-slideshow="'.$slideshowparams.'">';
		$slideshow .= '<ul class="uk-slideshow-items">';
		
		$numberofslides = theme_lambda2_get_setting('slideshow_number_slides');
		$emptyslides = 0;
		for ($i = 1; $i <= $numberofslides; $i++) {
			$html_current_slide = '';
			$current_image = 'slideshow_image_'.$i;
			$fileurl = $theme->setting_file_url($current_image, $current_image);
			if ($fileurl == "") {
				$emptyslides++;
			} else {
				$slideshow .= $this->fp_slideshow_current_image($fileurl, $i);
			}
		}
		
		if ($emptyslides < $numberofslides) {
		$slideshow .= '</ul>';
		
		$slidenavleft = '';
		$slidenavright = '';
		if (($navstyle <= 3) OR ($navstyle >= 6)) {
			$slidenavleft .= ' uk-position-center-left';
			$slidenavright .= ' uk-position-center-right';
		}
		if (theme_lambda2_get_setting('slideshow_nav_hover')) {
			$slidenavleft .= ' uk-hidden-hover';
			$slidenavright .= ' uk-hidden-hover';
		}
		if (($navstyle >= 4) AND ($navstyle <= 5)) {$slideshow .= '<div class="uk-slidenav-container uk-position-bottom-right">';}
		$slideshow .= '<a class="uk-position-small'.$slidenavleft.'" href="#" uk-slidenav-previous uk-slideshow-item="previous">';
		if ($navstyle == 1) {
			$slideshow .= '<div class="slider-button-prev"><span>'.get_string('prev').'</span></div>';
		}		
		$slideshow .= '</a>';
		$slideshow .= '<a class="uk-position-small'.$slidenavright.'" href="#" uk-slidenav-next uk-slideshow-item="next">';
		if ($navstyle == 1) {
			$slideshow .= '<div class="slider-button-next"><span>'.get_string('next').'</span></div>';
		}		
		$slideshow .= '</a>';
		if (($navstyle >= 4) AND ($navstyle <= 5)) {$slideshow .= '</div>';}
		
		if ($navstyle == 6) {
			$slideshow .='<div class="uk-position-bottom-center">';
			$slideshow .='<ul class="uk-dotnav">';
			for ($i = 0; $i < $numberofslides - $emptyslides; $i++) {
				$slideshow .='<li uk-slideshow-item="'.$i.'"><a href="#">Slideshow item '.$i.'</a></li>';
			}
			$slideshow .='</ul></div>';
		}
		
		$slideshow .= '</div>';
		}
		
		if ($emptyslides < $numberofslides) {
			return $slideshow;
		}
		else {
			return '';
		}
    }

	protected function fp_slideshow_current_image($fileurl, $i) {
		$current_caption = 'slideshow_caption_'.$i;
		$current_animation = 'slideshow_caption_pos_'.$i;
		$current_background = 'slideshow_bg_'.$i;
		$current_background_full = 'slideshow_bg_slide_'.$i;
		$current_caption_anim = '';
		$current_caption_pos = '';
		$current_caption_overlay = '';
		$html = '';

		switch (theme_lambda2_get_setting($current_animation)) {
			case 1:
				/*urrent_caption_anim = 'uk-transition-slide-bottom-medium';*/
				$current_caption_anim = 'uk-animation-slide-top-small';
				$current_caption_pos = 'uk-position-center p-lg-5 p-md-3 d-flex w-100 justify-content-center';
				break;
			case 2:
				/*$current_caption_anim = 'uk-transition-slide-left-medium';*/
				$current_caption_anim = 'uk-animation-slide-left';
				$current_caption_pos = 'uk-position-center p-lg-5 p-md-3 d-flex justify-content-start';
				break;
			case 3:
				/*$current_caption_anim = 'uk-transition-slide-right-medium';*/
				$current_caption_anim = 'uk-animation-slide-right';
				$current_caption_pos = 'uk-position-center p-lg-5 p-md-3 d-flex justify-content-end';
				break;
			default:
				/*$current_caption_anim = 'uk-transition-slide-bottom-medium';*/
				$current_caption_anim = 'uk-animation-slide-top-small';
				$current_caption_pos = 'uk-position-center p-lg-5 p-md-3 d-flex w-100 justify-content-center';
		}

		switch (theme_lambda2_get_setting($current_background)) {
			case 1:
				$current_caption_overlay = ' uk-overlay-default';				
				break;
			case 2:
				$current_caption_overlay = ' uk-overlay-primary';
				break;
			case 3:
				$current_caption_overlay = ' uk-overlay-main';
				break;
			case 4:
				$current_caption_overlay = '';
				break;
			case 5:
				$current_caption_overlay = 'overlay-lambda-light';
				break;
			case 6:
				$current_caption_overlay = 'overlay-lambda-dark';
				break;
			default:
				$current_caption_overlay = ' uk-overlay-default';
		}

		if ((theme_lambda2_get_setting($current_background_full)) && (theme_lambda2_get_setting($current_background) != 4)) {
			$html = '<li class = "overlay-full'.$current_caption_overlay.'" tabindex="-1">';
		} else {
			$html = '<li class="" tabindex="-1">';
		}

		$kenburns = '';
		if (theme_lambda2_get_setting('slideshow_kenburns') == 1) {
			$kenburns = ' uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left';
		}
		$html .= '<div class="uk-position-cover'.$kenburns.'">';
		$filetype = 'mp4';
		$pos = strpos(strtolower($fileurl), $filetype);
		if ($pos !== false) {
			$html .= '<video src="'.$fileurl.'" class="slide" autoplay loop muted playsinline uk-cover></video>';
		} else {
			$html .= '<img src="'.$fileurl.'" class="slide" alt="slideshow banner" uk-cover>';
		}
		$html .= '</div>';

		if (theme_lambda2_get_setting($current_background_full)) {
			$current_caption_overlay = '';
		}
		
		if (theme_lambda2_get_setting($current_caption)) {
			/*
			$html .= '<div class="slide-content '.$current_caption_pos.'">';
			$html .= '<div class="uk-overlay d-sm-none d-md-block col-lg-6 col-sm-12 col-mb-12 '.$current_caption_anim.$current_caption_overlay.'">';
			$html .= '<div>'.theme_lambda2_get_setting($current_caption).'</div>';
			$html .= '</div></div>';
			*/
			$html .= '<div class="slide-content '.$current_caption_pos.'">';
			$html .= '<div uk-scrollspy="cls: '.$current_caption_anim.'; delay: 750; repeat: false" class="d-none d-md-block uk-overlay '.$current_caption_overlay.' style="opacity: 0;">';
			$html .= '<div>'.theme_lambda2_get_setting($current_caption).'</div>';
			$html .= '</div></div>';
		}

		$html .= '</li>';
		
		return $html;
	}
	
    public function fp_carousel() {
	    global $PAGE;
		$theme = $PAGE->theme;
		
		$numberofslides = theme_lambda2_get_setting('carousel_slides');	
		$carousel = '';
		
		if (!empty($theme->settings->carousel_image_1)) {
			$carousel .= '<div class="container-fluid frontpage">';
			$carousel .= '<div class="row">';
			if (!empty($theme->settings->carousel_add_html)) {
				$additional_html = theme_lambda2_get_setting('carousel_add_html');
				$additional_html = format_text($additional_html, FORMAT_HTML);
				$carousel .= '<div class="col-sm-4">'.$additional_html.'</div><div class="col-sm-8">';
			}
			else {
				$carousel .= '<div class="col">';
			}
			if (!empty($theme->settings->carousel_h)) {
				$carouselheading = theme_lambda2_get_setting('carousel_h');
				$carouselheading = format_text($carouselheading, FORMAT_HTML);
				$carousel .= '<h'.theme_lambda2_get_setting("carousel_hi").' class="bx-heading">'.$carouselheading.'</h'.theme_lambda2_get_setting("carousel_hi").'>';
			}
		$navstyle = theme_lambda2_get_setting('carousel_navigation_style');
		$carousel .= '<div uk-slider="center: true;">';
		$carousel .= '<div class="uk-position-relative uk-visible-toggle uk-light navstyle-'.$navstyle.'" tabindex="-1">';
		$carousel .= '<ul class="uk-slider-items uk-flex-middle uk-grid">';
		for ($i = 1; $i <= $numberofslides; $i++) {
			$current_image = 'carousel_image_'.$i;
			if (!empty($theme->settings->$current_image)) {
				$carousel .= '<li class="uk-width-medium">
					<div class="uk-panel">
					<div class="uk-cover-container">	
					<img src="'.$theme->setting_file_url($current_image, $current_image).'" alt="'.$current_image.'" style="height: auto; width:'.theme_lambda2_get_setting("carousel_img_dim").';">';
				$current_heading = 'carousel_heading_'.$i;
				if (theme_lambda2_get_setting($current_heading) != '') {
					$current_color = 'carousel_color_'.$i;
					$color_number = theme_lambda2_get_setting($current_color);
					$color_number = substr($color_number,1,6);
					$split = str_split($color_number, 2);
					$r = hexdec($split[0]);
					$g = hexdec($split[1]);
					$b = hexdec($split[2]);
					$color = "rgba(" . $r . ", " . $g . ", " . $b . ", 0.85)";
					$carousel .= '<div class="mask" style="background-color: '.$color.'">';
					$heading = format_text(theme_lambda2_get_setting($current_heading), FORMAT_HTML);
					$carousel .= '<h2>'.$heading.'</h2>';
					$current_caption = 'carousel_caption_'.$i;
					$caption = format_text(theme_lambda2_get_setting($current_caption), FORMAT_HTML);
					$carousel .= '<p>'.$caption.'</p>';
					$current_url = 'carousel_url_'.$i;
					$current_btntext = 'carousel_btntext_'.$i;
					if ((theme_lambda2_get_setting($current_url) != '') && (theme_lambda2_get_setting($current_btntext) != '')) {
						$current_btntext = format_text(theme_lambda2_get_setting($current_btntext), FORMAT_HTML);
						$carousel .= '<p><a class="info" href="'.theme_lambda2_get_setting($current_url).'">'.$current_btntext.'</a></p>';
					}
					$carousel .= '</div>';
				}
				$carousel .= '</div></div></li>';
			}
		}
		$carousel .= '</ul>
			<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
			<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
			</div></div>';
		$carousel .= '</div></div></div>';
		}
		return $carousel;
    }

    public function lambda2_login_bg_vid() {
		global $PAGE;
		$theme = $PAGE->theme;

		$content = '';
        if (!empty($theme->settings->login_bg_vid)) {
            $vid_url = $theme->setting_file_url('login_bg_vid', 'login_bg_vid');
			$content .= '<video playsinline autoplay muted loop id="background-vid">';
			$content .= '<source src="'.$vid_url.'" type="video/mp4">';
			$content .= '</video>';
        }
        return $content;
    }
	
    public function lambda2_login_bg_slider() {
		global $PAGE;
		$theme = $PAGE->theme;

		$has_img_1 = $theme->settings->login_bg_img_1;
		$has_img_2 = $theme->settings->login_bg_img_2;
		$has_img_3 = $theme->settings->login_bg_img_3;
		$has_img_4 = $theme->settings->login_bg_img_4;
		$time = $theme->settings->login_bg_slider_time;

		$content = '';
        if ($has_img_1 || $has_img_2 || $has_img_3 || $has_img_4) {
            $content = '<div uk-slideshow="animation: fade;autoplay: true; autoplay-interval: '.$time.'" style="position: fixed; right: 0; bottom: 0; min-width: 100%; min-height: 100%;">';
			$content .= '<ul class="uk-slideshow-items" style="height: 100vh;">';
			if ($has_img_1) {
				$content .= '<li><img src="'.$theme->setting_file_url('login_bg_img_1', 'login_bg_img_1').'" alt="" uk-cover></li>';
			}
			if ($has_img_2) {
				$content .= '<li><img src="'.$theme->setting_file_url('login_bg_img_2', 'login_bg_img_2').'" alt="" uk-cover></li>';
			}
			if ($has_img_3) {
				$content .= '<li><img src="'.$theme->setting_file_url('login_bg_img_3', 'login_bg_img_3').'" alt="" uk-cover></li>';
			}
			if ($has_img_4) {
				$content .= '<li><img src="'.$theme->setting_file_url('login_bg_img_4', 'login_bg_img_4').'" alt="" uk-cover></li>';
			}
			$content .= '</ul></div>';
        }
        return $content;
    }
	
    public function favicon() {
        if (!empty($this->page->theme->settings->favicon)) {
            return $this->page->theme->setting_file_url('favicon', 'favicon');
        }
        return parent::favicon();
    }

    public function webfonts() {
		$webfonts = '';
		if (theme_lambda2_get_setting('fonts_source') == 1) {
			$font_languages = theme_lambda2_get_setting('font_languages');
			if ($font_languages != '') {$font_languages = '&subset='.$font_languages;}
			$bodyfont = theme_lambda2_get_setting('font_body');
			$headingfont = theme_lambda2_get_setting('font_heading');
			$bodyweight = 400;
			$headingweight = 400;
		
			switch ($headingfont) {
			case "Open+Sans":
				$headingweight = 700;
				break;
			case "Arvo":
				$headingweight = 700;
				break;
			case "Cabin":
				$headingweight = 700;
				break;
			case "Crimson+Pro":
				$headingweight = 700;
				break;
			case "Encode+Sans":
				$headingweight = 700;
				break;
			case "Enriqueta":
				$headingweight = 700;
				break;
			case "Gudea":
				$headingweight = 700;
				break;
			case "Josefin+Sans":
				$headingweight = 700;
				break;
			case "Lato":
				$headingweight = 700;
				break;
			case "Lekton":
				$headingweight = 700;
				break;
			case "Nunito":
				$headingweight = 700;
				break;
			case "Montserrat":
				$headingweight = 700;
				break;
			case "PT+Sans":
				$headingweight = 700;
				break;
			case "Raleway":
				$headingweight = 500;
				break;
			case "Roboto":
				$headingweight = 500;
				break;
			case "Rubik":
				$headingweight = 600;
				break;
			case "Solway":
				$headingweight = 700;
				break;
			case "Ubuntu":
				$headingweight = 700;
				break;
			case "Vollkorn":
				$headingweight = 700;
				break;
			case "Work+Sans":
				$headingweight = 700;
				break;
			}
		
			$webfonts = '';
			$googlefontslink = '';
			if ($bodyfont != 'Open+Sans') {
				$googlefontslink .= 'family='.$bodyfont.':wght@'.$bodyweight;
			}
			if ($headingfont != 'Open+Sans') {
				if (($bodyfont == $headingfont) && ($headingweight != 400)) {
					$googlefontslink .= ';'.$headingweight;
				} else {
					if ($bodyfont != 'Open+Sans') {
						$googlefontslink .= '&';
					}
					$googlefontslink .= 'family='.$headingfont.':wght@'.$headingweight;
				}
			}
			if ($googlefontslink != '') {
				$webfonts = '<link rel="preconnect" href="https://fonts.googleapis.com">';
				$webfonts .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
				$webfonts .= '<link href="https://fonts.googleapis.com/css2?'.$googlefontslink.'&display=swap" rel="stylesheet">';
			}
			if (theme_lambda2_get_setting('use_linearicons')) {
				$webfonts .= '<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">';
			}
		}
		return $webfonts;
	}

	public function theme_lambda2_get_user_fullname() {
		global $USER;
		return isloggedin() && !isguestuser() ? trim(get_string('fullnamedisplay', null, $USER)) : get_string('guestuser');
	}

	public function theme_lambda2_course_custom_fields() {
		$content = '';
		$customcoursefields = theme_lambda2_get_course_custom_fields();
		if($customcoursefields != '') {
			$content = '<div class="block card fake-block block_lambda_course_custom_fields mb-3">';
			$content .= '<div class="card-body p-3">';
			$content .= '<h5 class="card-title d-inline">'.get_string('coursedetails').'</h5>';
			$content .= '<div class="card-text content mt-3">';
			$content .= $customcoursefields;
			$content .= '<div class="footer"></div></div></div></div>';

		}
		return $content;
	}

	function theme_lambda2_get_courses_count($catid) {
		$chelper = new coursecat_helper();
        $chelper->set_show_courses(20);
		try {
            $coursecat = core_course_category::get($catid);
            $courses = $coursecat->get_courses($chelper->get_courses_display_options());
        } catch (Exception $e) {
            $courses = [];
        }
        return count($courses);
	}

	function theme_lambda2_course_categories_block() {
		global $DB;
		$content = '';
		$list = '';
		$categories = $DB->get_records_sql('SELECT cc.id, cc.name, cc.parent, cc.visible, cc.depth FROM {course_categories} cc WHERE cc.visible=1 ORDER BY sortorder');

		$last_course_depth = 0;
		$level = 0;
		$cls = '';
		$cls_list = '';
		
		$list .= '<ul class="categorylist">';
	
		foreach ($categories as $cat)
		{
			$level++;
			$subcats = $DB->get_records_sql('SELECT cc.id FROM {course_categories} cc WHERE parent='.$cat->id.' ORDER BY sortorder');
			$list .= $this->theme_lambda2_get_courses_category( $cat, $subcats);
		}
	
		$list .= '</ul>';

		$content = '<div class="block card fake-block block_lambda_course_categories">';
		$content .= '<div class="card-body p-3">';
		$content .= '<h5 class="card-title d-inline">'.get_string('categories').'</h5>';
		$content .= '<div class="card-text content mt-3">';
		$content .= $list.'</div></div>';
		$content .= '<div class="footer"></div></div>';
	
		return $content;
	
	}

	function theme_lambda2_get_courses_category( $category, $children, $level = 1 ) {
		global $DB;
		$content = '';
		$curentcat = 0;
		$hassubcat = '';

		if ( $category->depth  == $level && $category->visible == 1 ) {
			$ccount = $this->theme_lambda2_get_courses_count( $category->id, true );
			$coursescount = ' <span class="badge badge-light">'.$ccount.'</span>';
			$disabled = ! $ccount ? ' disabled' : '';
			$disabledcls = $disabled;

			$checked = ($curentcat > 0 && $curentcat == $category->id) ? ' checked' : '';

			if (count($children) && ! $ccount) {
				$coursescount = '';
				$disabledcls = ' disabled1';
			}
			if (count($children)) {
				$hassubcat = ' class="hassubcat"';
			}

			$content .= '<li'.$hassubcat.'><a href="'.(new moodle_url('/course/index.php', ['categoryid' => $category->id])).'">'.format_text($category->name, FORMAT_HTML);
			$content .= $coursescount.'</a>';
			$content .= count( $children ) ? '<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#catid-'.$category->id.'" aria-expanded="false" aria-controls="catid-'.$category->id.'"><span class="collapsed">+</span><span class="show">-</span></button>' : '';
			$level++;

			if (count($children)) {
				$content .= '<ul id="catid-'.$category->id.'" class="list-subcategories collapse">';

				foreach ($children as $child) {
					$children = $DB->get_records_sql('SELECT cc.id FROM {course_categories} cc WHERE parent='.$child->id.' ORDER BY sortorder');
					$category = $DB->get_record_sql( 'SELECT cc.id, cc.name, cc.parent, cc.visible, cc.depth FROM {course_categories} cc WHERE id = '.$child->id);
					$content .= $this->theme_lambda2_get_courses_category( $category, $children, $level);
				}
				$content .= '</ul>';
			}
			$content .= '</li>';
		}
	return $content;
	}

	function theme_lambda2_search_courses() {
		$content = '<div class="simplesearchform px-4">
		<form autocomplete="off" action="/course/management.php" method="get" accept-charset="utf-8" class="mform simplesearchform pt-3">
		<div class="input-group">
			<label for="searchinput-aside">
				<span class="sr-only">Search courses</span>
			</label>
			<input type="text" id="searchinput-aside" class="form-control" placeholder="Search courses" aria-label="Search courses" name="search" data-region="input" autocomplete="off" value="">
			<div class="input-group-append">
				<button type="submit" class="btn  btn-primary search-icon">
					<i class="icon fa fa-search fa-fw " aria-hidden="true"></i>
					<span class="sr-only">Search courses</span>
				</button>
			</div>
		</div>
		</form>
		</div>';
		return $content;
	}

}