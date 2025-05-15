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
 * @package   block_lambdacb
 * @copyright 2024 redPIthemes
 *
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/lib.php');

$THEME->name = 'lambda2';
$THEME->parents = ['boost'];
$THEME->editor_sheets = [];
$THEME->scss = function($theme) {
    return theme_lambda2_get_main_scss_content($theme);
};

if ($THEME->settings->footer_blocks_pos == 4) {$block_pos = array('side-pre', 'footer-left', 'footer-middle', 'footer-middle-2', 'footer-right');}
else if ($THEME->settings->footer_blocks_pos == 3) {$block_pos = array('side-pre', 'footer-left', 'footer-middle', 'footer-right');}
else if ($THEME->settings->footer_blocks_pos == 2) {$block_pos = array('side-pre', 'footer-left', 'footer-right');}
else if ($THEME->settings->footer_blocks_pos == 1) {$block_pos = array('side-pre', 'footer-middle');}
else {$block_pos = array('side-pre');}

$add_block_pos = $block_pos;
array_push($add_block_pos, 'main-top', 'main-bottom');
$fp_block_pos = $add_block_pos;
array_push($fp_block_pos, 'admin-only');

$THEME->layouts = [
    'base' => array(
        'file' => 'default.php',
        'regions' => array(),
    ),
    'standard' => array(
        'file' => 'default.php',
        'regions' => $block_pos,
        'defaultregion' => 'side-pre',
    ),
    'course' => array(
        'file' => 'course.php',
        'regions' => $add_block_pos,
        'defaultregion' => 'side-pre',
    ),
    'incourse' => array(
        'file' => 'incourse.php',
        'regions' => $add_block_pos,
        'defaultregion' => 'side-pre',
    ),
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => $fp_block_pos,
        'defaultregion' => 'side-pre',
    ),
    'admin' => array(
        'file' => 'default.php',
        'regions' => $block_pos,
        'defaultregion' => 'side-pre',
    ),
    'coursecategory' => array(
        'file' => 'coursecategory.php',
        'regions' => $block_pos,
        'defaultregion' => 'side-pre',
    ),
    'mydashboard' => array(
        'file' => 'dashboard.php',
        'regions' => $block_pos,
        'defaultregion' => 'side-pre',
    ),
    'mycourses' => array(
        'file' => 'dashboard.php',
        'regions' => $block_pos,
        'defaultregion' => 'side-pre',
    ),
    'mypublic' => array(
        'file' => 'default.php',
        'regions' => $block_pos,
        'defaultregion' => 'side-pre',
    ),
    'login' => array(
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu' => true),
    ),
    'report' => array(
        'file' => 'default.php',
        'regions' => $block_pos,
        'defaultregion' => 'side-pre',
    ),
    'popup' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => true),
    ),
    'frametop' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nocoursefooter' => true),
    ),
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'maintenance' => array(
        'file' => 'maintenance.php',
        'regions' => array(),
    ),
    'print' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => false),
    ),
    'redirect' => array(
        'file' => 'embedded.php',
        'regions' => array(),
    ),
    'secure' => array(
        'file' => 'secure.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre'
    )
];
$THEME->iconsystem = \core\output\icon_system::FONTAWESOME;
$THEME->javascripts = array('theme-uikit');
$THEME->javascripts_footer = array('scripts');
$THEME->enable_dock = false;
$THEME->prescsscallback = 'theme_lambda2_get_pre_scss';
$THEME->extrascsscallback = 'theme_lambda2_get_extra_scss';
$THEME->yuicssmodules = array();
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->requiredblocks = '';
$THEME->haseditswitch = true;
$THEME->usescourseindex = true;