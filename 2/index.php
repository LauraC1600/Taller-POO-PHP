<?php

require_once __DIR__ . '/controller/ControladorBus.php';
require_once __DIR__ . '/view/vistaBus.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $placa    = $_POST['placa'];
    $capacidad = (int)$_POST['capacidad'];
    $precio   = (float)$_POST['precio'];
    $subir    = (int)$_POST['subir'];
    $bajar    = (int)$_POST['bajar'];

    $controlador = new ControladorBus();
    $bus = $controlador->crearBus($placa, $capacidad, $precio);

    // Ejecutamos las operaciones y guardamos los mensajes
    $mensajeSubir = $bus->subirPasajeros($subir);
    $mensajeBajar = $bus->bajarPasajeros($bajar);

    mostrarResultadoBus($bus, $mensajeSubir, $mensajeBajar);

} else {
    mostrarFormularioBus();
}
