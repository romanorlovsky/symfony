<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    protected function notFound(\Acme\HomeWorkBundle\Entity\User $user)
    {
        return $this->render('AcmeHomeWorkBundle::404.html.twig', array(
                'user' => $user
            )
        );
    }
}
