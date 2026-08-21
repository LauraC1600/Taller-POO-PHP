<?php

function mostrarListados($controlador)
{
    $nombres  = $controlador->getNombresClientes();
    $personas = $controlador->getNombresYCedulasPersonas();
    $empresas = $controlador->getNombresYRepresentantes();
    $menores  = $controlador->getMenoresDeEdad();
    $masJoven = $controlador->getClienteMasJoven();
    $masViejo = $controlador->getClienteMasViejo();

    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Banco - Listados</title>
</head>
<body>
    <h1>Banco Central - Listados de Clientes</h1>";

    echo "<h2>1. Todos los nombres de los clientes</h2><ul>";
    foreach ($nombres as $nombre) {
        echo "<li>" . $nombre . "</li>";
    }
    echo "</ul>";

    echo "<h2>2. Nombres y cedulas de las personas</h2><ul>";
    foreach ($personas as $p) {
        echo "<li>" . $p['nombre'] . " - Cedula: " . $p['cedula'] . "</li>";
    }
    echo "</ul>";

    echo "<h2>3. Nombre y representante de cada empresa</h2><ul>";
    foreach ($empresas as $e) {
        echo "<li>" . $e['nombre'] . " - Representante: " . $e['representante'] . "</li>";
    }
    echo "</ul>";

    echo "<h2>4. Clientes menores de edad</h2><ul>";
    foreach ($menores as $nombre) {
        echo "<li>" . $nombre . "</li>";
    }
    echo "</ul>";

    echo "<h2>5. Cliente mas joven</h2>";
    echo "<p>Nombre: " . $masJoven->obtNombre() . " - Edad: " . $masJoven->obtEdad() . " años</p>";

    echo "<h2>6. Cliente mas viejo</h2>";
    echo "<p>Nombre: " . $masViejo->obtNombre() . " - Edad: " . $masViejo->obtEdad() . " años</p>";

    echo "</body></html>";
}