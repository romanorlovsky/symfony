<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use Acme\HomeWorkBundle\Entity\Article;
use Acme\HomeWorkBundle\Entity\Page;
use Acme\HomeWorkBundle\Entity\User;

class ArticleController extends Controller
{

    public function indexAction()
    {
        $home = new Page();
        $home->setTitle('Home');
        $home->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

        $articles = array();

        for ($i = 0; $i < 5; ++$i) {
            $article = new Article();
            $article->setTitle('Article ' . ($i + 1));
            $article->setCreated(time());
            $article->setContent('Description ' . ($i + 1));

            $articles[] = $article;
        }

        $user = new User();
        $user->setNickName('romanorlosky');
        $user->setDisplayName('Roman Orlovsky');
        $user->setRegisterDate(time());

        return $this->render('AcmeHomeWorkBundle:Article:index.html.twig', array(
                'page' => $home,
                'articles' => $articles,
                'user' => $user
            )
        );
    }

    public function aboutAction()
    {
        $about = new Page();
        $about->setTitle('About');
        $about->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

        $user = new User();
        $user->setNickName('romanorlosky');
        $user->setDisplayName('Roman Orlovsky');
        $user->setRegisterDate(time());

        return $this->render('AcmeHomeWorkBundle:Article:about.html.twig', array(
                'page' => $about,
                'user' => $user
            )
        );
    }

    public function contactAction()
    {
        $contact = new Page();
        $contact->setTitle('Contact');
        $contact->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

        $user = new User();
        $user->setNickName('romanorlosky');
        $user->setDisplayName('Roman Orlovsky');
        $user->setRegisterDate(time());

        return $this->render('AcmeHomeWorkBundle:Article:contact.html.twig', array(
                'page' => $contact,
                'user' => $user
            )
        );
    }
}
