<?php

use Controller\ControladorPelicula;

spl_autoload_register(function(string $class){
    $path = str_replace("\\", "/", $class).'.php';
    $path = 'src/'.$path;
    require $path;
});

require_once __DIR__ . '/view/vistaPelicula.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    mostrarFormularioCantidad();


} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['registrar'])) {
    $cantidad = (int)$_POST['cantidad'];
    mostrarFormulario($cantidad);


} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {

    $controlador = new ControladorPelicula();

    $titulos       = $_POST['titulo'];
    $generos       = $_POST['genero'];
    $duraciones    = $_POST['duracion'];
    $clasificaciones = $_POST['clasificacion'];
    $calificaciones  = $_POST['calificaciones'];

    for ($i = 0; $i < count($titulos); $i++) {
        // Convierte "4,5,3" en un array [4, 5, 3]
        $cals = explode(',', $calificaciones[$i]);
        $calsNumericas = [];
        foreach ($cals as $c) {
            $calsNumericas[] = (float)trim($c);
        }

        $controlador->registrarPelicula(
            $titulos[$i],
            $generos[$i],
            (int)$duraciones[$i],
            $clasificaciones[$i],
            $calsNumericas
        );
    }

    mostrarResultados($controlador->getPeliculas());
}