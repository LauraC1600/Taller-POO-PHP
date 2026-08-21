<?php

require_once __DIR__ . '/Persona.php';

class Docente extends Persona
{
    private array $cursos = [];

    public function __construct($nombre, $documento, $correo)
    {
        parent::__construct($nombre, $documento, $correo);
    }

    public function asignarCurso($nombreCurso)
    {
        $this->cursos[] = $nombreCurso;
    }

    public function registrarCalificacion(Estudiante $estudiante, $nombreCurso, $nota)
    {
        $estudiante->registrarNota($nombreCurso, $nota);
    }

    public function getCursos()
    {
        return $this->cursos;
    }

    public function mostrarInfo()
    {
        return "Docente: " . $this->nombre .
            " | Doc: " . $this->documento .
            " | Correo: " . $this->correo .
            " | Cursos que dicta: " . count($this->cursos);
    }
}
