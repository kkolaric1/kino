<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("admin@admin.com");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword("\$argon2id\$v=19\$m=65536,t=4,p=1\$Ad5U4PUrOzm6QVleGS/uiQ$50O3JZOFtaJ87CJkK8Q2b515m/JBNeFyiqDDjoTG3oo");
        $manager->persist($user);

        $manager->flush();
    }
}
