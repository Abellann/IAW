<?php

declare(strict_types=1);

/**
 * Clase que representa un Pokémon.
 * Esta clase se encarga de almacenar los datos de un Pokémon y de obtener la información desde la API.
 */
class Pokemon
{
    /**
     * Constructor de la clase.
     * Recibe los atributos básicos del Pokémon y los asigna a las propiedades de la instancia.
     *
     * @param string $nombre Nombre del Pokémon.
     * @param int $identificador Identificador único del Pokémon.
     * @param string $url_imagen URL de la imagen del Pokémon.
     * @param int $peso Peso del Pokémon.
     * @param int $altura Altura del Pokémon.
     */
    public function __construct(
        private string $nombre,
        private int $identificador,
        private string $url_imagen,
        private int $peso,
        private int $altura,
    ) {
            // Convertir la primera letra del nombre a mayúscula
            $this->nombre = ucfirst($this->nombre);
    }

    /**
     * Método estático que obtiene los datos de la API y crea una instancia de Pokémon.
     *
     * @param string $ruta_api URL base de la API.
     * @param int $id_pokemon Identificador del Pokémon a obtener.
     * @return Pokemon Instancia de la clase Pokemon con los datos cargados.
     * @throws Exception Si no se puede obtener los datos del Pokémon.
     */
    public static function obtener_y_crear_pokemon(string $ruta_api, int $id_pokemon): Pokemon
    {
        // Construir la URL completa de la API concatenando la ruta base y el identificador del Pokémon
        $url = $ruta_api . $id_pokemon;
        // Obtener el contenido JSON desde la API
        $resultado = file_get_contents($url);

        // Verificar si la respuesta es válida
        if ($resultado === false) {
            throw new Exception("No se pudo obtener los datos del Pokémon.");
        }

        // Decodificar el JSON a un array asociativo
        $datos = json_decode($resultado, true);

        // Verificar si los datos contienen la información necesaria
        if (!isset($datos['name'], $datos['id'], $datos['sprites']['front_default'], $datos['weight'], $datos['height'])) {
            throw new Exception("Datos incompletos para el Pokémon.");
        }

        // Crear y retornar una nueva instancia de Pokemon con todos los datos obtenidos
        return new self(
            $datos['name'],
            $datos['id'],
            $datos['sprites']['front_default'],
            $datos['weight'],
            $datos['height'],
        );
    }

    /**
     * Método para obtener los datos del objeto en forma de array asociativo.
     * Esto permite, por ejemplo, pasar los datos a una plantilla para mostrarlos.
     *
     * @return array Array con los nombres de las propiedades y sus valores.
     */
    public function obtener_datos(): array
    {
        return get_object_vars($this);
    }
}