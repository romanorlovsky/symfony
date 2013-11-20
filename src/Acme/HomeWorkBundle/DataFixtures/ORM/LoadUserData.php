<?php

namespace Acme\HomeWorkBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Acme\HomeWorkBundle\Entity\User;

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
        $admin = new User();
        $admin->setNick('admin');

        /*$encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($admin);

        $admin->setPassword($encoder->encodePassword('123123', md5(uniqid())));*/
        $admin->setPassword('123123');
        $admin->setDisplayName('Roman Orlovsky');

        $manager->persist($admin);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}