<?php

namespace LogBundle\Services;

use AppBundle\Entity\Movie;

class MovieLogger
{
    public function logNewMovie(Movie $event) 
    {
        echo "THIS";
        die;
    }
}
