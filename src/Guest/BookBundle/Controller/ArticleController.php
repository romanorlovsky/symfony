<?php

namespace Guest\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Guest\BookBundle\Form\Type\ArticleType;

class ArticleController extends Controller
{
    public function indexAction($id)
    {
        /**
         * @var \Guest\BookBundle\Repository\ArticleRepository $article
         */
        $article = $this->get('article_repository')->find($id);

        if (!$article) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        return $this->render('GuestBookBundle:Article:index.html.twig', array(
                'article' => $article
            )
        );
    }

    public function createAction(Request $request)
    {
        $form = $this->createForm(new ArticleType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            /**
             * @var \Guest\BookBundle\Entity\Article $data
             */
            $data = $form->getData();

            /**
             * @var \Guest\BookBundle\Repository\UserRepository $userRepository
             */
            $userRepository = $this->get('user_repository');

            /**
             * @var \Guest\BookBundle\Entity\User $dataUser
             */
            $dataUser = $data->getUser();

            $email = $dataUser->getEmail();

            /**
             * @var \Guest\BookBundle\Entity\User $user
             */
            $user = $userRepository->findByEmail($email);

            if ($user) {
                $data->setUser($user);
            } else {
                $em = $userRepository->getManager();
                $em->persist($dataUser);
                $em->flush();
            }

            /**
             * @var \Guest\BookBundle\Repository\ArticleRepository $articleRepository
             */
            $articleRepository = $this->get('article_repository');

            $em = $articleRepository->getManager();
            $em->persist($data);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('_article_welcome'));
    }

    public function editAction($id)
    {
        /**
         * @var \Guest\BookBundle\Repository\ArticleRepository $repository
         */
        $repository = $this->get('article_repository');

        /**
         * @var \Guest\BookBundle\Entity\Article $article
         */
        $article = $repository->find($id);

        if (!$article) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        $form = $this->createForm(
            new ArticleType(),
            $article,
            array(
                'action' => $this->generateUrl('_article_update', array('id' => $id)),
                'method' => 'POST',
            )
        )->createView();

        return $this->render('GuestBookBundle:Article:edit.html.twig', array(
                'article' => $article,
                'form' => $form
            )
        );
    }

    public function updateAction($id, Request $request)
    {
        /**
         * @var \Guest\BookBundle\Repository\ArticleRepository $articleRepository
         */
        $articleRepository = $this->get('article_repository');

        /**
         * @var \Guest\BookBundle\Entity\Article $article
         */
        $article = $articleRepository->find($id);

        if (!$article) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        $form = $this->createForm(new ArticleType(), $article);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $articleRepository->getManager();
            $em->persist($article);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('_article', array('id' => $id)));
    }

    public function removeAction($id)
    {
        /**
         * @var \Guest\BookBundle\Repository\ArticleRepository $repository
         */
        $repository = $this->get('article_repository');

        $article = $repository->find($id);

        if (!$article) {
            return $this->redirect($this->generateUrl('_not_found'));
        }

        $repository->getManager()->remove($article);
        $repository->getManager()->flush();

        return $this->redirect($this->generateUrl('_article_welcome'));
    }
}
