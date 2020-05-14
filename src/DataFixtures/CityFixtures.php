<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rennes = new City();
        $rennes->setPicture('cities/rennes.jpg');
        $rennes->setName('Rennes');
        $manager->persist($rennes);
        $this->addReference("rennes", $rennes);


        $stmalo = new City();
        $stmalo->setName('St Malo');
        $stmalo->setPicture('cities/st-malo.jpg');
        $manager->persist($stmalo);
        $this->addReference("stmalo", $stmalo);

        $manager->flush();
    }
}
