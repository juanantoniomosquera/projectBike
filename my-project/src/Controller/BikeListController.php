<?php

namespace App\Controller;

use App\Services\Infrastructure\Persistence\PersistenceMariaDB;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\BikeServices\Application\Bike\ListBike\ListBike;

class BikeListController extends AbstractController
{
    /**
     * @Route("/bike/list", name="bike_list")
     */
    public function __invoke(ListBike $listBike): Response
    {
        return new Response (json_encode($listBike->__invoke(), true), Response::HTTP_OK);
    }
}
