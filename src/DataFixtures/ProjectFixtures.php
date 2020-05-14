<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $boitealire = new Project();
        $boitealire->setPicture('projects/boite-a-lire.jpg');
        $boitealire->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto, corporis enim inventore iure laudantium minus nam odio officia quae quasi quia repellat reprehenderit, tempora tempore, temporibus ullam ut voluptates.');
        $boitealire->setExcerpt('Permettre l\'échange de livre entre particuliers.');
        $boitealire->setUser($this->getReference("alorans"));
        $boitealire->setTitle("Boîte à lire");
        $boitealire->setCity($this->getReference("rennes"));
        $boitealire->setCost(3000);
        $boitealire->addCategory($this->getReference("loisir"));

        $manager->persist($boitealire);

        $potager = new Project();
        $potager->setPicture('projects/potager-toit.jpg');
        $potager->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto, corporis enim inventore iure laudantium minus nam odio officia quae quasi quia repellat reprehenderit, tempora tempore, temporibus ullam ut voluptates.');
        $potager->setExcerpt('Aménager des potagers sur les toits de la ville.');
        $potager->setUser($this->getReference("alorans"));
        $potager->setTitle("Potager sur les toits");
        $potager->setCity($this->getReference("rennes"));
        $potager->setCost(75000);
        $potager->addCategory($this->getReference("ecologie"));

        $manager->persist($potager);

        $cinema = new Project();
        $cinema->setPicture('projects/cinema-plein-air.jpg');
        $cinema->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto, corporis enim inventore iure laudantium minus nam odio officia quae quasi quia repellat reprehenderit, tempora tempore, temporibus ullam ut voluptates.');
        $cinema->setExcerpt('Proposer des séances de cinéma en plein air deux soirs par semaine.');
        $cinema->setUser($this->getReference("alorans"));
        $cinema->setTitle("Cinéma en plein air");
        $cinema->setCity($this->getReference("stmalo"));
        $cinema->setCost(75000);
        $cinema->addCategory($this->getReference("loisir"));

        $manager->persist($cinema);

        $manager->flush();
    }



    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class,
            CityFixtures::class
        ];
    }
}
