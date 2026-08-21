<?php

abstract class Persona
{
    protected string $nombre;
    protected string $documento;
    protected string $correo;
    private static int $totalPersonas = 0; // hace que una variable pertenezca a la clase misma y sea compartida por todos sus objetos, en lugar de pertenecer a cada objeto de forma individual.

    public function __construct($nombre, $documento, $correo)
    {
        $this->nombre     = $nombre;
        $this->documento  = $documento;
        $this->correo     = $correo;
        self::$totalPersonas++;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDocumento()
    {
        return $this->documento;
    }
    public function getCorreo()
    {
        return $this->correo;
    }

    public static function getTotalPersonas()
    {
        return self::$totalPersonas;
    }

    public static function validarDocumento($documento)
    {
        return ctype_digit($documento); //ctype_digit revisa si todos los caracteres de un string son dígitos numéricos
    }

    public static function validarCorreo($correo)
    {
        return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false; //filter_var sirve para validar o limpiar datos.
    }

    abstract public function mostrarInfo();
}
