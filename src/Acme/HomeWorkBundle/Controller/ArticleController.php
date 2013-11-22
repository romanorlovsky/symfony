<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class ArticleController extends DefaultController
{
    public function indexAction($id)
    {
        $article = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:Article')
            ->find($id);

        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->findByNick('admin');

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
