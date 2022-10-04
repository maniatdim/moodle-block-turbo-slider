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
 * @package   block_turbo_slider
 * @copyright 2022 Dimitris Maniatis
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    // Slideshow.
    $name        = 'theme_turbo_slider/slider';
    $title       = get_string('slider', 'theme_turbo_slider');
    $description = get_string('sliderdesc', 'theme_turbo_slider');
    $default     = 0;
    $options     = array();
    for ($i = 0; $i < 20; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // If we don't have an slide yet, default to the preset.
    $slider = get_config('theme_turbo_slider', 'slider');

    if (!$slider) {
        $slider = $default;
    }

    if ($slider) {
        for ($sliderindex = 1; $sliderindex <= $slider; $sliderindex++) {
            $fileid      = 'sliderimage' . $sliderindex;
            $name        = 'theme_turbo_slider/sliderimage' . $sliderindex;
            $title       = get_string('sliderimage', 'theme_turbo_slider');
            $description = get_string('sliderimagedesc', 'theme_turbo_slider');
            $opts        = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
            $setting     = new admin_setting_configstoredfile($name, $title, $description, $fileid, 0, $opts);
            $page->add($setting);
        }
    }

    $setting = new admin_setting_heading('sliderseparator', '', '<hr>');
    $page->add($setting);
}