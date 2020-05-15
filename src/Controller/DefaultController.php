<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $em = $this->getDoctrine();

        /** @var Project[] $projects */
        $projects = $em->getRepository(Project::class)->findBy(
            [],
            ['createdAt' => 'DESC'],
            3,
            0
        );

        $users = $em->getRepository(User::class)->findAll();

        return $this->render('default/index.html.twig', [
            'projects' => $projects,
            'users' => $users,
        ]);
    }

    public function catMenu (CategoryRepository $categoryRepository)
    {
        return $this->render("default/_menu.html.twig", [
            "categories" => $categoryRepository->findAll()
        ]);
    }



}
