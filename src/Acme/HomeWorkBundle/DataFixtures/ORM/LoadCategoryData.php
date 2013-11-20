<?php

namespace Acme\HomeWorkBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HomeWorkBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setTitle('Main');

        $manager->persist($category);

        $category = new Category();
        $category->setTitle('Other');

        $manager->persist($category);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}