<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IpRepository")
 */
class Ip
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subnet", inversedBy="ips")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subnet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_tag;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ip;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubnet(): ?string
    {
        return $this->subnet->getSubnet();
    }

    public function setSubnet(?Subnet $subnet): self
    {
        $this->subnet = $subnet;

        return $this;
    }

    public function getAddressTag(): ?string
    {
        return $this->address_tag;
    }

    public function setAddressTag(string $address_tag): self
    {
        $this->address_tag = $address_tag;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }
}
