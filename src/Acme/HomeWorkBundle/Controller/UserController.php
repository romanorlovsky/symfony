<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends DefaultController
{
    public function indexAction($id)
    {
        /**
         * @var \Acme\HomeWorkBundle\Entity\User $user
         */
        $user = $this->get('user_repository')->find($id);

        /**
         * @var \Acme\HomeWorkBundle\Entity\User $loggedUser
         */
        $loggedUser = $this->get('user_repository')->findByNick('admin');

        if (!$user) {
            return $this->notFound($loggedUser);
        }

        return $this->render('AcmeHomeWorkBundle:User:index.html.twig', array(
                'user' => $loggedUser,
                'cUser' => $user
            )
        );
    }

    public function forgotDataAction($id)
    {
        /**
         * @var \Acme\HomeWorkBundle\Entity\User $user
         */
        $user = $this->get('user_repository')->find($id);

        if (!$user) {
            return $this->redirect($this->generateUrl('user'));
        }

        $this->get('user_forgot_data')->sendData($user);

        return $this->redirect($this->generateUrl('_user', array('id' => $user->getId())));
    }
}
