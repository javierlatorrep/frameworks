<?php

namespace LogBundle\EventListener;

use LogBundle\Services\MovieLogger;
use AppBundle\Event\MovieCreatedEvent;

class MovieLoggerEventListener
{
    private $movieLogger;
    
    public function __construct(MovieLogger $movieLogger) {
        $this->movieLogger = $movieLogger;
    }
    
    public function log(MovieCreatedEvent $event)
    {
        $this->movieLogger->logNewMovie(
            $event->getMovie()
        );
    }
}