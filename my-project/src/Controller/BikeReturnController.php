<?php

namespace App\Controller;

use App\BikeServices\Application\Bike\ReturnBike\ReturnBike;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BikeReturnController extends AbstractController
{
    /**
     * @Route("/bike/return", name="bike_return")
     */
    public function __invoke(Request $request, ReturnBike $returnBike): Response
    {
        return new Response (json_encode($returnBike->__invoke(json_decode($request->getContent(), true)), true), Response::HTTP_OK);
    }
}
