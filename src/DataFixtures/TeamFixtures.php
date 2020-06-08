<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Event;
use App\Entity\Status;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
 

        $team1 = new Team();
        $team1->setName('u9 rouge');
        $team1->setImage("team1.png");   
    
        $manager->persist($team1);

        $manager->flush();
    }
}
