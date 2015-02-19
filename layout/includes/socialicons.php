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
 * This is built using the Clean template to allow for new theme's using
 * UIKit framework
 *
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//Social networks:
$hasfacebook    = (empty($PAGE->theme->settings->facebook)) ? false : $PAGE->theme->settings->facebook;
$hastwitter     = (empty($PAGE->theme->settings->twitter)) ? false : $PAGE->theme->settings->twitter;
$hasgoogleplus  = (empty($PAGE->theme->settings->googleplus)) ? false : $PAGE->theme->settings->googleplus;
$haslinkedin    = (empty($PAGE->theme->settings->linkedin)) ? false : $PAGE->theme->settings->linkedin;
$hasyoutube     = (empty($PAGE->theme->settings->youtube)) ? false : $PAGE->theme->settings->youtube;
$hasflickr      = (empty($PAGE->theme->settings->flickr)) ? false : $PAGE->theme->settings->flickr;
$hasvk          = (empty($PAGE->theme->settings->vk)) ? false : $PAGE->theme->settings->vk;
$haspinterest   = (empty($PAGE->theme->settings->pinterest)) ? false : $PAGE->theme->settings->pinterest;
$hasinstagram   = (empty($PAGE->theme->settings->instagram)) ? false : $PAGE->theme->settings->instagram;
$hasskype       = (empty($PAGE->theme->settings->skype)) ? false : $PAGE->theme->settings->skype;
$hasios         = (empty($PAGE->theme->settings->ios)) ? false : $PAGE->theme->settings->ios;
$hasandroid     = (empty($PAGE->theme->settings->android)) ? false : $PAGE->theme->settings->android;
$haswebsite     = (empty($PAGE->theme->settings->website)) ? false : $PAGE->theme->settings->website;

$hassocialnetworks = ($hasfacebook || $hastwitter || $hasgoogleplus || $hasflickr || $hasinstagram || $hasvk || $haslinkedin || $haspinterest || $hasskype || $haslinkedin || $haswebsite || $hasyoutube);
$hasmobileapps = ($hasios || $hasandroid);


if ($hasmobileapps || $hassocialnetworks) {
?>
<div id="socialicons" class="uk-float-right">
    <?php if ($hasmobileapps) { ?>
        <div id="mobileicons" class="uk-display-inline-block">
            <p class="socialheading"><?php echo get_string('mobileappsheading','theme_uikit')?></p>
            <ul class="socials unstyled">
                <?php if ($hasios) { ?>
                    <li><a href="<?php echo $hasios; ?>" target="_blank" class="socialicon ios uk-icon-button uk-icon-apple"></a></li>
                <?php } ?>
                <?php if ($hasandroid) { ?>
                    <li><a href="<?php echo $hasandroid; ?>" target="_blank" class="socialicon android uk-icon-button uk-icon-android"></a></li>
                <?php } ?>
            </ul>
        </div>
    <?php }
            if ($hassocialnetworks) {
            ?>
        <div id="socialnetworks"  class="uk-display-inline-block <?php echo $hassocialnetworks ? 'uk-margin-left' : ''; ?>">
            <p class="socialheading"><?php echo get_string('socialnetworks','theme_uikit')?></p>
            <ul class="socials unstyled">
                <?php if ($hasgoogleplus) { ?>
                    <li><a href="<?php echo $hasgoogleplus; ?>" target="_blank" class="socialicon googleplus uk-icon-button uk-icon-google-plus"></a></li>
                <?php } ?>
                <?php if ($hastwitter) { ?>
                    <li><a href="<?php echo $hastwitter; ?>" target="_blank" class="socialicon twitter uk-icon-button uk-icon-twitter"></a></li>
                <?php } ?>
                <?php if ($hasfacebook) { ?>
                    <li><a href="<?php echo $hasfacebook; ?>" target="_blank" class="socialicon facebook uk-icon-button uk-icon-facebook"></a></li>
                <?php } ?>
                <?php if ($haslinkedin) { ?>
                    <li><a href="<?php echo $haslinkedin; ?>" target="_blank" class="socialicon linkedin uk-icon-button uk-icon-linkedin"></a></li>
                <?php } ?>
                <?php if ($hasyoutube) { ?>
                    <li><a href="<?php echo $hasyoutube; ?>" target="_blank" class="socialicon youtube uk-icon-button uk-icon-youtube"></a></li>
                <?php } ?>
                <?php if ($hasflickr) { ?>
                    <li><a href="<?php echo $hasflickr; ?>" target="_blank" class="socialicon flickr uk-icon-button uk-icon-flickr"></a></li>
                <?php } ?>
                <?php if ($haspinterest) { ?>
                    <li><a href="<?php echo $haspinterest; ?>" target="_blank" class="socialicon pinterest uk-icon-button uk-icon-pinterest"></a></li>
                <?php } ?>
                <?php if ($hasinstagram) { ?>
                    <li><a href="<?php echo $hasinstagram; ?>" target="_blank" class="socialicon instagram uk-icon-button uk-icon-instagram"></a></li>
                <?php } ?>
                <?php if ($hasvk) { ?>
                    <li><a href="<?php echo $hasvk; ?>" target="_blank" class="socialicon vk uk-icon-button uk-icon-vk"></a></li>
                <?php } ?>
                <?php if ($hasskype) { ?>
                    <li><a href="<?php echo $hasskype; ?>" target="_blank" class="socialicon skype uk-icon-button uk-icon-skype"></a></li>
                <?php } ?>
                <?php if ($haswebsite) { ?>
                    <li><a href="<?php echo $haswebsite; ?>" target="_blank" class="socialicon website uk-icon-button uk-icon-globe"></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
</div>
<?php 
}
