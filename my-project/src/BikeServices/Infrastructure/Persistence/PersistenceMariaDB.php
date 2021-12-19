<?php

declare(strict_types = 1);

namespace App\BikeServices\Infrastructure\Persistence;

use App\Entity\Bike;
use App\Entity\Rent;
use App\Repository\BikeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PersistenceMariaDB implements Persistence
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function list(): array
    {
        return $this->doctrine->getManager()->getRepository(Bike::class)->findAll();
    }

    public function bikeAdd(array $params):bool
    {
        try {
            $bike = new Bike();
            $bike->setSerialNumber($params['serial_number']);
            $bike->setType($params['type']);

            $this->doctrine->getManager()->persist($bike);
            $this->doctrine->getManager()->flush();
            return true;
        } catch(\Exception $e) {
            return false;
        }
    }

    public function bikesAvailable(array $data):array
    {
        return $this->doctrine->getManager()->getRepository(Bike::class)->findBy(['type' => $data['type'], 'available' => true]);
    }

    public function rent(array $data, array $bikesAvailable):string
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
        $this->doctrine->getManager()->persist($newRentBike);
        $this->doctrine->getManager()->flush();

        return $bikesAvailable[0]->getSerialNumber();
    }

}