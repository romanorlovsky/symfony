<?php

namespace Acme\HomeWorkBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HomeWorkBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category1 = $manager->getRepository('AcmeHomeWorkBundle:Category')->find(1);
        $category2 = $manager->getRepository('AcmeHomeWorkBundle:Category')->find(2);

        $user = $manager->getRepository('AcmeHomeWorkBundle:User')->find(1);

        for ($i = 0; $i < 5; ++$i) {
            $article = new Article();
            $article->setTitle('Article ' . ($i + 1));
            $article->setContent('Description ' . ($i + 1));

            $category = ($i % 2 == 0) ? $category1 : $category2;

            $article->setCategory($category);
            $article->setUser($user);

            $manager->persist($article);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}