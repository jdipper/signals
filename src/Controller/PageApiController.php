<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Page;
use App\Form\PageType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Routing\ClassResourceInterface;

use App\Repository\PageRepository;

/**
 * @RouteResource(
 *     "Page",
 *     pluralize=false
 * )
 */
class PageApiController extends FOSRestController implements ClassResourceInterface
{

    public function cgetAction(PageRepository $pageRepository) : Response
    {
        $data = $pageRepository->findAll();
        //$data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
    } // "get_users"            [GET] /users

    public function getAction($id)
    {
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
    } // "get_users"            [GET] /users

}
