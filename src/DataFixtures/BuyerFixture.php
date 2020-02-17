<?php

namespace App\DataFixtures;

use App\Entity\Buyer;
use App\Utils;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BuyerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        foreach (range(0, 25) as $i) {
            $buyer = new Buyer();
            $buyer->setName((new Utils())->randomPersonName());
            $buyer->setAuthToken((new Utils())->generateToken());
            $manager->persist($buyer);
        }
        $manager->flush();


    }
}
