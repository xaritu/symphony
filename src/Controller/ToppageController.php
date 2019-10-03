<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/09/03
 * Time: 11:15
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/", name="blogMain")
 */
class ToppageController extends AbstractController
{
    /**
     * @Route("/top", name="blogTop")
     */
    public function toppage(){

        //return $this->render("topheader.html.twig");
        return $this->render("top.html.twig");
    }
}