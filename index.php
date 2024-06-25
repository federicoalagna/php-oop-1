<?php

class Actor {

    // VARIABILI
    public $firstName;
    public $lastName;


    // COSTRUTTORE
    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    // METODO
    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }
}

class Genre {

    // VARIABILI
    public $name;

    // COSTRUTTORE
    public function __construct($name) {
        $this->name = $name;
    }

    // METODO
    public function getName() {
        return $this->name;
    }
}


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

// OGGETTI ISTANZIATI
$movie1 = new Movie("Interstellar", "Christopher Nolan", 2014, "Fantascienza");
$movie2 = new Movie("Fight Club", "David Fincher", 1999, "Azione");

echo $movie1->getMovieInfo() . "<br>";
echo $movie2->getMovieInfo() . "<br>";

// EXCEPTION 
$movie3 = new Movie("", "Ari Aster", 2019, "Horror");
echo $movie3->getMovieInfo() . "<br>";
?>