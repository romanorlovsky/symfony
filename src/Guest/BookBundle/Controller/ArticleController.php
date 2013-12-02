<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ArticleController extends Controller
{
    public function indexAction($id)
    {
        /**
         * @var \Guest\BookBundle\Entity\Article $article
         */
        $article = $this->get('article_repository')->find($id);

        if (!$article) {

        }

        return $this->render('GuestBookBundle:Article:index.html.twig', array(
                'article' => $article
            )
        );
    }
}
