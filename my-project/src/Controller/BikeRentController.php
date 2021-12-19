<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\BikeServices\Application\Bike\RentBike\RentBike;

class BikeRentController extends AbstractController
{
    /**
     * @Route("/bike/rent", name="bike_rent")
     */
    public function __invoke(Request $request, RentBike $rentBike): Response
    {
        return new Response (json_encode($rentBike->__invoke(json_decode($request->getContent(), true)), true), Response::HTTP_OK);
    }
}
