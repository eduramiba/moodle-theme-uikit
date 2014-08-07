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
$string['accept'] = 'Aceptar';
$string['cancel'] = 'Cancelar';
$string['warning_variables_changed'] = 'Estás a punto de cambiar el tema base y algunas variables tiene valores diferentes a los iniciales.';
$string['keep_variables'] = 'Mantener los valores de las variables en la medida de lo posible';
$string['continue_refreshing'] = '¿Continuar refrescando?';
$string['base_theme'] = 'Tema base';
$string['basic'] = 'Básico';
$string['almost-flat'] = 'Casi plano';
$string['gradient'] = 'Degradado';
$string['refresh'] = 'Refrescar';
$string['auto_refresh'] = 'Auto refrescar';
$string['save_styles'] = 'Guardar y utilizar estilos';
$string['save_styles_tooltip'] = 'Guarda y utiliza los estilos actualmes para el sitio real';
$string['export_less'] = 'Exportar LESS';
$string['export_less_tooltip'] = 'Exportar personalizaciones de estilo en un archivo LESS';
$string['import_less'] = 'Importar LESS';
$string['import_less_tooltip'] = 'Importar personalizaciones de estilo de un archivo LESS';
$string['reset'] = 'Resetear';
$string['reset_all'] = 'Resetear todo';
$string['custom_less'] = 'Utilizar tu propio código CSS/LESS';
$string['custom_less_default'] = 
    'Tu código CSS o LESS aquí...
    Será añadido al final de la hoja de estilos';
$string['themedesignerenabled'] = 'El modo de diseño de temas ha sido activado';
$string['warning_theme_designer_enabled'] = 'El modo de diseño de temas ha sido activado automáticamente. Asegúrate de desactivarlo para mejorar el rendimiento cuando hayas acabado de personalizar los estilos.';
$string['warning_theme_designer_disable'] = 'Lo puedes desactivar aquí';
$string['page_description'] = 'Esta página permite personalizar el estilo y comportamiento de tu sitio.';
$string['page_description_sub'] = 'Puedes configurar el logo, favicon y otras muchas opciones aquí.';

$string['uikit_not_selected'] = 'El tema UIKit no está seleccionado actualmente.';
$string['uikit_select_link'] = 'Por favor selecciónalo aquí';
$string['styleswritepermissionsfail'] = 'Error: No se pudo escribir en el directorio theme/uikit/styles. Por favor comprueba que tu servidor web tiene permisos de escritura en este directorio';

/* Javascript (customizer.js) internationalization strings */
$string['js-compile-error'] = 'Un error ocurrió al construir los estilos';
$string['js-reset-group'] = 'Resetear valores del grupo';
$string['js-reset-group-confirm'] = '¿Resetear valores del grupo <i>{0}</i>?';
$string['js-reset-var-confirm'] = '¿Resetear <i>{0}</i>?';
$string['js-reset-all-confirm'] = 'Resetear TODAS las variables?';
$string['js-styles-saved'] = '¡Estilos guardados con éxito!';
$string['js-styles-saved-error'] = 'Un error ocurrió al guardar los estilos';
$string['js-font-family-placeholder'] = 'Escribe el tipo o tipos de letra deseados';











/************************/
/* Variables and groups */
/************************/

/* Global */
$string['group-global'] = 'Global';
$string['base-body-background'] = 'Color de fondo';
$string['base-body-gradient-inner'] = 'Color de fondo - Degradado (interior)';
$string['base-body-gradient-outer'] = 'Color de fondo - Degradado (exterior)';
$string['global-border'] = 'Color de bordes';
$string['global-border-radius'] = 'Radio de bordes';


/* Typography */
$string['group-typography'] = 'Tipografía';
$string['base-body-font-size'] = 'Tamaño de letra';
$string['base-body-font-family'] = 'Tipo de letra';
$string['base-body-line-height'] = 'Altura de línea';
$string['base-body-color'] = 'Color del texto';
$string['global-muted-color'] = 'Color del texto atenuado';
$string['base-link-color'] = 'Color de enlaces';
$string['base-link-text-decoration'] = 'Decoración de enlaces';
$string['base-link-hover-color'] = 'Color de enlaces (hover)';
$string['base-link-hover-text-decoration'] = 'Decoración de enlaces (hover)';
$string['global-contrast-color'] = 'Color de texto de contraste';
$string['base-heading-font-family'] = 'Cabeceras - Tipo de letra';
$string['base-heading-color'] = 'Cabeceras - Color';
$string['base-heading-font-weight'] = 'Cabeceras - Peso de la letra';


/* Navigation */
$string['group-navbar'] = 'Navegación';
$string['mdl-navbar-side-margin'] = 'Margen lateral';
$string['navbar-background'] = 'Color de fondo';
$string['navbar-gradient-top'] = 'Color de fondo - Degradado superior';
$string['navbar-gradient-bottom'] = 'Color de fondo - Degradado inferior';
$string['navbar-color'] = 'Color del texto';
$string['navbar-border'] = 'Borde';
$string['navbar-border-bottom'] = 'Borde (inferior)';
$string['navbar-text-shadow'] = 'Sombra';
$string['navbar-brand-color'] = 'Brand - Color del texto';
$string['navbar-brand-hover-color'] = 'Brand - Color del texto (hover)';
$string['navbar-link-color'] = 'Color de enlaces';
$string['navbar-link-hover-color'] = 'Color de enlaces (hover)';
$string['navbar-nav-font-family'] = 'Elementos - Tipo de letra';
$string['navbar-nav-font-size'] = 'Elementos - Tamaño de letra';
$string['navbar-nav-font-weight'] = 'Elementos - Peso de la letra';
$string['navbar-nav-color'] = 'Elementos - Color';
$string['navbar-nav-hover-background'] = 'Elementos - Fondo (hover)';
$string['navbar-nav-hover-color'] = 'Elementos - Color (hover)';
$string['navbar-nav-onclick-background'] = 'Elementos - Fondo (click)';
$string['navbar-nav-onclick-color'] = 'Elementos - Texto (click)';
$string['navbar-nav-active-background'] = 'Elementos - Fondo (activo)';
$string['navbar-nav-active-color'] = 'Elementos - Texto (activo)';
$string['dropdown-navbar-background'] = 'Menú desplegable - Fondo';
$string['nav-navbar-hover-background'] = 'Menú desplegable - Fondo (hover)';
$string['nav-navbar-color'] = 'Menú desplegable - Texto';
$string['nav-navbar-hover-color'] = 'Menú desplegable - Texto (hover)';
$string['nav-navbar-nested-color'] = 'Menú desplegable - Enlaces anidados';
$string['nav-navbar-nested-hover-color'] = 'Menú desplegable - Enlaces anidados (hover)';
$string['navbar-toggle-color'] = 'Botón menú lateral - Color';
$string['navbar-toggle-hover-color'] = 'Botón menú lateral - Color (hover)';


/* Main Content */
$string['group-main-region'] = 'Contenido Principal';
$string['mdl-main-region-background'] = 'Color de fondo';
$string['mdl-main-region-border'] = 'Color de borde';
$string['mdl-main-region-padding'] = 'Relleno';


/* Blocks */
$string['group-mdl-blocks'] = 'Bloques';
$string['mdl-block-header-font-family'] = 'Cabecera - Tipo de letra';
$string['mdl-block-header-font-size'] = 'Cabecera - Tamaño de letra';
$string['mdl-block-header-font-weight'] = 'Cabecera - Peso de la letra';
$string['panel-header-title-padding'] = 'Cabecera - Relleno de separación';
$string['panel-header-title-border'] = 'Cabecera - Color del separador';
$string['panel-box-background'] = 'Color de fondo';
$string['panel-box-color'] = 'Color del texto';
$string['panel-box-padding'] = 'Relleno';
$string['panel-box-border'] = 'Borde';
$string['mdl-block-header-icon-color'] = 'Cabecera - Color del icono';
$string['mdl-block-header-text-color'] = 'Cabecera - Color del texto';
$string['mdl-block-icon-color'] = 'Elementos - Color del icono';
$string['mdl-block-text-color'] = 'Elementos - Color del texto';
$string['mdl-block-menu-item-font-family'] = 'Elementos - Tipo de letra';
$string['mdl-block-menu-item-font-size'] = 'Elementos - Tamaño de letra';
$string['mdl-block-menu-item-font-weight'] = 'Elementos - Peso de la letra';
$string['mdl-block-link-color'] = 'Elementos - Enlaces';
$string['mdl-block-link-color-hover'] = 'Elementos - Enlaces (hover)';


/* Alerts */
$string['group-alerts'] = 'Alertas';
$string['alert-background'] = 'Color de fondo';
$string['alert-color'] = 'Color de texto';
$string['alert-border'] = 'Color de borde';
$string['alert-success-background'] = 'Color de fondo (Éxito)';
$string['alert-success-color'] = 'Color del texto (Éxito)';
$string['alert-success-border'] = 'Color del borde (Éxito)';
$string['alert-warning-background'] = 'Color de fondo (Advertencia)';
$string['alert-warning-color'] = 'Color del fondo (Advertencia)';
$string['alert-warning-border'] = 'Color del fondo (Advertencia)';
$string['alert-danger-background'] = 'Color de fondo (Peligro)';
$string['alert-danger-color'] = 'Color del texto (Peligro)';
$string['alert-danger-border'] = 'Color del borde (Peligro)';


/* Buttons */
$string['group-buttons'] = 'Botones';
$string['button-height'] = 'Altura del botón';
$string['button-small-height'] = 'Altura del botón (pequeño)';
$string['button-border'] = 'Color de borde';
$string['button-border-bottom'] = 'Color de borde (inferior)';
$string['button-hover-border'] = 'Color de borde (hover)';
$string['button-contrast-hover-border'] = 'Color de borde (contraste)';
$string['button-text-shadow'] = 'Sombra del texto';
$string['button-contrast-text-shadow'] = 'Sombra del texto (contraste)';
$string['button-gradient-top'] = 'Normal - Degradado (superior)';
$string['button-gradient-bottom'] = 'Normal - Degradado (inferior)';
$string['button-background'] = 'Normal - Fondo';
$string['button-color'] = 'Normal - Texto';
$string['button-hover-background'] = 'Normal - Fondo (hover)';
$string['button-hover-color'] = 'Normal - Texto (hover)';
$string['button-active-background'] = 'Normal - Fondo (activo)';
$string['button-active-color'] = 'Normal - Texto (activo)';
$string['button-primary-gradient-top'] = 'Primario - Degradado (superior)';
$string['button-primary-gradient-bottom'] = 'Primario - Degradado (inferior)';
$string['button-primary-background'] = 'Primario - Fondo';
$string['button-primary-color'] = 'Primario - Texto';
$string['button-primary-hover-background'] = 'Primario - Fondo (hover)';
$string['button-primary-hover-color'] = 'Primario - Texto (hover)';
$string['button-primary-active-background'] = 'Primario - Fondo (activo)';
$string['button-primary-active-color'] = 'Primario - Texto (activo)';
$string['button-success-gradient-top'] = 'Éxito - Degradado (superior)';
$string['button-success-gradient-bottom'] = 'Éxito - Degradado (inferior)';
$string['button-success-background'] = 'Éxito - Fondo';
$string['button-success-color'] = 'Éxito - Texto';
$string['button-success-hover-background'] = 'Éxito - Fondo (hover)';
$string['button-success-hover-color'] = 'Éxito - Texto (hover)';
$string['button-success-active-background'] = 'Éxito - Fondo (activo)';
$string['button-success-active-color'] = 'Éxito - Texto (activo)';
$string['button-danger-gradient-top'] = 'Peligro - Degradado (superior)';
$string['button-danger-gradient-bottom'] = 'Peligro - Degradado (inferior)';
$string['button-danger-background'] = 'Peligro - Fondo';
$string['button-danger-color'] = 'Peligro - Texto';
$string['button-danger-hover-background'] = 'Peligro - Fondo (hover)';
$string['button-danger-hover-color'] = 'Peligro - Texto (hover)';
$string['button-danger-active-background'] = 'Peligro - Fondo (activo)';
$string['button-danger-active-color'] = 'Peligro - Texto (activo)';
$string['button-disabled-background'] = 'Desactivado - Fondo';
$string['button-disabled-color'] = 'Desactivado - Texto';


/* Layout */
$string['group-layout'] = 'Disposición';
$string['mdl-max-page-header-content-width'] = 'Cabecera - Ancho máximo';
$string['mdl-page-header-content-padding'] = 'Cabecera - Relleno';
$string['mdl-max-page-navbar-content-width'] = 'Navegación - Ancho máximo';
$string['mdl-max-page-content-width'] = 'Contenido de Página - Ancho máximo';
$string['mdl-page-top-margin'] = 'Contenido de Página - Márgen superior';
$string['mdl-page-side-margin'] = 'Contenido de Página - Márgen lateral';
$string['mdl-max-page-footer-width'] = 'Pie de página - Ancho máximo';
$string['mdl-max-additional-frontpage-content-width'] = 'Sección de marketing de la página principal - Ancho máximo';


/* Breadcrumbs */
$string['group-breadcrumbs'] = 'Migas de Pan';
$string['mdl-breadcrumb-link-color'] = 'Color de enlaces';
$string['mdl-breadcrumb-link-hover-color'] = 'Color de enlaces (hover)';


/* Go to top Button */
$string['group-to-top-button'] = 'Botón volver arriba';
$string['mdl-to-top-background'] = 'Fondo';
$string['mdl-to-top-shadow-background'] = 'Sombra';
$string['mdl-to-top-color'] = 'Color del icono';
$string['mdl-to-top-background-hover'] = 'Fondo (hover)';
$string['mdl-to-top-shadow-background-hover'] = 'Sombra (hover)';
$string['mdl-to-top-color-hover'] = 'Color del icono (hover)';


/* Login Page */
$string['group-login-page'] = 'Página de Acceso';
$string['mdl-login-box-width'] = 'Caja de acceso - Ancho';
$string['mdl-login-box-background'] = 'Caja de acceso - Fondo';
$string['mdl-login-box-border'] = 'Caja de acceso - Borde';


/* Other */
$string['group-other'] = 'Otros';
$string['global-primary-background'] = 'Fondo primario';
$string['global-primary-gradient-top'] = 'Fondo primario - Degradado (superior)';
$string['global-primary-gradient-bottom'] = 'Fondo primario - Degradado (inferior)';
$string['global-success-background'] = 'Fondo éxito';
$string['global-success-gradient-top'] = 'Fondo éxito - Degradado (superior)';
$string['global-success-gradient-bottom'] = 'Fondo éxito - Degradado (inferior)';
$string['global-danger-background'] = 'Fondo peligro';
$string['global-danger-gradient-top'] = 'Fondo peligro - Degradado (superior)';
$string['global-danger-gradient-bottom'] = 'Fondo peligro - Degradado (inferior)';
$string['mdl-social-heading-color'] = 'Social - Color de título';