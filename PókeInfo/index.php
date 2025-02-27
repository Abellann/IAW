<?php
require_once 'Pokemon.php';
require_once 'functions.php';

$pokemonInfo = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['pokemon'])) {
    $pokemonName = $_POST['pokemon'];
    $pokemon = fetchPokemon($pokemonName);
    
    if ($pokemon) {
        $pokemonInfo = $pokemon->displayInfo();
    } else {
        $pokemonInfo = "<p class='text-danger'>Pokémon no encontrado.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeAPI App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mt-5 text-center">
    <h1 class="text-warning">Información de Pokémon</h1>
    <div class="row mb-4 justify-content-center">
        <div class="col-md-6">
            <form method="POST" class="form-inline justify-content-center">
                <input type="text" name="pokemon" class="form-control mr-2" placeholder="Ingresa el nombre o ID del Pokémon" required>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div id="pokemonInfo" class="pokemon-info">
                <?php echo $pokemonInfo; ?>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>