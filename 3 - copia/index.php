<?php
require_once __DIR__ . '/vendor/autoload.php';

use Controller\ControladorBanco;

// spl_autoload_register(function (string $class) {
//     $path = str_replace("\\", "/", $class) . '.php';
//     $path = 'src/' . $path;
//     require $path;
// });

require_once __DIR__ . '/View/Vistabanco.php';

$controlador = new ControladorBanco();

mostrarListados($controlador);
