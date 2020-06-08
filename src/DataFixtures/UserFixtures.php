<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setRoles("ROLE_USER");
        $user1->setUsername("testor");
        $user1->setPassword("user$1");
        $manager->persist($user1);

        $user2 = new User();
        $user2->setRoles("ROLE_ADMIN");
        $user2->setUsername("luvitipe");
        $user2->setPassword("admin$1");
        $manager->persist($user2);

        $manager->flush();
    }
}
