<?php

require_once __DIR__ . '/../model/Bus.php';

class ControladorBus
{
    private Bus $bus;

    public function crearBus($placa, $capacidad, $precio)
    {
        $this->bus = new Bus($placa, $capacidad, $precio);
        return $this->bus;
    }

    public function getBus()
    {
        return $this->bus;
    }
}
