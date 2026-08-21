<?php

require_once __DIR__ . '/../model/Estudiante.php';
require_once __DIR__ . '/../model/Docente.php';
require_once __DIR__ . '/../model/Administrativo.php';
require_once __DIR__ . '/../model/Curso.php';

class ControladorPlataforma
{
    private array $estudiantes     = [];
    private array $docentes        = [];
    private array $administrativos = [];
    private array $cursos          = [];

    public function validarDocumento($doc)
    {
        return Persona::validarDocumento($doc);
    }

    public function validarCorreo($correo)
    {
        return Persona::validarCorreo($correo);
    }

    public function registrarEstudiante($nombre, $documento, $correo)
    {
        $this->estudiantes[] = new Estudiante($nombre, $documento, $correo);
    }

    public function registrarDocente($nombre, $documento, $correo)
    {
        $this->docentes[] = new Docente($nombre, $documento, $correo);
    }

    public function registrarAdministrativo($nombre, $documento, $correo, $cargo)
    {
        $this->administrativos[] = new Administrativo($nombre, $documento, $correo, $cargo);
    }

    public function registrarCurso($nombreCurso)
    {
        $this->cursos[] = new Curso($nombreCurso);
    }

    public function asignarDocenteACurso($indiceCurso, $indiceDocente)
    {
        if (isset($this->cursos[$indiceCurso]) && isset($this->docentes[$indiceDocente])) {
            $this->cursos[$indiceCurso]->asignarDocente($this->docentes[$indiceDocente]);
        }
    }

    public function inscribirEstudianteEnCurso($indiceCurso, $indiceEstudiante)
    {
        if (isset($this->cursos[$indiceCurso]) && isset($this->estudiantes[$indiceEstudiante])) {
            $this->cursos[$indiceCurso]->agregarEstudiante($this->estudiantes[$indiceEstudiante]);
        }
    }

    public function registrarNotasAlEstudiante($indiceCurso, $indiceEstudiante, array $notas)
    {
        if (!isset($this->cursos[$indiceCurso]) || !isset($this->estudiantes[$indiceEstudiante])) {
            return;
        }
        $curso      = $this->cursos[$indiceCurso];
        $docente    = $curso->getDocente();
        $estudiante = $this->estudiantes[$indiceEstudiante];

        if ($docente) {
            foreach ($notas as $nota) {
                $docente->registrarCalificacion($estudiante, $curso->getNombre(), $nota);
            }
        }
    }

    public function getEstudiantes()
    {
        return $this->estudiantes;
    }
    public function getDocentes()
    {
        return $this->docentes;
    }
    public function getAdministrativos()
    {
        return $this->administrativos;
    }
    public function getCursos()
    {
        return $this->cursos;
    }

    public function getTotalPersonas()
    {
        return Persona::getTotalPersonas();
    }
}
