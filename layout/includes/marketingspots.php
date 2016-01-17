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
    $showMarketingSpots = 
            isset($PAGE->theme->settings->togglemarketing)
             && (
                $PAGE->theme->settings->togglemarketing == 1
                || ($PAGE->theme->settings->togglemarketing == 2 && !isloggedin())
                || ($PAGE->theme->settings->togglemarketing == 3 && isloggedin())
            );
    
    if($showMarketingSpots){
        
        function theme_uikit_get_advert_html(&$PAGE, $icon, $title,
                $imageSetting, $content,
                $buttonUrl, $buttonText, $buttonType){
            if(empty($title) && empty($content)){
                return '';
            }
            
            if(!isset($buttonType)){
                $buttonType = 'uk-button-primary';//The default
            }
            
            if(!empty($PAGE->theme->settings->$imageSetting)){
                $imageUrl = $PAGE->theme->setting_file_url($imageSetting, $imageSetting);
                $imageHtml = '<div class="marketing-image uk-text-center">
                                <img src="'.$imageUrl.'" alt="Advert">
                            </div>';
            }else{
                $imageHtml = '';
            }
            
            if(empty($icon)){
                $icon = 'star';
            }
			
			if(!empty($buttonText) && !empty($buttonUrl)){
				$buttonHtml = '<p align="right">
                        <a class="uk-button ' . $buttonType . '" target="_blank" href="'.$buttonUrl.'">'.$buttonText.'</a>
                    </p>';
			}else{
				$buttonHtml = '<p align="right">
                        &nbsp;
                    </p>';
			}
            
            return '<div class="uk-width-1-1 uk-width-large-1-3">
                <div class="service uk-panel uk-panel-box uk-panel-box-primary uk-panel-header">
                    <div class="uk-panel-title">
                        <i class="uk-icon uk-icon-'.$icon.'"></i> '.$title.'</span>
                    </div>
                    
                    '.$imageHtml.'

                    '.$content.'
					'.$buttonHtml.'
                </div>
            </div>';
        }
?>
    <section id="marketing">
        <div class="mb10">
            <div class="uk-grid" id="marketing" data-uk-grid-match="{target:'.service'}" data-uk-grid-margin>
                <?php echo theme_uikit_get_advert_html($PAGE, $PAGE->theme->settings->marketing1icon, $PAGE->theme->settings->marketing1,
                    "marketing1image", $PAGE->theme->settings->marketing1content,
                    $PAGE->theme->settings->marketing1buttonurl, $PAGE->theme->settings->marketing1buttontext, $PAGE->theme->settings->marketing1buttontype);
                ?>
                <?php echo theme_uikit_get_advert_html($PAGE, $PAGE->theme->settings->marketing2icon, $PAGE->theme->settings->marketing2,
                    "marketing2image", $PAGE->theme->settings->marketing2content,
                    $PAGE->theme->settings->marketing2buttonurl, $PAGE->theme->settings->marketing2buttontext, $PAGE->theme->settings->marketing2buttontype);
                ?>
                <?php echo theme_uikit_get_advert_html($PAGE, $PAGE->theme->settings->marketing3icon, $PAGE->theme->settings->marketing3,
                    "marketing3image", $PAGE->theme->settings->marketing3content,
                    $PAGE->theme->settings->marketing3buttonurl, $PAGE->theme->settings->marketing3buttontext,  $PAGE->theme->settings->marketing3buttontype);
                ?>
            </div>
        </div>
    </section>
<?php
}