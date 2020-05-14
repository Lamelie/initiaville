<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $alorans = new User();
        $alorans->setEmail("ameliederoche@hotmail.com");
        $alorans->setFirstname('Amélie');
        $alorans->setLastname('Lorans');
        $alorans->setPassword($this->encoder->encodePassword($alorans,'amelie'));
        $alorans->setRoles(["ROLE_ADMIN"]);
        $manager->persist($alorans);
        $this->addReference("alorans", $alorans);

        $jdupont = new User();
        $jdupont->setEmail("jdupont@hotmail.com");
        $jdupont->setFirstname('Jean');
        $jdupont->setLastname('Dupont');
        $jdupont->setPassword($this->encoder->encodePassword($jdupont,'jean'));
        $jdupont->setRoles(["ROLE_USER"]);
        $manager->persist($jdupont);
        $this->addReference("jdupont", $jdupont);

        $manager->flush();
    }


}
