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

        $symfonyTag = $this->getReference('tag-symfony');
        $doctrineTag = $this->getReference('tag-doctrine');
        $phpTag = $this->getReference('tag-php');

        $user = $this->getReference('admin-user');

        for ($i = 0; $i < 10; ++$i) {
            $article = new Article();
            $article->setTitle('Article ' . ($i + 1));
            $article->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Description ' . ($i + 1));

            $category = ($i % 2 == 0) ? $mainCategory : $otherCategory;

            $article->setCategory($category);
            $article->setUser($user);

            if ($i % 2 == 0) {
                $article->addTag($symfonyTag);
                $article->addTag($phpTag);
            } else {
                $article->addTag($doctrineTag);
                $article->addTag($phpTag);
            }

            $manager->persist($article);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }
}