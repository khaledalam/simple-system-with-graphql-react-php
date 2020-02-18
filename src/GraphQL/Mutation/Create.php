<?php

declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\Entity\Buyer;
use App\Entity\Orders;
use App\Entity\Product;
use App\Utils;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class Create implements MutationInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function Product(string $productName): Product
    {
        $product = new Product($productName);
        $this->em->persist($product);
        $this->em->flush();
        return $product;
    }

    public function Buyer(string $buyerName): Buyer
    {
        $buyer = new Buyer($buyerName);
        $buyer->setAuthToken((new Utils())->generateToken());
        $this->em->persist($buyer);
        $this->em->flush();
        return $buyer;
    }

    public function Order(string $buyerID, array $productsIDs): Orders
    {
        $buyer = $this->em->getRepository(Buyer::class)->find(intval($buyerID));

        $order = new Orders();
        $order->setBuyer($buyer);
        foreach ($productsIDs as $productID)
        {
            $product = $this->em->getRepository(Product::class)->find(intval($productID));
            $this->em->persist($product);
            $order->addProduct($product);
        }
        $this->em->persist($buyer);
        $this->em->persist($order);
        $this->em->flush();
        return $order;
    }
}