<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class MailService
{

    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer) {

        $this->mailer = $mailer;

    }

    public function sendMail(
        string $from,
        string $subject,
        string $template,
        array $context,
        string $to = 'contact@testMailer.com'

    ){
        $email = (new TemplatedEmail())

            ->from($from)
            ->subject($subject)
            ->to(new Address($to))
            ->htmlTemplate($template)
            ->context($context);

        $this->mailer->send($email);
    }
}
