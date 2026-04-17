<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class GlobalController extends AbstractController
{
    private array $films = [
        ['id' => 1, 'titre' => 'Inception', 'annee' => 2010],
        ['id' => 2, 'titre' => 'Interstellar', 'annee' => 2014],
        ['id' => 3, 'titre' => 'The Dark Knight', 'annee' => 2008],
    ];

    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('global/index.html.twig', [
            'message' => 'Bienvenue sur Movie Explorer',
        ]);
    }

    #[Route('/films', name: 'films')]
    public function films(): Response
    {
        return $this->render('global/films.html.twig', [
            'titre' => 'Liste des films',
            'films' => $this->films,
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('global/contact.html.twig');
    }

    #[Route('/film/{id}', name: 'film_detail')]
    public function filmDetail(int $id): Response
    {
        return new Response("Film numéro $id");
    }

    #[Route('/api/films', name: 'api_films')]
    public function apiFilms(): JsonResponse
    {
        return $this->json($this->films);
    }
}
