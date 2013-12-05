<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ArticleController extends Controller
{
    public function indexAction($id)
    {
        /**
         * @var \Guest\BookBundle\Entity\ArticleRepository $article
         */
        $article = $this->get('article_repository')->find($id);

        if (!$article) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        return $this->render('GuestBookBundle:Article:index.html.twig', array(
                'article' => $article
            )
        );
    }

    public function updateAction($id)
    {
        /**
         * @var \Guest\BookBundle\Entity\ArticleRepository $repository
         */
        $repository = $this->get('article_repository');

        /**
         * @var \Guest\BookBundle\Entity\Article $article
         */
        $article = $repository->find($id);

        if (!$article) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        $article->setContent('');
        $repository->getManager()->flush();

        return $this->redirect($this->generateUrl('_article', array('id' => $id)));
    }

    public function removeAction($id)
    {
        /**
         * @var \Guest\BookBundle\Entity\ArticleRepository $repository
         */
        $repository = $this->get('article_repository');

        $article = $repository->find($id);

        if (!$article) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        $repository->getManager()->remove($article);
        $repository->getManager()->flush();

        return $this->redirect($this->generateUrl('_article_welcome'));
    }
}
