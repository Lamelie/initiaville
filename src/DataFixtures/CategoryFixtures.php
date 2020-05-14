<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $loisir = new Category();
        $loisir->setLabel('Loisir');
        $manager->persist($loisir);
        $this->addReference("loisir", $loisir);


        $ecologie = new Category();
        $ecologie->setLabel('Ecologie');
        $manager->persist($ecologie);
        $this->addReference("ecologie", $ecologie);


        $manager->flush();
    }
}
