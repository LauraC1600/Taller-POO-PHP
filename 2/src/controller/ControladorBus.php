<?php

namespace Controller;

use Model\Bus;

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
