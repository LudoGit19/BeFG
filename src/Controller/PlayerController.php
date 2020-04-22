<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayerController extends AbstractController
{
    /**
     * @Route("/member/players", name="players")
     */
    public function index(PlayerRepository $repo, PaginatorInterface $paginatorInterface, Request $request)

    {
        $players =  $paginatorInterface->paginate(
            $repo->findAllWithPagination(), 
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );;
        
        return $this->render('player/players.html.twig', [
            "players" => $players
        ]);
    }
}
