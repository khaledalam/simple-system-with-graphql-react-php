<?php

namespace App\Controller;

use App\Entity\Buyer;
use App\Entity\Order;
use App\Entity\Product;
use App\Repository\BuyerRepository;
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
        if (!$this->isValidProductName($productName)) {
            return new Response('Error!');
        }
        $product = new Product();
        $product->setName($productName);
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
        ->getRepository('App:Product')
        ->createQueryBuilder('prod')
        ->addOrderBy('prod.id', 'DESC')
        ->getQuery();
        $result = $query->getResult(Query::HYDRATE_ARRAY);
        if (!$result) {
            throw $this->createNotFoundException('No products');
        }
        return new Response(json_encode($result));
    }

    /**
     * @Description("simple product name validation {length and existence}")
     * @param string $name
     * @return bool
     */
    private function isValidProductName(string $name) :bool
    {
        if ($name === null || strlen($name) <= 1 || strlen($name) > 10){
            return false;
        }
        $found = $this->getDoctrine()
            ->getRepository('App:Product')->findBy(['name' => $name]);

        return count($found) === 0;
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
        if (!$this->isValidBuyerName($buyerName)) {
            return new Response('Error!');
        }
        $buyer = new Buyer();
        $buyer->setName($buyerName);
        $buyer->setAuthToken($this->generateToken());
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
            ->getRepository('App:Buyer')
            ->createQueryBuilder('buyer')
            ->addOrderBy('buyer.id', 'DESC')
            ->getQuery();
        $result = $query->getResult(Query::HYDRATE_ARRAY);
        if (!$result) {
            throw $this->createNotFoundException('No buyers');
        }
        return new Response(json_encode($result));
    }

    private function generateToken() :string
    {
        return rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
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
            ->getRepository('App:Buyer')->findBy(['name' => $name]);

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
        $buyerId = $request->get('buyersId');
        $productsIds = $request->get('productsIds');

        $buyer = $this->getDoctrine()
            ->getRepository('App:Buyer')->findBy(['id' => $buyerId]);

        $products = [];
        foreach ($productsIds as $productId) {
            $products[] = $this->getDoctrine()
                ->getRepository('App:Product')->findBy(['id' => $buyerId]);
        }

//        $order = new Order();
//        $order->setBuyer($buyer);
//        $order->set
//
//        if (!$this->isValidProductName($buyerName)) {
//            return new Response('Error!');
//        }
//        $buyer = new Buyer();
//        $buyer->setName($buyerName);
//        $buyer->setName($this->generateToken());
//        $em->persist($buyer);
//        $em->flush();
//        return new Response('Saved new buyer name: ' . $buyer->getName());
    }

    /**
     * @Route("/api/get/buyers", name="getBuyers", methods={"POST", "GET"})
     * @return Response
     */
//    public function getBuyers() :Response
//    {
//        $query = $this->getDoctrine()
//            ->getRepository('App:Buyer')
//            ->createQueryBuilder('buyer')
//            ->addOrderBy('buyer.id', 'DESC')
//            ->getQuery();
//        $result = $query->getResult(Query::HYDRATE_ARRAY);
//        if (!$result) {
//            throw $this->createNotFoundException('No buyers');
//        }
//        return new Response(json_encode($result));
//    }

    // -------------------------------- END ORDERS --------------------------------
}
