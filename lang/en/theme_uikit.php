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
$string['logout'] = 'Logout';
$string['panel'] = 'Panel';
$string['navigationtoggletext'] = 'Navigation';
$string['visualstylemanager'] = 'UIKit Visual Style Manager';
$string['geneicsettings'] = 'General Settings';
$string['autohide'] = 'Include Autohide Functionality';
$string['autohidedesc'] = 'The Autohide functionality is designed to make Moodle less intimidating.  When editing is turned on edit icons only appear when the item is hovered over.';
$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.';

$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here if you want to add it to the header.<br>If you upload a logo it will replace the standard icon and name that was displayed by default.';
$string['logoshowsummary'] = 'Show site summary under the logo';
$string['footerimage'] = 'Footer';
$string['footerimagedesc'] = 'Please upload your custom footer image here if you want to add it to the footer.<br>If you upload a footer it will be placed above footer HTML (if any).';
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Please upload your custom favicon here if you want to add it to the page';

$string['bootstrapcdn'] = 'FontAwesome from CDN';
$string['bootstrapcdndesc'] = 'If enabled this will load FontAwesome from the online Bootstrap CDN source. Enable this if you are having issues getting the Font Awesome icons to display in your site.';
$string['copyright'] = 'Copyright';
$string['copyrightdesc'] = 'The name of your organisation.';
$string['showmoodledocs'] = 'Show "Moodle Docs for this page" section in the footer';

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

$string['componentclass-normal'] = 'Normal';
$string['componentclass-primary'] = 'Primary';
$string['componentclass-success'] = 'Success';
$string['componentclass-danger'] = 'Danger';
$string['componentclass-link'] = 'Link';

$string['componentplacement-center'] = 'Center';
$string['componentplacement-top'] = 'Top';
$string['componentplacement-bottom'] = 'Bottom';
$string['componentplacement-left'] = 'Left';
$string['componentplacement-right'] = 'Right';

/* CustomMenu */
$string['custommenuheading'] = 'Custom Menu';
$string['custommenuheadingsub'] = 'Add additional functionality to your custommenu.';
$string['custommenudesc'] = 'Settings here allow you to add new dynamic functionality to the custommenu (also refered to as Dropdown menu)';

$string['mydashboardinfo'] = 'Custom User Dashboard';
$string['mydashboardinfodesc'] = 'Displays a list of common functions used by users.';
$string['displaymydashboard'] = 'Display Dashboard';
$string['displaymydashboarddesc'] = 'Display Dashboard of user links in the Custom Menu';

$string['displaysitename'] = 'Display site name';
$string['mycoursesinfo'] = 'Dynamic Enrolled Courses List';
$string['mycoursesinfodesc'] = 'Displays a dynamic list of enrolled courses to the user.';
$string['displaymycourses'] = 'Display enrolled courses';
$string['displaymycoursesdesc'] = 'Display enrolled courses for users in the Custom Menu';
$string['displaymycoursesmode'] = 'Enrolled courses display mode';
$string['displaymycoursesmodedesc'] = 'This setting defines how enrolled courses are displayed in the Custom Menu';
$string['displayloggedusermode'] = 'Logged user display mode';
$string['displayloggedusermodedesc'] = 'This setting defines how the logged user is displayed in the Custom Menu';
$string['displayloggedusermodecomplete'] = 'Complete info';
$string['displayloggedusermodeshort'] = 'Short info';
$string['displayloggedusermodeonlylogout'] = 'Only logout';
$string['displayloggedusermodehide'] = 'Hide';
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

$string['themenavigationelementsmode'] = 'Display mode of theme UIkit custom menu items';
$string['themenavigationelementsmodebefore'] = 'Before site custom menu items';
$string['themenavigationelementsmodeafter'] = 'After site custom menu items';

/* My Dashboard custommenu dropdown */
$string['mydashboard'] = 'My Dashboard';

/* Theme Layout */

$string['layoutheading'] = 'Layout options';

$string['themelayout'] = 'Layout Mode';
$string['themelayoutdesc'] = 'Here you can choose between different layout modes for this theme';
$string['themelayout1'] = 'Grid layout';
$string['themelayout2'] = 'Flex layout';

$string['navigationbuttonssize'] = 'Navigation buttons size';
$string['navigationbuttonssize-mini'] = 'Mini';
$string['navigationbuttonssize-small'] = 'Small';
$string['navigationbuttonssize-normal'] = 'Normal';
$string['navigationbuttonssize-large'] = 'Large';

$string['navigationbuttonsclass'] = 'Navigation buttons class';
$string['navigationbuttonsclass-normal'] = 'Normal';
$string['navigationbuttonsclass-primary'] = 'Primary';
$string['navigationbuttonsclass-success'] = 'Success';
$string['navigationbuttonsclass-danger'] = 'Danger';
$string['navigationbuttonsclass-link'] = 'Link';

$string['footerplacement'] = 'Footer placement';
$string['footerplacementpageend'] = 'At the end of the page';
$string['footerplacementaftermaincontent'] = 'After main content of the page';

$string['stickynavigationbar'] = 'Enable sticky navigation bar';
$string['stickynavigationbardesc'] = 'Make the navigation bar remain at the top of the viewport';
$string['stickynavigationbardelay'] = 'Sticky navigation bar delay (px)';
$string['stickynavigationbardelaydesc'] = 'Add a delay to the navigation bar, so it becomes sticky only after scrolling a specified distance in pixels';

$string['breadcrumbsplacement'] = 'Breadcrumbs placement';
$string['breadcrumbsplacement-pagenavbar'] = 'Page top navbar';
$string['breadcrumbsplacement-mainregion'] = 'Main region';

$string['pagenavbarcontent'] = 'Page top navbar content';
$string['pagenavbarcontent-pageheading'] = 'Page heading';
$string['pagenavbarcontent-pagetitle'] = 'Page title';
$string['pagenavbarcontent-sitename'] = 'Site name';
$string['pagenavbarcontent-siteshortname'] = 'Site short name';
$string['pagenavbarcontent-sitessummary'] = 'Site summary';
$string['pagenavbarcontent-custom'] = 'Custom';
$string['pagenavbarcontent-dontshow'] = 'Don\'t show';
$string['pagenavbarcustomcontent'] = 'Page top navbar custom content';

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

$string['slideshowheight'] = 'Slideshow height';
$string['slideshowsizingmode'] = 'Slide sizing mode';

$string['auto'] = 'Auto';

$string['slideshowsizingmode-fullwidth'] = 'Use full width';
$string['slideshowsizingmode-fullheight'] = 'Use full height';

$string['slideshownumber'] = 'Number of slides';

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
$string['slidecaptionplacement'] = 'Slide caption placement';

$string['slideshowtitlecolor'] = 'Slide Title Color';
$string['slideshowcaptioncolor'] = 'Slide Caption Color';
$string['slideshowarrowscolor'] = 'Navigation Arrows Color';
$string['slideshowbuttontype'] = 'Slide Button Type';

$string['slideshowautoplay'] = 'Enable autoplay';
$string['slideshowanimation'] = 'Slideshow animation';
$string['slideshowkenburns'] = 'Enable ken burns effect';

$string['slideshowanimation-fade'] = 'Fade';
$string['slideshowanimation-scroll'] = 'Scroll';
$string['slideshowanimation-scale'] = 'Scale';
$string['slideshowanimation-swipe'] = 'Swipe';
$string['slideshowanimation-slice-down'] = 'Slice down';
$string['slideshowanimation-slice-up'] = 'Slice up';
$string['slideshowanimation-slice-up-down'] = 'Slice up & down';
$string['slideshowanimation-fold'] = 'Fold';
$string['slideshowanimation-puzzle'] = 'Puzzle';
$string['slideshowanimation-boxes'] = 'Boxes';
$string['slideshowanimation-boxes-reverse'] = 'Boxes reverse';
$string['slideshowanimation-random-fx'] = 'Random effect';

/* Marketing Spots */
$string['marketingheading'] = 'Marketing Spots';
$string['marketingheadingsub'] = 'Three locations on the front page to add information and links';
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
$string['marketingbuttontype'] = 'Button type';

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
$string['iosicondesc'] = 'The theme does provide a default icon for iOS, Android and Windows homescreens. You can upload your custom icons if you wish.';

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













/********************************************/
/* Visual styles customizer related strings. */

/* Interface */
$string['accept'] = 'Accept';
$string['cancel'] = 'Cancel';
$string['warning_variables_changed'] = 'You are about to change base theme and some variables have different values than default.';
$string['keep_variables'] = 'Keep variable values between themes where possible';
$string['continue_refreshing'] = 'Continue refreshing?';
$string['base_theme'] = 'Base theme';
$string['basic'] = 'Basic';
$string['almost-flat'] = 'Almost flat';
$string['gradient'] = 'Gradient';
$string['refresh'] = 'Refresh';
$string['auto_refresh'] = 'Auto refresh';
$string['save_styles'] = 'Save and use styles';
$string['save_styles_tooltip'] = 'Save and use current style customizations for the actual site';
$string['export_less'] = 'Export LESS';
$string['export_less_tooltip'] = 'Export style customizations into a LESS file';
$string['import_less'] = 'Import LESS';
$string['import_less_tooltip'] = 'Import style customizations from a LESS file';
$string['reset'] = 'Reset';
$string['reset_all'] = 'Reset all';
$string['custom_less'] = 'Use your own custom CSS/LESS code';
$string['custom_less_default'] = 
    'Your custom CSS or LESS code here...
    It will be added at the end of the style sheet';
$string['themedesignerenabled'] = 'Theme designer mode has been enabled';
$string['warning_theme_designer_enabled'] = 'Theme designer mode has been automatically enabled. Make sure to disable theme designer mode for better performance when you are done customizing styles.';
$string['warning_theme_designer_disable'] = 'You can disable it here';
$string['warning_saved_styles_different_theme_version'] = 'It seems that you saved custom styles for this site with an old version of theme UIKit';
$string['warning_saved_styles_different_theme_version_action'] = 'Please update the theme styles by going to the customizer and clicking on save. Clear your browser cache to ensure correct behaviour';
$string['page_description'] = 'This page is for customizing the look and feel of your site.';
$string['page_description_sub'] = 'You can configure the logo, favicon and many other options here.';

$string['uikit_not_selected'] = 'UIKit Theme is not currently selected.';
$string['uikit_select_link'] = 'Please select it here';
$string['styleswritepermissionsfail'] = 'Error: theme/uikit/styles folder is not writable. Please check that your web server has write permissions in this folder';


/* Javascript (customizer.js) internationalization strings */
$string['js-ok'] = 'Ok';
$string['js-home'] = 'Home';
$string['js-compile-error'] = 'An error happened while building the styles';
$string['js-reset-group'] = 'Reset group values to default';
$string['js-reset-group-confirm'] = 'Reset group <i>{0}</i> variables to default?';
$string['js-reset-var-confirm'] = 'Reset <i>{0}</i> to default?';
$string['js-reset-all-confirm'] = 'Reset ALL groups variables to default?';
$string['js-styles-saved'] = 'Styles saved successfully!';
$string['js-styles-saved-error'] = 'An error happened while saving the styles';
$string['js-font-family-placeholder'] = 'Type your font or list of fonts';
$string['js-externalpage-disallowed'] = 'Going to an external page is not allowed';
$string['js-less-error-help'] = 'Please try to clear your browser cache and make sure that your custom CSS/LESS is correct';











/************************/
/* Variables and groups */
/************************/

/* Global */
$string['group-global'] = 'Global';
$string['base-body-background'] = 'Background Color';
$string['base-body-gradient-inner'] = 'Background Color - Gradient (inner)';
$string['base-body-gradient-outer'] = 'Background Color - Gradient (outer)';
$string['mdl-page-header-background'] = 'Page Header - Background Color';
$string['mdl-page-header-background-gradient-top'] = 'Page Header - Top Gradient';
$string['mdl-page-header-background-gradient-bottom'] = 'Page Header - Bottom Gradient';
$string['mdl-page-footer-background'] = 'Page Footer - Background Color';
$string['mdl-page-footer-background-gradient-top'] = 'Page Footer - Top Gradient';
$string['mdl-page-footer-background-gradient-bottom'] = 'Page Footer - Bottom Gradient';
$string['global-border'] = 'Border color';
$string['global-border-radius'] = 'Border radius';


/* Typography */
$string['group-typography'] = 'Typography';
$string['base-body-font-size'] = 'Font size';
$string['base-body-font-family'] = 'Body Font Family';
$string['base-body-line-height'] = 'Line height';
$string['base-body-color'] = 'Text Color';
$string['global-muted-color'] = 'Muted Text Color';
$string['base-link-color'] = 'Link Color';
$string['base-link-text-decoration'] = 'Link Decoration';
$string['base-link-hover-color'] = 'Link Hover Color';
$string['base-link-hover-text-decoration'] = 'Link Hover Decoration';
$string['global-contrast-color'] = 'Contrast Color';
$string['base-heading-font-family'] = 'Headings font family';
$string['base-heading-color'] = 'Headings Text Color';
$string['base-heading-font-weight'] = 'Headings font weight';


/* Navigation grid layout */
$string['group-navbar'] = 'Navigation (Grid layout)';
$string['mdl-navbar-side-margin'] = 'Side Margin';
$string['navbar-background'] = 'Background Color';
$string['navbar-gradient-top'] = 'Background Color - Top Gradient';
$string['navbar-gradient-bottom'] = 'Background Color - Bottom Gradient';
$string['navbar-color'] = 'Text Color';
$string['navbar-border'] = 'Border';
$string['navbar-border-bottom'] = 'Border (bottom)';
$string['navbar-text-shadow'] = 'Text shadow';
$string['navbar-brand-color'] = 'Brand Text Color';
$string['navbar-brand-hover-color'] = 'Brand Text Hover Color';
$string['navbar-link-color'] = 'Link Color';
$string['navbar-link-hover-color'] = 'Link Hover Color';
$string['navbar-nav-font-family'] = 'Elements Font Family';
$string['navbar-nav-font-size'] = 'Elements Font Size';
$string['navbar-nav-font-weight'] = 'Elements Font Weight';
$string['navbar-nav-color'] = 'Elements Text';
$string['navbar-nav-hover-background'] = 'Elements Hover Background';
$string['navbar-nav-hover-color'] = 'Elements Hover Text';
$string['navbar-nav-onclick-background'] = 'Elements Click Background';
$string['navbar-nav-onclick-color'] = 'Elements Click Text';
$string['navbar-nav-active-background'] = 'Elements Active Background';
$string['navbar-nav-active-color'] = 'Elements Active Text';
$string['dropdown-navbar-background'] = 'Dropdown Background';
$string['nav-navbar-hover-background'] = 'Dropdown Hover Background';
$string['nav-navbar-color'] = 'Dropdown Text';
$string['nav-navbar-hover-color'] = 'Dropdown Hover Text';
$string['nav-navbar-nested-color'] = 'Dropdown Nested Link';
$string['nav-navbar-nested-hover-color'] = 'Dropdown Hover Nested Link';
$string['navbar-toggle-color'] = 'Offcanvas Navigation Toggle';
$string['navbar-toggle-hover-color'] = 'Offcanvas Navigation Toggle Hover';


/* Navigation flex layout */
$string['group-navbar-layout2'] = 'Navigation (Flex layout)';
$string['dropdown-background'] = 'Dropdown Background Color';
$string['nav-dropdown-color'] = 'Dropdown Text Color';
$string['nav-dropdown-hover-background'] = 'Dropdown Background Hover Color';
$string['nav-dropdown-hover-color'] = 'Dropdown Text Hover Color';
$string['nav-dropdown-nested-color'] = 'Dropdown Nested Link';
$string['nav-dropdown-nested-hover-color'] = 'Dropdown Hover Nested Link';


/* Main Content */
$string['group-main-region'] = 'Main Content';
$string['mdl-main-region-background'] = 'Background Color';
$string['mdl-main-region-border'] = 'Border Color';
$string['mdl-main-region-padding'] = 'Padding';


/* Blocks */
$string['group-mdl-blocks'] = 'Blocks';
$string['mdl-block-header-font-family'] = 'Header Font Family';
$string['mdl-block-header-font-size'] = 'Header Font Size';
$string['mdl-block-header-font-weight'] = 'Header Font Weight';
$string['panel-header-title-padding'] = 'Header Separation Padding';
$string['panel-header-title-border'] = 'Header Separator Color';
$string['panel-box-background'] = 'Background Color';
$string['panel-box-color'] = 'Text Color';
$string['panel-box-padding'] = 'Box Padding';
$string['panel-box-border'] = 'Box Border';
$string['mdl-block-header-icon-color'] = 'Header - Icon Color';
$string['mdl-block-header-text-color'] = 'Header - Text Color';
$string['mdl-block-icon-color'] = 'Menu Item Icon Color';
$string['mdl-block-text-color'] = 'Menu Item Text Color';
$string['mdl-block-menu-item-font-family'] = 'Menu Item Font Family';
$string['mdl-block-menu-item-font-size'] = 'Menu Item Font Size';
$string['mdl-block-menu-item-font-weight'] = 'Menu Item Font Weight';
$string['mdl-block-link-color'] = 'Menu Item Link';
$string['mdl-block-link-color-hover'] = 'Menu Item Link Hover';


/* Alerts */
$string['group-alerts'] = 'Alerts';
$string['alert-background'] = 'Background Color';
$string['alert-color'] = 'Text Color';
$string['alert-border'] = 'Border Color';
$string['alert-success-background'] = 'Success Background Color';
$string['alert-success-color'] = 'Success Text Color';
$string['alert-success-border'] = 'Success Border Color';
$string['alert-warning-background'] = 'Warning Background Color';
$string['alert-warning-color'] = 'Warning Text Color';
$string['alert-warning-border'] = 'Warning Border Color';
$string['alert-danger-background'] = 'Danger Background Color';
$string['alert-danger-color'] = 'Danger Text Color';
$string['alert-danger-border'] = 'Danger Border Color';


/* Buttons */
$string['group-buttons'] = 'Buttons';
$string['button-height'] = 'Button Height';
$string['button-small-height'] = 'Small Button Height';
$string['button-border'] = 'Border color';
$string['button-border-bottom'] = 'Border color (bottom)';
$string['button-hover-border'] = 'Hover border color';
$string['button-contrast-hover-border'] = 'Hover border color (contrast)';
$string['button-text-shadow'] = 'Text shadow';
$string['button-contrast-text-shadow'] = 'Text shadow (contrast)';
$string['button-gradient-top'] = 'Normal - Gradient (top)';
$string['button-gradient-bottom'] = 'Normal - Gradient (bottom)';
$string['button-background'] = 'Normal - Background';
$string['button-color'] = 'Normal - Text';
$string['button-hover-background'] = 'Normal - Hover Background';
$string['button-hover-color'] = 'Normal - Hover text';
$string['button-active-background'] = 'Normal - Active Background';
$string['button-active-color'] = 'Normal - Active text';
$string['button-primary-gradient-top'] = 'Primary - Gradient (top)';
$string['button-primary-gradient-bottom'] = 'Primary - Gradient (bottom)';
$string['button-primary-background'] = 'Primary - Background';
$string['button-primary-color'] = 'Primary - Text';
$string['button-primary-hover-background'] = 'Primary - Hover Background';
$string['button-primary-hover-color'] = 'Primary - Hover text';
$string['button-primary-active-background'] = 'Primary - Active Background';
$string['button-primary-active-color'] = 'Primary - Active text';
$string['button-success-gradient-top'] = 'Success - Gradient (top)';
$string['button-success-gradient-bottom'] = 'Success - Gradient (bottom)';
$string['button-success-background'] = 'Success - Background';
$string['button-success-color'] = 'Success - Text';
$string['button-success-hover-background'] = 'Success - Hover Background';
$string['button-success-hover-color'] = 'Success - Hover text';
$string['button-success-active-background'] = 'Success - Active Background';
$string['button-success-active-color'] = 'Success - Active text';
$string['button-danger-gradient-top'] = 'Danger - Gradient (top)';
$string['button-danger-gradient-bottom'] = 'Danger - Gradient (bottom)';
$string['button-danger-background'] = 'Danger - Background';
$string['button-danger-color'] = 'Danger - Text';
$string['button-danger-hover-background'] = 'Danger - Hover Background';
$string['button-danger-hover-color'] = 'Danger - Hover text';
$string['button-danger-active-background'] = 'Danger - Active Background';
$string['button-danger-active-color'] = 'Danger - Active text';
$string['button-disabled-background'] = 'Disabled - Background';
$string['button-disabled-color'] = 'Disabled - Text';


/* Layout */
$string['group-layout'] = 'Layout';
$string['mdl-max-page-header-content-width'] = 'Page Header - Maximum width';
$string['mdl-page-header-content-padding'] = 'Page Header - Padding';
$string['mdl-max-page-navbar-content-width'] = 'Page Navigation - Maximum width';
$string['mdl-max-page-content-width'] = 'Page Content - Maximum width';
$string['mdl-page-top-margin'] = 'Page Content - Top margin';
$string['mdl-page-side-margin'] = 'Page Content - Side margin';
$string['mdl-max-page-footer-width'] = 'Page Footer - Maximum width';
$string['mdl-max-additional-frontpage-content-width'] = 'Frontpage Marketing Section - Maximum width';
$string['mdl-layout2-left-width'] = 'Flex Layout - Left column width';


/* Breadcrumbs */
$string['group-breadcrumbs'] = 'Breadcrumbs';
$string['mdl-page-navbar-background'] = 'Background Color (top region)';
$string['mdl-page-navbar-border'] = 'Border Color (top region)';
$string['mdl-page-breadcrumbs-background'] = 'Background Color (main region)';
$string['mdl-page-breadcrumbs-border'] = 'Border Color (main region)';
$string['mdl-breadcrumb-link-color'] = 'Link Color';
$string['mdl-breadcrumb-link-hover-color'] = 'Link Hover Color';


/* Go to top Button */
$string['group-to-top-button'] = 'Go to top Button';
$string['mdl-to-top-background'] = 'Background';
$string['mdl-to-top-shadow-background'] = 'Shadow';
$string['mdl-to-top-color'] = 'Icon Color';
$string['mdl-to-top-background-hover'] = 'Hover Background';
$string['mdl-to-top-shadow-background-hover'] = 'Hover Shadow';
$string['mdl-to-top-color-hover'] = 'Hover Icon Color';


/* Login Page */
$string['group-login-page'] = 'Login Page';
$string['mdl-login-box-width'] = 'Login Box Width';
$string['mdl-login-box-background'] = 'Login Box Background';
$string['mdl-login-box-border'] = 'Login Box Border';


/* Marketing spots */
$string['group-marketing-spots'] = 'Marketing spots';
$string['mdl-marketingspot-title-color'] = 'Title color';
$string['mdl-marketingspot-background'] = 'Background color';
$string['mdl-marketingspot-color'] = 'Text color';
$string['mdl-marketingspot-border-color'] = 'Border color';

/* Other */
$string['group-other'] = 'Other';
$string['global-primary-background'] = 'Primary Background';
$string['global-primary-gradient-top'] = 'Primary Background Gradient (top)';
$string['global-primary-gradient-bottom'] = 'Primary Background Gradient (bottom)';
$string['global-success-background'] = 'Success Background';
$string['global-success-gradient-top'] = 'Success Background Gradient (top)';
$string['global-success-gradient-bottom'] = 'Success Background Gradient (bottom)';
$string['global-danger-background'] = 'Danger Background';
$string['global-danger-gradient-top'] = 'Danger Background Gradient (top)';
$string['global-danger-gradient-bottom'] = 'Danger Background Gradient (bottom)';
$string['mdl-social-heading-color'] = 'Social Headings Color';