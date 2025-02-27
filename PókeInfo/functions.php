<?php
require_once 'Pokemon.php';

function fetchPokemon($pokemonName) {

    $url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemonName);
    $response = file_get_contents($url);
    
    if ($response === false) {
        return null;
    }

    $data = json_decode($response, true);
    
    $types = array_map(function($type) {
        return ucfirst($type['type']['name']);
    }, $data['types']);
    
    return new Pokemon(
        $data['name'],
        $data['id'],
        $types,
        $data['height'] / 10,
        $data['weight'] / 10,
        $data['sprites']['front_default']
    );
}
?>