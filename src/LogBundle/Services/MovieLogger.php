<?php

namespace LogBundle\Services;

use AppBundle\Entity\Movie;

class MovieLogger
{
    public function logNewMovie(Movie $movie) 
    {
        $myFile = __DIR__."/file.txt";
        
        echo $myFile;
        
        if (file_exists($myFile)) {
            $mode = "a";
        } else {
            $mode = "w";
        }
        
        $fh = fopen($myFile, 'w');
        fwrite($fh, $movie->getTitle()."\n");
        
        fclose($fh);
    }
}
