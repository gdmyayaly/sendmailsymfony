<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(MailerInterface $mailer): Response
    {
        $transport = new EsmtpTransport('localhost');
        $mailer = new Mailer($transport);
        $email = (new Email())
        ->from('contact@cultureteamgrow.com')
        ->to('devyayaly@gmail.com')
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('Time for Symfony Mailer!')
        // ->text('Sending emails is fun again!')
        ->html('<p>See Twig integration for better HTML integration!</p>');
        $mailer->send($email);
  //  $mailer->send($email);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
