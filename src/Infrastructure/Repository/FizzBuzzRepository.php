<?php
/*
 * Description of
 * @FizzBuzzRepository
 * @author Francisco Javier Pérez Murciego
 * @25-09-2022
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\FizzBuzz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FizzBuzz>
 *
 * @method FizzBuzz|null find($id, $lockMode = null, $lockVersion = null)
 * @method FizzBuzz|null findOneBy(array $criteria, array $orderBy = null)
 * @method FizzBuzz[]    findAll()
 * @method FizzBuzz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FizzBuzzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FizzBuzz::class);
    }

    public function save(FizzBuzz $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FizzBuzz $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
