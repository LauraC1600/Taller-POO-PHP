<?php

abstract class Cliente // abstract que queda como un molde no se puede crear objetos cliente 
{
    protected string $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function obtNombre()
    {
        return $this->nombre;
    }

    abstract public function obtIdentificacion();
}