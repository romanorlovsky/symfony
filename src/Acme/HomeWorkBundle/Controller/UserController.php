<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends DefaultController
{
    public function indexAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->find($id);

        $loggedUser = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->find(1);

        if (!$user) {
            return $this->notFound($loggedUser);
        }

        return $this->render('AcmeHomeWorkBundle:User:index.html.twig', array(
                'user' => $loggedUser,
                'cUser' => $user
            )
        );
    }
}
