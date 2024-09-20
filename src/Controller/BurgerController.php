<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class BurgerController extends AbstractController
{

    const burgers = [
        ["id" => 1, "name" => "CroudCheese", "description" => "Un steak haché, une tranche de cheddar fondu, une rondelle de cornichon, des oignons, du ketchup et de la moutarde douce dans un pain classique ", "image" => "https://static01.nyt.com/images/2023/07/13/multimedia/13xp-cheese-king/13xp-cheese-king-videoSixteenByNineJumbo1600.jpg"],
        ["id" => 2, "name" => "CroudTasty"],
        ["id" => 3, "name" => "CroudBanane"],
        ["id" => 4, "name" => "CroudGang"]
    ];

    #[Route('/burgers', name: 'burgers')]

    public function liste(): Response
    {
        return $this->render('burger.html.twig', [
            "burgers" => self::burgers
        ]);
    }

    #[Route('/burgers/{id}', name: 'burger', methods: ['GET', 'POST'])]

    public function show($id): Response
    {
        return $this->render('description.html.twig', ["burger" => self::burgers[$id-1]]);
    }

}


?>