<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RentRepository::class)
 */
class Rent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameCustomer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idCustomer;

    /**
     * @ORM\Column(type="integer")
     */
    private $days;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInit;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinish;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serialNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCustomer(): ?string
    {
        return $this->nameCustomer;
    }

    public function setNameCustomer(string $nameCustomer): self
    {
        $this->nameCustomer = $nameCustomer;

        return $this;
    }

    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    public function setIdCustomer($idCustomer): void
    {
        $this->idCustomer = $idCustomer;
    }


    public function getDays(): ?int
    {
        return $this->days;
    }

    public function setDays(int $days): self
    {
        $this->days = $days;

        return $this;
    }

    public function getDateInit(): ?\DateTimeInterface
    {
        return $this->dateInit;
    }

    public function setDateInit(\DateTimeInterface $dateInit): self
    {
        $this->dateInit = $dateInit;

        return $this;
    }

    public function getDateFinish(): ?\DateTimeInterface
    {
        return $this->dateFinish;
    }

    public function setDateFinish(\DateTimeInterface $dateFinish): self
    {
        $this->dateFinish = $dateFinish;

        return $this;
    }

    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    public function setSerialNumber($serialNumber): void
    {
        $this->serialNumber = $serialNumber;
    }
}