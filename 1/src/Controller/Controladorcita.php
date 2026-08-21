<?php

namespace Controller;

use Model\Cita;

class ControladorCita
{
    private Cita $cita;

    public function crearCita($numero, $tipo, $tarifa)
    {
        $this->cita = new Cita($numero, $tipo, $tarifa);
        return $this->cita;
    }

    public function getCita()
    {
        return $this->cita;
    }
}
