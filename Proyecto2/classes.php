<?php
class APIClient {
    protected $apiUrl;

    public function __construct($url) {
        $this->apiUrl = $url;
    }

    public function fetchData() {
        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result, true);
    }
}

class MarvelMovie {
    public $title;
    public $releaseDate;
    public $daysUntil;
    public $posterUrl;

    public function __construct($data) {
        $this->title = $data["title"];
        $this->releaseDate = $data["release_date"];
        $this->daysUntil = $data["days_until"];
        $this->posterUrl = $data["poster_url"];
    }
}

class MarvelAPI {
    const API_URL = "https://whenisthenextmcufilm.com/api";

    public static function getNextMovies() {
        $client = new APIClient(self::API_URL);
        $data = $client->fetchData();

        if (!$data) return [];

        $nextMovie = new MarvelMovie($data);
        $secondMovie = new MarvelMovie($data["following_production"]);

        return [$nextMovie, $secondMovie];
    }
}
?>
