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

namespace theme_lambda2\output\core;
defined('MOODLE_INTERNAL') || die();

use moodle_url;
use html_writer;
use core_course_category;
use coursecat_helper;
use stdClass;
use core_course_list_element;

class course_renderer extends \core_course_renderer {

	protected function coursecat_coursebox(coursecat_helper $chelper, $course, $additionalclasses = '') {
        global $CFG;
		$catlayout = theme_lambda2_get_setting('category_layout');
		$catlayoutclass = 'list';
        $content = '';
        
		if ($catlayout == '1') {$catlayoutclass = 'grid';}
        if ($catlayout == '2') {$catlayoutclass = 'grid min';}
        if (!isset($this->strings->summary)) {
            $this->strings->summary = get_string('summary');
        }
        if ($chelper->get_show_courses() <= self::COURSECAT_SHOW_COURSES_COUNT) {
            return '';
        }
        $classes = trim('coursebox '.$catlayoutclass.' clearfix '.$additionalclasses);
        $nametag = 'h3';

        // .coursebox
        $content .= html_writer::start_tag('div', array(
            'class' => $classes,
            'data-courseid' => $course->id,
            'data-type' => self::COURSECAT_TYPE_COURSE,
        ));

        $content .= html_writer::start_tag('div', array('class' => 'info'));

        // course name
        $coursename = $chelper->get_course_formatted_name($course);
        $coursenamelink = html_writer::link(new moodle_url('/course/view.php', array('id' => $course->id)),
                                            $coursename, array('class' => $course->visible ? '' : 'dimmed'));
        $content .= html_writer::tag($nametag, $coursenamelink, array('class' => 'coursename'));
        // If we display course in collapsed form but the course has summary or course contacts, display the link to the info page.
        $content .= html_writer::start_tag('div', array('class' => 'moreinfo'));

        $content .= html_writer::end_tag('div'); // .moreinfo

        // print enrolmenticons
        if ($icons = enrol_get_course_info_icons($course)) {
            $content .= html_writer::start_tag('div', array('class' => 'enrolmenticons'));
            foreach ($icons as $pix_icon) {
                $content .= $this->render($pix_icon);
            }
            $content .= html_writer::end_tag('div'); // .enrolmenticons
        }

        $content .= html_writer::end_tag('div'); // .info

        $content .= html_writer::start_tag('div', array('class' => 'content'));
        $content .= $this->coursecat_coursebox_content($chelper, $course);
        $content .= html_writer::end_tag('div'); // .content

        $content .= html_writer::end_tag('div'); // .coursebox
        return $content;
    }
	
	protected function coursecat_coursebox_content(coursecat_helper $chelper, $course) {
        global $CFG;
        $catlayout = theme_lambda2_get_setting('category_layout');
        $check_enrolment_page = theme_lambda2_check_enrolment();
        
        if ($course instanceof stdClass) {
            $course = new core_course_list_element($course);
        }
        $coursecat = core_course_category::get($course->category, IGNORE_MISSING);
        $coursecat = $coursecat->get_formatted_name();

        $coursecatdiv = '<div class="text-muted coursecat"><span class="sr-only">';
        $coursecatdiv .= get_string('coursecategory');
        $coursecatdiv .= '</span><span class="categoryname text-truncate">'.$coursecat.'</span></div>';

        $content = '';
		
		// display course overview files
        $contentimage = '';
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
        $contentimage .= '<a href="'.new moodle_url('/course/view.php', array('id' => $course->id)).'">';
        $contentimage .= '<div class="courseimage" data-src="'.$imgurl.'" uk-img></div>';
        $contentimage .= '</a>';
        $content .= $contentimage;

        // display course summary
            $content .= html_writer::start_tag('div', array('class' => $course->visible ? 'summary' : 'summary dimmed'));
			
			$coursename = $chelper->get_course_formatted_name($course);
        	$coursenamelink = html_writer::link(new moodle_url('/course/view.php', array('id' => $course->id)),
                                            $coursename, array('class' => $course->visible ? '' : 'dimmed'));
            $content .= html_writer::tag('h3', $coursenamelink, array('class' => 'coursename'));
            $content .= $coursecatdiv;

            if ($catlayout == 0 || $check_enrolment_page > 0) {
                $content .= '<div>'.$chelper->get_course_formatted_summary($course,
                    array('overflowdiv' => true, 'noclean' => true, 'para' => false)).'</div>';
            }
            else if ($catlayout == 1) {
                $summary = $course->summary;
                $rep = array("</p>", "<br>", "</div>");
                $summary = str_replace($rep, " ", $summary);
                $summary = format_string($summary);
                if (strlen($summary) > 200) {
                    $summary = substr($summary, 0, 200);
                    $summary .= '...';  
                }
                $content .= '<div><p>'.$summary.'</p></div>';
            }
			
            $content .= html_writer::end_tag('div'); // .summary

        // display course contacts. See course_in_list::get_course_contacts()
        if ($course->has_course_contacts()) {
            if ($catlayout == 0 || $check_enrolment_page > 0) {
                $content .= '<div class="teachers">';
                $current_role = '';
                $i = 0;
                $list_course_contacts = $course->get_course_contacts();
                
                foreach ($list_course_contacts as $userid => $coursecontact) {
                    if ($i == 0) {
                        $current_role = $coursecontact['rolename'];
                        $content .= $current_role.': ';
                        $name = html_writer::link(new moodle_url('/user/view.php', array('id' => $userid, 'course' => SITEID)), $coursecontact['username']);
                        $content .= $name;
                        }
                    if (($i > 0) AND ($coursecontact['rolename'] == $current_role)) {
                        $content .= ', ';
                        $name = html_writer::link(new moodle_url('/user/view.php', array('id' => $userid, 'course' => SITEID)), $coursecontact['username']);
                        $content .= $name;
                    }
                    else if ($i > 0) {
                        $content .= '</div>';
                        $content .= '<div class="teachers">';
                        $current_role = $coursecontact['rolename'];
                        $content .= $current_role.': ';
                        $name = html_writer::link(new moodle_url('/user/view.php', array('id' => $userid, 'course' => SITEID)), $coursecontact['username']);
                        $content .= $name;
                    }
                    $i++;
                }
                $content .= '</div>'; // .teachers
            }
        }

        // Display custom fields.
        if ($course->has_custom_fields()) {
            if (($catlayout == 0 && !theme_lambda2_get_setting('enrolment_coursecustomfields')) || (theme_lambda2_check_enrolment() && theme_lambda2_get_setting('course_enrolment_page') == 1)) {
                $content .= '<div class="custom_fields">';
                $handler = \core_course\customfield\course_handler::create();
                $customfields = $handler->display_custom_fields_data($course->get_custom_fields());
                $content .= \html_writer::tag('div', $customfields, ['class' => 'customfields-container']);
                $content .= '</div>';
            }
        }
		
        if ($catlayout == 0) {
		    $content .= '<div class="course-btn"><p><a class="btn btn-primary" href="'.new moodle_url('/course/view.php', array('id' => $course->id)).'">'.get_string('entercourse').'</a></p></div>';
        }

        return $content;
    }

    protected function theme_lambda2_get_courses() {
        global $CFG, $OUTPUT;
    
        $chelper = new coursecat_helper();
        $chelper->set_show_courses(255)->set_courses_display_options([
            'recursive' => true
        ]);
        $chelper->set_attributes(['class' => 'frontpage-course-list-all']);
        $perpage = $CFG->coursesperpage;
    
        $url = $_SERVER['REQUEST_URI'];
        $catid = 0;
        $page = 1;
        $parts = parse_url($url);
        if (isset($parts['query'])) {
            parse_str($parts['query'], $queryParameters);
            if (isset($queryParameters['categoryid'])) {
                $catid = $queryParameters['categoryid'];
            }
            if (isset($queryParameters['page'])) {
                $page = intval($queryParameters['page']);
            }
        }
    
        $header = '<div class="card-deck mr-0">';
        $content = '';
        $footer = '</div>';
        $pagination = '';

        try {
            $coursecat = core_course_category::get($catid);
            $courses = $coursecat->get_courses($chelper->get_courses_display_options());
        } catch (Exception $e) {
            $courses = [];
        }

        $numcourses = count($courses);
        if($numcourses > $perpage) {
            $pages = ceil($numcourses / $perpage);
            $paginurl = '/course/index.php?categoryid='.$catid.'&amp;browse=courses&amp;perpage='.$perpage.'&amp;page=';
            $pagination .= '<nav aria-label="Page" class="pagination pagination-centered justify-content-center"><ul class="mt-1 pagination " data-page-size="'.$perpage.'">';
            if ($page != 1) {
                $prev = $page - 1;
                $pagination .= '<li class="page-item" data-page-number="'.$prev.'">
                <a href="'.$paginurl.$prev.'" class="page-link" aria-label="Previous page">
                    <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                    <span class="sr-only">Previous page</span>
                </a>
                </li>';
            }
            for ($i = 1; $i <= $pages; $i++) {
                $active = '';
                $paginurl = '/course/index.php?categoryid='.$catid.'&amp;browse=courses&amp;perpage='.$perpage.'&amp;page=';
                if ($page > 1 && $page == $i) {
                    $active = 'active';
                }
                else if ($page == 1 && $i == 1) {
                    $active = 'active';
                }
                if ($active == 'active') {
                    $paginurl = '#';
                }
                $current = '';
                if ($active != 'active') {
                    $current = '<span class="sr-only">(current)</span>';
                }
                $pagination .= '<li class="page-item '.$active.'" data-page-number="'.$i.'">';
                $pagination .= '<a href="'.$paginurl.$i.'" class="page-link">'.$i.$current.'</a></li>';
            }
            if ($page <  $pages) {
                $next = $page + 1;
                $pagination .= '<li class="page-item" data-page-number="'.$next.'">
                <a href="'.$paginurl.$next.'" class="page-link" aria-label="Next page">
                    <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span class="sr-only">Next page</span>
                </a>
                </li>';
            }
            $pagination .= '</ul></nav>';
            $start = ($page - 1) * $perpage;
            $courses = array_slice($courses, $start, $perpage, true);
        }

        foreach ($courses as $course) {
            $content .= $this->coursecat_coursebox($chelper, $course);
        }

        $output = $header . $content . $footer . $pagination;
        return $output; 
    }

    protected function coursecat_category_content(coursecat_helper $chelper, $coursecat, $depth) {
        $currentUrl = $_SERVER['REQUEST_URI'];
        if (strpos($currentUrl, "/course/index.php") !== false) {
            $content = $this->theme_lambda2_get_courses();
            return $content;
        } else {
            return parent::coursecat_category_content($chelper, $coursecat, $depth);
        }
    }
}