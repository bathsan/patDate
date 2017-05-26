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
    public static function datetoStringDate($fechaString, $formato=false)
    {
    	if (!self::$_ignore) {
	    	if ($formato) {
	    		self::$_formato = $formato;
	    	}
    	}

    	switch (self::$_formato) {
    		case 'es':
    			$fecha = new Mex($fechaString);
    			break;
    		case 'en':
    			$fecha = new Usa($fechaString);
    			break;
    		default:
    			$fecha = new Usa($fechaString);
    			break;
    	}
    	
    	return $fecha->datetoStringDate();
    }

    /*==============================================================================================================================
    * Funcion para inicializar que debe usar un formato dependiendo el pais la Fecha
    ==============================================================================================================================*/
    public static function dateMDYtoStringDate($fechaString, $formato=false)
    {
        if (!self::$_ignore) {
            if ($formato) {
                self::$_formato = $formato;
            }
        }

        switch (self::$_formato) {
            case 'es':
                $fecha = new Mex($fechaString);
                break;
            case 'en':
                $fecha = new Usa($fechaString);
                break;
            default:
                $fecha = new Usa($fechaString);
                break;
        }
        
        return $fecha->dateMDYtoStringDate();
    }

    /*==============================================================================================================================
    * Funcion para pasar una fecha de formato ddmmYY to dd de(of) mm del(of) YYYY 
    ==============================================================================================================================*/
    public static function dmYtoText($fechaString, $formato=false)
    {
        if (!self::$_ignore) {
            if ($formato) {
                self::$_formato = $formato;
            }
        }

        switch (self::$_formato) {
            case 'es':
                $fecha = new Mex($fechaString);
                break;
            case 'en':
                $fecha = new Usa($fechaString);
                break;
            default:
                $fecha = new Usa($fechaString);
                break;
        }
        
        return $fecha->dmYtoText();
    }

} 

?>