<?php

declare(strict_types=1);

namespace App\GraphQL\Resolver;

use App\Entity\Buyer;
use Doctrine\ORM\EntityManagerInterface;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class BuyerResolver implements ResolverInterface {

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

    public function resolve(int $id) :Buyer
    {
        return $this->em->find(Buyer::class, $id);
    }

    public function allBuyers() : array
    {
        return $this->em->getRepository(Buyer::class)->findAll();
    }

    public function id(Buyer $buyer) :int
    {
        return $buyer->getid();
    }

    public function name(Buyer $buyer) :string
    {
        return $buyer->getName();
    }

    public function authToken(Buyer $buyer) :string
    {
        return $buyer->getAuthToken();
    }
}