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

    #[Route('/burgers/{id}', name: 'burger', methods: ['GET', 'POST'])]
    public function show($id, BurgerRepository $burgerRepository): Response
    {
        $burger = $burgerRepository->find($id);
    
        if (!$burger) {
            throw $this->createNotFoundException('Le burger avec l\'ID ' . $id . ' n\'existe pas.');
        }
    
        // Rendu de la vue avec le burger trouvé
        return $this->render('description.html.twig', ["burger" => $burger]);
    }
    


}


?>