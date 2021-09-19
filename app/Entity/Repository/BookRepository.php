<?php

namespace App\Entity\Repository;

use App\Entity\Books;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class BookRepository extends EntityRepository
{

    public function getBookJson($id)
    {
        //["b.name, b.isbn, b.number_of_pages , b.publisher, b.country, b.release_date", "a.authorName"]
        $em = $this->getEntityManager();
        $repo = $em->createQueryBuilder("b")
            ->select(["partial b.{id,name, isbn, number_of_pages, publisher, release_date, country}", "partial a.{id,authorName}"])
            ->from(Books::class, "b")
        // ->leftJoin("b.country", "c")
            ->leftJoin("b.author", "a")
            ->where("b.id = :id")
            ->setParameters([
                "id" => $id,
            ])->getQuery()->getArrayResult();
           
        return $repo;
    }

    public function getBooks()
    {
        $em = $this->getEntityManager();
        $repo = $em->createQueryBuilder("b")
            ->select(["partial b.{id,name, isbn, publisher}", "partial a.{id,authorName}"])
            ->from(Books::class, "b")
        // ->leftJoin("b.country", "c")
            ->join("b.author", "a")
            ->getQuery()->getResult(Query::HYDRATE_ARRAY);
            
        return $repo;
    }

}
