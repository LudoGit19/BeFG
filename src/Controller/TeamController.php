<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TeamController extends AbstractController
{
   
    /**
     * @Route("/team", name="teams")
     */
    public function index(TeamRepository $repository)
    {
        $teams = $repository->findAll();
        // dd($events);
        return $this->render('team/teams.html.twig',[
            "teams" => $teams,
           
        ]);
    }
}
