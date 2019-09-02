<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/08/27
 * Time: 16:12
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/test", name="blogTest")
     */
    public function test()
    {
        return new Response("Test !");
    }

    /**
     * @Route("/", name="blog_index")
     */
    public function index()
    {
        return $this->render("base.html.twig");
    }
}