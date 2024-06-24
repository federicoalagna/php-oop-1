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

    // METODO
    public function getMovieInfo() {
        try {
        
            if(empty($this->title) || empty($this->director) || empty($this->releaseYear) || empty($this->genre)) {
                throw new Exception("informazioni mancanti.");
            }
            return "Title: " . $this->title . ", Director: " . $this->director . ", Release Year: " . $this->releaseYear . ", Genre: " . $this->genre;
        } catch (Exception $e) {
            return "Errore: " . $e->getMessage();
        }
    }
}