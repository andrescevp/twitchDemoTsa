<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('app/index.html.twig');
    }
}
