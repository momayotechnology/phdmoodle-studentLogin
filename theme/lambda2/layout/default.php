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

require_once($CFG->libdir . '/behat/lib.php');

$addblockbutton = $OUTPUT->addblockbutton();
$addblockbutton_footerleft = $OUTPUT->addblockbutton('footer-left');
$addblockbutton_footerright = $OUTPUT->addblockbutton('footer-right');
$addblockbutton_footermiddle = $OUTPUT->addblockbutton('footer-middle');
$addblockbutton_footermiddle2 = $OUTPUT->addblockbutton('footer-middle-2');

if ((theme_lambda2_get_moodle_version() == 'm-40') || (theme_lambda2_get_moodle_version() == 'm-41') || (theme_lambda2_get_moodle_version() == 'm-42')) {
    user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
    user_preference_allow_ajax_update('drawer-open-block', PARAM_BOOL);
}

if (isloggedin()) {
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
} else {
    $blockdraweropen = false;
}

if (defined('BEHAT_SITE_RUNNING')) {
    $blockdraweropen = true;
}

$preblockshtml = $OUTPUT->blocks('side-pre');
$haspreblocks = (strpos($preblockshtml, 'data-block=') !== false || !empty($addblockbutton));
if (!$haspreblocks) {
    $blockdraweropen = false;
}

$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions()  && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$extraclasses = [];
$extraclasses[] = 'lambda';
$extraclasses[] = theme_lambda2_get_moodle_version();
if (theme_lambda2_get_setting('use_linearicons')) {$extraclasses[] = 'iconset-lnr';}

$pagewidth = theme_lambda2_get_setting('page_layout');
if ($pagewidth == 0) {$extraclasses[] = 'layout-full';}
if ($pagewidth == 1) {$extraclasses[] = 'layout-boxed';}

$blockstyle = theme_lambda2_get_setting('block_style');
$extraclasses[] = 'blockstyle-'.$blockstyle;

$pageheaderstyle = theme_lambda2_get_setting('page_header');
$extraclasses[] = 'page-header-style-'.$pageheaderstyle;

$drawerstyle = theme_lambda2_get_setting('drawers_style');
if ($drawerstyle == 1) {$extraclasses[] = 'drawers_dark';}

$blockspre = $OUTPUT->blocks('side-pre');
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);

$header_style_0 = true;
$header_style_1 = false;
$header_style_2 = false;
$headerstyle = theme_lambda2_get_setting('header_style');
if ($headerstyle == 0) {$extraclasses[] = 'header-style-0';}
if ($headerstyle == 1) {$header_style_0 = false; $header_style_1 = true; $extraclasses[] = 'header-style-1';}
if ($headerstyle == 2) {$header_style_0 = false; $header_style_2 = true; $extraclasses[] = 'header-style-2';}
                
$headeruserpic = '';
$imgheight = '80';
$logoheight = theme_lambda2_get_setting('logo_height');
if (($logoheight == '60px') || ($logoheight == '75px')) {
    $imgheight = $logoheight;
    $imgheight = substr($imgheight, 0, -2);
}
if (isloggedin()) {$headeruserpic = $OUTPUT->user_picture($USER, array('size' => $imgheight, 'class' => 'welcome_userpicture'));}

$shownavbarsearch = true;
if (theme_lambda2_get_setting('navbar_search_form') == 2) {
    $shownavbarsearch = false;
}
if ((!isloggedin() or isguestuser()) && (theme_lambda2_get_setting('navbar_search_form') == 1)) {
    $shownavbarsearch = false;
}

if (theme_lambda2_get_setting('nav_breadcrumb') == 2) {
    $extraclasses[] = 'no-breadcrumb';
}
if ((!isloggedin() or isguestuser()) && (theme_lambda2_get_setting('nav_breadcrumb') == 1)) {
    $extraclasses[] = 'no-breadcrumb';
}

$has4footerblockcolumns = false;
$has3footerblockcolumns = false;
$has2footerblockcolumns = false;
$has1footerblockcolumns = false;
$hasfooterblockregion = false;
$blocksfooterleft = '';
$blocksfootermiddle = '';
$blocksfootermiddle2 = '';
$blocksfooterright = '';

$footer_blocks_pos = theme_lambda2_get_setting('footer_blocks_pos');
if ($footer_blocks_pos != 0) {$hasfooterblockregion = true;}
if ($footer_blocks_pos == 1) {
    $blocksfootermiddle = $OUTPUT->blocks('footer-middle');
    $has1footerblockcolumns = true;
}
if ($footer_blocks_pos == 2) {
    $blocksfooterleft = $OUTPUT->blocks('footer-left');
    $blocksfooterright = $OUTPUT->blocks('footer-right');
    $has2footerblockcolumns = true;
}
if ($footer_blocks_pos == 3) {
    $blocksfooterleft = $OUTPUT->blocks('footer-left');
    $blocksfootermiddle = $OUTPUT->blocks('footer-middle');
    $blocksfooterright = $OUTPUT->blocks('footer-right');
    $has3footerblockcolumns = true;
}
if ($footer_blocks_pos == 4) {
    $blocksfooterleft = $OUTPUT->blocks('footer-left');
    $blocksfootermiddle = $OUTPUT->blocks('footer-middle');
    $blocksfootermiddle2 = $OUTPUT->blocks('footer-middle-2');
    $blocksfooterright = $OUTPUT->blocks('footer-right');
    $has4footerblockcolumns = true;
}

$hasfootnote = false;
$footnote = '';
if (theme_lambda2_get_setting('footnote', true) == true) { 
    $footnote = theme_lambda2_get_setting('footnote');
    $hasfootnote = true;
}

$socialsheader = false;
$socialsfooter = false;
$socialsfootertop = false;
$hassocials = false;
if (theme_lambda2_get_setting('socials_position') == 0) {
    $socialsfooter = true;
}
if (theme_lambda2_get_setting('socials_position') == 1) {
    $socialsfootertop = true;
}
if (theme_lambda2_get_setting('socials_position') == 2) {
    $socialsheader = true;
}
for ($i = 1; $i <= 5; $i++) {
    if (!empty(theme_lambda2_get_setting('socials_icontypes_'.$i))) {$hassocials = true; break;} 
}
if (!$hassocials) {
    for ($i = 1; $i <= 3; $i++) {
        if (!empty(theme_lambda2_get_setting('socials_link_icon_'.$i))) {$hassocials = true; break;} 
    }
}

$logged_in = true;
if (!isloggedin() or isguestuser()) {$logged_in = false;}
$editing = false;
if ($PAGE->user_is_editing()) {$editing = true;}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockspre,
    'haspreblocks' => $haspreblocks,
    'bodyattributes' => $bodyattributes,
    'blockdraweropen' => $blockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'forceblockdraweropen' => $forceblockdraweropen,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'header_style_0' => $header_style_0,
    'header_style_1' => $header_style_1,
    'header_style_2' => $header_style_2,
    'shownavbarsearch' => $shownavbarsearch,
    'headeruserpic' => $headeruserpic,
    'blocksfooterleft' => $blocksfooterleft,
    'blocksfootermiddle' => $blocksfootermiddle,
    'blocksfootermiddle2' => $blocksfootermiddle2,
    'blocksfooterright' => $blocksfooterright,
    'hasfooterblockregion' => $hasfooterblockregion,
    'has4footerblockcolumns' => $has4footerblockcolumns,
    'has3footerblockcolumns' => $has3footerblockcolumns,
    'has2footerblockcolumns' => $has2footerblockcolumns,
    'has1footerblockcolumns' => $has1footerblockcolumns,	
    'hasfootnote' => $hasfootnote,
    'footnote' => $footnote,
    'socialsheader' => $socialsheader,
    'socialsfooter' => $socialsfooter,
    'socialsfootertop' => $socialsfootertop,
    'hassocials' => $hassocials,
    'logged_in' => $logged_in,
    'editing' => $editing,
    'addblockbutton' => $addblockbutton,
    'addblockbutton_footerleft' => $addblockbutton_footerleft,
    'addblockbutton_footerright' => $addblockbutton_footerright,
    'addblockbutton_footermiddle' => $addblockbutton_footermiddle,
    'addblockbutton_footermiddle2' => $addblockbutton_footermiddle2
];

$PAGE->requires->jquery();

echo $OUTPUT->render_from_template('theme_lambda2/default', $templatecontext);