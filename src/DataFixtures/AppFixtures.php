<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName("u7");
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName("u9");
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName("u11");
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setName("u13");
        $manager->persist($category4);

        $team1 = new Team();
        $team1->setName("A");
        $team1->setImage("team1.png");      
        $manager->persist($team1);

        $team2 = new Team();
        $team2->setName("B");
        $team2->setImage("team2.png");      
        $manager->persist($team2);

        $team3 = new Team();
        $team3->setName("A");
        $team3->setImage("team3.png");      
        $manager->persist($team3);

        $manager->flush();
    }
}
