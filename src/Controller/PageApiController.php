<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Page;
use App\Form\PageType;

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
        $form = $this->createForm(PageType::class, $page);
        //$page->setTitle($data['title']);
        //$page->setContent($data['content']);
        $form->submit($data);


	    $em = $this->getDoctrine()->getManager();
        $em->persist($page);
        $em->flush();

        $response = new Response('It worked. Believe me - I\'m an API', 201);
        $response->headers->set('Location', '/some/programmer/url');

        return $response;
        
    }
}
