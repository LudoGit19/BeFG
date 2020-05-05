<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Status;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
       
       
            
        $status = new Status();
        $status->setName("reporté"); 
        $manager->persist($status);  

        $status1 = new Status();
        $status1->setName("ouvert");  
        $manager->persist($status1); 
            
       
        $events = new Event();
        $events->setName("match u11");
        $events->setDateCreated(new \DateTime());
        $events->setDuration(null); 
        $events->setStatus($status);
        $manager->persist($events); 
        
        $events1 = new Event();
        $events1->setName("match u17");
        $events1->setDateCreated(new \DateTime());
        $events1->setDuration(null);
        $events1->setStatus($status1); 
        $manager->persist($events1);  

        $events2 = new Event();
        $events2->setName("match u9");
        $events2->setDateCreated(new \DateTime());
        $events2->setDuration(null); 
        $events2->setStatus($status1);
        $manager->persist($events2);
               
 
      
        $manager->flush();
       
     

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
