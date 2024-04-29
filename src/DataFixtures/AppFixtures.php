<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Agenda;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $agenda= new Agenda();
            $agenda->setTitle($faker->company());
            $agenda->setStart($faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d H:i:s'));
            $manager->persist($agenda);
        }
        $manager->flush();
    }
}
