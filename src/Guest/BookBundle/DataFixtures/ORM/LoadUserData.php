<?php

namespace Guest\BookBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Guest\BookBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $guest1 = new User();
        $guest1->setName('Guest1');
        $guest1->setEmail('guest1@gmail.com');

        $manager->persist($guest1);

        $manager->flush();

        $this->addReference('guest1', $guest1);

        $guest2 = new User();
        $guest2->setName('Guest2');
        $guest2->setEmail('guest2@gmail.com');

        $manager->persist($guest2);

        $manager->flush();

        $this->addReference('guest2', $guest2);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}