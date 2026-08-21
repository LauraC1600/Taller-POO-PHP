<?php

namespace Model;

class Cita
{
    private int $numero;
    private int $tipo;
    private float $tarifa;
    private float $valorFinal;

    public function __construct($numero, $tipo, $tarifa)
    {
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->tarifa = $tarifa;
        $this->valorFinal = 0;

        $this->calcularValorFinal();
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getTipo()
    {
        switch ($this->tipo) {
            case 1:
            case 2:
            case 3:
                return "general";
            case 4:
            case 5:
                return "especialista";
            default:
                return "Tipo incorrecto";
        }
    }

    public function getTarifa()
    {
        return $this->tarifa;
    }

    public function getValorFinal()
    {
        return $this->valorFinal;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setTarifa($tarifa)
    {
        $this->tarifa = $tarifa;
    }

    public function setValorFinal($valorFinal)
    {
        $this->valorFinal = $valorFinal;
    }

    public function calcularValorFinal()
    {
        switch ($this->tipo) {
            case 1:
            case 2:
            case 3:
                $this->valorFinal = $this->tarifa * 0.5;
                break;
            case 4:
            case 5:
                $this->valorFinal = $this->tarifa * 1.5;
                break;
            default:
                $this->valorFinal = 0;
                break;
        }
    }
}
