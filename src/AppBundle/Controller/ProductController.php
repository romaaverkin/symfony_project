<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     * @Template()
     */
    public function indexAction()
    {
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive();

        return ['products' => $products];
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @Template()
     * @param Product $product
     * @return array
     */
    public function showAction(Product $product)
    {
        $name = $product->getCategory()->getName();
        dump($product);

        return ['product' => $product];
    }

    /**
     * @Route("/category/{id}", name="product_by_category")
     * @Template()
     * @param Category $category
     * @return array
     */
    public function listByCategoryAction(Category $category)
    {
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findByCategory($category);

        return ['products' => $products];
    }

    //Если более сложная логика
//    public function showAction($id)
//    {
//        $product = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);
//
//        if (!$product) {
//            throw $this->createNotFoundException('Product not found');
//        }
//
//        return $this->render('@App/product/show.html.twig', ['product' => $product]);
//    }
}