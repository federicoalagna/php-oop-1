<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP 1</title>
  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">LISTA DEI FILM</h1>
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
                    private $genres = [];
                    private $actors = [];

                    public static $totalMovies = 0;

                    public function __construct($title, $director, $releaseYear) {
                        $this->title = $title;
                        $this->director = $director;
                        $this->releaseYear = $releaseYear;
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

                            return "Titolo: " . $this->title . ", Regista: " . $this->director . ", Pubblicazione: " . $this->releaseYear . ", Genere: " . $genres . ", Attori: " . $actors;
                        } catch (Exception $e) {
                            return "Errore: " . $e->getMessage();
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
                $movie1 = new Movie("Interstellar", "Christopher Nolan", 2014);
                $movie1->addGenre($genre1);
                $movie1->addActor($actor1);
                $movie1->addActor($actor2);

                $movie2 = new Movie("Fight Club", "David Fincher", 1999);
                $movie2->addGenre($genre2);
                $movie2->addActor($actor3);
                $movie2->addActor($actor4);

                // EXCEPTION
                $movie3 = new Movie("", "Ari Aster", 2019);
                $movie3->addGenre($genre3);
                $movie3->addActor(new Actor("Florence", "Pugh"));

                echo "<div class='card mb-4'><div class='card-body'>" . $movie1->getMovieInfo() . "</div></div>";
                echo "<div class='card mb-4'><div class='card-body'>" . $movie2->getMovieInfo() . "</div></div>";
                echo "<div class='card mb-4'><div class='card-body'>" . $movie3->getMovieInfo() . "</div></div>";

                echo "<p class='text-center'>Film trovati: " . Movie::getTotalMovies() . "</p>";
                ?>
            </div>
        </div>
    </div>

          
</body>
</html>
