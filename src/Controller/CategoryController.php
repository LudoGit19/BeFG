<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="categories")
     */
    public function index(CategoryRepository $repository)
    {
        $categories = $repository->findAll();
        // dd($categories);
        return $this->render('category/categories.html.twig',[
            "categories" => $categories
        ]);
    }

    

     /**
     * @Route("/category/find", name="categories")
     */
    public function SelectCategoryWithTeam(CategoryRepository $repository)
    {
        $catAndTeam = $repository->getCategoryWithTeam();
        // dd($catAndTeam );
        return $this->render('category/categories.html.twig',[
            "catAndTeam" => $catAndTeam
        ]);
    }
}
