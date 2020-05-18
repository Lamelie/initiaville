<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment1projet1 = new Comment();
        $comment1projet1->setTitle("Super projet !");
        $comment1projet1->setContent('Ljnzqomiefùo ùifjùoij ùeioj ùij');
        $comment1projet1->setUser($this->getReference("jdupont"));
        $comment1projet1->setProject($this->getReference("boitealire"));
        $manager->persist($comment1projet1);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            ProjectFixtures::class,
        ];
    }
}
