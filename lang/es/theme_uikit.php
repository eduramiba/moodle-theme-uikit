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
$string['choosereadme'] = 'Tema construido con UIKit. Incluye un gestor de estilos visual avanzado';

/* General */
$string['panel'] = 'Panel';
$string['visualstylemanager'] = 'Gestor visual de estilos para UIKit';
$string['geneicsettings'] = 'Ajustes generales';
$string['autohide'] = 'Incluir funcionalidad de ocultamiento automático';
$string['autohidedesc'] = 'La funcionalidad de ocultamiento automático está diseñada para hacer menos confusa la interface de la plataforma. Al estar activo el modo de edición, los iconos de modificación solo aparecerán al ubicarse sobre cada bloque.';
$string['footnote'] = 'Nota al pie de página';
$string['footnotedesc'] = 'Cualquier texto que agregue en este campo se mostará en el pie de página de todo su sitio Moodle';

$string['logo'] = 'Logotipo';
$string['logodesc'] = 'Por favor suba su logotipo personalizado aquí si quiere agregarlo a la cabecera de la página.<br>Si usted sube un logotipo, este reemplazará el ícono y texto mostrado por defecto.';
$string['footerimage'] = 'Imagen del Pie';
$string['footerimagedesc'] = 'Por favor suba su imagen personalizada aquí si quiere añadirla al pie de página. <br>Si sube una imagen aparecerá encima del HTML personalizado del pie (si lo hay).';
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Por favor suba aquí su favicon personalizado si quiere añadirlo a la página';

$string['bootstrapcdn'] = 'FontAwesome de CDN';
$string['bootstrapcdndesc'] = 'Si se activa, carga la fuenta FontAwesome  del CDN online de Bootstrap. Activa esta opción si tienes problemas para mostrar los iconos de Font Awesome en tu sitio.';
$string['copyright'] = 'Copyright';
$string['copyrightdesc'] = 'El nombre de su organización.';
$string['showmoodledocs'] = 'Mostrar la sección "Moodle Docs para esta página" en el pie';

$string['contactinfo'] = 'Información de contacto';
$string['contactinfodesc'] = 'Introduzca su información de contacto';
$string['siteicon'] = 'Ícono del sitio';
$string['siteicondesc'] = '¿No tiene un logotipo? Coloque el nombre del icono que desea utilizar. La lista está <a href="http://www.getuikit.com/docs/icon.html" target="_blank">aquí</a>. Sólo coloque lo que está después de "uk-icon-". ';
$string['headerprofilepic'] = 'Mostrar fotografía del usuario';
$string['headerprofilepicdesc'] = 'Si se selecciona, se mostrará la fotografía del perfil del usuario en el encabezado del sitio.';

$string['frontpageblocks'] = 'Alineación de los bloques de la página principal';
$string['frontpageblocksdesc'] = 'Aquí puede determinar si los bloques de la página principal aparecen en la parte izquierda o derecha de la página';
$string['left'] = 'Izquierda';
$string['right'] = 'Derecha';

$string['visibleadminonly'] = 'Los bloques colocados en esta área serán vistos únicamente por los administradores';
$string['backtotop'] = 'Volver arriba';
$string['nextsection'] = 'Siguiente Sección';
$string['previoussection'] = 'Sección Anterior';

$string['alwaysdisplay'] = 'Mostrar siempre';
$string['displaybeforelogin'] = 'Mostrar antes de identificarse sólamente';
$string['displayafterlogin'] = 'Mostrar despúes de identificarse sólamente';
$string['dontdisplay'] = 'Nunca mostrar';

$string['footerblocks'] = 'Activar bloques del pie de página';
$string['footerblocksdesc'] = 'Si se activa muestra 3 lugares adicionales donde colocar bloques en el pie de página';

$string['componentclass-normal'] = 'Normal';
$string['componentclass-primary'] = 'Primario';
$string['componentclass-success'] = 'Éxito';
$string['componentclass-danger'] = 'Peligro';
$string['componentclass-link'] = 'Enlace';

$string['componentplacement-center'] = 'Centrado';
$string['componentplacement-top'] = 'Superior';
$string['componentplacement-bottom'] = 'Inferior';
$string['componentplacement-left'] = 'Izquierda';
$string['componentplacement-right'] = 'Derecha';

/* CustomMenu */
$string['custommenuheading'] = 'Menú Personalizado';
$string['custommenuheadingsub'] = 'Añadir funcionalidad personalizada tu menú.';
$string['custommenudesc'] = 'Estos ajustes afectan al menú personalizado (menú desplegable)';

$string['mydashboardinfo'] = 'Mi panel de control';
$string['mydashboardinfodesc'] = 'Muestra una lista de funciones comunes utilizadas por los usuarios.';
$string['displaymydashboard'] = 'Mostrar Mi panel de control';
$string['displaymydashboarddesc'] = 'Mostrar el panel de control con enlaces de usuario en el menú';

$string['displaysitename'] = 'Mostrar el nombre del sitio';
$string['mycoursesinfo'] = 'Lista dinámica de cursos matriculados';
$string['mycoursesinfodesc'] = 'Muestra una lista de cursos matriculados al usuario.';
$string['displaymycourses'] = 'Mostrar cursos matriculados';
$string['displaymycoursesdesc'] = 'Muestra una lista de cursos matriculados al usuario en el menú.';
$string['displaymycoursesmode'] = 'Modo de mostrar los cursos matriculados';
$string['displaymycoursesmodedesc'] = 'Esta opción define la manera en la que se listan los cursos matriculados en el menú';
$string['displayloggedusermode'] = 'Modo de mostrar el usuario identificado';
$string['displayloggedusermodedesc'] = 'Esta preferencia define cómo se muestra el usuario identificado en el menú personalizado';
$string['displayloggedusermodecomplete'] = 'Información completa';
$string['displayloggedusermodeshort'] = 'Información acortada';
$string['displayloggedusermodeonlylogout'] = 'Sólamente opción de salir';
$string['displayloggedusermodehide'] = 'Ocultar';
$string['courselist'] = 'Mostrar lista simple de cursos';
$string['onlytoplevelhierarchy'] = 'Mostrar listas de cursos bajo su categoría de mayor nivel';
$string['fullhierarchy'] = 'Mostrar los cursos con jerarquía completa de categorías';

$string['mycoursetitle'] = 'Teminología';
$string['mycoursetitledesc'] = 'Cambiar la terminología del elemento "Mis Cursos" en el menú desplegable';
$string['mycourses'] = 'Mis Cursos';
$string['myunits'] = 'Mis Unidades';
$string['mymodules'] = 'Mis Módulos';
$string['myclasses'] = 'Mis Clases';
$string['mysubjects'] = 'Mis Asignaturas';
$string['allcourses'] = 'Todos los Cursos';
$string['allunits'] = 'Todas las Unidades';
$string['allmodules'] = 'Todos los Módulos';
$string['allclasses'] = 'Todas las Clases';
$string['allsubjects'] = 'Todas las Asignaturas';
$string['noenrolments'] = 'No estás matriculado';

/* My Dashboard custommenu dropdown */
$string['mydashboard'] = 'Mi panel de control';

/* Regions */
$string['region-side-post'] = 'Derecha';
$string['region-side-pre'] = 'Izquierda';
$string['region-home-up'] = 'Página Principal (Arriba)';
$string['region-home-left'] = 'Página Principal (Izquierda)';
$string['region-home-middle'] = 'Página Principal (Centro)';
$string['region-home-right'] = 'Página Principal (Derecha)';
$string['region-home-down'] = 'Página Principal (Abajo)';
$string['region-footer-left'] = 'Pie de página (Izquierda)';
$string['region-footer-middle'] = 'Pie de página (Centro)';
$string['region-footer-right'] = 'Pie de página (Derecha)';
$string['region-hidden-dock'] = 'Oculto para los usuarios';

/* Background Images */
$string['pagebackground'] = 'Imagen de fondo de página';
$string['pagebackgrounddesc'] = 'Sube tu propia imagen de fondo para la página. Será repetida en el fondo de todas las páginas.';
$string['headerbackground'] = 'Imagen de fondo de cabecera';
$string['headerbackgrounddesc'] = 'Sube tu propia imagen de fondo para la cabecera. Será repetida en el fondo de la cabecera de todas las páginas.';
$string['footerbackground'] = 'Imagen de fondo de pie de página';
$string['footerbackgrounddesc'] = 'Sube tu propia imagen de fondo para el pie de página. Será repetida en el fondo del pie de página de todas las páginas.';


/* Frontpage Settings */
$string['frontcontentheading'] = 'Ajustes de la Página Inicial';
$string['frontcontentheadingsub'] = 'Cambia qué características activar en la página inicial';
$string['frontcontentdesc'] = 'Añade un área de contenido personalizado al principio de la caja principal de la página inicial';

$string['usefrontcontent'] = 'Activar contenido personalizado';
$string['usefrontcontentdesc'] = 'Si se activa, mostrará el contenido personalizado al principio de la caja principal de la página inicial.';

$string['frontcontentarea'] = 'Contenido personalizado';
$string['frontcontentareadesc'] = 'Lo que se escriba aquí aparecerá al principio de la caja principal de la página inicial';

$string['frontpagemiddleblocks'] = 'Activar bloques centrales';
$string['frontpagemiddleblocksdesc'] = 'Si se activa muestra 3 lugares adicionales donde colocar bloques debajo del contenido personalizado y otros 2 lugares adicionales de ancho completo encima y debajo de los 3 bloques';

$string['combolistshowonlyenrrolled'] = 'Mostrar solamente cursos matriculados en la lista combo';
$string['combolistshowonlyenrrolleddesc'] = 'Si está activado, al utilizar una lista combo en la pagina principal, solamente se mostrarán las categorías y cursos en los que el usuario esté matriculado';

/* Login Page Settings */
$string['loginpageheading'] = 'Ajustes de la página de Login';
$string['loginpagehasheader'] = 'Mostrar Cabecera';
$string['loginpagehasnavigation'] = 'Mostrar Navegación';
$string['loginpagehasfooter'] = 'Mostrar Pie';
$string['loginheaderimage'] = 'Imagen de la cabecera de la caja de login';
$string['loginheaderimagedesc'] = 'Si se sube una imagen, reemplazará la cabecera de la caja de login';

/* Slideshow */
$string['slideshowheading'] = 'Diapositivas de Página Inicial';
$string['slideshowheadingsub'] = 'Diapositivas Dinámicas para la Página Inicial';
$string['slideshowdesc'] = 'Esto genera un carrusel de hasta 4 diapositivas que le permiten promover elementos importantes de su sitio.';

$string['slideshownumber'] = 'Número de diapositivas';

$string['toggleslideshow'] = 'Mostrar/Ocultar diapositivas';
$string['toggleslideshowdesc'] = 'Elige si quieres ocultar o mostrar las diapositivas.';

$string['hideonphone'] = 'Oculto para Móviles';
$string['hideonphonedesc'] = 'Escoja si desea mostrar el carrusel en móviles';
$string['readmore'] = 'Leer más';

$string['slideheader'] = 'Diapositiva {$a->n}';

$string['slidetitle'] = 'Título de la Diapositiva';
$string['slideimage'] = 'Imagen de la Diapositiva';
$string['slidecaption'] = 'Subtítulo de la Diapositiva';
$string['slideurl'] = 'Enlace del botón de la diapositiva';
$string['slideurltext'] = 'Texto del botón de la diapositiva';
$string['slidecaptionplacement'] = 'Disposición de la leyenda de la diapositiva';

$string['slideshowtitlecolor'] = 'Color del título de las diapositivas';
$string['slideshowcaptioncolor'] = 'Color del subtítulo de las diapositivas';
$string['slideshowarrowscolor'] = 'Color de las flechas de navegación';
$string['slideshowbuttontype'] = 'Tipo de botón de las diapositivas';

$string['slideshowautoplay'] = 'Activar avance automático';
$string['slideshowanimation'] = 'Animación del carrusel de diapositivas';
$string['slideshowkenburns'] = 'Activar efecto ken burns';

$string['slideshowanimation-fade'] = 'Desvanecer';
$string['slideshowanimation-scroll'] = 'Desplazar';
$string['slideshowanimation-scale'] = 'Escalar';
$string['slideshowanimation-swipe'] = 'Pasar';
$string['slideshowanimation-slice-down'] = 'Trocear hacia abajo';
$string['slideshowanimation-slice-up'] = 'Trocear hacia arriba';
$string['slideshowanimation-slice-up-down'] = 'Trocear hacia arriba y abajo';
$string['slideshowanimation-fold'] = 'Plegar';
$string['slideshowanimation-puzzle'] = 'Puzzle';
$string['slideshowanimation-boxes'] = 'Cajas';
$string['slideshowanimation-boxes-reverse'] = 'Cajas inverso';
$string['slideshowanimation-random-fx'] = 'Aleatorio';

/* Marketing Spots */
$string['marketingheading'] = 'Spots Publicitarios';
$string['marketingheadingsub'] = 'Bloques en la página principal diseñados para agregar información y enlaces';
$string['marketingdesc'] = 'Este tema ofrece la opción de habilitar tres "spots publicitarios" justo debajo del carrusel de diapositivas. Estos le permitirán identificar fácilmente información importante para sus usuarios y proveer enlaces directos.';
$string['togglemarketing'] = 'Intercambiar Pantalla de Spot Publicitario';
$string['togglemarketingdesc'] = 'Escoja si desea mostrar o esconder los tres Spots Publicitarios.';

$string['marketing1'] = 'Bloque Publicitario Uno';
$string['marketing2'] = 'Bloque Publicitario Dos';
$string['marketing3'] = 'Bloque Publicitario Tres';

$string['marketinginfodesc'] = 'Introduce los ajustes de tu bloque publicitario.';
$string['marketingtitle'] = 'Título';
$string['marketingtitledesc'] = 'Título a mostrar en el bloque publicitario';
$string['marketingicon'] = 'Icono';
$string['marketingicondesc'] = 'Nombre del ícono que desea usar. La lista de íconos disponibles esta <a href="http://www.getuikit.com/docs/icon.html" target="_new">aquí</a>. Solo coloque lo que esta justo después de "icon-".';
$string['marketingimage'] = 'Imagen';
$string['marketingimagedesc'] = 'Este tema ofrece la opción de desplegar una imagen sobre el texto en el bloque publicitario';
$string['marketingcontent'] = 'Contenido';
$string['marketingcontentdesc'] = 'Contenido a mostrar en el spot publicitario. Manténgalo corto y genial.';
$string['marketingbuttontext'] = 'Texto del enlace';
$string['marketingbuttontextdesc'] = 'Texto que aparecerá en el botón.';
$string['marketingbuttonurl'] = 'URL del enlace';
$string['marketingbuttonurldesc'] = 'URL al que apunta el botón.';
        
/* Social Networks */
$string['socialheading'] = 'Redes Sociales';
$string['socialheadingsub'] = 'Enlace a sus usuarios con sus Redes Sociales';
$string['socialdesc'] = 'Provea enlaces directos a las principales redes sociales que usa para promover su marca. Esta sección aparecerá en la cabecera de todas las páginas.';
$string['socialnetworks'] = 'Redes Sociales';
$string['facebook'] = 'Facebook URL';
$string['facebookdesc'] = 'Introduzca el URL de su página en Facebook. (ej. http://www.facebook.com/mycollege)';

$string['twitter'] = 'Twitter URL';
$string['twitterdesc'] = 'Introduzca el URL de su cuenta de Twitter. (ej. http://www.twitter.com/mycollege)';

$string['googleplus'] = 'Google+ URL';
$string['googleplusdesc'] = 'Introduzca el URL de su perfil en Google+. (ej. http://plus.google.com/107817105228930159735)';

$string['linkedin'] = 'LinkedIn URL';
$string['linkedindesc'] = 'Introduzca el URL de su perfil en LinkedIn. (ej. http://www.linkedin.com/company/mycollege)';

$string['youtube'] = 'YouTube URL';
$string['youtubedesc'] = 'Introduzca el URL de su canal en YouTube. (ej. http://www.youtube.com/mycollege)';

$string['flickr'] = 'Flickr URL';
$string['flickrdesc'] = 'Introduzca el URL de su página en Flickr. (ej. http://www.flickr.com/mycollege)';

$string['vk'] = 'VKontakte URL';
$string['vkdesc'] = 'Introduzca el URL de su página en Vkontakte. (ej. http://www.vk.com/mycollege)';

$string['skype'] = 'Cuenta de Skype';
$string['skypedesc'] = 'Introduzca el nombre de usuario de Skype utilizado por su organización.';

$string['pinterest'] = 'Pinterest URL';
$string['pinterestdesc'] = 'Introduzca el URL de su página en Pinterest. (ej. http://pinterest.com/mycollege)';

$string['instagram'] = 'Instagram URL';
$string['instagramdesc'] = 'Introduzca el URL de su página en Instagram. (ej. http://instagram.com/mycollege)';

$string['website'] = 'URL de su sitio web';
$string['websitedesc'] = 'Introduzca el URL de su sitio web institucional. (ej. http://www.pukunui.com)';

/* iOS Icons */
$string['iosicon'] = 'Iconos para iOS';
$string['iosicondesc'] = 'El tema proporciona un icono por defecto para los menús principales de iOS, Android y Windows. Puedes subir uno personalizado si lo deseas.';

$string['iphoneicon'] = 'iPhone/iPod Touch Icon (No Retina)';
$string['iphoneicondesc'] = 'El icono debería ser una imagen PNG de 57px por 57px';

$string['iphoneretinaicon'] = 'iPhone/iPod Touch Icon (Retina)';
$string['iphoneretinaicondesc'] = 'El icono debería ser una imagen PNG de 114px por 114px';

$string['ipadicon'] = 'iPad Icon (No Retina)';
$string['ipadicondesc'] = 'El icono debería ser una imagen PNG de 72px por 72px';

$string['ipadretinaicon'] = 'iPad Icon (Retina)';
$string['ipadretinaicondesc'] = 'El icono debería ser una imagen PNG de 144px por 144px';

/* Mobile Apps */
$string['mobileappsheading'] = 'Aplicaciones móviles';
$string['mobileappsheadingsub'] = 'Ofrezca enlaces sus aplicaciones móviles a sus usuarios';
$string['mobileappsdesc'] = '¿Posee una aplicación registrada en App Store o Google Play Store? Ofrezca aquí en enlace para que sus usuarios puedan aprovecharlas';

$string['android'] = 'Android (Google Play)';
$string['androiddesc'] = 'URL de su aplicación móvil en Google Play Store. Si usted no posee una propia, tal vez podría considerar enlazar la aplicación oficial gratuita que Moodle proporciona.';

$string['ios'] = 'iPhone/iPad (App Store)';
$string['iosdesc'] = 'URL de su aplicación móvil en App Store. Si usted no posee una propia, tal vez podría considerar enlazar la aplicación oficial gratuita que Moodle proporciona.';

/* Google Analytics */
$string['analyticsheading'] = 'Google Analytics';
$string['analyticsheadingsub'] = 'Potentes análisis de Google';
$string['analyticsdesc'] = 'Aquí puedes habilitar Google Analytics para tu sitio moodle. Necesitaras crear una cuenta gratuita en el sitio de Google Analytics (<a href="http://analytics.google.com" target="_blank">http://analytics.google.com</a>)';

$string['useanalytics'] = 'Habilitar Google Analytics';
$string['useanalyticsdesc'] = 'Habilitar o deshabilitar Google Analytics.';

$string['analyticsid'] = 'Tracking ID';
$string['analyticsiddesc'] = 'Introduce el Tracking ID proporcionado. Normalmente tiene el formato UA-XXXXXXXX-X';

$string['analyticsclean'] = 'Enviar URLs limpias';
$string['analyticscleandesc'] = 'Esta fantástica característica fue creada por <a href="https://moodle.org/user/profile.php?id=281671" target="_blank">Gavin Henrick</a> and <a href="https://moodle.org/user/view.php?id=907814" target="_blank">Bas Brands</a> y es implementada en este tema. En lugar de enviar URLs Moodle estandar el tema enviará URLs limpias facilitando la identificación de la página y proporcionando información avanzada. Más información puede <b><a href="http://www.somerandomthoughts.com/blog/2012/04/18/ireland-uk-moodlemoot-analytics-to-the-front/" target="_blank">encontrarse aquí</a></b>.';

$string['analyticsadmin'] = 'Tracking de Usuarios Administradores';
$string['analyticsadmindesc'] = 'Activar para habilitar el tracking de usuarios administradores.';

/* Google Fonts */
$string['googlefontsheading'] = 'Google Fonts';
$string['googlefontsheadingsub'] = 'Aquí puedes añadir hasta 10 tipos de letra de Google Fonts que estarán disponibles en todas las páginas de Moodle';
$string['googlefontname'] = 'Tipo de letra {$a->number}';
$string['googlefontsnofont'] = '--Ningún tipo de letra--';













/********************************************/
/* Visual styles customizer related strings. */
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
$string['warning_saved_styles_different_theme_version'] = 'Parece que existen estilos personalizados para el sitio guardados con una versión antigua del tema UIKit';
$string['warning_saved_styles_different_theme_version_action'] = 'Por favor actualiza los estilos del tema entrando en el gestor visual de estilos y pulsando en guardar';
$string['page_description'] = 'Esta página permite personalizar el estilo y comportamiento de tu sitio.';
$string['page_description_sub'] = 'Puedes configurar el logo, favicon y otras muchas opciones aquí.';

$string['uikit_not_selected'] = 'El tema UIKit no está seleccionado actualmente.';
$string['uikit_select_link'] = 'Por favor selecciónalo aquí';
$string['styleswritepermissionsfail'] = 'Error: No se pudo escribir en el directorio theme/uikit/styles. Por favor comprueba que tu servidor web tiene permisos de escritura en este directorio';

/* Javascript (customizer.js) internationalization strings */
$string['js-ok'] = 'Ok';
$string['js-home'] = 'Home';
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
