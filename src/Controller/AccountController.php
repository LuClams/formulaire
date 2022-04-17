<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * * @IsGranted("ROLE_USER")
 */
class AccountController extends AbstractController
{
    #[Route('/account/{id}', name: 'app_account')]
    public function app_account(): Response
    {
        return //new Response('<body>Coucou world !</body>');
            $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
