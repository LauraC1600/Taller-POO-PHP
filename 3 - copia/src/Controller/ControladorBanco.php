<?php

namespace Controller;

use Model\Banco;
use Model\Persona;
use Model\Empresa;


class ControladorBanco
{
    private Banco $banco;

    public function __construct()
    {
        $this->banco = new Banco("Banco Central");

        $p1 = new Persona("123456", "Carlos Gomez",    15);
        $p2 = new Persona("654321", "Maria Lopez",     30);
        $p3 = new Persona("111222", "Luis Perez",      17);
        $p4 = new Persona("333444", "Ana Martinez",    65);
        $p5 = new Persona("555666", "Sofia Rodriguez", 10);

        $e1 = new Empresa("900111", "TechCorp S.A.",  "Juan Torres");
        $e2 = new Empresa("900222", "Comercial XYZ",  "Laura Ruiz");

        $this->banco->adCliente($p1);
        $this->banco->adCliente($p2);
        $this->banco->adCliente($p3);
        $this->banco->adCliente($p4);
        $this->banco->adCliente($p5);
        $this->banco->adCliente($e1);
        $this->banco->adCliente($e2);
    }

    public function getBanco()
    {
        return $this->banco;
    }

    public function getNombresClientes()
    {
        $nombres = [];
        foreach ($this->banco->obtClientes() as $cliente) {
            $nombres[] = $cliente->obtNombre();
        }
        return $nombres;
    }

    public function getNombresYCedulasPersonas()
    {
        $lista = [];
        foreach ($this->banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                $lista[] = [
                    "nombre" => $cliente->obtNombre(),
                    "cedula" => $cliente->obtIdentificacion()
                ];
            }
        }
        return $lista;
    }

    public function getNombresYRepresentantes()
    {
        $lista = [];
        foreach ($this->banco->obtClientes() as $cliente) {
            if ($cliente instanceof Empresa) {
                $lista[] = [
                    "nombre"        => $cliente->obtNombre(),
                    "representante" => $cliente->obtRepresentante()
                ];
            }
        }
        return $lista;
    }

    public function getMenoresDeEdad()
    {
        $lista = [];
        foreach ($this->banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                if ($cliente->obtEdad() < 18) {
                    $lista[] = $cliente->obtNombre();
                }
            }
        }
        return $lista;
    }

    public function getClienteMasJoven()
    {
        $masJoven = null; // Aún no ha visto a nadie
        foreach ($this->banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                if ($masJoven === null) {
                    $masJoven = $cliente;
                } elseif ($cliente->obtEdad() < $masJoven->obtEdad()) {
                    $masJoven = $cliente;
                }
            }
        }
        return $masJoven;
    }

    public function getClienteMasViejo()
    {
        $masViejo = null; // Aún no ha visto a nadie
        foreach ($this->banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                if ($masViejo === null) {
                    $masViejo = $cliente;
                } elseif ($cliente->obtEdad() > $masViejo->obtEdad()) {
                    $masViejo = $cliente;
                }
            }
        }
        return $masViejo;
    }
}
