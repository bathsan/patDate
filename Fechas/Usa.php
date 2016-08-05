<?php
namespace bathsan\patdate;

/*==============================================================================================================================
 * @access public
 * @author Humberto Santos
 * @version 1.1.x-dev
==============================================================================================================================*/
class Usa implements Fecha
{
    // --- ATTRIBUTES ---
    private $_fecha = null;

    /*==============================================================================================================================
    * Se inicializa las variables
    ==============================================================================================================================*/
    public function __construct($fecha)
    {
        $this->_fecha = $fecha;
    }

    /*==============================================================================================================================
    * Funcion para formato USA
    ==============================================================================================================================*/
    // format date mm/dd/YY to ddmmYY
    public function formato()
    {
        $returnValue = null;
        list($mes, $dia, $ano) = explode("/", $this->_fecha);
        $returnValue = $dia.$mes.substr($ano, -2);
        return $returnValue;
    }

    // Format date ddmmYY to mm/dd/YY
    public function revDate()
    {
        if (strlen($this->_fecha) == 6) {
            $dia = substr($this->_fecha, 0, 2);
            $mes = substr($this->_fecha, 2, 2);
            $ano = substr($this->_fecha, 4, 2);
        }

        return $mes."/".$dia."/".$ano;
    }

    // Format date ddmmYY to 
    public function togethertoDate()
    {
        if (strlen($this->_fecha) == 6) {
            $dia = substr($this->_fecha, 0, 2);
            $mes = substr($this->_fecha, 2, 2);
            $ano = substr($this->_fecha, 4, 2);
        }

        $miFecha= gmmktime(12,0,0, $mes, $dia, $ano);

        return strftime("%A, %B %d %Y", $miFecha);
    }

    // Format mm/dd/YY to YYmmdd
    public function formatoMysql()
    {
        $returnValue = null;
        list($mes, $dia, $ano) = explode("/", $this->_fecha);
        $returnValue = $ano.$mes.$dia;
        return $returnValue;
    }

    // Format mm/dd/YY to 18 de agosto de 2016
    public function datetoStringDate()
    {
        $returnValue = null;
        list($mes, $dia, $ano) = explode("/", $this->_fecha);
        $miFecha= gmmktime(12,0,0, $mes, $dia, $ano);
        return strftime("%A, %B %d %Y", $miFecha);
    }
} 
?>