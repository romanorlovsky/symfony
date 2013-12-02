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
} src/Acme/HomeWorkBundle/AcmeHomeWorkBundle.php src/Acme/HomeWorkBundle/Controller/ArticleController.php src/Acme/HomeWorkBundle/Controller/CategoryController.php src/Acme/HomeWorkBundle/Controller/DefaultController.php src/Acme/HomeWorkBundle/Controller/HomeController.php src/Acme/HomeWorkBundle/Controller/TagController.php src/Acme/HomeWorkBundle/Controller/UserController.php src/Acme/HomeWorkBundle/DataFixtures/ORM/LoadArticleData.php src/Acme/HomeWorkBundle/DataFixtures/ORM/LoadCategoryData.php src/Acme/HomeWorkBundle/DataFixtures/ORM/LoadTagData.php src/Acme/HomeWorkBundle/DataFixtures/ORM/LoadUserData.php src/Acme/HomeWorkBundle/DependencyInjection/AcmeHomeWorkExtension.php src/Acme/HomeWorkBundle/Entity/Article.php src/Acme/HomeWorkBundle/Entity/Category.php src/Acme/HomeWorkBundle/Entity/Tag.php src/Acme/HomeWorkBundle/Entity/User.php src/Acme/HomeWorkBundle/Repository/ArticleRepository.php src/Acme/HomeWorkBundle/Repository/CategoryRepository.php src/Acme/HomeWorkBundle/Repository/TagRepository.php src/Acme/HomeWorkBundle/Repository/UserRepository.php src/Acme/HomeWorkBundle/Resources/config/routing.yml src/Acme/HomeWorkBundle/Resources/config/services.xml src/Acme/HomeWorkBundle/Resources/public/css/starter-template.css src/Acme/HomeWorkBundle/Resources/public/images/user-logo.png src/Acme/HomeWorkBundle/Resources/views/404.html.twig src/Acme/HomeWorkBundle/Resources/views/Article/index.html.twig src/Acme/HomeWorkBundle/Resources/views/Category/index.html.twig src/Acme/HomeWorkBundle/Resources/views/Home/index.html.twig src/Acme/HomeWorkBundle/Resources/views/Tag/index.html.twig src/Acme/HomeWorkBundle/Resources/views/User/index.html.twig src/Acme/HomeWorkBundle/Resources/views/_navigation.html.twig src/Acme/HomeWorkBundle/Resources/views/layout.html.twig src/Acme/HomeWorkBundle/UserForgotData.php
