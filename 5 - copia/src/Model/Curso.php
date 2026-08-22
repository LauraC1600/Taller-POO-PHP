<?php

namespace Model;

use Model\Docente;
use Model\Estudiante;

class Curso
{
    private string $nombre;
    private ?Docente $docente = null; // el ? indica que resive valores nulos 
    private array $estudiantes = [];

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDocente()
    {
        return $this->docente;
    }
    public function getEstudiantes()
    {
        return $this->estudiantes;
    }

    public function asignarDocente(Docente $docente)
    {
        $this->docente = $docente;
        $docente->asignarCurso($this->nombre);
    }

    public function agregarEstudiante(Estudiante $estudiante)
    {
        $this->estudiantes[] = $estudiante;
        $estudiante->inscribirCurso($this->nombre);
    }

    public function mostrarInfo()
    {
        $nombreDocente = $this->docente !== null ? $this->docente->getNombre() : "Sin asignar";
        return "Curso: " . $this->nombre .
            " | Docente: " . $nombreDocente .
            " | Estudiantes: " . count($this->estudiantes);
    }
}
