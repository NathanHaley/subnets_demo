<?php

namespace App\Repository;

use App\Entity\Subnet;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Subnet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subnet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subnet[]    findAll()
 * @method Subnet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubnetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Subnet::class);
    }
}
