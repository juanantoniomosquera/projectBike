<?php

namespace App\Command;

use App\Entity\Bike;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LoadDataCommand
 * @package App\Command
 */
class LoadDataCommand extends Command
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:LoadData')->setDescription('Insert data')
            ->setHelp('insert data in db');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = [
            ['serial_number' => '1111111', 'type' => 'normal'],
            ['serial_number' => '1111112', 'type' => 'normal'],
            ['serial_number' => '1111113', 'type' => 'normal'],
            ['serial_number' => '2222221', 'type' => 'premium'],
            ['serial_number' => '2222222', 'type' => 'premium'],
            ['serial_number' => '2222223', 'type' => 'premium'],

        ];

        foreach ($data as $d) {
            $bike = new Bike();
            $bike->setSerialNumber($d['serial_number']);
            $bike->setType($d['type']);
            $bike->setAvailable(1);

            $this->doctrine->getManager()->persist($bike);
        }

        $this->doctrine->getManager()->flush();

        return 0;
    }
}