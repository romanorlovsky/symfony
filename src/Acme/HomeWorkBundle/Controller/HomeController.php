<?php

namespace Acme\HomeWorkBundle\Controller;

class HomeController extends DefaultController
{
    public function indexAction()
    {
        /**
         * @var \Acme\HomeWorkBundle\Entity\Category $categories
         */
        $categories = $this->get('category_repository')->findAll();

        /**
         * @var \Acme\HomeWorkBundle\Entity\User $user
         */
        $user = $this->get('user_repository')->findByNick('admin');

        return $this->render('AcmeHomeWorkBundle:Home:index.html.twig', array(
                'categories' => $categories,
                'user' => $user
            )
        );
    }
}
