<?php

namespace PlaningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/planing", name="planing")
     */
    public function indexAction()
    {
        


        return $this->render('@Planing/Default/index.html.twig');
    }
}
