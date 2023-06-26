<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/car', name: 'app_car')]
    public function index(CarRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $cars=$paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 20
        );

        return $this->render('car/index.html.twig', [
            'cars'=>$cars
        ]);
    }
}
