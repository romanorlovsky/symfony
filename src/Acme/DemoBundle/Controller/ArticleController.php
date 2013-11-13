<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{

    public function indexAction()
    {
        $article = array(
            'title' => 'Home',
            'project_name' => 'Article'
        );

        return $this->render('AcmeDemoBundle:Article:index.html.twig', $article);
    }

    public function aboutAction()
    {
        $article = array(
            'id' => 1,
            'title' => 'About',
            'desc' => 'Hello world',
            'project_name' => 'Article'
        );

        return $this->render('AcmeDemoBundle:Article:about.html.twig', $article);
    }

    public function contactAction()
    {
        $article = array(
            'id' => 1,
            'title' => 'Contact',
            'desc' => 'Hello world',
            'page_title' => 'Contact',
            'project_name' => 'Article'
        );

        return $this->render('AcmeDemoBundle:Article:contact.html.twig', $article);
    }
}
