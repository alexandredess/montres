<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProductListController extends AbstractController
{
    #[Route('/product/list', name: 'app_product_list')]
    public function index(ProductRepository $productRepository): Response
    {
       

        return $this->render('product_list/index.html.twig', [
            'controller_name' => 'ProductListController',
            'products'=> $productRepository->findAll()
        ]);
    }
}
