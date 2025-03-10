<?php

declare(strict_types=1);

/**
 * Renderiza una plantilla HTML.
 * 
 * Extrae los datos del array para convertirlos en variables y carga el archivo de plantilla correspondiente.
 *
 * @param string $plantilla Nombre del archivo de plantilla (sin la extensión).
 * @param array $datos Datos que se pasarán a la plantilla.
 */
function renderizar_plantilla(string $plantilla, array $datos = [])
{
    extract($datos); // Convierte cada clave del array en una variable
    require "templates/$plantilla.php"; // Incluye la plantilla correspondiente
}

/**
 * Obtiene y decodifica datos desde una URL.
 * 
 * Realiza una petición a la URL dada, decodifica el contenido JSON y lo devuelve en un array asociativo.
 *
 * @param string $url URL de donde se extraerán los datos.
 * @return array Datos obtenidos y decodificados.
 */
function obtener_datos_desde_url(string $url): array
{
    $resultado = file_get_contents($url); // Obtiene el contenido desde la URL
    $datos = json_decode($resultado, true); // Decodifica el JSON a un array asociativo
    return $datos; // Devuelve el array de datos
}
