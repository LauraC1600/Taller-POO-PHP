<?php

require_once __DIR__ . '/Cliente.php';

class Banco
{
    private string $nombre;
    private array  $clientes;
    private int    $numeroDeClientes;

    public function __construct($nombre)
    {
        $this->nombre           = $nombre;
        $this->clientes         = [];
        $this->numeroDeClientes = 0;
    }

    public function obtNombre()
    {
        return $this->nombre;
    }

    public function cambiarNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function adCliente(Cliente $cliente)
    {
        $this->clientes[]       = $cliente;
        $this->numeroDeClientes = $this->numeroDeClientes + 1;
    }

    public function obtNumClientes()
    {
        return $this->numeroDeClientes;
    }

    public function obtCliente($posicion)
    {
        return $this->clientes[$posicion];
    }

    public function obtClientes()
    {
        return $this->clientes;
    }
}