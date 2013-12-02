<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        /**
         * @var \Guest\BookBundle\Entity\Article $articles
         */
        $articles = $this->get('article_repository')->findAll();

        return $this->render('GuestBookBundle:Home:index.html.twig', array(
                'articles' => $articles
            )
        );
    }
}
