<?php

function mostrarFormularioBus()
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Sistema de Bus</title>
</head>
<body>
    <h2>Registrar Bus</h2>
    <form method='POST' action=''>
        <p>
            Placa del bus: <input type='text' name='placa' required>
        </p>
        <p>
            Capacidad de pasajeros: <input type='number' name='capacidad' required min='1'>
        </p>
        <p>
            Precio del pasaje: <input type='number' name='precio' required min='0' step='0.01'>
        </p>
        <p>
            Pasajeros a subir: <input type='number' name='subir' required min='0' value='0'>
        </p>
        <p>
            Pasajeros a bajar: <input type='number' name='bajar' required min='0' value='0'>
        </p>
        <input type='submit' value='Procesar'>
    </form>
</body>
</html>";
}

function mostrarResultadoBus(Bus $bus, $mensajeSubir, $mensajeBajar)
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Resultado Bus</title>
</head>
<body>
    <h2>Información del Bus</h2>
    <p>Placa: <b>" . $bus->getPlaca() . "</b></p>
    <p>Capacidad total: <b>" . $bus->getCapacidad() . "</b></p>
    <p>Precio del pasaje: <b>$" . $bus->getPrecioPasaje() . "</b></p>
    <hr>
    <h3>Operaciones realizadas</h3>
    <p>Subir pasajeros: <b>" . $mensajeSubir . "</b></p>
    <p>Bajar pasajeros: <b>" . $mensajeBajar . "</b></p>
    <hr>
    <h3>Estado actual</h3>
    <p>Pasajeros actuales en el bus: <b>" . $bus->getPasajerosActuales() . "</b></p>
    <p>Total de pasajeros que han subido: <b>" . $bus->getPasajerosTotales() . "</b></p>
    <p>Dinero acumulado: <b>$" . $bus->getDineroAcumulado() . "</b></p>
    <br>
    <a href=''>Probar de nuevo</a>
</body>
</html>";
}
