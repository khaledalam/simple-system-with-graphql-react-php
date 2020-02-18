<?php

namespace App\Controller;

use App\Entity\Buyer;
use App\Entity\Order;
use App\Entity\Orders;
use App\Entity\Product;
use App\Utils;
use Doctrine\ORM\Query;
use Overblog\GraphQLBundle\Annotation\Description;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class APIController extends AbstractController
{

    // -------------------------------- START PRODUCTS --------------------------------
    /**
     * @Route("/api/create/product", name="createProduct", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function createProduct(Request $request, EntityManagerInterface $em) :Response
    {
        $productName = $request->get('productName');
        $product = new Product($productName);
        $em->persist($product);
        $em->flush();
        return new Response('Saved new product name: ' . $product->getName() . ' with id: ' . $product->getId());
    }

    /**
     * @Route("/api/get/products", name="getProducts", methods={"POST", "GET"})
     * @return Response
     */
    public function getProducts() :Response
    {
        $query = $this->getDoctrine()
        ->getRepository(Product::class)
        ->createQueryBuilder('prod')
        ->addOrderBy('prod.id', 'DESC')
        ->getQuery();
        $result = $query->getResult(Query::HYDRATE_ARRAY);
        if (!$result) {
            return new Response(json_encode([]));
        }
        return new Response(json_encode($result));
    }

    // -------------------------------- END PRODUCTS --------------------------------


    // -------------------------------- START BUYERS --------------------------------
    /**
     * @Route("/api/create/buyer", name="createBuyer", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function createBuyer(Request $request, EntityManagerInterface $em) :Response
    {
        $buyerName = $request->get('buyerName');
        $buyer = new Buyer($buyerName);
        $buyer->setAuthToken((new Utils())->generateToken());
        $em->persist($buyer);
        $em->flush();
        return new Response('Saved new buyer: ' . $buyer->getName());
    }

    /**
     * @Route("/api/get/buyers", name="getBuyers", methods={"POST", "GET"})
     * @return Response
     */
    public function getBuyers() :Response
    {
        $query = $this->getDoctrine()
            ->getRepository(Buyer::class)
            ->createQueryBuilder('buyer')
            ->addOrderBy('buyer.id', 'DESC')
            ->getQuery();
        $result = $query->getResult(Query::HYDRATE_ARRAY);
        if (!$result) {
            return new Response(json_encode([]));
        }
        return new Response(json_encode($result));
    }

    /**
     * @Description("simple product name validation {length and existence}")
     * @param string $name
     * @return bool
     */
    private function isValidBuyerName(string $name) :bool
    {
        if ($name === null || strlen($name) <= 1 || strlen($name) > 10){
            return false;
        }
        $found = $this->getDoctrine()
            ->getRepository(Buyer::class)->findBy(['name' => $name]);

        return count($found) === 0;
    }
    // --------------------------------name END BUYERS --------------------------------

    // -------------------------------- START ORDERS --------------------------------
    /**
     * @Route("/api/create/order", name="createOrder", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function createOrder(Request $request, EntityManagerInterface $em) :Response
    {
        $buyerId = $request->get('buyerID');
        $productsIds = $request->get('productsIDs');

        if(!$buyerId || !$productsIds) {
            return new Response('Error empty inputs');
        }

        $buyer = $this->getDoctrine()->getRepository(Buyer::class)->find($buyerId);
        if(!$buyer){
            return new Response('No buyer found with id ' . $buyerId);
        }

        $order = new Orders();
        $order->setBuyer($buyer);

        foreach ($productsIds as $productId) {
            $product = $this->getDoctrine()->getRepository(Product::class )->find($productId['id']);
            if(!$product){
                return new Response('No product found with id ' . $productId);
            }
            $order->addProduct($product);
        }

        $em->persist($order);
        $em->flush();
        return new Response('Saved new order id: ' . $order->getId());
    }

    /**
     * @Route("/api/get/orders", name="getOrders", methods={"POST", "GET"})
     * @param Request $request
     * @return Response
     */
    public function getOrders(Request $request) :Response
    {
        $filterByBuyer = $request->get('filterByBuyer') ?? -1; // -1 means disable filter byBuyer

        $query = $this->getDoctrine()
            ->getRepository(Orders::class)
            ->createQueryBuilder('orders')
            ->addOrderBy('orders.id', 'DESC');

        if($filterByBuyer !== -1){
            $query->andWhere('orders.buyer = :buyerID')->setParameter('buyerID', $filterByBuyer);
        }
        $query = $query->getQuery();
        $result = $query->getResult(Query::HYDRATE_ARRAY);

        if (!$result) {
            return new Response(json_encode([]));
        }

        $orders = [];
        foreach ($result as $item) {
            $order = $this->getDoctrine()->getRepository(Orders::class)->find($item);
            $products = [];
            foreach ($order->getProducts() as $product) {
                $products[] = [
                    'productName' => $product->getName(),
                    'productID' => $product->getId(),
                ];
            }

            $orders[] = [
                'orderID' => $order->getId(),
                'buyerID' => $order->getBuyer()->getId(),
                'buyerName' => $order->getBuyer()->getName(),
                'products' => $products,
            ];
        }
        return new Response(json_encode($orders));
    }

    // -------------------------------- END ORDERS --------------------------------
}
