<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use App\Entity\SearchTeam;
use App\Form\SearchTeamType;
use App\Form\SearchPlayerType;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TeamController extends AbstractController
{
   
    /**
     * @Route("/member/team", name="teams")
     */
    public function index(TeamRepository $repository, PaginatorInterface $paginatorInterface, Request $request)
    {

        $searchTeam = new SearchTeam();

        $form = $this->createForm(SearchTeamType::class, $searchTeam);
        $form->handleRequest($request);

        $teams = $paginatorInterface->paginate(
            $repository->findAllTeam($searchTeam),
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
       
        // dd($events);
        return $this->render('team/teams.html.twig',[
            "teams" => $teams,
            "formSearchTeam" => $form->createView()
           
        ]);
    }

    

   


}
