<?php

namespace App\Controller\Client;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController
{
    /**
     * @Route("/post/{id}", name="post")
     * @param $id
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function showPost($id,ArticleRepository $articleRepository): Response
    {
        return $this->render('client/post.html.twig', [
            'post' => $articleRepository->find($id),
        ]);
    }

}
