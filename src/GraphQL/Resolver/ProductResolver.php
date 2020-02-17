<?php
namespace App\GraphQL\Resolver;

use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductResolver implements ResolverInterface, AliasedInterface {

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args)
    {
        $product = $this->em->getRepository('App:Product')->find($args['id']);
        return $product;
    }

    public static function getAliases() :array
    {
        return [
            'resolve' => 'Product'
        ];
    }
}