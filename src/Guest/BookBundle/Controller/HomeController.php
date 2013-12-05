<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction($page)
    {
        /**
         * @var \Guest\BookBundle\Entity\ArticleRepository $query
         */
        $query = $this->get('article_repository');

        /**
         * @var \Knp\Component\Pager\Paginator $paginator
         */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query->getDefaultQueryBuilder(),
            $page
        );

        return $this->render('GuestBookBundle:Home:index.html.twig', array(
                'pagination' => $pagination
            )
        );
    }
}
