<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixture extends Fixture
{
    private function generateRandomString(int $length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length/strlen($x)) )),1,$length);
    }

    public function load(ObjectManager $manager)
    {

        foreach (range(0, 25) as $i) {
            $product = new Product();
            $product->setName($this->generateRandomString(rand(2, 9)));
            $manager->persist($product);
        }
        $manager->flush();


    }
}
