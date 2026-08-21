<?php

use Model\Cita;

// Muestra el formulario para ingresar los datos de la cita
function mostrarFormulario()
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Cita Medica</title>
</head>
<body>
    <h2>Registrar Cita Medica</h2>
    <form method='POST' action=''>
        <p>
            Numero de cita: <input type='number' name='numero' required>
        </p>
        <p>
            Tipo de cita (1 al 5): <input type='number' name='tipo' required min='1' max='5'>
        </p>
        <p>
            Tarifa: <input type='number' name='tarifa' required min='0'>
        </p>
        <input type='submit' value='Registrar Cita'>
    </form>
</body>
</html>";
}

// Muestra el resultado con los datos de la cita
function mostrarResultado(Cita $cita)
{
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Resultado de la Cita</title>
</head>
<body>
    <h2>Resultado de la Cita</h2>
    <p>El numero de la cita es: <b>" . $cita->getNumero() . "</b></p>
    <p>Esta cita es de tipo: <b>" . $cita->getTipo() . "</b></p>
    <p>Su tarifa normal es: <b>" . $cita->getTarifa() . "</b></p>
    <p>Pero por ser de tipo <b>" . $cita->getTipo() . "</b> queda con un valor final de: <b>" . $cita->getValorFinal() . "</b></p>
    <br>
    <a href=''>Registrar otra cita</a>
</body>
</html>";
}
