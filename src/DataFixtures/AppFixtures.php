<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Event;
use App\Entity\Player;
use App\Entity\Status;

use App\Entity\Category;
use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $location = new Location();
        $location->setName("stade");
        $location->setAdress("rue du stade");
        $location->setZip(56000);
        $location->setCity("Vannes");
        $manager->persist($location);

        $location1 = new Location();
        $location1->setName("complexe A");
        $location1->setAdress("rue du complexe");
        $location1->setZip(44000);
        $location1->setCity("Nantes");
        $manager->persist($location1);

        $location2 = new Location();
        $location2->setName("complexe B");
        $location2->setAdress("rue du complexe B");
        $location2->setZip(35000);
        $location2->setCity("Rennes");
        $manager->persist($location2);

        $location3 = new Location();
        $location3->setName("complexe 1");
        $location3->setAdress("complexe sportif");
        $location3->setZip(56450);
        $location3->setCity("Theix");
        $manager->persist($location3);

        $location4 = new Location();
        $location4->setName("complexe 2");
        $location4->setAdress("rue du stade bis");
        $location4->setZip(56450);
        $location4->setCity("suzu");
        $manager->persist($location4);

        $status = new Status();
        $status->setName("reporté"); 
        $manager->persist($status);  

        $status1 = new Status();
        $status1->setName("ouvert");  
        $manager->persist($status1); 
            
        $events1 = new Event();
        $events1->setName("tournoi u11");
        $events1->setDateCreated(new \DateTime());
        $events1->setDuration(null);
        $events1->setStatus($status);
        $events1->setLocation($location1);
        $manager->persist($events1);  

        $events2 = new Event();
        $events2->setName("match u11A");
        $events2->setDateCreated(new \DateTime());
        $events2->setDuration(null);
        $events2->setStatus($status);
        $events2->setLocation($location2);
        $manager->persist($events2);  

        $events3 = new Event();
        $events3->setName("match u11B");
        $events3->setDateCreated(new \DateTime());
        $events3->setDuration(null);
        $events3->setStatus($status1);
        $events3->setLocation($location3);
        $manager->persist($events3);  

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
        $team1->setCategory($category1);
        $team1->setEvents($events1);
        $team1->setName("A");
        $team1->setImage("team1.png");      
        $manager->persist($team1);

        $team2 = new Team();
        $team2->setCategory($category3);
        $team2->setEvents($events2);
        $team2->setName("B");
        $team2->setImage("team2.png");      
        $manager->persist($team2);

        $team3 = new Team();
        $team3->setCategory($category2);
        $team3->setEvents($events3);
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
                        ->setUpdatedAt($faker->dateTime())
                        ->setTeam($t);  
                $manager->persist($player);  
           }
        }

        $manager->flush();

    }
}
