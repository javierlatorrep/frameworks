<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }
    
    public function title()
    {
        $books = [
            'The Barefoot Investor',
            'Milk and Honey',
            'Lion: A Long Way Home',
            'When Breath Becomes Air',
            'The Little Book of Hygge',
            'Nineteen Eighty-Four',
            'The Little Book of Mindfulness',
            'Aurelia',
            'My Not So Perfect Life',
            'Deliciously Ella with Friends',
            'Paralithodes',
            'Norse Mythology',
            'Out of Bounds',
            'The Bikini Body 28-Day Healthy Eating & Lifestyle Guide'
        ];
        
        $key = array_rand($books);
        
        return $books[$key];
    }
    
    public function edition()
    {
        $editions = [
            'Standar',
            'Premium',
            'Gold',
            'Special'
        ];
        
        $key = array_rand($editions);
        
        return $editions[$key];
    }
}
