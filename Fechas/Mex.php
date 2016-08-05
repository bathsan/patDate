<?php
namespace bathsan\patdate;

/*==============================================================================================================================
 * @access public
 * @author Humberto Santos
 * @version 1.1.x-dev
==============================================================================================================================*/
class Mex implements Fecha
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
    * Funcion para formato MEX
    ==============================================================================================================================*/
    // format date dd/mm/YY to ddmmYY
    public function formato()
    {
        $returnValue = null;
        list($dia, $mes, $ano) = explode("/", $this->_fecha);
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

        return $dia."/".$mes."/".$ano;
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
        list($dia, $mes, $ano) = explode("/", $this->_fecha);
        $returnValue = $ano.$mes.$dia;
        return $returnValue;
    }
} 
?>