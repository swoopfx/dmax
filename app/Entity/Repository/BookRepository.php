<?php

namespace App\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class BookRepository extends EntityRepository
{

    public function getBookJson($id)
    {
        $em = $this->getEntityManager();
        $repo = $em->createQueryBuilder()->where("s.id = :id")
            ->select(["b", "a", "c"])
            ->leftJoin("b.country", "c")
            ->leftJoin("b.authors", "a")
            ->setParameters([
                "id" => $id,
            ])->getQuery()->getResult(Query::HYDRATE_ARRAY);
        return $repo;
    }

}
