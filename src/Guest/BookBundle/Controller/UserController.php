<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function indexAction($id, $page)
    {
        /**
         * @var \Guest\BookBundle\Repository\UserRepository $user
         */
        $user = $this->get('user_repository')->find($id);

        if (!$user) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        /**
         * @var \Guest\BookBundle\Repository\ArticleRepository $articleRepository
         */
        $articleRepository = $this->get('article_repository');

        /**
         * @var \Knp\Component\Pager\Paginator $paginator
         */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $articleRepository->getArticlesByUser($id),
            $page
        );

        return $this->render('GuestBookBundle:User:index.html.twig', array(
                'user' => $user,
                'pagination' => $pagination
            )
        );
    }
}
