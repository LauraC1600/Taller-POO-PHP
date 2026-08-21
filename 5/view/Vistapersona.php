<?php

function mostrarFormularioCantidades()
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Plataforma Académica</title>
</head>
<body>
    <h2>Plataforma Académica</h2>
    <h3>Paso 1: ¿Cuántas personas desea registrar?</h3>
    <form method='POST' action=''>
        <input type='hidden' name='paso' value='cantidades'>
        <p>Cantidad de Estudiantes:     <input type='number' name='num_estudiantes' min='1' required></p>
        <p>Cantidad de Docentes:        <input type='number' name='num_docentes' min='1' required></p>
        <p>Cantidad de Administrativos: <input type='number' name='num_administrativos' min='1' required></p>
        <input type='submit' value='Siguiente'>
    </form>
</body>
</html>";
}

function mostrarFormularioDatos($numEst, $numDoc, $numAdm)
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Plataforma Académica</title>
</head>
<body>
    <h2>Plataforma Académica</h2>
    <h3>Paso 2: Datos de las personas</h3>
    <form method='POST' action=''>
    <input type='hidden' name='paso'                value='datos'>
    <input type='hidden' name='num_estudiantes'     value='{$numEst}'>
    <input type='hidden' name='num_docentes'        value='{$numDoc}'>
    <input type='hidden' name='num_administrativos' value='{$numAdm}'>";

    for ($i = 0; $i < $numEst; $i++) {
        echo "<h3>Estudiante " . ($i + 1) . "</h3>
            <p>Nombre: <input type='text' name='est_nombre_{$i}' required></p>
            <p>Documento (solo números): <input type='text' name='est_documento_{$i}' required pattern='[0-9]+'></p>
            <p>Correo: <input type='email' name='est_correo_{$i}' required></p>
            <p>Notas separadas por coma, mínimo 3: <input type='text' name='est_notas_{$i}' required placeholder='Ej: 4.5,3.8,5.0'></p>";
    }

    for ($i = 0; $i < $numDoc; $i++) {
        echo "<h3>Docente " . ($i + 1) . "</h3>
            <p>Nombre: <input type='text' name='doc_nombre_{$i}' required></p>
            <p>Documento (solo números): <input type='text' name='doc_documento_{$i}' required pattern='[0-9]+'></p>
            <p>Correo: <input type='email' name='doc_correo_{$i}' required></p>";
    }

    for ($i = 0; $i < $numAdm; $i++) {
        echo "<h3>Administrativo " . ($i + 1) . "</h3>
            <p>Nombre: <input type='text' name='adm_nombre_{$i}' required></p>
            <p>Documento (solo números): <input type='text' name='adm_documento_{$i}' required pattern='[0-9]+'></p>
            <p>Correo: <input type='email' name='adm_correo_{$i}' required></p>
            <p>Cargo: <input type='text' name='adm_cargo_{$i}' required></p>";
    }

    echo "  <br>
            <input type='submit' value='Registrar y ver resultados'>
    </form>
</body>
</html>";
}

function mostrarResultados($controlador)
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Resultados - Plataforma Académica</title>
</head>
<body>
    <h2>Plataforma Académica — Resultados</h2>
    <p><b>Total de personas registradas: " . $controlador->getTotalPersonas() . "</b></p>
    <hr>";

    echo "<h3>Cursos</h3>";
    foreach ($controlador->getCursos() as $curso) {
        echo "<p>" . $curso->mostrarInfo() . "</p>";
    }

    echo "<hr><h3>Estudiantes</h3>";
    foreach ($controlador->getEstudiantes() as $est) {
        echo "<p>" . $est->mostrarInfo() . "</p>";
        foreach ($est->getNotas() as $curso => $notas) {
            $promedio = $est->calcularPromedio($curso);
            $notasStr = implode(', ', $notas); // implode Es lo contrario de explode, une un array en un string usando un separador
            echo "<p>→ <b>{$curso}</b>: notas [" . $notasStr . "] | Promedio: " . number_format($promedio, 2) . "</p>";

            // number_format Formatea un número decimal con la cantidad de decimales que se le indique.
        }
    }

    echo "<hr><h3>Docentes</h3>";
    foreach ($controlador->getDocentes() as $doc) {
        echo "<p>" . $doc->mostrarInfo() . "</p>";
        if (count($doc->getCursos()) > 0) {
            echo "<p>→ Dicta: " . implode(', ', $doc->getCursos()) . "</p>";
        }
    }

    echo "<hr><h3>Personal Administrativo</h3>";
    foreach ($controlador->getAdministrativos() as $adm) {
        echo "<p>" . $adm->mostrarInfo() . "</p>";
    }

    echo "<br><a href=''>← Registrar nuevas personas</a>
</body>
</html>";
}

function mostrarError($mensaje)
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Error</title>
</head>
<body>
    <h2>Error de validación</h2>
    <p>{$mensaje}</p>
    <a href='javascript:history.back()'>← Volver</a>
</body>
</html>";
}