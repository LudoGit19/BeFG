<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Player;
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
        $team3->setName("C");
        $team3->setImage("team3.png");      
        $manager->persist($team3);

        $teams = [$team1, $team2, $team3];

        $faker = \Faker\Factory::create('fr_FR');
        foreach ($teams as $t) { // générer des joueurs pour chaque équipe
           $rand = rand(10, 12); // min 8 joueurs et max 12 joueurs = entre 24 et 36 joueurs 
           for($i=1; $i <= $rand; $i++){
               $player= new Player();
               $player->setFname($faker->firstNameMale)
                        ->setLname($faker->lastName)
                        ->setPhone($faker->regexify("[0-9]{10}"))
                        ->setMail($faker->email)
                        ->setImage($faker->imageUrl($width = 640, $height = 480))
                        ->setYearOfBirth($faker->year($max = 'now'))
                        ->setTeam($t);  
                $manager->persist($player);  
           }
        }

        $manager->flush();
    }
}
