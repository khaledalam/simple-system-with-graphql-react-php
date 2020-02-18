<?php

declare(strict_types=1);

namespace App\GraphQL\Resolver;

use App\Entity\Buyer;
use App\Entity\Orders;
use Doctrine\ORM\EntityManagerInterface;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class OrderResolver implements ResolverInterface {

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(ResolveInfo $info, $value, Argument $args)
    {
        $method = $info->fieldName;
        return $this->$method($value, $args);
    }

    public function resolve(int $id) :Orders
    {
        return $this->em->find(Orders::class, $id);
    }

    public function allOrders() : array
    {
        return $this->em->getRepository(Orders::class)->findAll();
    }

    public function id(Orders $order) :int
    {
        return $order->getId();
    }

    public function buyer(Orders $order) :Buyer
    {
        return $order->getBuyer();
    }

    public function products(Orders $order) :Object
    {
        return $order->getProducts();
    }

    public function timestamp(Orders $order) :string
    {
        return $order->getTimestamp();
    }
}