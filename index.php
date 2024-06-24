<?php
class Movie {

    // VARIABILI
    public $title;
    public $director;
    public $releaseYear;
    public $genre;

    // COSTRUTTORE
    public function __construct($title, $director, $releaseYear, $genre) {
        $this->title = $title;
        $this->director = $director;
        $this->releaseYear = $releaseYear;
        $this->genre = $genre;
    }
}