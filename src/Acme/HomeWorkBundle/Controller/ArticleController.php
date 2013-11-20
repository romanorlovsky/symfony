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
        $categories = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:Category')
            ->findAll();

        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->find(1);

        return $this->render('AcmeHomeWorkBundle:Article:index.html.twig', array(
                'categories' => $categories,
                'user' => $user
            )
        );
    }

    public function userAction($id)
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

    public function categoryAction($id)
    {
        $category = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:Category')
            ->find($id);

        $articles = array();

        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->find(1);

        if ($category) {
            $articles = $category->getArticles();
        } else {
            return $this->notFound($user);
        }

        return $this->render('AcmeHomeWorkBundle:Article:category.html.twig', array(
                'category' => $category,
                'articles' => $articles,
                'user' => $user
            )
        );
    }

    public function articleAction($id)
    {
        $article = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:Article')
            ->find($id);

        $user = $this->getDoctrine()
            ->getRepository('AcmeHomeWorkBundle:User')
            ->find(1);

        if (!$article) {
            return $this->notFound($user);
        }

        return $this->render('AcmeHomeWorkBundle:Article:article.html.twig', array(
                'article' => $article,
                'user' => $user
            )
        );
    }

    private function notFound($user = array())
    {
        return $this->render('AcmeHomeWorkBundle::404.html.twig', array(
                'user' => $user
            )
        );
    }
}
