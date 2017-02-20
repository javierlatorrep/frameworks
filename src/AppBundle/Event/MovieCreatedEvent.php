<?php

namespace AppBundle\Event;

use AppBundle\Entity\Movie;
use Symfony\Component\EventDispatcher\Event;

class MovieCreatedEvent extends Event 
{
    const NAME = 'movie_created';

    private $movie;
    
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }
    
    public function getMovie() 
    {
        return $this->movie;
    }
}