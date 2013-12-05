<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function notFoundAction()
    {
        return $this->render('GuestBookBundle::404.html.twig');
    }
} 