<?php

require_once __DIR__ . '/../model/Pelicula.php';

class ControladorPelicula
{
    private array $peliculas;

    public function __construct()
    {
        $this->peliculas = [];
    }

    public function registrarPelicula($titulo, $genero, $duracion, $clasificacion, $calificaciones)
    {
        $pelicula = new Pelicula($titulo, $genero, $duracion, $clasificacion);

        foreach ($calificaciones as $cal) {
            $pelicula->agregarCalificacion($cal);
        }

        $this->peliculas[] = $pelicula;
        return $pelicula;
    }

    public function getPeliculas()
    {
        return $this->peliculas;
    }
}