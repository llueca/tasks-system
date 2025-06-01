<?php

namespace App\Users\Infrastructure\Repositories;

use App\Users\Domain\ValueObjects\EmailAddress;
use App\Users\Domain\ValueObjects\UserId;
use App\Users\Infrastructure\Entities\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserRepository extends ServiceEntityRepository implements \App\Users\Domain\Repositories\UserRepository
{
    public function __construct(ManagerRegistry $registry, private readonly UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct($registry, User::class);
    }

    public function create(\App\Users\Domain\Entities\User $user, string $password): void
    {
        $userToPersist = new User();
        $userToPersist->setEmail((string) $user->email);
        $userToPersist->setPassword($this->passwordHasher->hashPassword($userToPersist, $password));
        $userToPersist->setPublicId((string) $user->id);
        $userToPersist->setFirstName($user->firstName);
        $userToPersist->setLastName($user->lastName);

        $entityManager = $this->getEntityManager();
        $entityManager->persist($userToPersist);
        $entityManager->flush();
    }

    public function getById(UserId $id): \App\Users\Domain\Entities\User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.public_id = :userId')
            ->setParameter('userId', (string) $id)
            ->getQuery()
            ->getOneOrNullResult()
            ?->toDomain()
        ;
    }

    public function getByEmail(EmailAddress $emailAddress): \App\Users\Domain\Entities\User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.email = :emailAddress')
            ->setParameter('emailAddress', (string) $emailAddress)
            ->getQuery()
            ->getResult()
            ->toDomain();
    }
}
