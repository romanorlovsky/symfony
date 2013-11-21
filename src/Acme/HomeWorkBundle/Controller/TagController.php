<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class TagController extends DefaultController
{
    public function indexAction($id)
    {
        $tag = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:Tag')
            ->find($id);

        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->find(1);

        if (!$tag) {
            return $this->notFound($user);
        }

        $articles = $tag->getArticles();

        return $this->render('AcmeHomeWorkBundle:Tag:index.html.twig', array(
                'tag' => $tag,
                'articles' => $articles,
                'user' => $user
            )
        );
    }
}
