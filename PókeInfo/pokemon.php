<?php
class Pokemon {
    private $name;
    private $id;
    private $types;
    private $height;
    private $weight;
    private $sprite;

    public function __construct($name, $id, $types, $height, $weight, $sprite) {
        $this->name = $name;
        $this->id = $id;
        $this->types = $types;
        $this->height = $height;
        $this->weight = $weight;
        $this->sprite = $sprite;
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getTypes() {
        return $this->types;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getSprite() {
        return $this->sprite;
    }

    public function displayInfo() {
        return "<div class='pokemon-info mt-3'> 
                    <div class='pokemon-body'> 
                        <h5 class='pokemon-title'>" . ucfirst($this->name) . "</h5>
                        <img src='{$this->sprite}' class='img-fluid' alt='{$this->name}'>
                        <p class='pokemon-text'>Tipo: " . implode(", ", $this->types) . "</p>
                        <p class='pokemon-text'>Altura: {$this->height} m</p>
                        <p class='pokemon-text'>Peso: {$this->weight} kg</p>
                        <p class='pokemon-text'>ID: {$this->id} </p>
                    </div>
                </div>";
    }
}
?>