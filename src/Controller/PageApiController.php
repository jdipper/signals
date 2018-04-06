<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageApiController extends Controller
{
    /**
     * @Route("/page/api", name="page_api")
     * @Method("POST")
     */
    public function newAction()
    {
        //return $this->render('page_api/index.html.twig', [
        //    'controller_name' => 'PageApiController',
        //]);

        return new response('Let\'s do this!');
        
    }
}
