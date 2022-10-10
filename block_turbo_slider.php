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
 * Form for editing HTML block instances.
 *
 * @package   block_turbo_slider
 * @copyright 2022 Dimitris Maniatis
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_turbo_slider extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_turbo_slider');
    }

    public function get_content() {
        global $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        // function has_config() {
        //     return true;
        // }

        // $userdetails = '';
        // $users       = $DB->get_records('user');
        // foreach ($users as $user) {
        //     $userdetails = $user->timemodified;
        // }
        $content = '';
        // $image   = get_config('block_turbo_slider', 'slider');

        // if ($image) {
        $this->content = new stdClass;
        // $this->content       = $userdetails;
        $this->content->text = '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';
        $this->content->text .= '<ol class="carousel-indicators">';
        $this->content->text .= '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
        $this->content->text .= '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';
        $this->content->text .= '<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>';
        $this->content->text .= '</ol>';
        $this->content->text .= '<div class="carousel-inner">';
        $this->content->text .= '<div class="carousel-item active">';
        $this->content->text .= '<img class="d-block w-100" src="../theme/boost/pix/screenshot.png" alt="First slide">';
        $this->content->text .= '</div>';
        $this->content->text .= '<div class="carousel-item">';
        $this->content->text .= '<img class="d-block w-100" src="../theme/boost/pix/screenshot.png" alt="Second slide">';
        $this->content->text .= '</div>';
        $this->content->text .= '<div class="carousel-item">';
        $this->content->text .= '<img class="d-block w-100" src="../theme/boost/pix/screenshot.png" alt="Third slide">';
        $this->content->text .= '</div></div>';
        $this->content->text .= '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">';
        $this->content->text .= '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        $this->content->text .= '<span class="sr-only">Previous</span></a>';
        $this->content->text .= '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">';
        $this->content->text .= '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        $this->content->text .= '<span class="sr-only">Next</span></a>';
        $this->content->text .= '</div>';

        // $templatecontext['slider'] = $this->content;

        // $defaultimage = new \moodle_url('/theme/turbo/pix/default_slide.jpg');
        // for ($i = 1, $j = 0; $i <= $templatecontext['sliderimage']; $i++, $j++) {$sliderimage = "sliderimage{$i}";
        //     $image                                  = $this->$sliderimage;

        //     $templatecontext['slides'][$j]['image'] = $image ?: $defaultimage->out();
        // }

        return $this->content;
        // }
    }
}