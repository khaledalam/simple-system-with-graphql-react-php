<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Utils;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixture extends Fixture
{
   public function load(ObjectManager $manager)
    {

        foreach (range(0, 25) as $i) {
            $product = new Product();
            $product->setName((new Utils())->randomPersonName());
            $manager->persist($product);
        }
        $manager->flush();


    }
}
