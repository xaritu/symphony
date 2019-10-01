<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/08/27
 * Time: 16:26
 */

namespace App\Controller;


use App\Entity\Article;
use App\Form\ArticleType;
use App\Service\HelloTest;
//use App\Service\TestWork;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/article", name="blogarticle_list")
 */
class ArticleController extends AbstractController
{

    /**
     * @Route("/", name="blogarticle_article")
     */
    public function article() {

        return $this->render("Base.html.twig");

    }
    /**
     * @Route("/demo ", name="blogarticle_demo")
     */
    public function demo(HelloTest $helloTest){
        $message = $helloTest->getTest();
//        $this->addFlash('success', $message);
        return new Response($message);
    }

    /**
     * @Route("/list", name="blogarticle_list")
     */
   public function article_list() {

       $repository = $this->getDoctrine()->getRepository(Article::class);
       $article = $repository->findAll();

       return $this->render("list.html.twig",array('list' => $article));


   }

    /**
     * @Route("/new ", name="blogarticle_test")
     */
    public function new(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article, ['method' => 'GET']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $doc = $this->getDoctrine()->getManager();

            $doc->persist($article);
            $doc->flush();

            return new RedirectResponse('/article/list');
        }

        return $this->render("create.html.twig",[
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/edit/{id} ", name="blogarticle_edit")
     */
    public function edit(Request $request, $id)
    {
        $doc = $this->getDoctrine()->getManager();
        $repository = $doc->getRepository(Article::class);
        $article = $repository->find($id);
        $form = $this->createForm(ArticleType::class, $article, ['method' => 'GET']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $doc = $this->getDoctrine()->getManager();

            $doc->persist($article);
            $doc->flush();

            return new RedirectResponse('/article/list');
        }

        return $this->render("edit.html.twig",[
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id} ", name="blogarticle_list1")
     */
    public function article_list1($id){

        $repository = $this->getDoctrine()->getRepository(Article::class);
        $article = $repository->find($id);
        return new  Response('ID: '.$article->getId().'<br/>Title: '.$article->getTitle().'<br/>Content: '.$article->getContent() );
    }


    /**
     * @Route("/delete/{id} ", name="blogarticle_delete")
     */
    public function delete($id){

        $doc = $this->getDoctrine()->getManager();
        $repository = $doc->getRepository(Article::class);
        $article = $repository->find($id);

        $doc->remove($article);
        $doc->flush();
        return new RedirectResponse('/article/list');
    }






}