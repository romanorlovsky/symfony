<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArticleController extends Controller
{
    /**
     * @Route("/", name="_article")
     * @Template()
     */
    public function indexAction()
    {
        return array('title' => 'Article actions');
    }

    public function viewAction()
    {
        $article = array(
            'id' => 1,
            'title' => 'Hello',
            'desc' => 'Hello world'
        );

        return $this->render('AcmeDemoBundle:Article:view.html.twig', $article);
    }

    public function editAction()
    {
        $article = array(
            'id' => 1,
            'title' => 'Hello',
            'desc' => 'Hello world',
            'page_title' => 'Edit article'
        );

        return $this->render('AcmeDemoBundle:Article:edit.html.twig', $article);
    }
}
