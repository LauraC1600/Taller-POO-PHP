 <?php

class Bus
{
    private string $placa;
    private int $capacidad;
    private float $precioPasaje;
    private int $pasajerosActuales;
    private int $pasajerosTotales;

    public function __construct($placa, $capacidad, $precioPasaje)
    {
        $this->placa = $placa;
        $this->capacidad = $capacidad;
        $this->precioPasaje = $precioPasaje;
        $this->pasajerosActuales = 0;
        $this->pasajerosTotales = 0;
    }

    // --- GETTERS ---

    public function getPlaca()
    {
        return $this->placa;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }

    public function getPrecioPasaje()
    {
        return $this->precioPasaje;
    }

    public function getPasajerosActuales()
    {
        return $this->pasajerosActuales;
    }

    public function getPasajerosTotales()
    {
        return $this->pasajerosTotales;
    }

    // --- METODOS ---


    public function subirPasajeros($cantidad)
    {
        $espacioDisponible = $this->capacidad - $this->pasajerosActuales;

        if ($cantidad <= 0) {
            return "La cantidad debe ser mayor a 0.";
        }

        if ($cantidad > $espacioDisponible) {
            return "No hay suficiente espacio. Solo caben $espacioDisponible pasajeros mas.";
        }

        $this->pasajerosActuales += $cantidad;
        $this->pasajerosTotales += $cantidad;
        return "$cantidad pasajero(s) subieron al bus.";
    }


    public function bajarPasajeros($cantidad)
    {
        if ($cantidad <= 0) {
            return "La cantidad debe ser mayor a 0.";
        }

        if ($cantidad > $this->pasajerosActuales) {
            return "No hay suficientes pasajeros. Solo hay {$this->pasajerosActuales} en el bus.";
        }

        $this->pasajerosActuales -= $cantidad;
        return "$cantidad pasajero(s) bajaron del bus.";
    }


    public function getDineroAcumulado()
    {
        return $this->pasajerosTotales * $this->precioPasaje;
    }
}
