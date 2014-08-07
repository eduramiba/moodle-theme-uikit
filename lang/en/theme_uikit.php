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

/* Core */
$string['configtitle'] = 'UIKit';
$string['pluginname'] = 'UIKit';
$string['choosereadme'] = 'Theme built with UIKit. It includes an advanced Visual Style Manager';


/* General */
$string['panel'] = 'Panel';
$string['visualstylemanager'] = 'UIKit Visual Style Manager';
$string['geneicsettings'] = 'General Settings';
$string['autohide'] = 'Include Autohide Functionality';
$string['autohidedesc'] = 'The Autohide functionality is designed to make Moodle less intimidating.  When editing is turned on edit icons only appear when the item is hovered over.';
$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.';

$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here if you want to add it to the header.<br>If you upload a logo it will replace the standard icon and name that was displayed by default.';
$string['footerimage'] = 'Footer';
$string['footerimagedesc'] = 'Please upload your custom footer image here if you want to add it to the footer.<br>If you upload a footer it will be placed above footer HTML (if any).';
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Please upload your custom favicon here if you want to add it to the page';

$string['bootstrapcdn'] = 'FontAwesome from CDN';
$string['bootstrapcdndesc'] = 'If enabled this will load FontAwesome from the online Bootstrap CDN source. Enable this if you are having issues getting the Font Awesome icons to display in your site.';
$string['copyright'] = 'Copyright';
$string['copyrightdesc'] = 'The name of your organisation.';

$string['contactinfo'] = 'Contact Information';
$string['contactinfodesc'] = 'Enter your contact information';
$string['siteicon'] = 'Site Icon';
$string['siteicondesc'] = 'Do not have a logo? Enter the name of the icon you wish to use. List is <a href="http://www.getuikit.com/docs/icon.html" target="_blank">here</a>. Just enter what is after the "uk-icon-". ';
$string['headerprofilepic'] = 'Display user\'s picture';
$string['headerprofilepicdesc'] = 'If checked, displays the user\'s profile picture in the header of the page.';

$string['frontpageblocks'] = 'Frontpage blocks alignment';
$string['frontpageblocksdesc'] = 'Here you can determine if the blocks on the frontpage align to the left or the right.';
$string['left'] = 'Left';
$string['right'] = 'Right';

$string['visibleadminonly'] = 'Blocks moved into the area below will only be seen by admins';
$string['backtotop'] = 'Back to top';
$string['nextsection'] = 'Next Section';
$string['previoussection'] = 'Previous Section';

$string['alwaysdisplay'] = 'Always Show';
$string['displaybeforelogin'] = 'Show before login only';
$string['displayafterlogin'] = 'Show after login only';
$string['dontdisplay'] = 'Never Show';

$string['footerblocks'] = 'Enable Footer Blocks';
$string['footerblocksdesc'] = 'If enabled this will display 3 new block locations in the page footer';

/* CustomMenu */
$string['custommenuheading'] = 'Custom Menu';
$string['custommenuheadingsub'] = 'Add additional functionality to your custommenu.';
$string['custommenudesc'] = 'Settings here allow you to add new dynamic functionality to the custommenu (also refered to as Dropdown menu)';

$string['mydashboardinfo'] = 'Custom User Dashboard';
$string['mydashboardinfodesc'] = 'Displays a list of common functions used by users.';
$string['displaymydashboard'] = 'Display Dashboard';
$string['displaymydashboarddesc'] = 'Display Dashboard of user links in the Custom Menu';

$string['mycoursesinfo'] = 'Dynamic Enrolled Courses List';
$string['mycoursesinfodesc'] = 'Displays a dynamic list of enrolled courses to the user.';
$string['displaymycourses'] = 'Display enrolled courses';
$string['displaymycoursesdesc'] = 'Display enrolled courses for users in the Custom Menu';
$string['displaymycoursesmode'] = 'Enrolled courses display mode';
$string['displaymycoursesmodedesc'] = 'This setting defines how enrolled courses are displayed in the Custom Menu';
$string['courselist'] = 'Display simple courses list';
$string['onlytoplevelhierarchy'] = 'Display courses lists under their top level category';
$string['fullhierarchy'] = 'Display courses in complete categories hierarchy';

$string['mycoursetitle'] = 'Terminology';
$string['mycoursetitledesc'] = 'Change the terminology for the "My Courses" link in the dropdown menu';
$string['mycourses'] = 'My Courses';
$string['myunits'] = 'My Units';
$string['mymodules'] = 'My Modules';
$string['myclasses'] = 'My Classes';
$string['mysubjects'] = 'My Subjects';
$string['allcourses'] = 'All Courses';
$string['allunits'] = 'All Units';
$string['allmodules'] = 'All Modules';
$string['allclasses'] = 'All Classes';
$string['allsubjects'] = 'All Subjects';
$string['noenrolments'] = 'You have no current enrolments';

/* My Dashboard custommenu dropdown */
$string['mydashboard'] = 'My Dashboard';

/* Regions */
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['region-home-up'] = 'Home (Up)';
$string['region-home-left'] = 'Home (Left)';
$string['region-home-middle'] = 'Home (Middle)';
$string['region-home-right'] = 'Home (Right)';
$string['region-home-down'] = 'Home (Down)';
$string['region-footer-left'] = 'Footer (Left)';
$string['region-footer-middle'] = 'Footer (Middle)';
$string['region-footer-right'] = 'Footer (Right)';
$string['region-hidden-dock'] = 'Hidden from users';

/* Background Images */
$string['pagebackground'] = 'Page Background Image';
$string['pagebackgrounddesc'] = 'Upload your own page background image. This will be tiled in the background on all pages.';
$string['headerbackground'] = 'Header Background Image';
$string['headerbackgrounddesc'] = 'Upload your own header background image. This will be tiled in the header background on all pages.';
$string['footerbackground'] = 'Footer Background Image';
$string['footerbackgrounddesc'] = 'Upload your own footer background image. This will be tiled in the footer background on all pages.';


/* Frontpage Settings */
$string['frontcontentheading'] = 'Frontpage Settings';
$string['frontcontentheadingsub'] = 'Change what features you wish enabled on your moodle front page';
$string['frontcontentdesc'] = 'This adds a custom content area at the top of the frontpage main box for your own custom content';

$string['usefrontcontent'] = 'Enable Frontpage content';
$string['usefrontcontentdesc'] = 'If enabled this will display tat the top of the frontpage main box.';

$string['frontcontentarea'] = 'Frontpage Content';
$string['frontcontentareadesc'] = 'Whatever is typed into this box will display across the full width of the page inbetween the Slideshow and the Marketing spots ';

$string['frontpagemiddleblocks'] = 'Enable Frontpage Middle Blocks';
$string['frontpagemiddleblocksdesc'] = 'If enabled this will display 3 new block locations just under the frontpage content and 2 additional full-width block locations abover and under the 3 blocks';

$string['combolistshowonlyenrrolled'] = 'Show only enrolled courses in the combo list';
$string['combolistshowonlyenrrolleddesc'] = 'If checked, when using combo list in the front page, only enrolled categories and courses will be shown';

/* Login Page Settings */
$string['loginpageheading'] = 'Login Page Settings';
$string['loginpagehasheader'] = 'Display Header';
$string['loginpagehasnavigation'] = 'Display Navigation';
$string['loginpagehasfooter'] = 'Display Footer';
$string['loginheaderimage'] = 'Login box header image';
$string['loginheaderimagedesc'] = 'If an image is uploaded, it will replace the login box header';

/* Slideshow */
$string['slideshowheading'] = 'Frontpage Slideshow';
$string['slideshowheadingsub'] = 'Dynamic Slideshow for the frontpage';
$string['slideshowdesc'] = 'This creates a dynamic slideshow of up to 4 slides for you to promote important elements of your site.';

$string['slideshownumber'] = 'Number of slides';
$string['slideshowcolor'] = 'Slideshow main color';

$string['toggleslideshow'] = 'Toggle Slideshow display';
$string['toggleslideshowdesc'] = 'Choose if you wish to hide or show the Slideshow.';

$string['hideonphone'] = 'Slideshow on Mobiles';
$string['hideonphonedesc'] = 'Choose if you wish to have the slideshow shown on mobiles or not';
$string['readmore'] = 'Read More';

$string['slideheader'] = 'Slide {$a->n}';

$string['slidetitle'] = 'Slide Title';
$string['slideimage'] = 'Slide Image';
$string['slidecaption'] = 'Slide Caption';
$string['slideurl'] = 'Slide Button Link';
$string['slideurltext'] = 'Slide Button Text';

$string['slideshowbordercolor'] = 'Slide Border Color';
$string['slideshowtitlecolor'] = 'Slide Title Color';
$string['slideshowcaptioncolor'] = 'Slide Caption Color';
$string['slideshowbuttoncolor'] = 'Slide Button Background';
$string['slideshowbuttontextcolor'] = 'Slide Button Text Color';

/* Marketing Spots */
$string['marketingheading'] = 'Marketing Spots';
$string['marketingheadingsub'] = 'Three locations on the front page to add information and links';
$string['marketingheight'] = 'Height of Marketing Images';
$string['marketingheightdesc'] = 'If you want to display images in the Marketing boxes you can specify their hight here.';
$string['marketingdesc'] = 'This theme provides the option of enabling three "marketing" or "ad" spots just under the slideshow.  These allow you to easily identify core information to your users and provide direct links.';

$string['togglemarketing'] = 'Toggle Marketing Spot display';
$string['togglemarketingdesc'] = 'Choose if you wish to hide or show the three Marketing Spots.';


$string['marketing1'] = 'Marketing Spot One';
$string['marketing2'] = 'Marketing Spot Two';
$string['marketing3'] = 'Marketing Spot Three';

$string['marketinginfodesc'] = 'Enter the settings for your marketing spot.';
$string['marketingtitle'] = 'Title';
$string['marketingtitledesc'] = 'Title to show in this marketing spot';
$string['marketingicon'] = 'Icon';
$string['marketingicondesc'] = 'Name of the icon you wish to use. List is <a href="http://www.getuikit.com/docs/icon.html" target="_new">here</a>.  Just enter what is after the "icon-".';
$string['marketingimage'] = 'Image';
$string['marketingimagedesc'] = 'This provides the option of displaying an image above the text in the marketing spot';
$string['marketingcontent'] = 'Content';
$string['marketingcontentdesc'] = 'Content to display in the marketing box. Keep it short and sweet.';
$string['marketingbuttontext'] = 'Link Text';
$string['marketingbuttontextdesc'] = 'Text to appear on the button.';
$string['marketingbuttonurl'] = 'Link URL';
$string['marketingbuttonurldesc'] = 'URL the button will point to.';

/* Social Networks */
$string['socialheading'] = 'Social Networking';
$string['socialheadingsub'] = 'Engage your users with Social Networking';
$string['socialdesc'] = 'Provide direct links to the core social networks that promote your brand.  These will appear in the header of every page.';
$string['socialnetworks'] = 'Social Networks';
$string['facebook'] = 'Facebook URL';
$string['facebookdesc'] = 'Enter the URL of your Facebook page. (i.e http://www.facebook.com/mycollege)';

$string['twitter'] = 'Twitter URL';
$string['twitterdesc'] = 'Enter the URL of your Twitter feed. (i.e http://www.twitter.com/mycollege)';

$string['googleplus'] = 'Google+ URL';
$string['googleplusdesc'] = 'Enter the URL of your Google+ profile. (i.e http://plus.google.com/107817105228930159735)';

$string['linkedin'] = 'LinkedIn URL';
$string['linkedindesc'] = 'Enter the URL of your LinkedIn profile. (i.e http://www.linkedin.com/company/mycollege)';

$string['youtube'] = 'YouTube URL';
$string['youtubedesc'] = 'Enter the URL of your YouTube channel. (i.e http://www.youtube.com/mycollege)';

$string['flickr'] = 'Flickr URL';
$string['flickrdesc'] = 'Enter the URL of your Flickr page. (i.e http://www.flickr.com/mycollege)';

$string['vk'] = 'VKontakte URL';
$string['vkdesc'] = 'Enter the URL of your Vkontakte page. (i.e http://www.vk.com/mycollege)';

$string['skype'] = 'Skype Account';
$string['skypedesc'] = 'Enter the Skype username of your organisations Skype account';

$string['pinterest'] = 'Pinterest URL';
$string['pinterestdesc'] = 'Enter the URL of your Pinterest page. (i.e http://pinterest.com/mycollege)';

$string['instagram'] = 'Instagram URL';
$string['instagramdesc'] = 'Enter the URL of your Instagram page. (i.e http://instagram.com/mycollege)';

$string['website'] = 'Website URL';
$string['websitedesc'] = 'Enter the URL of your own website. (i.e http://www.pukunui.com)';

/* Mobile Apps */
$string['mobileappsheading'] = 'Mobile Apps';
$string['mobileappsheadingsub'] = 'Link to your App to get your students using Mobiles';
$string['mobileappsdesc'] = 'Have you got a web app on the App Store or Google Play Store?  Provide a link here so your users can grab the apps online';

$string['android'] = 'Android (Google Play)';
$string['androiddesc'] = 'Prove a URL to your mobile App on the Google Play Store.  If you do not have one of your own maybe consider linking to the free official Moodle Mobile app.';

$string['ios'] = 'iPhone/iPad (App Store)';
$string['iosdesc'] = 'Prove a URL to your mobile App on the App Store.  If you do not have one of your own maybe consider linking to the free official Moodle Mobile app.';

/* iOS Icons */
$string['iosicon'] = 'iOS Homescreen Icons';
$string['iosicondesc'] = 'The them does provide a default icon for iOS and android homescreens. You can upload your custom icons if you wish.';

$string['iphoneicon'] = 'iPhone/iPod Touch Icon (Non Retina)';
$string['iphoneicondesc'] = 'Icon should be a PNG file sized 57px by 57px';

$string['iphoneretinaicon'] = 'iPhone/iPod Touch Icon (Retina)';
$string['iphoneretinaicondesc'] = 'Icon should be a PNG file sized 114px by 114px';

$string['ipadicon'] = 'iPad Icon (Non Retina)';
$string['ipadicondesc'] = 'Icon should be a PNG file sized 72px by 72px';

$string['ipadretinaicon'] = 'iPad Icon (Retina)';
$string['ipadretinaicondesc'] = 'Icon should be a PNG file sized 144px by 144px';

/* Google Analytics */
$string['analyticsheading'] = 'Google Analytics';
$string['analyticsheadingsub'] = 'Powerful analytics from Google';
$string['analyticsdesc'] = 'Here you can enable Google Analytics for your moodle site. You will need to sign up for a free account at the Google Analytics site (<a href="http://analytics.google.com" target="_blank">http://analytics.google.com</a>)';

$string['useanalytics'] = 'Enable Google Analytics';
$string['useanalyticsdesc'] = 'Enable or disable Google Analytics functionaliy.';

$string['analyticsid'] = 'Your Tracking ID';
$string['analyticsiddesc'] = 'Enter the provided Tracking ID. Typically formatted like UA-XXXXXXXX-X';

$string['analyticsclean'] = 'Send Clean URLs';
$string['analyticscleandesc'] = 'This fantastic feature was created by <a href="https://moodle.org/user/profile.php?id=281671" target="_blank">Gavin Henrick</a> and <a href="https://moodle.org/user/view.php?id=907814" target="_blank">Bas Brands</a> and is implemented in this theme. Rather than standard Moodle URLs the theme will send out clean URLs making it easier to identify the page and provide advanced reporting. More information on using this feature and its uses can be <b><a href="http://www.somerandomthoughts.com/blog/2012/04/18/ireland-uk-moodlemoot-analytics-to-the-front/" target="_blank">found here</a></b>.';

$string['analyticsadmin'] = 'Track Admin Users';
$string['analyticsadmindesc'] = 'Enable to track Admin users as well.';

/* Google Fonts */
$string['googlefontsheading'] = 'Google Fonts';
$string['googlefontsheadingsub'] = 'Here you can add up to 10 Google Fonts that will be available in every Moodle page';
$string['googlefontname'] = 'Font number {$a->number}';
$string['googlefontsnofont'] = '--No Font--';

include dirname(__FILE__).'/customizer.php';