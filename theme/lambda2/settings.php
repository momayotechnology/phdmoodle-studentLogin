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
global $CFG;

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettinglambda2', get_string('configtitle', 'theme_lambda2'));
	
	// "general" settings tab
	$page = new admin_settingpage('theme_lambda2_general',  get_string('settings_general', 'theme_lambda2'));
	
	// General Layout
	$name = 'theme_lambda2/general_layout';
    $heading = get_string('general_layout', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_lambda2/page_layout';
    $title = get_string('page_layout', 'theme_lambda2');
    $description = get_string('page_layout_desc', 'theme_lambda2');
    $default = 0;
	    $choices = array(
		'0'=>get_string('full','theme_lambda2'),
		'1'=>get_string('boxed','theme_lambda2'),
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/page_width';
    $title = get_string('page_width', 'theme_lambda2');
    $description = get_string('page_width_desc', 'theme_lambda2');
    $default = '1480px';
    $choices = array(
		'1480px' => '1480px',
		'1280px' => '1280px',
		'1080px' => '1080px',
		'960px' => '960px',
		'unset' => get_string('unset','theme_lambda2')
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/maincolor';
    $title = get_string('maincolor', 'theme_lambda2');
    $description = get_string('maincolordesc', 'theme_lambda2');
    $default = '#f9bf3b';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/secondcolor';
    $title = get_string('secondcolor', 'theme_lambda2');
    $description = get_string('secondcolordesc', 'theme_lambda2');
    $default = '#5f6870';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/page_bg_color';
    $title = get_string('page_bg_color', 'theme_lambda2');
    $description = get_string('page_bg_color_desc', 'theme_lambda2');
    $default = '#f2f4f6';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/page_bg_img';
    $title = get_string('page_bg_img', 'theme_lambda2');
    $description = get_string('page_bg_img_desc', 'theme_lambda2');
    $opts = array('accepted_types' => array('.png', '.jpg', '.webp', '.gif', '.bmp'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'page_bg_img', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/page_bg_repeat';
    $title = get_string('page_bg_repeat', 'theme_lambda2');
    $description = get_string('page_bg_repeat_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/page_bg_img_opacity';
    $title = get_string('page_bg_img_opacity', 'theme_lambda2');
    $description = get_string('page_bg_img_opacity_desc', 'theme_lambda2');
    $default = 0;
    $choices = array(
        0 => '1',
        38 => '0.85',
        77 => '0.7',
        115 => '0.55',
        153 => '0.4',
        192 => '0.25'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/button_border_radius';
    $title = get_string('button_border_radius', 'theme_lambda2');
    $description = get_string('button_border_radius_desc', 'theme_lambda2');
    $default = '2px';
    $choices = array(
		'0' => '0',
		'2px' => '2px',
		'4px' => '4px',
        '6px' => '6px',
        '8px' => '8px',
        '10px' => '10px',
        '12px' => '12px',
        '14px' => '14px',
        '16px' => '16px',
        '18px' => '18px',
		'20px' => '20px'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// Logo & Favicon Settings
	$name = 'theme_lambda2/general_logo_favicon';
    $heading = get_string('general_logo_favicon', 'theme_lambda2');
    $information = get_string('logodesc', 'theme_lambda2');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

	$name = 'theme_lambda2/favicon';
	$title = get_string ('favicon', 'theme_lambda2');
	$description = get_string ('favicondesc', 'theme_lambda2');
    $opts = array('accepted_types' => array('.png', '.jpg', '.ico'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
	$setting->set_updatedcallback ('theme_reset_all_caches');
	$page->add($setting);
	
	// Course UI
	$name = 'theme_lambda2/general_course_ui';
    $heading = get_string('general_course_ui', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

	$name = 'theme_lambda2/course_title';
    $title = get_string('course_title', 'theme_lambda2');
    $description = get_string('course_title_desc', 'theme_lambda2');
    $default = '01';
    $choices = array(
        '01' => get_string('course_title_01', 'theme_lambda2'),
        '02' => get_string('course_title_02', 'theme_lambda2'),
        '03' => get_string('course_title_03', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/activity_icons';
    $title = get_string('activity_icons', 'theme_lambda2');
    $description = get_string('activity_icons_desc', 'theme_lambda2');
    $default = '0';
    if ($CFG->version >= 2024042200) {
        $choices = array(
            '0' => get_string('activity_icons_1', 'theme_lambda2'),
            '7' => get_string('activity_icons_8', 'theme_lambda2'),
            '2' => get_string('activity_icons_3', 'theme_lambda2'),
            '3' => get_string('activity_icons_4', 'theme_lambda2'),
            '4' => get_string('activity_icons_5', 'theme_lambda2'),
            '5' => get_string('activity_icons_6', 'theme_lambda2'),
            '6' => get_string('activity_icons_7', 'theme_lambda2')
        );
    } else {
        $choices = array(
            '0' => get_string('activity_icons_1', 'theme_lambda2'),
            '7' => get_string('activity_icons_9', 'theme_lambda2'),
            '2' => get_string('activity_icons_3', 'theme_lambda2'),
            '3' => get_string('activity_icons_4', 'theme_lambda2'),
            '4' => get_string('activity_icons_5', 'theme_lambda2'),
            '5' => get_string('activity_icons_6', 'theme_lambda2'),
            '6' => get_string('activity_icons_7', 'theme_lambda2')
        );
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/back_to_course';
    $title = get_string('back_to_course', 'theme_lambda2');
    $description = get_string('back_to_course_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/category_layout';
    $title = get_string('category_layout', 'theme_lambda2');
    $description = get_string('category_layout_desc', 'theme_lambda2');
    $default = 0;
    $choices = array(
        0 => get_string('category_layout_list', 'theme_lambda2'),
        1 => get_string('category_layout_tiles1', 'theme_lambda2'),
        2 => get_string('category_layout_tiles2', 'theme_lambda2')
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/course_enrolment_settingssection';
    $heading = '';
    $information = get_string('course_enrolment_settingssection', 'theme_lambda2');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

	$name = 'theme_lambda2/course_enrolment_page';
    $title = get_string('course_enrolment_page', 'theme_lambda2');
    $description = get_string('course_enrolment_page_desc', 'theme_lambda2');
    $default = '1';
    $choices = array(
        1 => get_string('course_enrolment_page_1', 'theme_lambda2'),
        2 => get_string('course_enrolment_page_2', 'theme_lambda2'),
        3 => get_string('course_enrolment_page_3', 'theme_lambda2'),
        4 => get_string('course_enrolment_page_4', 'theme_lambda2')
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/enrolment_coursecustomfields';
    $title = get_string('enrolment_coursecustomfields', 'theme_lambda2');
    $description = get_string('enrolment_coursecustomfields_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/course_free_txt';
    $title = get_string('course_free_txt', 'theme_lambda2');
    $description = get_string('course_free_txt_desc', 'theme_lambda2');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// Moodle blocks
	$name = 'theme_lambda2/general_moodle_blocks';
    $heading = get_string('general_moodle_blocks', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_lambda2/block_style';
    $title = get_string('block_style', 'theme_lambda2');
    $description = get_string('block_style_desc', 'theme_lambda2');	
    $default = '0';
    $choices = array(
        '01' => get_string('block_style_opt0', 'theme_lambda2'),
        '02' => get_string('block_style_opt1', 'theme_lambda2'),
        '03' => get_string('block_style_opt2', 'theme_lambda2'),
        '04' => get_string('block_style_opt3', 'theme_lambda2'));
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/drawers_style';
    $title = get_string('drawers_style', 'theme_lambda2');
    $description = get_string('drawers_style_desc', 'theme_lambda2');	
    $default = '0';
    $choices = array(
        '0' => get_string('drawers_style_opt0', 'theme_lambda2'),
        '1' => get_string('drawers_style_opt1', 'theme_lambda2'));
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// Moodle login page
	$name = 'theme_lambda2/general_moodle_login';
    $heading = get_string('general_moodle_login', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_lambda2/login_form_pos';
    $title = get_string('login_form_pos', 'theme_lambda2');
    $description = get_string('login_form_pos_desc', 'theme_lambda2');	
    $default = '0';
    $choices = array(
        '0' => get_string('login_form_pos_opt0', 'theme_lambda2'),
        '1' => get_string('login_form_pos_opt1', 'theme_lambda2'),
        '2' => get_string('login_form_pos_opt2', 'theme_lambda2'));
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/login_hide_userpw_form';
    $title = get_string('login_hide_userpw_form', 'theme_lambda2');
    $description = get_string('login_hide_userpw_form_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
	$name = 'theme_lambda2/login_bg_type';
    $title = get_string('login_bg_type', 'theme_lambda2');
    $description = get_string('login_bg_type_desc', 'theme_lambda2');	
    $default = '0';
    $choices = array(
        '0' => get_string('login_bg_type_opt0', 'theme_lambda2'),
        '1' => get_string('login_bg_type_opt1', 'theme_lambda2'),
        '2' => get_string('login_bg_type_opt2', 'theme_lambda2'),
        '3' => get_string('login_bg_type_opt3', 'theme_lambda2'));
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    if(!(get_config('theme_lambda2', 'login_bg_type')) || (get_config('theme_lambda2', 'login_bg_type')==='0') || (get_config('theme_lambda2', 'login_bg_type')==='1')) {
        $name = 'theme_lambda2/login_bg_img_1';
        $title = get_string('login_bg_img_1', 'theme_lambda2');
        $description = get_string('login_bg_img_1_desc', 'theme_lambda2');
        $opts = array('accepted_types' => array('.png', '.jpg', '.webp', '.gif', '.bmp'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'login_bg_img_1', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
    if(get_config('theme_lambda2', 'login_bg_type')==='0') {
        $name = 'theme_lambda2/login_bg_repeat';
        $title = get_string('login_bg_repeat', 'theme_lambda2');
        $description = get_string('login_bg_repeat_desc', 'theme_lambda2');
        $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
    if(get_config('theme_lambda2', 'login_bg_type')==='1') {
        $name = 'theme_lambda2/login_bg_img_2';
        $title = get_string('login_bg_img_2', 'theme_lambda2');
        $description = get_string('login_bg_img_2_desc', 'theme_lambda2');
        $opts = array('accepted_types' => array('.png', '.jpg', '.webp', '.gif', '.bmp'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'login_bg_img_2', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
        
        $name = 'theme_lambda2/login_bg_img_3';
        $title = get_string('login_bg_img_3', 'theme_lambda2');
        $description = get_string('login_bg_img_3_desc', 'theme_lambda2');
        $opts = array('accepted_types' => array('.png', '.jpg', '.webp', '.gif', '.bmp'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'login_bg_img_3', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
        
        $name = 'theme_lambda2/login_bg_img_4';
        $title = get_string('login_bg_img_4', 'theme_lambda2');
        $description = get_string('login_bg_img_4_desc', 'theme_lambda2');
        $opts = array('accepted_types' => array('.png', '.jpg', '.webp', '.gif', '.bmp'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'login_bg_img_4', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_lambda2/login_bg_slider_time';
        $title = get_string('login_bg_slider_time', 'theme_lambda2');
        $description = get_string('login_bg_slider_time_desc', 'theme_lambda2');
        $default = '6';
            $choices = array(
            '4000' => '4',
            '6000' => '6',
            '8000' => '8',
            '10000' => '10',
            '12000' => '12',
            '14000' => '14',
            '16000' => '16'
            );
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
    if(get_config('theme_lambda2', 'login_bg_type')==='2') {
        $name = 'theme_lambda2/login_bg_vid';
        $title = get_string('login_bg_vid', 'theme_lambda2');
        $description = get_string('login_bg_vid_desc', 'theme_lambda2');
        $opts = array('accepted_types' => array('.mp4'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'login_bg_vid', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
    if(get_config('theme_lambda2', 'login_bg_type')==='3') {
        $name = 'theme_lambda2/login_bgcolor';
        $title = get_string('login_bgcolor', 'theme_lambda2');
        $description = get_string('login_bgcolor_desc', 'theme_lambda2');
        $default = '#dee2e6';
        $previewconfig = null;
        $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_lambda2/login_bgcolor_gradient';
        $title = get_string('login_bgcolor_gradient', 'theme_lambda2');
        $description = get_string('login_bgcolor_gradient', 'theme_lambda2');
        $default = '#7f8182';
        $previewconfig = null;
        $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }

	$settings->add($page);


	// "header" settings tab
	$page = new admin_settingpage('theme_lambda2_header',  get_string('settings_header', 'theme_lambda2'));
	
	$name = 'theme_lambda2/header_style_tab';
    $heading = get_string('header_style_tab', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_lambda2/header_style';
    $title = get_string('header_style', 'theme_lambda2');
    $description = get_string('header_style_desc', 'theme_lambda2');
    $default = '0';
	    $choices = array(
		'0'=> get_string('header_style_0', 'theme_lambda2'),
		'1'=> get_string('header_style_1', 'theme_lambda2'),
		'2'=> get_string('header_style_2', 'theme_lambda2')
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    if((get_config('theme_lambda2', 'header_style') == '0') || (get_config('theme_lambda2', 'header_style') == '1')) {
    $name = 'theme_lambda2/logo_height';
    $title = get_string('logo_height', 'theme_lambda2');
    $description = get_string('logo_height_desc', 'theme_lambda2');
    $default = '90px';
	    $choices = array(
		'60px' => '60px',
		'75px' => '75px',
		'90px' => '90px',
		'105px' => '105px',
		'120px' => '120px',
		'135px' => '135px'
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    }

    $name = 'theme_lambda2/compact_logo_height';
    $title = get_string('compact_logo_height', 'theme_lambda2');
    $description = get_string('compact_logo_height_desc', 'theme_lambda2');
    $default = '60px';
	    $choices = array(
        '30px' => '30px',
        '45px' => '45px',
        '60px' => '60px',
		'75px' => '75px',
		'90px' => '90px',
		'105px' => '105px',
		'120px' => '120px',
		'135px' => '135px'
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
	$name = 'theme_lambda2/page_header';
    $title = get_string('page_header', 'theme_lambda2');
    $description = get_string('page_header_desc', 'theme_lambda2');
    $default = '01';
    $choices = array(
        '01' => get_string('page_header_1', 'theme_lambda2'),
        '02' => get_string('page_header_2', 'theme_lambda2'),
        '03' => get_string('page_header_3', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// Header color & background
	$name = 'theme_lambda2/header_colors_bg';
    $heading = get_string('header_colors_bg', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
    if((get_config('theme_lambda2', 'header_style') == '0') || (get_config('theme_lambda2', 'header_style') == '1')) {
    $name = 'theme_lambda2/header_background';
    $title = get_string('header_background', 'theme_lambda2');
    $description = get_string('header_background_desc', 'theme_lambda2');
    $opts = array('accepted_types' => array('.png', '.jpg', '.webp', '.gif', '.bmp'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'header_background', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/header_bg_repeat';
    $title = get_string('header_bg_repeat', 'theme_lambda2');
    $description = get_string('header_bg_repeat_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    }
	
    $name = 'theme_lambda2/headercolor';
    $title = get_string('headercolor', 'theme_lambda2');
    $description = get_string('headercolor_desc', 'theme_lambda2');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/headerfontcolor';
    $title = get_string('headerfontcolor', 'theme_lambda2');
    $description = get_string('headerfontcolor_desc', 'theme_lambda2');
    $default = '#4e585d';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/header_border';
    $title = get_string('header_border', 'theme_lambda2');
    $description = get_string('header_border_desc', 'theme_lambda2');
    $default = '0';
	    $choices = array(
		'0'=> get_string('header_border_0', 'theme_lambda2'),
		'1'=> get_string('header_border_1', 'theme_lambda2'),
		'2'=> get_string('header_border_2', 'theme_lambda2')
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/header_border_width';
    $title = get_string('header_border_width', 'theme_lambda2');
    $description = get_string('header_border_width_desc', 'theme_lambda2');
    $default = '4px';
	    $choices = array(
        '1px' => '1px',
        '2px' => '2px',
        '3px' => '3px',
        '4px' => '4px',
        '5px' => '5px',
        '6px' => '6px',
		'8px' => '8px',
		'10px' => '10px'
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/header_border_color';
    $title = get_string('header_border_color', 'theme_lambda2');
    $description = get_string('header_border_color_desc', 'theme_lambda2');
    $default = '0';
	    $choices = array(
            '0'=> get_string('header_border_color_0', 'theme_lambda2'),
            '1'=> get_string('header_border_color_1', 'theme_lambda2'),
            '2'=> get_string('header_border_color_2', 'theme_lambda2'),
            '3'=> get_string('header_border_color_3', 'theme_lambda2')
		);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    if((get_config('theme_lambda2', 'header_style') == '0') || (get_config('theme_lambda2', 'header_style') == '1')) {
    $name = 'theme_lambda2/menufirstlevelcolor';
    $title = get_string('menufirstlevelcolor', 'theme_lambda2');
    $description = get_string('menufirstlevelcolordesc', 'theme_lambda2');
    $default = '#3A454b';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/menufirstlevel_linkcolor';
    $title = get_string('menufirstlevel_linkcolor', 'theme_lambda2');
    $description = get_string('menufirstlevel_linkcolordesc', 'theme_lambda2');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    }
    
    $name = 'theme_lambda2/menusecondlevelcolor';
    $title = get_string('menusecondlevelcolor', 'theme_lambda2');
    $description = get_string('menusecondlevelcolordesc', 'theme_lambda2');
    $default = '#ffffff';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/menusecondlevel_linkcolor';
    $title = get_string('menusecondlevel_linkcolor', 'theme_lambda2');
    $description = get_string('menusecondlevel_linkcolordesc', 'theme_lambda2');
    $default = '#444444';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// Header Login and Navigation
	$name = 'theme_lambda2/header_login';
    $heading = get_string('header_login', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_lambda2/home_button';
    $title = get_string('home_button', 'theme_lambda2');
    $description = get_string('home_button_desc', 'theme_lambda2');
    $default = '0';
    $choices = array(
        '0' => get_string('home'),
        '1' => get_string('home_button_shortname','theme_lambda2'),
        '2' => get_string('home_button_icon','theme_lambda2'),
        '3' => get_string('home_button_hide','theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/navbar_search_form';
    $title = get_string('navbar_search_form', 'theme_lambda2');
    $description = get_string('navbar_search_form_desc', 'theme_lambda2');
	$default = '0';
    $choices = array(
		'0'=> get_string('navbar_search_form_0', 'theme_lambda2'),
		'1'=> get_string('navbar_search_form_1', 'theme_lambda2'),
		'2'=> get_string('navbar_search_form_2', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/nav_breadcrumb';
    $title = get_string('nav_breadcrumb', 'theme_lambda2');
    $description = get_string('nav_breadcrumb_desc', 'theme_lambda2');
	$default = '0';
    $choices = array(
		'0'=> get_string('navbar_search_form_0', 'theme_lambda2'),
		'1'=> get_string('navbar_search_form_1', 'theme_lambda2'),
		'2'=> get_string('navbar_search_form_2', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    if((get_config('theme_lambda2', 'header_style') == '1') || (get_config('theme_lambda2', 'header_style') == '2')) {
    $name = 'theme_lambda2/login_button_dest';
    $title = get_string('login_button_dest', 'theme_lambda2');
    $description = get_string('login_button_dest_desc', 'theme_lambda2');	
    $default = '0';
    $choices = array(
        '0' => get_string('login_button_dest_opt0', 'theme_lambda2'),
        '1' => get_string('login_button_dest_opt1', 'theme_lambda2'));
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    }
	
    if((get_config('theme_lambda2', 'header_style') == '0') || ((get_config('theme_lambda2', 'header_style') == '1') && (get_config('theme_lambda2', 'login_button_dest') == '1')) || ((get_config('theme_lambda2', 'header_style') == '2') && (get_config('theme_lambda2', 'login_button_dest') == '1'))) {
    $name = 'theme_lambda2/login_link';
    $title = get_string('login_link', 'theme_lambda2');
    $description = get_string('login_link_desc', 'theme_lambda2');
    $default = 2;
    $choices = array(0=>get_string('none'), 1=>get_string('startsignup'), 2=>get_string('forgotten'), 3=>get_string('moodle_login_page','theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/custom_login_link_url';
    $title = get_string('custom_login_link_url', 'theme_lambda2');
    $description = get_string('custom_login_link_url_desc', 'theme_lambda2');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/custom_login_link_txt';
    $title = get_string('custom_login_link_txt', 'theme_lambda2');
    $description = get_string('custom_login_link_txt_desc', 'theme_lambda2');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/auth_googleoauth2';
    $title = get_string('auth_googleoauth2', 'theme_lambda2');
    $description = get_string('auth_googleoauth2_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    }
    
    $settings->add($page);
	
	
	// "footer" settings tab
	$page = new admin_settingpage('theme_lambda2_footer',  get_string('settings_footer', 'theme_lambda2'));
	
    $name = 'theme_lambda2/footer_blocks_pos';
    $title = get_string('footer_blocks_pos', 'theme_lambda2');
    $description = get_string('footer_blocks_pos_desc', 'theme_lambda2');
    $default = '4';
    $choices = array(
		'4'=>'4',
		'3'=>'3',
		'2'=>'2',
		'1'=>'1',
		'0'=>'0');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/footercolor';
    $title = get_string('footercolor', 'theme_lambda2');
    $description = get_string('footercolordesc', 'theme_lambda2');
    $default = '#323A45';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/footerheadingcolor';
    $title = get_string('footerheadingcolor', 'theme_lambda2');
    $description = get_string('footerheadingcolordesc', 'theme_lambda2');
    $default = '#f2f2f2';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/footertextcolor';
    $title = get_string('footertextcolor', 'theme_lambda2');
    $description = get_string('footertextcolordesc', 'theme_lambda2');
    $default = '#bdc3c7';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/footerlinkcolor';
    $title = get_string('footerlinkcolor', 'theme_lambda2');
    $description = get_string('footerlinkcolordesc', 'theme_lambda2');
	$default = '0';
    $choices = array(
		'0'=> get_string('footerlinkcolor_0', 'theme_lambda2'),
		'1'=> get_string('footerlinkcolor_1', 'theme_lambda2'),
		'2'=> get_string('footerlinkcolor_2', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/copyrightcolor';
    $title = get_string('copyrightcolor', 'theme_lambda2');
    $description = get_string('copyrightcolordesc', 'theme_lambda2');
    $default = '#292F38';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/copyright_textcolor';
    $title = get_string('copyright_textcolor', 'theme_lambda2');
    $description = get_string('copyright_textcolordesc', 'theme_lambda2');
    $default = '#bdc3c2';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);	
	
    $name = 'theme_lambda2/footnote';
    $title = get_string('footnote', 'theme_lambda2');
    $description = get_string('footnotedesc', 'theme_lambda2');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$settings->add($page);
	
	
	// "front page" settings tab
	$page = new admin_settingpage('theme_lambda2_frontpage',  get_string('settings_frontpage', 'theme_lambda2'));

	//General front page options
	$name = 'theme_lambda2/frontpage_options';
    $heading = get_string('frontpage_options', 'theme_lambda2');
    $information = get_string('frontpage_options_info', 'theme_lambda2');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

	$name = 'theme_lambda2/site_home_items_headings';
    $title = get_string('site_home_items_headings', 'theme_lambda2');
    $description = get_string('site_home_items_headings_desc', 'theme_lambda2');
    $default = '01';
    $choices = array(
        '01' => get_string('site_home_items_headings_01', 'theme_lambda2'),
        '02' => get_string('site_home_items_headings_02', 'theme_lambda2'),
        '03' => get_string('site_home_items_headings_03', 'theme_lambda2'),
        '04' => get_string('site_home_items_headings_04', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/fp_clean_layout';
    $title = get_string('fp_clean_layout', 'theme_lambda2');
    $description = get_string('fp_clean_layout_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/fp_no_page_header';
    $title = get_string('fp_no_page_header', 'theme_lambda2');
    $description = get_string('fp_no_page_header_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	//Hero section options
	$name = 'theme_lambda2/hero_section_options';
    $heading = get_string('hero_section_options', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_lambda2/slideshow_number_slides';
    $title = get_string('slideshow_number_slides', 'theme_lambda2');
    $description = get_string('slideshow_number_slides_desc', 'theme_lambda2');
    $default = 4;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16'
    );
    $page->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

	$name = 'theme_lambda2/slideshow_autoplay';
    $title = get_string('slideshow_autoplay', 'theme_lambda2');
    $description = get_string('slideshow_autoplay_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/slideshow_autoplay_delay';
    $title = get_string('slideshow_autoplay_delay', 'theme_lambda2');
    $description = get_string('slideshow_autoplay_delay_desc', 'theme_lambda2');
    $default = '7000';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/slideshow_transition';
    $title = get_string('slideshow_transition', 'theme_lambda2');
    $description = get_string('slideshow_transition_desc', 'theme_lambda2');
    $default = 1;
    $choices = array(
        1 => get_string('slide', 'theme_lambda2'),
        2 => get_string('fade', 'theme_lambda2'),
        3 => get_string('scale', 'theme_lambda2'),
        4 => get_string('pull', 'theme_lambda2')
    );	
    $page->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
	
	$name = 'theme_lambda2/slideshow_kenburns';
    $title = get_string('slideshow_kenburns', 'theme_lambda2');
    $description = get_string('slideshow_kenburns_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/slideshow_navigation_style';
    $title = get_string('slideshow_navigation_style', 'theme_lambda2');
    $description = get_string('slideshow_navigation_style_desc', 'theme_lambda2');
    $default = 1;
    $choices = array(
        1 => get_string('animated_arrows', 'theme_lambda2'),
        2 => get_string('chevron_light_center', 'theme_lambda2'),
        3 => get_string('chevron_dark_center', 'theme_lambda2'),
		4 => get_string('chevron_light_bottom', 'theme_lambda2'),
		5 => get_string('chevron_dark_bottom', 'theme_lambda2'),
		6 => get_string('bullets', 'theme_lambda2')
    );	
    $page->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
	
	$name = 'theme_lambda2/slideshow_nav_hover';
    $title = get_string('slideshow_nav_hover', 'theme_lambda2');
    $description = get_string('slideshow_nav_hover_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	//Slideshow slides
	$name = 'theme_lambda2/slideshow_slides';
    $heading = get_string('slideshow_slides', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
    $numberofslides = get_config('theme_lambda2', 'slideshow_number_slides');
	for ($i = 1; $i <= $numberofslides; $i++) {
		
		$name = 'theme_lambda2/slideshow_current_slide_'.$i;
    	$information = get_string('slideshow_current_slide', 'theme_lambda2');
		$information = $information.$i;
    	$setting = new admin_setting_heading($name, NULL, $information);
    	$page->add($setting);

        $name = 'theme_lambda2/slideshow_image_'.$i;
        $title = get_string('slideshow_image', 'theme_lambda2');
        $description = get_string('slideshow_image_desc', 'theme_lambda2');
        $opts = array('accepted_types' => array('.png', '.jpg', '.webp', '.gif', '.bmp', '.mp4'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slideshow_image_'.$i, 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
		
        $name = 'theme_lambda2/slideshow_caption_'.$i;
        $title = get_string('slideshow_caption_desc', 'theme_lambda2');
        $default = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.';
        $setting = new admin_setting_confightmleditor($name, $title, '', $default);
        $page->add($setting);
		
		$name = 'theme_lambda2/slideshow_caption_pos_'.$i;
    	$title = get_string('slideshow_caption_pos', 'theme_lambda2');
    	$description = get_string('slideshow_caption_pos_desc', 'theme_lambda2');
    	$default = 2;
    	$choices = array(
     		1 => get_string('centered', 'theme_lambda2'),
			2 => get_string('left', 'theme_lambda2'),
    		3 => get_string('right', 'theme_lambda2')
    	);	
    	$page->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

        $name = 'theme_lambda2/slideshow_bg_'.$i;
    	$title = get_string('slideshow_bg', 'theme_lambda2');
        $description = get_string('slideshow_bg_desc', 'theme_lambda2');
        $default = 1;
        $choices = array(
            1 => get_string('drawers_style_opt0', 'theme_lambda2'),
            2 => get_string('drawers_style_opt1', 'theme_lambda2'),
            3 => get_string('maincolor', 'theme_lambda2'),
            5 => get_string('slideshow_bg_opt2', 'theme_lambda2'),
            6 => get_string('slideshow_bg_opt3', 'theme_lambda2'),
            4 => get_string('none')
        );
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_lambda2/slideshow_bg_slide_'.$i;
        $title = get_string('slideshow_bg_slide', 'theme_lambda2');
        $description = get_string('slideshow_bg_slide_desc', 'theme_lambda2');
        $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
	}
	
	//Slideshow advanced settings
	$name = 'theme_lambda2/slideshow_advanced_settings';
    $heading = get_string('slideshow_advanced_settings', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
    $name = 'theme_lambda2/slideshow_advanced_ratio';
    $title = get_string('slideshow_ratio', 'theme_lambda2');
    $description = get_string('slideshow_ratio_desc', 'theme_lambda2');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$settings->add($page);


	// "settings socials" settingpage
	$page = new admin_settingpage('theme_lambda2_socials',  get_string('settings_socials', 'theme_lambda2'));

	// Position and Colors
	$name = 'theme_lambda2/position_and_colors';
    $heading = get_string('position_and_colors', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	// social icons position 
    $name = 'theme_lambda2/socials_position';
    $title = get_string('socials_position', 'theme_lambda2');
    $description = get_string('socials_position_desc', 'theme_lambda2');
    $default = '0';
    $choices = array(
		'0'=>get_string('socials_position_0', 'theme_lambda2'),
		'1'=>get_string('socials_position_1', 'theme_lambda2'),
        '2'=>get_string('socials_position_2', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// social icons bg
    $name = 'theme_lambda2/socials_lambda_bg';
    $title = get_string('socials_lambda_bg', 'theme_lambda2');
    $description = get_string('socials_lambda_bg_desc', 'theme_lambda2');
    $default = '0';
    $choices = array(
		'0'=>get_string('socials_lambda_bg_0', 'theme_lambda2'),
		'1'=>get_string('socials_lambda_bg_1', 'theme_lambda2'),
		'2'=>get_string('socials_lambda_bg_2', 'theme_lambda2'),
		'3'=>get_string('socials_lambda_bg_3', 'theme_lambda2'),
		'4'=>get_string('socials_lambda_bg_4', 'theme_lambda2'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// Social icons
	$name = 'theme_lambda2/socialicons';
    $heading = get_string('socialicons', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
    for ($i = 1; $i <= 5; $i++) {
		// Social icon types
    	$name = 'theme_lambda2/socials_icontypes_'.$i;
    	$title = get_string('socials_icontypes', 'theme_lambda2');
		$title = $title." #".$i;
    	$description = get_string('socials_icontypes_desc', 'theme_lambda2');
    	$default = '0';
    	$choices = array(
			'0'=> get_string('none'),
			'fa fa-dribbble'=>'Dribble',
			'fa fa-dropbox'=>'Dropbox',
			'fa fa-facebook'=>'Facebook',
			'fa fa-flickr'=>'Flickr',
			'fa fa-github'=>'Github',
			'fa fa-instagram'=>'Instagram',
			'fa fa-linkedin'=>'Linkedin',
			'fa fa-pinterest-square'=>'Pinterest',
			'fa fa-rss-square'=>'RSS',
			'fa fa-skype'=>'Skype',
            //'lambda icon-threads' => 'Threads',
			'fa fa-tumblr-square'=>'Tumblr',
			'fa fa-vimeo'=>'Vimeo',
			'fa fa-vk'=>'Vkontakte',
            'lambda icon-x-twitter'=>'X',
			'fa fa-xing-square'=>'Xing',
			'fa fa-youtube-square'=>'YouTube');
   		$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	    $setting->set_updatedcallback('theme_reset_all_caches');
    	$page->add($setting);
		
        // URL.
        $name = 'theme_lambda2/socials_url_'.$i;
        $title = get_string('socials_url', 'theme_lambda2');
		$title = $title." #".$i;
        $description = get_string('socials_url_desc', 'theme_lambda2');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
	}

    $name = 'theme_lambda2/socials_monochrome';
    $title = get_string('socials_monochrome', 'theme_lambda2');
    $description = get_string('socials_monochrome_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// Additional Icon Links
	$name = 'theme_lambda2/iconlinks';
    $heading = get_string('iconlinks', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_lambda2/socials_icons_color';
    $title = get_string('socials_icons_color', 'theme_lambda2');
    $description = get_string('socials_icons_color_desc', 'theme_lambda2');
    $default = '#9a9a9a';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/socials_text_color';
    $title = get_string('socials_text_color', 'theme_lambda2');
    $description = get_string('socials_text_color_desc', 'theme_lambda2');
    $default = '#c5c5c5';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    for ($i = 1; $i <= 3; $i++) {
		// Icon
        $name = 'theme_lambda2/socials_link_icon_'.$i;
        $title = get_string('socials_link_icon', 'theme_lambda2');
		$title = $title." #".$i;
        $description = get_string('socials_link_icon_desc', 'theme_lambda2');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
		
		// Text
        $name = 'theme_lambda2/socials_link_text_'.$i;
        $title = get_string('socials_link_text', 'theme_lambda2');
		$title = $title." #".$i;
        $description = get_string('socials_link_text_desc', 'theme_lambda2');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
		
        // URL.
        $name = 'theme_lambda2/socials_link_url_'.$i;
        $title = get_string('socials_link_url', 'theme_lambda2');
		$title = $title." #".$i;
        $description = get_string('socials_link_url_desc', 'theme_lambda2');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
	}

	// Share Buttons
	$name = 'theme_lambda2/sharebuttons';
    $heading = get_string('sharebuttons', 'theme_lambda2');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

	$name = 'theme_lambda2/sharebuttons_enrol';
    $title = get_string('sharebuttons_enrol', 'theme_lambda2');
    $description = get_string('sharebuttons_enrol_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/sharebuttons_sitenews';
    $title = get_string('sharebuttons_sitenews', 'theme_lambda2');
    $description = get_string('sharebuttons_sitenews_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/sharebuttons_facebook';
    $title = get_string('sharebuttons_facebook', 'theme_lambda2');
    $description = get_string('sharebuttons_facebook_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/sharebuttons_twitterx';
    $title = get_string('sharebuttons_twitterx', 'theme_lambda2');
    $description = get_string('sharebuttons_twitterx_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    /*
    $name = 'theme_lambda2/sharebuttons_threads';
    $title = get_string('sharebuttons_threads', 'theme_lambda2');
    $description = get_string('sharebuttons_threads_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    */
    $name = 'theme_lambda2/sharebuttons_whatsapp';
    $title = get_string('sharebuttons_whatsapp', 'theme_lambda2');
    $description = get_string('sharebuttons_whatsapp_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/sharebuttons_linkedin';
    $title = get_string('sharebuttons_linkedin', 'theme_lambda2');
    $description = get_string('sharebuttons_linkedin_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/sharebuttons_pinterest';
    $title = get_string('sharebuttons_pinterest', 'theme_lambda2');
    $description = get_string('sharebuttons_pinterest_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$settings->add($page);


	// "settings fonts" settingpage
	$page = new admin_settingpage('theme_lambda2_fonts',  get_string('settings_fonts', 'theme_lambda2'));
	
    // source
    $name = 'theme_lambda2/fonts_source';
    $title = get_string('fonts_source', 'theme_lambda2');
    $description = get_string('fonts_source_desc', 'theme_lambda2');
    $default = 1;
    $choices = array(
        1 => get_string('fonts_source_google', 'theme_lambda2'),
        2 => get_string('fonts_source_file', 'theme_lambda2')
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	if (get_config('theme_lambda2', 'fonts_source') == "1") {
		
	$name = 'theme_lambda2/font_body';
    $title = get_string('fontselect_body' , 'theme_lambda2');
    $description = get_string('fontselectdesc', 'theme_lambda2');
    $default = '1';
    $choices = array(
    	'Open+Sans'=>'Open Sans',
		'Arvo'=>'Arvo',
		'Bree+Serif'=>'Bree Serif',
		'Cabin'=>'Cabin',
		'Crimson+Pro'=>'Crimson Pro',
		'Encode+Sans'=>'Encode Sans',
		'Enriqueta'=>'Enriqueta',
		'Gudea'=>'Gudea',
		'Imprima'=>'Imprima',
		'Lato'=>'Lato',
		'Lekton'=>'Lekton',
		'Nunito'=>'Nunito',
		'Montserrat'=>'Montserrat',
		'PT+Sans'=>'PT Sans',
    	'Raleway'=>'Raleway',
		'Roboto'=>'Roboto',
        'Rubik'=>'Rubik',
        'Solway'=>'Solway',
		'Ubuntu'=>'Ubuntu',
    	'Vollkorn'=>'Vollkorn',
		'Work+Sans'=>'Work Sans');
	 			
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/font_body_size';
    $title = get_string('font_body_size' , 'theme_lambda2');
    $description = get_string('font_body_size_desc', 'theme_lambda2');
    $default = '14px';
    $choices = array(
    	'12px'=>'12px',
		'13px'=>'13px',
		'14px'=>'14px',
		'15px'=>'15px',
		'16px'=>'16px');			
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/font_heading';
    $title = get_string('fontselect_heading' , 'theme_lambda2');
    $description = get_string('fontselectdesc', 'theme_lambda2');
    $default = '1';
    $choices = array(			
		'Open+Sans'=>'Open Sans',
		'Abril+Fatface'=>'Abril Fatface',
		'Arvo'=>'Arvo',
		'Bevan'=>'Bevan', 
		'Bree+Serif'=>'Bree Serif',
		'Cabin'=>'Cabin',
		'Crimson+Pro'=>'Crimson Pro',
        'DM+Serif+Display'=>'DM Serif Display',
		'Encode+Sans'=>'Encode Sans',
		'Enriqueta'=>'Enriqueta',
		'Gudea'=>'Gudea',
		'Imprima'=>'Imprima',
		'Josefin+Sans'=>'Josefin Sans',
		'Lato'=>'Lato',
		'Lekton'=>'Lekton',
		'Lobster'=>'Lobster',
		'Nunito'=>'Nunito',
		'Montserrat'=>'Montserrat',
		'Pacifico'=>'Pacifico',
		'PT+Sans'=>'PT Sans',
    	'Raleway'=>'Raleway',
		'Roboto'=>'Roboto',
        'Rubik'=>'Rubik',
        'Solway'=>'Solway',
		'Ubuntu'=>'Ubuntu',
    	'Vollkorn'=>'Vollkorn',
		'Work+Sans'=>'Work Sans');

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	} else {
	
    // body font.
    $name = 'theme_lambda2/fonts_file_body';
    $title = get_string('fonts_file_body', 'theme_lambda2');
    $description = get_string('fonts_file_body_desc', 'theme_lambda2');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'fonts_file_body');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/font_body_size';
    $title = get_string('font_body_size' , 'theme_lambda2');
    $description = get_string('font_body_size_desc', 'theme_lambda2');
    $default = '14px';
    $choices = array(
    	'12px'=>'12px',
		'13px'=>'13px',
		'14px'=>'14px',
		'15px'=>'15px',
		'16px'=>'16px');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    // headings font.
    $name = 'theme_lambda2/fonts_file_headings';
    $title = get_string('fonts_file_headings', 'theme_lambda2');
    $description = get_string('fonts_file_headings_desc', 'theme_lambda2');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'fonts_file_headings');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$name = 'theme_lambda2/font_headings_weight';
    $title = get_string('font_headings_weight' , 'theme_lambda2');
    $description = get_string('font_headings_weight_desc', 'theme_lambda2');
    $default = '1';
    $choices = array(
    	'1'=>'700',
		'2'=>'400',
		'3'=>'300');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	}
	
    $name = 'theme_lambda2/heading_color';
    $title = get_string('heading_color', 'theme_lambda2');
    $description = get_string('heading_color_desc', 'theme_lambda2');
    $default = '#555555';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/body_color';
    $title = get_string('body_color', 'theme_lambda2');
    $description = get_string('body_color_desc', 'theme_lambda2');
    $default = '#555555';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_lambda2/link_color';
    $title = get_string('link_color', 'theme_lambda2');
    $description = get_string('link_color_desc', 'theme_lambda2');
    $default = '#EBA600';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	$name = 'theme_lambda2/use_linearicons';
    $title = get_string('use_linearicons', 'theme_lambda2');
    $description = get_string('use_linearicons_desc', 'theme_lambda2');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$settings->add($page);
	
	
	// "advanced" settingpage
	$page = new admin_settingpage('theme_lambda2_advanced',  get_string('settings_advanced', 'theme_lambda2'));
	
    $name = 'theme_lambda2/preset';
    $title = get_string('preset', 'theme_lambda2');
    $description = get_string('preset_desc', 'theme_lambda2');
    $default = 'default.scss';
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_lambda2', 'preset', 0, 'itemid, filepath, filename', false);
    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';
	$choices['legacy.scss'] = 'legacy.scss';
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
    $name = 'theme_lambda2/customscss';
    $title = get_string('customscss', 'theme_lambda2');
    $description = get_string('customscssdesc', 'theme_lambda2');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	$settings->add($page);

}