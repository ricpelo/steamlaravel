<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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

if (!function_exists('imagen_path')) {
    function imagen_path(string $nombre_archivo): string
    {
        return Storage::disk('public')->path('imagenes/' . $nombre_archivo);
    }
}

if (!function_exists('imagen_url_absoluta')) {
    function imagen_url_absoluta(string $nombre_archivo): string
    {
        return Storage::disk('public')->url('imagenes/' . $nombre_archivo);
    }
}

if (!function_exists('imagen_url_relativa')) {
    function imagen_url_relativa(string $nombre_archivo): string
    {
        return Storage::url('imagenes/' . $nombre_archivo);
    }
}
