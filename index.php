<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP 1</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4 title">LISTA DEI FILM</h1>
                <?php

                // CLASSE GENERE
                class Genre {
                    public $name;

                    public function __construct($name) {
                        $this->name = $name;
                    }

                    public function getName() {
                        return $this->name;
                    }
                }

                // CLASSE ATTORE
                class Actor {
                    public $firstName;
                    public $lastName;

                    public function __construct($firstName, $lastName) {
                        $this->firstName = $firstName;
                        $this->lastName = $lastName;
                    }

                    public function getFullName() {
                        return $this->firstName . ' ' . $this->lastName;
                    }
                }

                // CLASSE MOVIE
                class Movie {
                    public $title;
                    public $director;
                    public $releaseYear;
                    public $cover;
                    private $genres = [];
                    private $actors = [];

                    public static $totalMovies = 0;

                    public function __construct($title, $director, $releaseYear, $cover) {
                        $this->title = $title;
                        $this->director = $director;
                        $this->releaseYear = $releaseYear;
                        $this->cover = $cover;
                        self::$totalMovies++;
                    }

                    public function setGenres($genres) {
                        $this->genres = $genres;
                    }

                    public function addGenre(Genre $genre) {
                        $this->genres[] = $genre;
                    }

                    public function setActors($actors) {
                        $this->actors = $actors;
                    }

                    public function addActor(Actor $actor) {
                        $this->actors[] = $actor;
                    }

                    public function getMovieInfo() {
                        try {
                            if (empty($this->title) || empty($this->director) || empty($this->releaseYear)) {
                                throw new Exception("Alcune informazioni del film sono mancanti.");
                            }
                            $genreNames = array_map(fn($genre) => $genre->getName(), $this->genres);
                            $actorNames = array_map(fn($actor) => $actor->getFullName(), $this->actors);
                            $genres = implode(', ', $genreNames) ?: 'N/A';
                            $actors = implode(', ', $actorNames) ?: 'N/A';

                            return "<img src='" . $this->cover . "' alt='Cover image' class='cover' /> <br>
                            <strong class='titolo'>TITOLO:</strong>  " . $this->title . ", <br>
                            <strong class='regista'>REGISTA:</strong> " . $this->director . ", <br>
                            <strong class='anno'>PUBBLICAZIONE:</strong> " . $this->releaseYear . ", <br>
                            <strong class='generi'>GENERE:</strong> " . $genres . ", <br>
                            <strong class='attori'>CAST:</strong> " . $actors;
                        } catch (Exception $e) {
                            return   "Errore: " . $e->getMessage();
                        }
                    }

                    public static function getTotalMovies() {
                        return self::$totalMovies;
                    }
                }
                

                // GENERI E ATTORI
                $genre1 = new Genre("Fantascienza");
                $genre2 = new Genre("Azione");
                $genre3 = new Genre("Historical");

                $actor1 = new Actor("Matthew", "McConaughey");
                $actor2 = new Actor("Anne", "Hathaway");
                $actor3 = new Actor("Brad", "Pitt");
                $actor4 = new Actor("Edward", "Norton");

                // ISTANZIAMENTO DI MOVIE
                $movie1 = new Movie("Interstellar", "Christopher Nolan", 2014, "https://m.media-amazon.com/images/I/71thymE6lwL._AC_UF1000,1000_QL80_.jpg" );
                $movie1->addGenre($genre1);
                $movie1->addActor($actor1);
                $movie1->addActor($actor2);

                $movie2 = new Movie("Fight Club", "David Fincher", 1999, "https://m.media-amazon.com/images/I/61IgtYrLF5L._AC_UF1000,1000_QL80_.jpg");
                $movie2->addGenre($genre2);
                $movie2->addActor($actor3);
                $movie2->addActor($actor4);

                // EXCEPTION
                $movie3 = new Movie("", "Ari Aster", 2019, "https://pad.mymovies.it/filmclub/2019/02/152/locandinapg1.jpg");
                $movie3->addGenre($genre3);
                $movie3->addActor(new Actor("Florence", "Pugh"));

                echo "<div class='card mb-4 text-white bg-card'><div class='card-body'>" . $movie1->getMovieInfo() . "</div></div>";
                echo "<div class='card mb-4 text-white bg-card'><div class='card-body'>" . $movie2->getMovieInfo() . "</div></div>";
                echo "<div class='card mb-4 text-white bg-card'><div class='card-body'>" . $movie3->getMovieInfo() . "</div></div>";

                echo "<p class='text-center'>Film trovati: " . Movie::getTotalMovies() . "</p>";
                ?>
            </div>
        </div>
    </div>


</body>
</html>
