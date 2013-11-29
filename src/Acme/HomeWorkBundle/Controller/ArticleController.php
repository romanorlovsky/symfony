<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class ArticleController extends DefaultController
{
    public function indexAction($id)
    {
        /**
         * @var \Acme\HomeWorkBundle\Entity\Article $article
         */
        $article = $this->get('article_repository')->find($id);

        /**
         * @var \Acme\HomeWorkBundle\Entity\User $user
         */
        $user = $this->get('user_repository')->findByNick('admin');

        if (!$article) {
            return $this->notFound($user);
        }

        return $this->render('AcmeHomeWorkBundle:Article:index.html.twig', array(
                'article' => $article,
                'user' => $user
            )
        );
    }
}
