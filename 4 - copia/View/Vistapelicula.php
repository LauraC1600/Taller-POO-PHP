<?php

use Model\Pelicula;

function mostrarFormulario($cantidad)
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>CinePlus</title>
</head>
<body>
    <h1>CinePlus - Registro de Peliculas</h1>
    <h2>Ingresa los datos de tus $cantidad pelicula(s)</h2>
    <form method='POST' action=''>";

    // Crea un bloque de campos por cada película
    for ($i = 0; $i < $cantidad; $i++) {
        $num = $i + 1;
        echo "<h3>Pelicula $num</h3>";
        echo "<p>Titulo: <input type='text' name='titulo[]' required></p>";
        echo "<p>Genero: <input type='text' name='genero[]' required></p>";
        echo "<p>Duracion (minutos): <input type='number' name='duracion[]' required min='1'></p>";
        echo "<p>Clasificacion: 
            <select name='clasificacion[]'>
                <option value='G'>G - Todo publico</option>
                <option value='PG'>PG - Con supervision</option>
                <option value='PG-13'>PG-13 - Mayores de 13</option>
                <option value='R'>R - Restringida</option>
            </select>
        </p>";
        echo "<p>Calificaciones (1 a 5, separadas por coma): <input type='text' name='calificaciones[]' placeholder='4,5,3,4' required></p>";
    }

    echo "<br><input type='hidden' name='registrar' value='1'>
        <input type='submit' value='Registrar Peliculas'>
    </form>
</body>
</html>";
}

function mostrarResultados($peliculas)
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>CinePlus - Resultados</title>
</head>
<body>
    <h1>CinePlus - Catalogo de Peliculas</h1>";

    foreach ($peliculas as $pelicula) {
        $promedio    = $pelicula->calcularPromedio();
        $recomendada = $promedio >= 4 ? "SI - Recomendada" : "NO recomendada";

        echo "<hr>
        <p><b>Titulo:</b> " . $pelicula->getTitulo() . "</p>
        <p><b>Genero:</b> " . $pelicula->getGenero() . "</p>
        <p><b>Duracion:</b> " . $pelicula->getDuracion() . " min (" . $pelicula->duracionEnHoras() . ")</p>
        <p><b>Clasificacion:</b> " . $pelicula->getClasificacion() . "</p>
        <p><b>Promedio de calificaciones:</b> " . number_format($promedio, 1) . " / 5</p>
        <p><b>Recomendada:</b> " . $recomendada . "</p>";
    }

    echo "<hr>
    <p><b>Total de peliculas registradas: " . Pelicula::getTotalPeliculas() . "</b></p>
    <br>
    <a href=''>Registrar mas peliculas</a>
</body>
</html>";
}

function mostrarFormularioCantidad()
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>CinePlus</title>
</head>
<body>
    <h1>CinePlus - Registro de Peliculas</h1>
    <form method='POST' action=''>
        <p>Cuantas peliculas desea registrar? 
            <input type='number' name='cantidad' required min='1' max='10'>
        </p>
        <input type='submit' value='Continuar'>
    </form>
</body>
</html>";
}