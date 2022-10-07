<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Form\Type\UserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractApiController
{
    #[Route(path: "api/users", name: "users", methods: ["GET"])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $users = $doctrine->getRepository(User::class)->findAll();
        
        return $this->json($users, Response::HTTP_OK, ["Content-Type" => "application/json"]);
    }

    #[Route(path: "api/users/create", name: "user_create", methods: ["POST"])]
    public function create(Request $request, ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $form = $this->buildForm(UserType::class);
        $form->handleRequest($request);
        
        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->json($form, Response::HTTP_BAD_REQUEST);
        }

        $user = $form->getData();
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json($user, Response::HTTP_OK, ["Content-Type" => "application/json"]);
    }
}
