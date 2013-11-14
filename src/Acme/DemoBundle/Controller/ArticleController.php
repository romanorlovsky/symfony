<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use Acme\DemoBundle\Entity\Article;
use Acme\DemoBundle\Entity\Page;

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

        return $this->render('AcmeDemoBundle:Article:index.html.twig', array(
                'page' => $home,
                'articles' => $articles
            )
        );
    }

    public function aboutAction()
    {
        $about = new Page();
        $about->setTitle('About');
        $about->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

        return $this->render('AcmeDemoBundle:Article:about.html.twig', array(
                'page' => $about
            )
        );
    }

    public function contactAction()
    {
        $contact = new Page();
        $contact->setTitle('Contact');
        $contact->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

        return $this->render('AcmeDemoBundle:Article:contact.html.twig', array(
                'page' => $contact
            )
        );
    }
}
