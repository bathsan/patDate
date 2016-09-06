<?php
namespace bathsan\patdate;

use bathsan\patdate\Fecha;
use bathsan\patdate\Fechas\Usa;
use bathsan\patdate\Fechas\Mex;

/*==============================================================================================================================
 * @access public
 * @author Humberto Santos
 * @version 1.1.x-dev
==============================================================================================================================*/
class Dates
{
	private static $_formato;
    private static $_ignore=false;

	public function __construct($formato, $ignoreFormat=false)
    {
    	self::$_formato = $formato;
    	self::$_ignore = $ignoreFormat;
	}

    /*==============================================================================================================================
    * Funcion para inicializar que debe usar un formato dependiendo el pais la Fecha
    ==============================================================================================================================*/
    public static function datetoStringDate($fecha, $formato=false)
    {
    	if (!self::$_ignore) {
	    	if ($formato) {
	    		self::$_formato = $formato;
	    	}
    	}

    	switch (self::$_formato) {
    		case 'es':
    			$fecha = new Mex($fecha);
    			break;
    		case 'en':
    			$fecha = new Usa($fecha);
    			break;
    		default:
    			$fecha = new Usa($fecha);
    			break;
    	}
    	
    	return $fecha->datetoStringDate();
    }

} 

?>