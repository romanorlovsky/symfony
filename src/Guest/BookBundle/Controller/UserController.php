<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function indexAction($id)
    {
        /**
         * @var \Guest\BookBundle\Entity\User $user
         */
        $user = $this->get('user_repository')->find($id);

        return $this->render('GuestBookBundle:User:index.html.twig', array(
                'user' => $user
            )
        );
    }
}
