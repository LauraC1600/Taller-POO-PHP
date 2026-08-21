<?php

require_once __DIR__ . '/controller/ControladorBanco.php';
require_once __DIR__ . '/view/vistaBanco.php';

$controlador = new ControladorBanco();

mostrarListados($controlador);