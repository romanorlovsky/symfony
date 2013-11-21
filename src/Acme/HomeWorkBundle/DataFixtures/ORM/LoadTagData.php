<?php

namespace Acme\HomeWorkBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HomeWorkBundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $symfony = new Tag();
        $symfony->setText('symfony');
        $manager->persist($symfony);

        $doctrine = new Tag();
        $doctrine->setText('doctrine');
        $manager->persist($doctrine);

        $php = new Tag();
        $php->setText('php');
        $manager->persist($php);

        $manager->flush();

        $this->addReference('tag-php', $php);
        $this->addReference('tag-doctrine', $doctrine);
        $this->addReference('tag-symfony', $symfony);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}