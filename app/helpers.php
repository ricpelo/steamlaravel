<?php

use Illuminate\Support\Carbon;

if (!function_exists('dinero')) {
    function dinero($valor): string
    {
        $formatter = new \NumberFormatter('es_ES', \NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($valor, 'EUR');
        // return number_format($valor, 2, ',', '.') . ' €';
    }
}

if (!function_exists('fecha_larga')) {
    function fecha_larga(Carbon $valor): string
    {
        return $valor
        ->locale('es')
        ->timezone('Europe/Madrid')
        ->translatedFormat('d \d\e F \d\e Y');
    }
}
