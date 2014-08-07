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
$string['footerimagedesc'] = 'Por favor suba su imagen personalizada aquí si quieres añadirla al pie de página'.
		'<br>Si sube una imagen aparecerá encima del HTML personalizado del pie (si lo hay).';
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Por favor suba aquí su favicon personalizado si quiere añadirlo a la página';

$string['bootstrapcdn'] = 'FontAwesome de CDN';
$string['bootstrapcdndesc'] = 'Si se activa, carga la fuenta FontAwesome  del CDN online de Bootstrap. Activa esta opción si tienes problemas para mostrar los iconos de Font Awesome en tu sitio.';
$string['copyright'] = 'Copyright';
$string['copyrightdesc'] = 'El nombre de su organización.';

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

/* CustomMenu */
$string['custommenuheading'] = 'Menú Personalizado';
$string['custommenuheadingsub'] = 'Añadir funcionalidad personalizada tu menú.';
$string['custommenudesc'] = 'Estos ajustes afectan al menú personalizado (menú desplegable)';

$string['mydashboardinfo'] = 'Mi panel de control';
$string['mydashboardinfodesc'] = 'Muestra una lista de funciones comunes utilizadas por los usuarios.';
$string['displaymydashboard'] = 'Mostrar Mi panel de control';
$string['displaymydashboarddesc'] = 'Mostrar el panel de control con enlaces de usuario en el menú';

$string['mycoursesinfo'] = 'Lista dinámica de cursos matriculados';
$string['mycoursesinfodesc'] = 'Muestra una lista de cursos matriculados al usuario.';
$string['displaymycourses'] = 'Mostrar cursos matriculados';
$string['displaymycoursesdesc'] = 'Muestra una lista de cursos matriculados al usuario en el menú.';
$string['displaymycoursesmode'] = 'Modo de mostrar los cursos matriculados';
$string['displaymycoursesmodedesc'] = 'Esta opción define la manera en la que se listan los cursos matriculados en el menú';
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
$string['slideshowcolor'] = 'Color principal de las diapositivas';

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

$string['slideshowbordercolor'] = 'Color del borde de las diapositivas';
$string['slideshowtitlecolor'] = 'Color del título de las diapositivas';
$string['slideshowcaptioncolor'] = 'Color del subtítulos de las diapositivas';
$string['slideshowbuttoncolor'] = 'Color del botón de las diapositivas';
$string['slideshowbuttontextcolor'] = 'Color del texto del botón de las diapositivas';

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
$string['iosicondesc'] = 'El tema proporciona un icono por defecto para los menús principales de iOS y Android. Puedes subir uno personalizado si lo deseas.';

$string['iphoneicon'] = 'iPhone/iPod Touch Icon (No Retina)';
$string['iphoneicondesc'] = 'El icono debería ser una imagen PN de 57px por 57px';

$string['iphoneretinaicon'] = 'iPhone/iPod Touch Icon (Retina)';
$string['iphoneretinaicondesc'] = 'El icono debería ser una imagen PN de 114px por 114px';

$string['ipadicon'] = 'iPad Icon (No Retina)';
$string['ipadicondesc'] = 'El icono debería ser una imagen PN de 72px por 72px';

$string['ipadretinaicon'] = 'iPad Icon (Retina)';
$string['ipadretinaicondesc'] = 'El icono debería ser una imagen PN de 144px por 144px';

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
$string['analyticscleandesc'] = 'Esta fantástica característica fue creada por <a href="https://moodle.org/user/profile.php?id=281671" target="_blank">Gavin Henrick</a> and <a href="https://moodle.org/user/view.php?id=907814" target="_blank">Bas Brands</a> y es implementada en este tema.'
        . ' En lugar de enviar URLs Moodle estandar el tema enviará URLs limpias facilitando la identificación de la página y proporcionando información avanzada. Más información puede <b><a href="http://www.somerandomthoughts.com/blog/2012/04/18/ireland-uk-moodlemoot-analytics-to-the-front/" target="_blank">encontrarse aquí</a></b>.';

$string['analyticsadmin'] = 'Tracking de Usuarios Administradores';
$string['analyticsadmindesc'] = 'Activar para habilitar el tracking de usuarios administradores.';

/* Google Fonts */
$string['googlefontsheading'] = 'Google Fonts';
$string['googlefontsheadingsub'] = 'Aquí puedes añadir hasta 10 tipos de letra de Google Fonts que estarán disponibles en todas las páginas de Moodle';
$string['googlefontname'] = 'Tipo de letra {$a->number}';
$string['googlefontsnofont'] = '--Ningún tipo de letra--';

include dirname(__FILE__).'/customizer.php';