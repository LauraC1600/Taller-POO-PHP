<?php

require_once __DIR__ . '/Cliente.php';

class Empresa extends Cliente
{
    private string $nit;
    private string $representante;

    public function __construct($nit, $nombre, $representante)
    {
        parent::__construct($nombre);
        $this->nit           = $nit;
        $this->representante = $representante;
    }

    public function obtIdentificacion()
    {
        return $this->nit;
    }

    public function obtRepresentante()
    {
        return $this->representante;
    }

    public function cambiarRepresentante($representante)
    {
        $this->representante = $representante;
    }
}