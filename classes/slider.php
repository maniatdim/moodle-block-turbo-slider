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
 * Theme helper to load a theme configuration.
 *
 * @package    theme_moove
 * @copyright  2022 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_turbo_slider\classes;

/**
 * Helper to load a theme configuration.
 *
 * @package    theme_turbo_slider
 * @copyright  2022 Dimitris Maniatis
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class settings {
/**
 * @return array
 */
    public function frontpage_slideshow() {
        $templatecontext['slidercount'] = $this->slidercount;

        $defaultimage = new \moodle_url('/theme/moove/pix/default_slide.jpg');
        for ($i = 1, $j = 0; $i <= $templatecontext['slidercount']; $i++, $j++) {$sliderimage = "sliderimage{$i}";
            $slidertitle                            = "slidertitle{$i}";
            $slidercap                              = "slidercap{$i}";
            $image                                  = $this->$sliderimage;

            $templatecontext['slides'][$j]['key']     = $j;
            $templatecontext['slides'][$j]['active']  = $i === 1;
            $templatecontext['slides'][$j]['image']   = $image ?: $defaultimage->out();
            $templatecontext['slides'][$j]['title']   = format_string($this->$slidertitle);
            $templatecontext['slides'][$j]['caption'] = format_text($this->$slidercap);
        }

        return $templatecontext;
    }
}