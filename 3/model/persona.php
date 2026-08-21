<?php

require_once __DIR__ . '/Cliente.php';

class Persona extends Cliente
{
    private string $cedula;
    private int $edad;

    public function __construct($cedula, $nombre, $edad)
    {
        parent::__construct($nombre);
        $this->cedula = $cedula;
        $this->edad   = $edad;
    }

    public function obtIdentificacion()
    {
        return $this->cedula;
    }

    public function obtEdad()
    {
        return $this->edad;
    }

    public function cumplirAnios()
    {
        $this->edad = $this->edad + 1;
    }
}