<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $alorans = new User();
        $alorans->setEmail("ameliederoche@hotmail.com");
        $alorans->setFirstname('Amélie');
        $alorans->setLastname('Lorans');
        $alorans->setPassword('amelie');
        $alorans->setRoles(["ROLE_ADMIN"]);
        $manager->persist($alorans);
        $this->addReference("alorans", $alorans);


        $manager->flush();
    }


}
