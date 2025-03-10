<?php
require_once "classes.php";

$movies = MarvelAPI::getNextMovies();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Las próximas películas de Marvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-body-tertiary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Próximas películas de Marvel</h2>

                <?php foreach ($movies as $movie): ?>
                <div class="row align-items-center my-4">
                    <div class="col-md-4 text-center">
                        <img src="<?= $movie->posterUrl; ?>" class="img-fluid rounded" alt="Poster de <?= $movie->title; ?>">
                    </div>
                    <div class="col-md-8">
                        <h3><?= $movie->title; ?> se estrena en <?= $movie->daysUntil; ?> días</h3>
                        <p>Fecha de estreno: <?= $movie->releaseDate; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
