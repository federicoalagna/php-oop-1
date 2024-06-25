<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP 1</title>
  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

                <h1 class="text-center mb-4">Movie List</h1>
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

                            return "Title: " . $this->title . ", Director: " . $this->director . ", Release Year: " . $this->releaseYear . ", Genres: " . $genres . ", Actors: " . $actors;
                        } catch (Exception $e) {
                            return "Errore: " . $e->getMessage();
                        }
                    }

                    public static function getTotalMovies() {
                        return self::$totalMovies;
                    }
                }

                ?>
</body>
</html>
