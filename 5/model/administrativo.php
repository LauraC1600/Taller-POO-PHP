<?php

require_once __DIR__ . '/Persona.php';

class Administrativo extends Persona
{
    private string $cargo;

    public function __construct($nombre, $documento, $correo, $cargo)
    {
        parent::__construct($nombre, $documento, $correo);
        $this->cargo = $cargo;
    }

    public function getCargo() { return $this->cargo; }

    public function gestionarProceso($proceso)
    {
        return $this->nombre . " gestionó el proceso: " . $proceso;
    }

    public function mostrarInfo()
    {
        return "Administrativo: " . $this->nombre .
               " | Doc: " . $this->documento .
               " | Correo: " . $this->correo .
               " | Cargo: " . $this->cargo;
    }
}