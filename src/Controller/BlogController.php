<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/", name="home")
     */

    public function home(){
        return $this->render('blog/home.html.twig',[
            'title' => "Bienvenu dans ma premiere page symfony",
            'age' => 12,
        ]);
    }
   /**
     * @Route("/blog/article/12", name="blog_show")
     */
    public function show(){
        return $this->render('blog/show.html.twig');
    }
}
