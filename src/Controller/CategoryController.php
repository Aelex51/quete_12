<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository)
    {
        $Categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $Categories,
        ]);
    }

    #[Route('/{categoryName}', name: 'show')]
    public function show(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);

        if (!$categoryName) {
            throw $this->createNotFoundException(
                'No category with the name : '.$categoryName.' found in category table.'
            );
        }

        $shows = $programRepository->findBy(['category' => $category], ['id' => 'DESC'], 3);

        return $this->render('category/show.html.twig', [
            'shows' => $shows,
            'category' => $category
        ]);
    }
}


