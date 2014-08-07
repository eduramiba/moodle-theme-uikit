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
$string['page_description'] = 'This page is for customizing the look and feel of your site.';
$string['page_description_sub'] = 'You can configure the logo, favicon and many other options here.';

$string['uikit_not_selected'] = 'UIKit Theme is not currently selected.';
$string['uikit_select_link'] = 'Please select it here';
$string['styleswritepermissionsfail'] = 'Error: theme/uikit/styles folder is not writable. Please check that your web server has write permissions in this folder';


/* Javascript (customizer.js) internationalization strings */
$string['js-compile-error'] = 'An error happened while building the styles';
$string['js-reset-group'] = 'Reset group values to default';
$string['js-reset-group-confirm'] = 'Reset group <i>{0}</i> variables to default?';
$string['js-reset-var-confirm'] = 'Reset <i>{0}</i> to default?';
$string['js-reset-all-confirm'] = 'Reset ALL groups variables to default?';
$string['js-styles-saved'] = 'Styles saved successfully!';
$string['js-styles-saved-error'] = 'An error happened while saving the styles';
$string['js-font-family-placeholder'] = 'Type your font or list of fonts';











/************************/
/* Variables and groups */
/************************/

/* Global */
$string['group-global'] = 'Global';
$string['base-body-background'] = 'Background Color';
$string['base-body-gradient-inner'] = 'Background Color - Gradient (inner)';
$string['base-body-gradient-outer'] = 'Background Color - Gradient (outer)';
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


/* Navigation */
$string['group-navbar'] = 'Navigation';
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


/* Breadcrumbs */
$string['group-breadcrumbs'] = 'Breadcrumbs';
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