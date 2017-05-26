<?php
namespace bathsan\patdate\Fechas;
use bathsan\patdate\Fecha;
/*==============================================================================================================================
 * @access public
 * @author Humberto Santos
 * @version 1.1.x-dev
==============================================================================================================================*/
class Usa implements Fecha
{
    // --- ATTRIBUTES ---
    private $_fecha = null;
    private $_dia   = null;
    private $_mes   = null;
    private $_ano   = null;
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
    // Format date ddmmYY to 18 de agosto de 2016 en forma de texto
    public function dmYtoText()
    {
        if (strlen($this->_fecha) == 6) {
            $this->dmYtoSeparate();
        }
        $miFecha= gmmktime(12,0,0, $this->_mes, $this->_dia, $this->_ano);
        return strftime("%A, %B %d %Y", $miFecha);
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
        list($ano, $mes, $dia) = explode("-", $this->_fecha);
        $miFecha= gmmktime(12,0,0, $mes, $dia, $ano);
        return strftime("%A, %B %d %Y", $miFecha);
    }
    // Format mm/dd/YY to 18 de agosto de 2016
    public function dateMDYtoStringDate()
    {
        $returnValue = null;
        list($mes, $dia, $ano) = explode("/", $this->_fecha);
        $miFecha= strtotime($ano."-".$mes."-".$dia." 07:00:00");
        return strftime("%A, %B %d %Y", $miFecha);
    }
    public function dmYtoSeparate()
    {
        $this->_dia = substr($this->_fecha, 0, 2);
        $this->_mes = substr($this->_fecha, 2, 2);
        $this->_ano = substr($this->_fecha, 4, 2);
    }
} 
?>