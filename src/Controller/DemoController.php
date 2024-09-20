<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoController extends AbstractController
{
    #[Route('/liste', name: 'liste')]
    public function liste(): Response
    {
        return $this->render('demo/demo.html.twig', [
        ]);
    }
}

?>