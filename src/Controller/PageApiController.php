<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Page;

class PageApiController extends Controller
{
    /**
     * @Route("/page/api", name="page_api")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        //return $this->render('page_api/index.html.twig', [
        //    'controller_name' => 'PageApiController',
        //]);

        //return new response('Let\'s do this!');
	$data = json_decode($request->getContent(), true);
        $page = new Page();
        $page->setTitle($data['title']);
        $page->setContent($data['content']);

	$em = $this->getDoctrine()->getManager();
        $em->persist($page);
        $em->flush();

        return new Response('It worked. Believe me - I\'m an API');
        
    }
}
