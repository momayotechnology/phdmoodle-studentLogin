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

$extraclasses = [];
$extraclasses[] = 'lambda-login';
$extraclasses[] = theme_lambda2_get_moodle_version();
if (theme_lambda2_get_setting('use_linearicons')) {$extraclasses[] = 'iconset-lnr';}

if (theme_lambda2_get_setting('login_hide_userpw_form')) {$extraclasses[] = 'hide-unpw';}

$blockstyle = theme_lambda2_get_setting('login_form_pos');
if ($blockstyle == 0) {$extraclasses[] = 'form-centered';}
if ($blockstyle == 1) {$extraclasses[] = 'form-left';}
if ($blockstyle == 2) {$extraclasses[] = 'form-right';}

$has_bg_vid = false;
$has_bg_slider = false;
$login_bg_type = theme_lambda2_get_setting('login_bg_type');
if ($login_bg_type == 0) {$extraclasses[] = 'bg-img';}
if ($login_bg_type == 1) {$extraclasses[] = 'bg-slider'; $has_bg_slider = true;}
if ($login_bg_type == 2) {$extraclasses[] = 'bg-vid'; $has_bg_vid = true;}
if ($login_bg_type == 3) {$extraclasses[] = 'bg-color';}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'has_bg_vid' => $has_bg_vid,
    'has_bg_slider' => $has_bg_slider
];

$PAGE->requires->jquery();

echo $OUTPUT->render_from_template('theme_lambda2/login', $templatecontext);