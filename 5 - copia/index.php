<?php
require_once __DIR__ . '/vendor/autoload.php';

use Controller\ControladorPersona;

// spl_autoload_register(function (string $class) {
//     $path = str_replace("\\", "/", $class) . '.php';
//     $path = __DIR__ . '/src/' . $path;
//     require $path;
// });

require_once __DIR__ . '/view/vistaPersona.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    mostrarFormularioCantidades();
    exit;
}

if ($_POST['paso'] === 'cantidades') {
    $numEst = (int)$_POST['num_estudiantes'];
    $numDoc = (int)$_POST['num_docentes'];
    $numAdm = (int)$_POST['num_administrativos'];
    mostrarFormularioDatos($numEst, $numDoc, $numAdm);
    exit;
}

if ($_POST['paso'] === 'datos') {

    $numEst = (int)$_POST['num_estudiantes'];
    $numDoc = (int)$_POST['num_docentes'];
    $numAdm = (int)$_POST['num_administrativos'];

    $controlador = new ControladorPersona();

    for ($i = 0; $i < $numDoc; $i++) {
        $nombre    = trim($_POST["doc_nombre_{$i}"]); // trim Elimina los espacios en blanco al inicio y al final de un string.
        $documento = trim($_POST["doc_documento_{$i}"]);
        $correo    = trim($_POST["doc_correo_{$i}"]);

        if (!$controlador->validarDocumento($documento)) {
            mostrarError("El documento del Docente " . ($i + 1) . " contiene caracteres no numéricos.");
            exit;
        }
        if (!$controlador->validarCorreo($correo)) {
            mostrarError("El correo del Docente " . ($i + 1) . " no es válido.");
            exit;
        }
        $controlador->registrarDocente($nombre, $documento, $correo);
    }

    for ($i = 0; $i < $numEst; $i++) {
        $nombre    = trim($_POST["est_nombre_{$i}"]);
        $documento = trim($_POST["est_documento_{$i}"]);
        $correo    = trim($_POST["est_correo_{$i}"]);
        $notasRaw  = trim($_POST["est_notas_{$i}"]);

        if (!$controlador->validarDocumento($documento)) {
            mostrarError("El documento del Estudiante " . ($i + 1) . " contiene caracteres no numéricos.");
            exit;
        }
        if (!$controlador->validarCorreo($correo)) {
            mostrarError("El correo del Estudiante " . ($i + 1) . " no es válido.");
            exit;
        }


        // explode Divide un string en un array usando un separador.

        $notas = array_map('floatval', explode(',', $notasRaw)); // array_map Recorre un array y aplica una función a cada elemento, devolviendo un array nuevo.
        if (count($notas) < 3) {
            mostrarError("El Estudiante " . ($i + 1) . " debe tener al menos 3 notas.");
            exit;

            // floatval 	convierte cada elemento de texto a número decimal
        }

        $controlador->registrarEstudiante($nombre, $documento, $correo);

        $nombreCurso = "Curso " . ($i + 1);
        $controlador->registrarCurso($nombreCurso);
        $controlador->asignarDocenteACurso($i, 0);
        $controlador->inscribirEstudianteEnCurso($i, $i);
        $controlador->registrarNotasAlEstudiante($i, $i, $notas);
    }

    for ($i = 0; $i < $numAdm; $i++) {
        $nombre    = trim($_POST["adm_nombre_{$i}"]);
        $documento = trim($_POST["adm_documento_{$i}"]);
        $correo    = trim($_POST["adm_correo_{$i}"]);
        $cargo     = trim($_POST["adm_cargo_{$i}"]);

        if (!$controlador->validarDocumento($documento)) {
            mostrarError("El documento del Administrativo " . ($i + 1) . " contiene caracteres no numéricos.");
            exit;
        }
        if (!$controlador->validarCorreo($correo)) {
            mostrarError("El correo del Administrativo " . ($i + 1) . " no es válido.");
            exit;
        }
        $controlador->registrarAdministrativo($nombre, $documento, $correo, $cargo);
    }

    mostrarResultados($controlador);
}
