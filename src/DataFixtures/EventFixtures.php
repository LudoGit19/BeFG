<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Event;
use App\Entity\Status;
use App\Entity\Location;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $location1 = new Location();
        $location1->setName("stade");
        $location1->setAdress("rue du stade");
        $location1->setZip(56000);
        $location1->setCity("Vannes");
        $manager->persist($location1);

        // $location2 = new Location();
        // $location2->setName("complexe B");
        // $location2->setAdress("rue du complexe B");
        // $location2->setZip(35000);
        // $location2->setCity("Rennes");
        // $manager->persist($location2);

        // $location3 = new Location();
        // $location3->setName("complexe 1");
        // $location3->setAdress("complexe sportif");
        // $location3->setZip(56450);
        // $location3->setCity("Theix");
        // $manager->persist($location3);

        // $location4 = new Location();
        // $location4->setName("complexe 2");
        // $location4->setAdress("rue du stade bis");
        // $location4->setZip(56450);
        // $location4->setCity("suzu");
        // $manager->persist($location4);
       
        $status1 = new Status();
        $status1->setName("ouvert");  
        $manager->persist($status1); 

        $status2 = new Status();
        $status2->setName("clos");  
        $manager->persist($status2); 

        // $team1 = new Team();
        // $team1->setName("u9a");
        // $manager->persist($team1); 

    
        $event1 = new Event();
        $event1->setName("entrainement interne");
        $event1->setDateCreated(new \DateTime());
        $event1->setStatus($status1);
        $event1->setDuration(null);
        $event1->setLocation($location1);
        $manager->persist($event1);

        $event2 = new Event();
        $event2->setName("rose vs black");
        $event2->setDateCreated(new \DateTime());
        $event2->setStatus($status2);
        $event2->setDuration(null);
        $event2->setLocation($location1);
        $manager->persist($event2);




        
        // $events1 = new Event();
        // $events1->setLocation($location1);
        // $manager->persist($events1);  
        
        // $events1 = new Event();
        // $events1->setStatus($status1);
        // $manager->persist($events1);  
        
        // $events1->setName("entrainement");
        // $events1->setDateCreated(new \DateTime('10/06/2020'));
        // $events1->setDuration(null);
        // $manager->persist($events1); 
        



        // $status2 = new Status();
        // $status2->setName("reporté"); 
        // $manager->persist($status2);  

        // $events2 = new Event();
        // $events2->setLocation($location2);
        // $manager->persist($events2);  

        // $events2 = new Event();
        // $events2->setStatus($status2);
        // $manager->persist($events2);  

        // $events2->setName("tournoi u11");
        // $events2->setDateCreated(new \DateTime('11/06/2020'));
        // $events2->setDuration(null);
        // $manager->persist($events2);  

        // $events3 = new Event();
        // $events3->setLocation($location3);
        // $manager->persist($events3);  

        // $events3 = new Event();
        // $events3->setStatus($status2);
        // $manager->persist($events3);  

        // $events3->setName("tournoi u7");
        // $events2->setDateCreated(new \DateTime('08/07/2020'));
        // $events3->setDuration(null);
        // $manager->persist($events3); 

        
        $manager->flush();
        // $status = new Status();
        // $status->setName("reporté"); 
        // $manager->persist($status);  

        // $status1 = new Status();
        // $status1->setName("ouvert");  
        // $manager->persist($status1); 
            
       
        // $events = new Event();
        // $events->setName("match u11");
        // $events->setDateCreated(new \DateTime());
        // $events->setDuration(null); 
        // $events->setStatus($status);
        // $manager->persist($events); 
        
        // $events1 = new Event();
        // $events1->setName("match u17");
        // $events1->setDateCreated(new \DateTime());
        // $events1->setDuration(null);
        // $events1->setStatus($status1); 
        // $manager->persist($events1);  

        // $events2 = new Event();
        // $events2->setName("match u9");
        // $events2->setDateCreated(new \DateTime());
        // $events2->setDuration(null); 
        // $events2->setStatus($status1);
        // $manager->persist($events2);
               
 
      
       
     

        // $event2 = new Event();
        // $event2->setName("challenge jeune")
        //         ->setDateCreated(new \DateTime())
        //         ->setDuration(null)
        //         ->setStatus(null);

        // $manager->persist($event2);

        // $event3 = new Event();
        // $event3->setName("entraînment interne")
        //         ->setDateCreated(new \DateTime())
        //         ->setDuration(null)
        //         ->setStatus(null);

        // $manager->persist($event3);

        // $event4 = new Event();
        // $event4->setName("BBQ, école de foot")
        //         ->setDateCreated(new \DateTime())
        //         ->setDuration(null)
        //         ->setStatus(null);

       


       
    }
}
