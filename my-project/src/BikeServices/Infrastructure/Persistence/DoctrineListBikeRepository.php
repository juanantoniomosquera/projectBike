<?php

namespace App\BikeServices\Infrastructure\Persistence;

use App\BikeServices\Domain\ListBike\BikeRepository;
use App\Entity\Bike;
use App\Entity\Rent;
use App\BikeServices\Domain\RentBike\RentBike;

class DoctrineListBikeRepository extends DoctrineRepository implements BikeRepository
{
    public function list(): ?array
    {
        $bikesArray = [];
        $bikes = $this->repository(Bike::class)->findAll();

        foreach ($bikes as $bike) {
            $bikesArray[] = [
                'serial_number' => $bike->getSerialNumber(),
                'type' => $bike->getType(),
                'available' => $bike->getAvailable(),
            ];
        }
        return $bikesArray;
    }

    public function rent(array $data):string
    {
        if(empty(RentBike::validateDataDomain($data))) {
            throw new \Exception("Error in data");
        }

        $bikesAvailable = $this->bikesAvailable($data);
        if(empty($bikesAvailable)) {
            throw new \Exception("No bikes available");
        }

        return $this->generateRent($data, $bikesAvailable);
    }

    private function bikesAvailable(array $data):array
    {
        return $this->repository(Bike::class)->findBy(['type' => $data['type'], 'available' => true]);
    }

    public function generateRent(array $data, array $bikesAvailable):string
    {
        $dateInit = new \DateTime($data['dateInit']);
        $bikesAvailable[0]->setAvailable(false);
        $newRentBike = new Rent();
        $newRentBike->setIdCustomer($data['idCustomer']);
        $newRentBike->setNameCustomer($data['nameCustomer']);
        $newRentBike->setDateInit(new \DateTime($data['dateInit']));
        $newRentBike->setDateFinish($dateInit->add(new \DateInterval('P'.$data['days'].'D')));
        $newRentBike->setDays($data['days']);
        $newRentBike->setSerialNumber($bikesAvailable[0]->getSerialNumber());
        $this->entityManager()->persist($newRentBike);
        $this->entityManager()->flush();

        return $bikesAvailable[0]->getSerialNumber();
    }

    public function return(array $data):string
    {
        $bikeRented = $this->getBikeRented($data);
        if(empty($bikeRented)) {
            throw new \Exception("No bikes found");
        }

        //TODO comparar dia actual con $data[0]->getDataFinish() para ver si hay sobrecoste
        //sumar coste y dias y si existe sobre coste devolver sumado
        //Poner como available la bicicleta en Bike

        return '66';
    }

    private function getBikeRented(array $data):array
    {
        return $this->repository(Rent::class)->findBy(['serial_number' => $data['serialNumber']]);
    }
}