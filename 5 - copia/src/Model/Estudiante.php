<?php

namespace Model;

use Model\Persona;

class Estudiante extends Persona
{
    private array $cursos = [];
    private array $notas  = [];

    public function __construct($nombre, $documento, $correo)
    {
        parent::__construct($nombre, $documento, $correo);
    }

    public function inscribirCurso($nombreCurso)
    {
        $this->cursos[] = $nombreCurso;
        $this->notas[$nombreCurso] = [];
    }

    public function registrarNota($nombreCurso, $nota)
    {
        if (array_key_exists($nombreCurso, $this->notas)) { // array_key_exists Verifica si una clave específica existe dentro de un array.
            $this->notas[$nombreCurso][] = $nota;
        }
    }

    public function calcularPromedio($nombreCurso)
    {
        if (!array_key_exists($nombreCurso, $this->notas) || count($this->notas[$nombreCurso]) === 0) {
            return 0;
        }
        return array_sum($this->notas[$nombreCurso]) / count($this->notas[$nombreCurso]); //array_sum Suma todos los valores de un array.
    }

    public function getCursos()
    {
        return $this->cursos;
    }
    public function getNotas()
    {
        return $this->notas;
    }

    public function mostrarInfo()
    {
        return "Estudiante: " . $this->nombre .
            " | Doc: " . $this->documento .
            " | Correo: " . $this->correo .
            " | Cursos inscritos: " . count($this->cursos);
    }
}
