<?php
require_once '../Model/Contenido.php';

$fecha1 = "$_POST[fechaAltaModificar]";
$fecha2 = date("y-m-d", strtotime($fecha1));

$Animal_Modificar = new Contenido($_POST[idModificar], $fecha2, $_POST[generoModificar],$_POST[edadModificar], $_POST[provinciaModificar],$_POST[tipoModificar]);
$Animal_Modificar->update();

