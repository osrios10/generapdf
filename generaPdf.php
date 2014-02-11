<?php

// Check to ensure this file is included in Joomla!
define('_JEXEC', 1);
define('JPATH_BASE', '/home/ciudadce/public_html/sc/');

define('DS', DIRECTORY_SEPARATOR);
/* Required Files */
require_once ( JPATH_BASE . DS . 'includes' . DS . 'defines.php' );
require_once ( JPATH_BASE . DS . 'includes' . DS . 'framework.php' );
/* To use Joomla's Database Class */
require_once ( JPATH_BASE . DS . 'libraries' . DS . 'joomla' . DS . 'factory.php' );
require_once(JPATH_BASE . DS . 'libraries' . DS . 'html2pdf' . DS . 'html2pdf.class.php');
/* Create the Application */
$mainframe = & JFactory::getApplication('site');
defined('_JEXEC') or die('Restricted access');

$html .= '<div id="conten_info">
            <table id="content_datos"  border="0" style="width:950px" >
                <tr bgcolor="#FFF">
                      <td colspan="3"><img src="templates/atomic/images/cerveceria/home/socio.png"></td>
                </tr>
                <tr id="estado_cuenta"><td colspan="7">Numero de pedido: '.$_GET['pedido'].'</td>
                <td>Imagen</td>
                <td>Art&iacute;culo</td>
                <td>C&oacute;digo</td>
                <td>Puntos</td>
                <td>Sub Total</td></tr>';

$html.=$_SESSION['carttwo'];

$html.='</table></div>';


$html2pdf = new HTML2PDF('P', 'Letter', 'es');
$html2pdf->WriteHTML($html);
$html2pdf->Output('pedido.pdf', 'D');
?>