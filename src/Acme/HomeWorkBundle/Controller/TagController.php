<?php

namespace Acme\HomeWorkBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class TagController extends DefaultController
{
    public function indexAction($id)
    {
        /**
         * @var \Acme\HomeWorkBundle\Entity\Tag $tag
         */
        $tag = $this->get('tag_repository')->find($id);

        /**
         * @var \Acme\HomeWorkBundle\Entity\User $user
         */
        $user = $this->get('user_repository')->findByNick('admin');

        if (!$tag) {
            return $this->notFound($user);
        }

        $articles = $tag->getArticles();

        return $this->render('AcmeHomeWorkBundle:Tag:index.html.twig', array(
                'tag' => $tag,
                'articles' => $articles,
                'user' => $user
            )
        );
    }
}
