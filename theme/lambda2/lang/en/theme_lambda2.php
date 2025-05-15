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

/* Core */
$string['configtitle'] = 'Lambda';
$string['pluginname'] = 'Lambda';
$string['choosereadme'] = '
<div class="clearfix">
<div style="margin-bottom:20px;">
<p style="text-align:center;"><img class="img-fluid rounded" src="lambda2/pix/screenshot.jpg" /></p>
</div>
<hr />
<div class="prom-box prom-box-default shadow2" style="margin-bottom:20px;">
<h2>Lambda - Premium Moodle Theme</h2>
</div>
<h4>Theme Summary</h4>
<div style="color: #888; text-transform: uppercase; margin-bottom:20px;">
<p>Lambda is particularly appreciated for its ease of use and the professional appearance it brings to Moodle sites. It is suitable for a wide range of educational contexts, from K-12 schools to universities and corporate training programs.</p>
</div>
<hr />
<p style="text-align:center;"><img class="img-fluid rounded border" src="lambda2/pix/redPIthemes.jpg" /></p>';

/* Settings - General */
$string['settings_general'] = 'General Theme Settings';
$string['general_layout'] = 'General Layout';
$string['page_layout'] = 'Set Page Layout';
$string['page_layout_desc'] = 'Choose from the list of available page layouts.';
$string['boxed'] = 'Boxed';
$string['full'] = 'Wide';
$string['page_width'] = 'Set Page Width';
$string['page_width_desc'] = 'Here you can select a (maximum) width for the page.';
$string['unset'] = 'unset';
$string['page_bg_img'] = 'Background image';
$string['page_bg_img_desc'] = 'Upload a page background image. If none is uploaded the background color for the page will be used.<br><strong>Accepted file types:</strong> PNG, JPG, GIF, BMP';
$string['page_bg_repeat'] = 'Repeat uploaded image?';
$string['page_bg_repeat_desc'] = 'If you have uploaded a tiled background (like a pattern), you should mark the checkbox to repeat the image over the page background.<br />Otherwise, if you leave the box unchecked, the image will be used as a full page background image that covers the entire browser window.';
$string['page_bg_color'] = 'Page background color';
$string['page_bg_color_desc'] = 'Select a page background color. This color will be used if no background image is uploaded or if you lower the opacity for the background image.';
$string['page_bg_img_opacity'] = 'Background Image Opacity';
$string['page_bg_img_opacity_desc'] = 'The opacity property specifies the opacity/transparency of the background image. The lower the value, the more transparent.';
$string['button_border_radius'] = 'Button Border Radius';
$string['button_border_radius_desc'] = 'The border-radius property rounds the corners of an element\'s outer border edge. This allows you to define rounded buttons.';
$string['general_logo_favicon'] = 'Logo &amp; Favicon';
$string['logodesc'] = '<div style="border-bottom: 1px solid #e5e5e5; margin-bottom: 1rem;"><span style="font-size:1.25em;">Logo</span><br>You can upload your logo at the general Moodle <em>Appearance</em> settings:<br><a href="/admin/settings.php?section=logos" target="_blank"><i class="fa fas fa-angle-double-right" aria-hidden="true"></i> Click here to access the <em>Logos</em> settings page</a>.<br><br></div>';
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Upload your favicon.<br>A favicon is an icon typically displayed in the address bar of a browser accessing the site or next to the site name in a list of saved bookmarks. Images with a transparent background and 32px height will work best.<br><strong>Accepted file types:</strong> PNG, JPG, ICO';
$string['general_colors'] = 'General Theme Colors';
$string['maincolor'] = 'Theme Main Color';
$string['maincolordesc'] = 'The main color of the theme - this will affect mulitple components to produce the color you wish to apply across your Moodle site.';
$string['secondcolor'] = 'Theme Secondary Color';
$string['secondcolordesc'] = 'The secondary color of your theme - e.g. used for the default Moodle button.';
$string['general_course_ui'] = 'Course UI';
$string['course_title'] = 'Course Title';
$string['course_title_desc'] = 'Choose how to display the title of a course for the main course page.';
$string['course_title_01'] = 'default (like common page title)';
$string['course_title_02'] = 'with course image banner';
$string['course_title_03'] = 'hide course title';
$string['activity_icons'] = 'Moodle Activity Icons';
$string['activity_icons_desc'] = 'Moodle\'s activity icons have been redesigned to offer a colored background depending on the purpose of the module. Since Moodle 4.2, the activity type is only shown in editing mode. You can choose between the default colored icons (with an option to always display the activity type) or a minimal monochrome display for the icons instead.';
$string['activity_icons_1'] = 'default';
$string['activity_icons_2'] = 'default with activity type';
$string['activity_icons_3'] = 'monochrome';
$string['activity_icons_4'] = 'main background color with dark icons';
$string['activity_icons_5'] = 'main background color with bright icons';
$string['activity_icons_6'] = 'secondary background color with dark icons';
$string['activity_icons_7'] = 'secondary background color with bright icons';
$string['activity_icons_8'] = 'icons with contextual background color (Moodle 4.0 - 4.3)';
$string['activity_icons_9'] = 'icons with contextual line color (Moodle 4.4)';
$string['back_to_course'] = 'Back To Course Button';
$string['back_to_course_desc'] = 'Show a <em>Back to course</em> button at the bottom of a course activity or resource.';
$string['course_enrolment_settingssection'] = '<div style="border-bottom: 1px solid #e5e5e5; margin-bottom: 1rem;"><span style="font-size:1.25em;">Course Enrolment Page</span><br>To enable the course enrolment pages, you have to change the user policies so that visitors automatically get a guest role.<br><a href="/admin/settings.php?section=userpolicies#admin-autologinguests" target="_blank"><i class="fa fas fa-angle-double-right" aria-hidden="true"></i> Click here to access the <em>User policies</em> settings page</a> and tick the box for <em>Auto-login guests</em> there.<br><br></div>';
$string['course_enrolment_page'] = 'Enrolment Page Layout';
$string['course_enrolment_page_desc'] = 'Choose a layout for the course enrolment pages:';
$string['course_enrolment_page_1'] = 'Default Moodle course enrolment page';
$string['course_enrolment_page_2'] = 'Lambda custom course enrolment page (small course image)';
$string['course_enrolment_page_3'] = 'Lambda custom course enrolment page (large course image)';
$string['course_enrolment_page_4'] = 'Lambda custom course enrolment page (hero course image)';
$string['enrolment_coursecustomfields'] = 'Course Custom fields on Enrolment Page';
$string['enrolment_coursecustomfields_desc'] = 'Choose where you would like to show the optional course custom fields.<br>Check the box to display the course custom fields <em>only</em> on the enrolment page. This might be useful if you are using multiple course custom fields.<br>Otherwise, they will be also displayed at the course list layout.';
$string['course_free_txt'] = 'Term Free Courses';
$string['course_free_txt_desc'] = 'If you offer paid courses on your learning platform, you may also want to promote free courses. In this case, you can enter the relevant text here (e.g. “Free offer!”). Schools and universities can leave this text field blank if all courses are freely available anyway.';
$string['category_layout'] = 'Course category view';
$string['category_layout_desc'] = 'Choose a layout for the courses in the course category view. You can select to show your courses in a list or in a grid view.';
$string['category_layout_list'] = 'Course list';
$string['category_layout_tiles1'] = 'Course tiles';
$string['category_layout_tiles2'] = 'Course tiles (minimal)';
$string['general_moodle_blocks'] = 'Moodle Drawers &amp; Blocks';
$string['block_style'] = 'Choose block style';
$string['block_style_opt0'] = 'block style 01';
$string['block_style_opt1'] = 'block style 02';
$string['block_style_opt2'] = 'block style 03';
$string['block_style_opt3'] = 'block style 04';
$string['block_style_desc'] = 'You can choose between the following block style variations:<div class="row"><div class="col-md-3"><p><span id="settings-block-style-01" class="lambda-settings-img"></span></p><p>block style 01</p></div><div class="col-md-3"><p><span id="settings-block-style-02" class="lambda-settings-img"></span></p><p>block style 02</p></div><div class="col-md-3"><p><span id="settings-block-style-03" class="lambda-settings-img"></span></p><p>block style 03</p></div><div class="col-md-3"><p><span id="settings-block-style-04" class="lambda-settings-img"></span></p><p>block style 04</p></div></div>';
$string['drawers_style'] = 'Choose sidebar style';
$string['drawers_style_opt0'] = 'Light';
$string['drawers_style_opt1'] = 'Dark';
$string['drawers_style_desc'] = 'Choose a style for the Moodle sidebar drawers.';
$string['general_moodle_login'] = 'Moodle Login Page';
$string['login_button_dest'] = 'Header Login Button';
$string['login_button_dest_desc'] = 'Either connect the header login button to the default Moodle login page or open a modal login form instead.<div class="alert alert-info"><strong>Please note:</strong> You have to <em>Save Changes</em> first to show the new options for your choice.</div><br />';
$string['login_button_dest_opt0'] = 'Moodle Login page (default)';
$string['login_button_dest_opt1'] = 'Lambda modal login form';
$string['login_bg_type'] = 'Moodle Login Page Background';
$string['login_bg_type_opt0'] = 'Background image';
$string['login_bg_type_opt1'] = 'Background slideshow (up to four images)';
$string['login_bg_type_opt2'] = 'Full screen video background';
$string['login_bg_type_opt3'] = 'Custom background color';
$string['login_bg_type_desc'] = 'Here you can choose between different options for the background of the Moodle login page.<div class="alert alert-info"><strong>Please note:</strong> You have to <em>Save Changes</em> first to show the new options for your choice.</div><br />';
$string['login_form_pos'] = 'Moodle Login Form Position';
$string['login_form_pos_opt0'] = 'centered login form';
$string['login_form_pos_opt1'] = 'left aligned login form';
$string['login_form_pos_opt2'] = 'right aligned login form';
$string['login_form_pos_desc'] = 'Choose a position for Moodle login form.';
$string['login_bg_img_1'] = 'Login Page Background Image';
$string['login_bg_img_1_desc'] = 'Upload a custom background image for the Moodle login page.<br><strong>Accepted file types:</strong> PNG, JPG, GIF, BMP';
$string['login_bg_img_2'] = 'Login Page Background Image 2';
$string['login_bg_img_2_desc'] = 'Second image for a slideshow at the Moodle login page.<br><strong>Accepted file types:</strong> PNG, JPG, GIF, BMP';
$string['login_bg_img_3'] = 'Login Page Background Image 3';
$string['login_bg_img_3_desc'] = 'Third image for a slideshow at the Moodle login page.<br><strong>Accepted file types:</strong> PNG, JPG, GIF, BMP';
$string['login_bg_img_4'] = 'Login Page Background Image 4';
$string['login_bg_img_4_desc'] = 'Fourth image for a slideshow at the Moodle login page.<br><strong>Accepted file types:</strong> PNG, JPG, GIF, BMP';
$string['login_bg_slider_time'] = 'Login Page Background Slider Time';
$string['login_bg_slider_time_desc'] = 'Here you can set the amount of time that each slide is displayed (in sec.).';
$string['login_bg_vid'] = 'Login Page Background Video';
$string['login_bg_vid_desc'] = 'Upload a video file for a full screen video background at the Moodle login page.<br><strong>Accepted file types:</strong> MP4';
$string['login_bg_repeat'] = 'Repeat uploaded image?';
$string['login_bg_repeat_desc'] = 'If you have uploaded a tiled background (like a pattern), you should mark the checkbox to repeat the image over the page background.<br />Otherwise, if you leave the box unchecked, the image will be used as a full page background image that covers the entire browser window.';
$string['login_bgcolor'] = 'Login Page Background Color';
$string['login_bgcolor_desc'] = 'Select a background color for the Moodle login page.';
$string['login_bgcolor_gradient'] = 'Login Page Gradient Color';
$string['login_bgcolor_gradient_desc'] = 'A gradient allows you to display smooth transitions between two specified colors. If you prefer a solid background color with no gradient, you can use the same color code here.';
$string['login_hide_userpw_form'] = 'Login Page Hide Username/Password Form';
$string['login_hide_userpw_form_desc'] = 'If you prefer that your users login with other existing accounts (e.g. Google), then you can check this box to hide the default username/password form. An additional button will be displayed to show/hide the form.';

/* Settings - Header */
$string['settings_header'] = 'Header Settings';
$string['header_style_tab'] = 'General header style';
$string['logo_height'] = 'Main Logo Height (px)';
$string['logo_height_desc'] = 'Logo height in pixels. Logo width will be set automatically.';
$string['compact_logo_height'] = 'Height for the compact version of the logo';
$string['compact_logo_height_desc'] = 'Logo height in pixels for the compact version of the site logo such as an emblem, shield or icon.';
$string['header_style'] = 'Header Style';
$string['header_style_desc'] = 'Choose the layout for the header:<div class="row"><div class="col-md-3"><p><span id="header-styles-01" class="lambda-settings-img"></span></p><p>Classic (with login form)</p></div><div class="col-md-3"><p><span id="header-styles-02" class="lambda-settings-img"></span></p><p>Classic (centered logo)</p></div><div class="col-md-3"><p><span id="header-styles-03" class="lambda-settings-img"></span></p><p>Inline</p></div></div><div class="alert alert-info"><strong>Please note:</strong> You have to <em>Save Changes</em> first to show the new options for your choice.</div><br />';
$string['header_style_0'] = 'Classic (with login form)';
$string['header_style_1'] = 'Classic (centered logo)';
$string['header_style_2'] = 'Inline';
$string['page_header'] = 'Page Header/Title';
$string['page_header_desc'] = 'Choose a style for the page title.';
$string['page_header_1'] = 'Title left aligned (default)';
$string['page_header_2'] = 'Title centered with divider';
$string['page_header_3'] = 'Title with main background color';
$string['page_header_4'] = 'Title with main background color and course image';
$string['header_colors_bg'] = 'Colors and background';
$string['header_background'] = 'Upload custom header image';
$string['header_background_desc'] = 'Upload your own header image. If none is uploaded a default white background will be used for the header.<br><strong>Accepted file types:</strong> PNG, JPG, GIF, BMP';
$string['header_bg_repeat'] = 'Repeat header image?';
$string['header_bg_repeat_desc'] = 'If you have uploaded a tiled background (like a pattern), you should mark the checkbox to repeat the image over the background at the header.<br />Otherwise the image will scaled to be as large as possible so that the header area is completely covered by the background image.';
$string['headercolor'] = 'Header Color';
$string['headercolor_desc'] = 'Background color for the header area';
$string['headerfontcolor'] = 'Header Font Color';
$string['headerfontcolor_desc'] = 'Font color for the header area';
$string['header_border'] = 'Header Border';
$string['header_border_desc'] = 'Choose between different options for a dividing border at the header area.';
$string['header_border_0'] = 'border - top';
$string['header_border_1'] = 'border - bottom';
$string['header_border_2'] = 'none';
$string['header_border_width'] = 'Header Border Width';
$string['header_border_width_desc'] = 'Select the width for the dividing border at the header area.';
$string['header_border_color'] = 'Header Border Color';
$string['header_border_color_desc'] = 'Select the color for the dividing border at the header area.';
$string['header_border_color_0'] = 'use main theme color';
$string['header_border_color_1'] = 'use secondary theme color';
$string['header_border_color_2'] = 'slightly darkened';
$string['header_border_color_3'] = 'slightly lightened';
$string['menufirstlevelcolor'] = 'Custom Menu Color';
$string['menufirstlevelcolordesc'] = 'Background color for the main navigation bar';
$string['menufirstlevel_linkcolor'] = 'Custom Menu - Links';
$string['menufirstlevel_linkcolordesc'] = 'Color for the links in the main navigation bar';
$string['menusecondlevelcolor'] = 'Menu Drop-down Items';
$string['menusecondlevelcolordesc'] = 'Background color for the drop-down items of the Moodle custom menu';
$string['menusecondlevel_linkcolor'] = 'Menu Drop-down Items - Links';
$string['menusecondlevel_linkcolordesc'] = 'Font color for the drop-down items of the Moodle custom menu';
$string['header_login'] = 'Login and Navigation';
$string['login_link'] = 'Additional Login Link';
$string['login_link_desc'] = 'Shows an additional link at the login form of the theme. Depending on the settings, this can be either the login form at the header or the modal login form.';
$string['moodle_login_page'] = 'Moodle Login Page';
$string['custom_login_link_url'] = 'Custom Login Link URL';
$string['custom_login_link_url_desc'] = 'Here you can enter a custom URL for your additional link at the login form. This will override the setting from the dropdown.';
$string['custom_login_link_txt'] = 'Custom Login Link Text';
$string['custom_login_link_txt_desc'] = 'Here you can enter a custom text for your additional link at the login form. This will override the setting from the dropdown.';
$string['auth_googleoauth2'] = 'Oauth2';
$string['auth_googleoauth2_desc'] = 'Replaces the theme\'s login form with the Moodle Oauth2 authentication buttons. Depending on the settings, this can be either the login form at the header or the modal login form.<br /><strong>Please note: </strong>You have to set up this authentication plugin at the general Moodle settings before it can be used.';
$string['home_button'] = 'Custom Menu Home Link';
$string['home_button_desc'] = 'Choose from the list of available options for the Home link (the first item in the custom menu)';
$string['home_button_shortname'] = 'Short site name';
$string['home_button_icon'] = 'Icon';
$string['home_button_hide'] = 'Hide/remove the home link in the custom menu';
$string['navbar_search_form'] = 'Search box on Navigation Bar';
$string['navbar_search_form_desc'] = 'Here you can choose whether the search box at the navigation bar should be always visible, hidden for non-logged in guest users or always hidden.';
$string['navbar_search_form_0'] = 'always visible';
$string['navbar_search_form_1'] = 'hide for non-logged in and guest users';
$string['navbar_search_form_2'] = 'always hidden';
$string['nav_breadcrumb'] = 'Breadcrumb Navigation';
$string['nav_breadcrumb_desc'] = 'Breadcrumbs are a type of navigational aid that shows users where they are on your website. With Lambda, the breadcrumb navigation is displayed directly under the main navigation bar. Here you can select if this navigation element should be always visible, hidden for non-logged in guest users or always hidden.';

/* Settings - Footer */
$string['settings_footer'] = 'Footer Settings';
$string['footer_blocks_pos'] = 'Footer Blocks';
$string['footer_blocks_pos_desc'] = 'Number of Footer Block Positions';
$string['footercolor'] = 'Footer Background Color';
$string['footercolordesc'] = 'Set what color the background of the footer box should be';
$string['footerheadingcolor'] = 'Footer Heading Color';
$string['footerheadingcolordesc'] = 'Set the color for block headings in the footer';
$string['footertextcolor'] = 'Footer Text Color';
$string['footertextcolordesc'] = 'Set the color you want your text to be in the footer';
$string['footerlinkcolor'] = 'Footer Link Color';
$string['footerlinkcolordesc'] = 'Select the color of the links in the footer';
$string['footerlinkcolor_0'] = 'Default link color';
$string['footerlinkcolor_1'] = 'Main color';
$string['footerlinkcolor_2'] = 'Footer text color (underlined)';
$string['copyrightcolor'] = 'Footer Copyright Color';
$string['copyrightcolordesc'] = 'Set what color the background of the copyright box in the footer should be';
$string['copyright_textcolor'] = 'Copyright Text Color';
$string['copyright_textcolordesc'] = 'Set the color you want your text to be in the copyright box';
$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site, e.g. Copyright and the name of your organisation.';

/* Settings - Site Home */
$string['settings_frontpage'] = 'Site Home Settings';
$string['frontpage_options'] = 'General Site Home Settings';
$string['frontpage_options_info'] = '<div style="font-size: 1rem; font-weight: 300;"><span style="font-size:1.25em;">Moodle Core Site Home Options</span><br>At the general Moodle <em>Site home settings</em> administration page, you can access the Moodle core options to configure the front page. You can display any combination of the following: news items, a list of courses, a list of enrolled courses, a list of course categories, a list of categories and courses, a course search box or none. The order is determined by a combination box.<br><a href="/admin/settings.php?section=frontpagesettings"><i class="fa fas fa-angle-double-right" aria-hidden="true"></i> Open the Moodle Moodle <em>Site home settings</em> administration page</a>.<br><br></div>';
$string['site_home_items_headings'] = 'Site Home Section Headings';
$string['site_home_items_headings_desc'] = 'Choose a style for the headings of the Moodle core site home items.';
$string['site_home_items_headings_01'] = 'default (left aligned)';
$string['site_home_items_headings_02'] = 'left aligned with divider';
$string['site_home_items_headings_03'] = 'centered';
$string['site_home_items_headings_04'] = 'centered with divider';
$string['fp_clean_layout'] = 'Clean Main Region Layout';
$string['fp_clean_layout_desc'] = 'The main region content is displayed within a content container. Check the box if you prefer a full and clean layout for the main content the main content area on the Moodle homepage.';
$string['fp_no_page_header'] = 'Hide page header for front page resources';
$string['fp_no_page_header_desc'] = 'Useful for page items if you would like to use your own custom headings.';
$string['hero_section_options'] = 'Site Home Page Hero Section - General Options';
$string['slideshow_number_slides'] = 'Number of Slides';
$string['slideshow_number_slides_desc'] = 'Select the number of slides for the slideshow.<div class="alert alert-info"><strong>Please note: </strong>If you only select a single slide, a static image will be displayed and the following settings for <em>Autoplay</em>, <em>Transition Effect</em> and <em>Slideshow Navigation Style</em> will have no further effect. However, you can assign a caption to the image.</div><br />';
$string['slideshow_autoplay'] = 'Autoplay';
$string['slideshow_autoplay_desc'] = 'Mark the checkbox to activate autoplay.';
$string['slideshow_autoplay_delay'] = 'Autoplay Interval';
$string['slideshow_autoplay_delay_desc'] = 'You can set the interval in milliseconds between switching slides. <strong>Only useful</strong> if <em>autoplay</em> is enabled.';
$string['slideshow_transition'] = 'Transition Effect';
$string['slideshow_transition_desc'] = 'Select a transition effect for the slides.';
$string['slide'] = 'slide';
$string['fade'] = 'fade';
$string['scale'] = 'scale';
$string['pull'] = 'pull';
$string['slideshow_kenburns'] = 'Ken Burns effect';
$string['slideshow_kenburns_desc'] = 'Mark the checkbox to add a Ken Burns effect to the slide images. The Ken Burns Effect is an automatic animation that moves and scales photos over time.';
$string['slideshow_navigation_style'] = 'Slideshow Navigation Style';
$string['slideshow_navigation_style_desc'] = 'Here you can choose between different general designs for the slideshow navigation:<div class="row"><div class="col-md-4"><p><span id="settings-navigation-style-01" class="lambda-settings-img"></span></p><p>Animated arrows (default)</p></div><div class="col-md-4"><p><span id="settings-navigation-style-02" class="lambda-settings-img"></span></p><p>Chevron icons (light background, centered)</p></div><div class="col-md-4"><p><span id="settings-navigation-style-03" class="lambda-settings-img"></span></p><p>Chevron icons (dark background, centered)</p></div></div><div class="row"><div class="col-md-4"><p><span id="settings-navigation-style-04" class="lambda-settings-img"></span></p><p>Chevron icons (light background, bottom)</p></div><div class="col-md-4"><p><span id="settings-navigation-style-05" class="lambda-settings-img"></span></p><p>Chevron icons (dark background, bottom)</p></div><div class="col-md-4"><p><span id="settings-navigation-style-06" class="lambda-settings-img"></span></p><p>Bullet pagination</p></div></div>';
$string['animated_arrows'] = 'Animated arrows (default)';
$string['chevron_light_center'] = 'Chevron icons (light background, centered)';
$string['chevron_dark_center'] = 'Chevron icons (dark background, centered)';
$string['chevron_light_bottom'] = 'Chevron icons (light background, bottom)';
$string['chevron_dark_bottom'] = 'Chevron icons (dark background, bottom)';
$string['bullets'] = 'Bullet pagination';
$string['slideshow_nav_hover'] = 'Navigation Hover';
$string['slideshow_nav_hover_desc'] = 'If true the navigation buttons (prev, next) will be visible on hover state only, if false they will be always visible.';
$string['slideshow_slides'] = 'Site Home Hero Section - Manage Slides';
$string['slideshow_current_slide'] = 'Slide ';
$string['slideshow_image'] = 'Image';
$string['slideshow_image_desc'] = 'Upload the image or video file to appear in the slide. Videos (MP4) are muted and play automatically.';
$string['slideshow_heading'] = 'Slide Heading';
$string['slideshow_heading_desc'] = 'Enter a descriptive heading for your slide';
$string['slideshow_caption'] = 'Slide Caption';
$string['slideshow_caption_desc'] = 'Enter the caption text to use for the slide';
$string['slideshow_url'] = 'Slide URL';
$string['slideshow_url_desc'] = 'If you enter an URL, a "Read more" link will be displayed in your slide.';
$string['slideshow_readmore'] = 'Slide URL Text';
$string['slideshow_readmore_desc'] = 'Here you can enter a custom text for the "Read more" link.';
$string['slideshow_caption_pos'] = 'Slide Caption Position &amp; Effect';
$string['slideshow_caption_pos_desc'] = 'Choose a position and an animation effect for the heading and caption of the slide.';
$string['centered'] = 'centered - element fades in';
$string['left'] = 'left - element slides in from the left';
$string['right'] = 'right - element slides in from the right';
$string['slideshow_bg'] = 'Slide Background Color.';
$string['slideshow_bg_desc'] = 'Select a background color for the slide/caption.';
$string['slideshow_bg_opt2'] = 'Light, Headings with Main Background Color';
$string['slideshow_bg_opt3'] = 'Dark, Headings with Main Background Color';
$string['slideshow_bg_slide'] = 'Full Slide Background';
$string['slideshow_bg_slide_desc'] = 'Mark the checkbox if you would like to use the defined background color for the complete slide image. Otherwise the background will be used for the caption only.';
$string['slideshow_advanced_settings'] = 'Site Home Hero Section - Advanced Settings';
$string['slideshow_ratio'] = 'Image Ratio Override';
$string['slideshow_ratio_desc'] = 'The slideshow always takes up the full width of its parent container. The height adapts according to the defined ratio.<br>The ratio is by default automatically detected from the uploaded image files.<br>In case that you want to override the default value, you can enter a new ratio here, like <em>16:9</em> or <em>4:3</em>.';

/* Settings - Socials */
$string['settings_socials'] = 'Social Media Links';
$string['position_and_colors'] = 'Position and Background Color';
$string['socials_position'] = 'Icons Position';
$string['socials_position_desc'] = 'Choose where to place the social media icons: at the bottom of the page (footer) or at the top (header).';
$string['socials_position_0'] = 'Footer (bottom)';
$string['socials_position_1'] = 'Footer (top)';
$string['socials_position_2'] = 'Header';
$string['socials_lambda_bg'] = 'Social Icons Background';
$string['socials_lambda_bg_desc'] = 'Here you can select how you would like to separate the background color for the social icons at the <em>header</em> or the <em>footer top</em> position. For the <em>footer bottom</em> position, the background color is defined at the <em>Footer Settings</em> tab. There you can use the Moodle color picker to set up a background color for the <em>Footer Copyright Color</em> where the social icons are displayed.';
$string['socials_lambda_bg_0'] = 'fully transparent';
$string['socials_lambda_bg_1'] = 'slightly dimmed';
$string['socials_lambda_bg_2'] = 'use main theme color';
$string['socials_lambda_bg_3'] = 'use secondary theme color';
$string['socials_lambda_bg_4'] = 'use footer copyright background';
$string['socials_icons_color'] = 'Additional Icons Color';
$string['socials_icons_color_desc'] = 'Set the color for your icons.';
$string['socials_text_color'] = 'Additional Icons Text Color';
$string['socials_text_color_desc'] = 'Set the color the texts and links.';
$string['socialicons'] = 'Social Icons';
$string['socials_icontypes'] = 'Social Icon Type';
$string['socials_icontypes_desc'] = 'Select a social media icon.';
$string['socials_url'] = 'Social Icon URL';
$string['socials_url_desc'] = 'Enter the URL for your social media link (i.e. https://www.facebook.com/mycollege)';
$string['socials_monochrome'] = 'Monochrome Icons';
$string['socials_monochrome_desc'] = 'By default, the icons defined in the following section are given a colored background according to the brand. Here you can choose to show all icons with a monochrome color. In this case, the color from the section "Social Icon Links" will be used.';
$string['iconlinks'] = 'Additional Icon Links';
$string['socials_link_icon'] = 'Additional Link Icon';
$string['socials_link_icon_desc'] = 'Define an optional icon for the additional link. To select an icon, please visit the <a class="lambda-fa-link m-40 m-41" href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome website</a><a class="lambda-fa-link m-42 m-43 m-44" href="https://fontawesome.com/search?o=r&m=free" target="_blank">Font Awesome website</a>.';
$string['socials_link_text'] = 'Additional Link Text';
$string['socials_link_text_desc'] = 'Enter the link text for your hyperlink';
$string['socials_link_url'] = 'Social Icon URL';
$string['socials_link_url_desc'] = 'Specify the destination address (i.e. https://moodle.org/) of the link.';
$string['sharebuttons'] = 'Share Buttons';
$string['sharebuttons_enrol'] = 'Show on Enrolment Page';
$string['sharebuttons_enrol_desc'] = 'Display social share buttons on the enrolment page of a course.<br><strong>Please note: </strong>This setting only applies if you have chosen one of Lambda\'s custom enrolment pages.';
$string['sharebuttons_sitenews'] = 'Show on Site News';
$string['sharebuttons_sitenews_desc'] = 'Display social share buttons at the site news.<br><strong>Please note: </strong>This setting only applies if the home page is set to display news items.';
$string['sharebuttons_facebook'] = 'Facebook Share Button';
$string['sharebuttons_facebook_desc'] = 'Show a Facebook share button.';
$string['sharebuttons_twitterx'] = 'X Share Button';
$string['sharebuttons_twitterx_desc'] = 'Show an X share button.';
$string['sharebuttons_threads'] = 'Threads Share Button';
$string['sharebuttons_threads_desc'] = 'Show a Threads share button.';
$string['sharebuttons_whatsapp'] = 'Whatsapp Share Button';
$string['sharebuttons_whatsapp_desc'] = 'Show a Whatsapp share button.';
$string['sharebuttons_linkedin'] = 'LinkedIn Share Button';
$string['sharebuttons_linkedin_desc'] = 'Show a LinkedIn share button.';
$string['sharebuttons_pinterest'] = 'Pinterest Share Button';
$string['sharebuttons_pinterest_desc'] = 'Show a Pinterest share button.';
$string['share_on'] = 'Share on';

/* Settings - Fonts */
$string['settings_fonts'] = 'Fonts';
$string['fontselect_heading'] = 'Font Selector - Headings';
$string['fontselectdesc'] = 'Choose from the list of availble fonts.<div class="alert alert-info"><strong>Please note: </strong>The default font "Open Sans" is included in the theme files and is therefore self-hosted on the server. All other fonts are loaded online from fonts.googleapis.com.</div><br />';
$string['fontselect_body'] = 'Font Selector - Body';
$string['font_body_size'] = 'Body Text Size';
$string['font_body_size_desc'] = 'Adjust the global font size for the body text.';
$string['fonts_source'] = 'Font type selector';
$string['fonts_source_desc'] = 'Choose if you want to use a Google web font or if you would like to upload your own custom font file.<div class="alert alert-info"><strong>Please note:</strong> You have to <em>Save Changes</em> first to show the new options for your choice.</div><br />';
$string['fonts_source_google'] = 'Google Fonts';
$string['fonts_source_file'] = 'Custom font file';
$string['fonts_file_body'] = 'Body font file';
$string['fonts_file_body_desc'] = 'Upload your body font file here. For best compatibility, you should use a True Type or Web Open Font Format.';
$string['fonts_file_headings'] = 'Heading font file';
$string['fonts_file_headings_desc'] = 'Upload your heading font file here. For best compatibility, you should use a True Type or Web Open Font Format.';
$string['font_headings_weight'] = 'Heading font weight';
$string['font_headings_weight_desc'] = 'You can select a suitable weight for your heading font. Defines from thick to thin characters: 700 is the same as bold, 400 is the same as normal and 300 is for fonts with lighter characters.';
$string['heading_color'] = 'Font Heading Color';
$string['heading_color_desc'] = 'The text color for the headings.';
$string['body_color'] = 'Font Body Color';
$string['body_color_desc'] = 'The default text color.';
$string['link_color'] = 'Link Color';
$string['link_color_desc'] = 'The color of the links.';
$string['use_linearicons'] = 'Use Linearicons';
$string['use_linearicons_desc'] = 'Load the free version of the Linearicons icon font. This icon font includes 170 line icons.';

/* Settings - Advanced */
$string['settings_advanced'] = 'Advanced';
$string['preset'] = 'Theme preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';
$string['customscss'] = 'Custom SCSS';
$string['customscssdesc'] = 'Whatever SCSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';

/* Theme */
$string['visibleadminonly'] ='Blocks moved into the area below will only be seen by admins';
$string['region-side-pre'] = 'Side Block Position';
$string['region-main-top'] = 'Top Block Position';
$string['region-main-bottom'] = 'Bottom Block Position';
$string['region-footer-left'] = 'Footer (Left)';
$string['region-footer-middle'] = 'Footer (Middle)';
$string['region-footer-middle-2'] = 'Footer (Middle 2)';
$string['region-footer-right'] = 'Footer (Right)';
$string['region-hidden-dock'] = 'Hidden from Users';
$string['region-nav-drawer'] = 'Navigation Drawer Block Region';
$string['region-admin-only'] = 'Admin Block Position';
$string['region-admin-only-heading'] = 'Blocks moved into the area below will only be seen by admins';
$string['nextsection'] = '';
$string['previoussection'] = '';
$string['backtotop'] = '';

$string['privacy:metadata:preference:sidebarstat'] = 'The user\'s preference for hiding or showing the drawer menu navigation.';
$string['privacy_sidebar_closed'] = 'The current preference for the collapsible sidebar is closed.';
$string['privacy_sidebar_open'] = 'The current preference for the collapsible sidebar is open.';