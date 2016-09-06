<?php

use Jenssegers\Date\Date;
Date::setLocale('es');

/* FECHA ACTUAL */
function fechaActual()
{
    $fechaActual = date('Y-m-d H:i:s');
    return $fechaActual;
}

function fechaTexto($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('d \\d\\e F \\d\\e\\l Y');
    return $fecha;
}

function fechaDia($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('d');
    return $fecha;
}

function fechaMes($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('M');
    return $fecha;
}

function fechaAnio($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('Y');
    return $fecha;
}