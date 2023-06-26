<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\CarCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        $faker = (new Factory())::create();
        $category = new CarCategory;
        $category->setName(implode('',$faker->randomElements(['SUV', 'Berline', 'Citadine', 'Break'])));
        for ($i=1; $i < 50 ; $i++) { 
            $car = new Car;
            $car->setNbDoors($faker->randomDigitNotNull)
                ->setNbSeats($faker->randomDigitNotNull)
                ->setName(implode('', $faker->randomElements(['Peugeot', 'Renault', 'Citroen', 'Ford'])))
                ->setCost($faker->randomNumber(5,true))
                ->setCategory($category);
        
         $manager->persist($car);
        }
        
        $manager->flush();
    }
}
