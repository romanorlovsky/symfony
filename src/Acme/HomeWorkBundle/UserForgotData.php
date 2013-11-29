<?php

namespace Acme\HomeWorkBundle;

use Acme\HomeWorkBundle\Entity\User;

class UserForgotData
{
    /**
     * @var \Swift_Mailer $mailer
     */
    protected $mailer;

    /**
     * @var \Swift_SmtpTransport $transport
     */
    protected $transport;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function setTransport($encryption, $port, $host, $user, $password)
    {
        $this->transport = \Swift_SmtpTransport::newInstance()
            ->setHost($host)
            ->setEncryption($encryption)
            ->setPort($port)
            ->setUsername($user)
            ->setPassword($password);
    }

    public function sendData(User $user)
    {
        /**
         * @var \Swift_Message $message
         */
        $message = $this->mailer->createMessage();
        $message->setTo(array($user->getEmail()));
        $message->setFrom('symfony@localhost');
        $message->setSubject("Forgot data");
        $message->setBody(
            "Nick: " . $user->getNick() . "\r\n" .
            "Password: " . $user->getPassword()
        );

        $this->mailer->newInstance($this->transport)->send($message);
    }
} 