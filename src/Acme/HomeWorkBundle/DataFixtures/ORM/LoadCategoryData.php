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
        $mainCategory = new Category();
        $mainCategory->setTitle('Main');
        $manager->persist($mainCategory);

        $otherCategory = new Category();
        $otherCategory->setTitle('Other');
        $manager->persist($otherCategory);

        $manager->flush();

        $this->addReference('main-category', $mainCategory);
        $this->addReference('other-category', $otherCategory);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}