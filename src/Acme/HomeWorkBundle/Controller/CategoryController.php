<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoryController extends DefaultController
{

    public function indexAction($id)
    {
        $category = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:Category')
            ->find($id);

        $articles = array();

        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->findByNick('admin');

        if ($category) {
            $articles = $category->getArticles();
        } else {
            return $this->notFound($user);
        }

        return $this->render('AcmeHomeWorkBundle:Category:index.html.twig', array(
                'category' => $category,
                'articles' => $articles,
                'user' => $user
            )
        );
    }
}
