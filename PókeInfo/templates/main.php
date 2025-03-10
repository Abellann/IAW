<!--
  Sección principal que muestra la información del Pokémon.
  Se utiliza Bootstrap para el diseño y estilos.
-->
<main class="bg-dark text-white p-4">
    <div class="container"> <!-- Contenedor para centrar el contenido -->
        <div class="row align-items-center justify-content-center justify-content-md-start">
            <!-- Columna para la imagen del Pokémon -->
            <div class="col-md-auto text-center px-md-3">
                <!-- Se muestra la imagen del Pokémon; se usa la variable PHP $url_imagen para la fuente y $nombre para el texto alternativo -->
                <img src="<?= $url_imagen; ?>" class="img-fluid rounded pokemon-image" alt="Imagen de <?= $nombre ?>">
            </div>
            <!-- Columna para la información detallada del Pokémon -->
            <div class="col-md pokemon-info">
                <!-- Se muestra el nombre del Pokémon -->
                <h3 class="text-md-start"><?= $nombre ?></h3>
                <!-- Se muestra el identificador del Pokémon -->
                <p class="text-md-start">ID: <?= $identificador ?></p>
                <!-- Se muestra el peso, ajustado a kg dividiendo el valor entre 10 -->
                <p class="text-md-start">Peso: <?= $peso / 10; ?> kg</p>
                <!-- Se muestra la altura, ajustada a metros dividiendo el valor entre 10 -->
                <p class="text-md-start">Altura: <?= $altura / 10; ?> m</p>
            </div>
        </div>
    </div>
</main>
