<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guest\BookBundle\Form\Type\ArticleType;

class HomeController extends Controller
{
    public function indexAction($page)
    {
        /**
         * @var \Guest\BookBundle\Repository\ArticleRepository $articleRepository
         */
        $articleRepository = $this->get('article_repository');

        /**
         * @var \Knp\Component\Pager\Paginator $paginator
         */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $articleRepository->getDefaultQueryBuilder(),
            $page
        );

        $form = $this->createForm(
            new ArticleType(),
            null,
            array(
                'action' => $this->generateUrl('_article_create'),
                'method' => 'POST',
            )
        )->createView();

        return $this->render('GuestBookBundle:Home:index.html.twig', array(
                'pagination' => $pagination,
                'form' => $form
            )
        );
    }
}
