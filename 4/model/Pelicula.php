<?php

class Pelicula
{
    private string $titulo;
    private string $genero;
    private int    $duracion;
    private string $clasificacion;
    private array  $calificaciones;

// hace que una variable pertenezca a la clase misma y sea compartida por todos sus objetos, en lugar de pertenecer a cada objeto de forma individual.
    private static int $totalPeliculas = 0;

    public function __construct($titulo, $genero, $duracion, $clasificacion)
    {
        $this->titulo         = $titulo;
        $this->genero         = $genero;
        $this->duracion       = $duracion;
        $this->clasificacion  = $clasificacion;
        $this->calificaciones = [];

        self::$totalPeliculas = self::$totalPeliculas + 1;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    public function getCalificaciones()
    {
        return $this->calificaciones;
    }

    // static: se llama con Pelicula::getTotalPeliculas(), no con $objeto->...
    public static function getTotalPeliculas()
    {
        return self::$totalPeliculas;
    }

    public function agregarCalificacion($calificacion)
    {
        // Solo acepta calificaciones entre 1 y 5
        if ($calificacion >= 1 && $calificacion <= 5) {
            $this->calificaciones[] = $calificacion;
        }
    }

    public function calcularPromedio()
    {
        if (count($this->calificaciones) === 0) {
            return 0;
        }

        $suma = 0;
        foreach ($this->calificaciones as $cal) {
            $suma = $suma + $cal;
        }

        return $suma / count($this->calificaciones);
    }

    // Convierte minutos a horas y minutos
    public function duracionEnHoras()
    {
        $horas   = (int)($this->duracion / 60);
        $minutos = $this->duracion % 60;
        return $horas . "h " . $minutos . "min";
    }
}