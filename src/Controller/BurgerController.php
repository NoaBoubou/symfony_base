<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\BurgerRepository;


class BurgerController extends AbstractController
{

    #[Route('/burgers', name: 'burgers')]
    public function index(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();
        return $this->render('burger.html.twig', [
            "burgers" => $burgers
        ]);
    }


    #[Route('/burgers/{id}', name: 'detail', methods: ['GET', 'POST'])]
    public function show($id, BurgerRepository $burgerRepository): Response
    {
        $burger = $burgerRepository->find($id);
        return $this->render('description.html.twig',['burger' => $burger]);
    }

    #[Route('/burgers/{ingredient}', name: 'detail', methods: ['GET', 'POST'])]
    public function burgerByIngredient($ingredient, BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findBurgersWithIngredient($ingredient);
        return $this->render('burger.html.twig',['burgers' => $burgers]);
    }

    #[Route('/burgers/top/{limit}', name: 'detail', methods: ['GET', 'POST'])]
    public function topXBurgersByPrice($limit, BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findTopXBurgers($limit);
        return $this->render('burger.html.twig',['burgers' => $burgers]);
    }
    
}


?>