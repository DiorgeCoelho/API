<?php


require_once __DIR__ . '/../models/Films.php';

class FilmsController
{
    public function index()
    {
        $movies = Films::getAll();

    if ($movies !== null) {
        include __DIR__ . '/../views/films.php';
    } else {
        echo "Filmes não encontrado!";
    }
    }

    public function show($id)
    {
        
    $movie = Films::getDetails($id);
    
    if ($movie !== null) {
        $age = Films::calculate($movie['release_date']);
        include __DIR__ . '/../views/films_detail.php';
    } else {

        echo "Filme não encontrado!";
    }
}

}
