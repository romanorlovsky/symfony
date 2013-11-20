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
        $mainCategory = $this->getReference('main-category');
        $otherCategory = $this->getReference('other-category');

        $user = $this->getReference('admin-user');

        for ($i = 0; $i < 5; ++$i) {
            $article = new Article();
            $article->setTitle('Article ' . ($i + 1));
            $article->setContent('Description ' . ($i + 1));

            $category = ($i % 2 == 0) ? $mainCategory : $otherCategory;

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