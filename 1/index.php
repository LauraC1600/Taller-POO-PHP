<?php

use Controller\ControladorCita;

spl_autoload_register(function(string $class){
    $path = str_replace("\\", "/", $class).'.php';
    $path = 'src/'.$path;
    require $path;
});

require_once __DIR__ . '/View/vistaCita.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $numero = (int)$_POST['numero'];
    $tipo   = (int)$_POST['tipo'];
    $tarifa = (float)$_POST['tarifa'];

    $controlador = new ControladorCita();
    $cita = $controlador->crearCita($numero, $tipo, $tarifa);

    mostrarResultado($cita);

} else {
    mostrarFormulario();
}
