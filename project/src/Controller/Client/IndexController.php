<?php

namespace App\Controller\Client;

use App\Repository\ArticleRepository;
use Elastica\Util;
use FOS\ElasticaBundle\Finder\TransformedFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('client/index.html.twig', [
            'posts' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/search", name="search")
     * @param ArticleRepository $articleRepository
     * @param Request $request
     * @param TransformedFinder $articlesFinder
     * @return Response
     */
    public function search(ArticleRepository $articleRepository,Request $request,TransformedFinder $articlesFinder): Response
    {
        $elSearch = $request->query->get('q');

        $a = $articlesFinder->find($elSearch);
        return $this->render('client/index.html.twig', [
            'posts' => $a,
        ]);
    }


    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('client/about.html.twig', [
            'controller_name' => 'indexController',
        ]);
    }
}
