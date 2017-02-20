<?php

namespace LogBundle\Services;

use AppBundle\Entity\Movie;

class MovieLogger
{
    public function logNewMovie(Movie $movie) 
    {
        $myFile = __DIR__."/file.txt";
        
        if (file_exists($myFile)) {
            $mode = "a";
        } else {
            $mode = "w";
        }
        
        $fh = fopen($myFile, $mode);
        fwrite($fh, $movie->getTitle()."\n");
        
        fclose($fh);
    }
}
