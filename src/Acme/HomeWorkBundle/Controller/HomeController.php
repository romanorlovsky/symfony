<?php

namespace Acme\HomeWorkBundle\Controller;

class HomeController extends DefaultController
{
    public function indexAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:Category')
            ->findAll();

        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->findByNick('admin');

        return $this->render('AcmeHomeWorkBundle:Home:index.html.twig', array(
                'categories' => $categories,
                'user' => $user
            )
        );
    }
}
