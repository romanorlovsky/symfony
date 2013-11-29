<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoryController extends DefaultController
{

    public function indexAction($id)
    {
        /**
         * @var \Acme\HomeWorkBundle\Entity\Category $category
        */
        $category = $this->get('category_repository')->find($id);

        $articles = array();

        /**
         * @var \Acme\HomeWorkBundle\Entity\User $user
         */
        $user = $this->get('user_repository')->findByNick('admin');

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
