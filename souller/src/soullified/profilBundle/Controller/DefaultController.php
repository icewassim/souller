<?php

namespace soullified\profilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('soullifiedprofilBundle:Default:index.html.twig');
    }
}
