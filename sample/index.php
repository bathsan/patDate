<?php
require_once '../vendor/autoload.php';
use bathsan\patdate\Dates;

$fecha = Dates::datetoStringDate('2016-09-06', 'es');

echo $fecha;
?>