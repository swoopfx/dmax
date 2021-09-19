<?php
namespace App\Services;

use App\Entity\Author;
use App\Entity\Books;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class BooksService
{

    private $entityManager;

    private $bookEntity;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    public function createBook($data)
    {
        $bookEntity = $this->bookEntity;
        $em = $this->entityManager;
        $author = $data["authors"];
        // $realeaseDate = $data["release_date"] ?? null;
        // if ($realeaseDate !== null) {

        //     $date = DateTime::createFromFormat('j/m/Y', $realeaseDate);
        // }
        // var_dump($date);
        $bookEntity->setName($data['name'] ?? null)
            ->setIsbn($data["isbn"] ?? null)
            ->setCountry($data["country"] ?? null)
            ->setCreatedOn(new DateTime())
            ->setNumber_of_pages($data["number_of_pages"] ?? null)
            ->setPublisher($data["publisher"])
            ->setRelease_date($data["release_date"] ?? null);

        $authorEntity = new Author;
        $authorEntity->setAuthorName($author)->setBook($bookEntity);
        $em->persist($authorEntity);

        $em->persist($bookEntity);
        $em->flush();
        // $book = $em->getRepository(Books::class)->getBookJson($bookEntity->getId());
        // var_dump($book);

        return $em->getRepository(Books::class)->getBookJson($bookEntity->getId());

    }

    public function getBook(int $id)
    {
        $em = $this->entityManager;
        return $em->getRepository(Books::class)->getBookJson($id);
    }

    public function readBooks()
    {
        $em = $this->entityManager;
        return $em->getRepository(Books::class)->getBooks();
    }

    public function updateBook($data, $id)
    {
        $em = $this->entityManager;
        $bookEntity = $em->find(Books::class, $id);
        $author = $data["authors"];
        // $realeaseDate = $data["release_date"] ?? null;
        // if ($realeaseDate !== null) {

        //     $date = DateTime::createFromFormat('j/m/Y', $realeaseDate);
        // }
        // var_dump($date);
        $bookEntity->setName($data['name'] ?? null)
            ->setIsbn($data["isbn"] ?? null)
            ->setCountry($data["country"] ?? null)
            ->setUpdatedOn(new DateTime())
            ->setNumber_of_pages($data["number_of_pages"] ?? null)
            ->setPublisher($data["publisher"])
            ->setRelease_date($data["release_date"] ?? null);

        $authorEntit = $bookEntity->getAuthor();
        foreach ($authorEntit as $aut) {
            $aut->setBook(null);
            $em->persist($aut);
        }
        $authorEntity = new Author;
        $authorEntity->setAuthorName($author)->setBook($bookEntity);
        $em->persist($authorEntity);

        $em->persist($bookEntity);
        $em->flush();

        return $em->getRepository(Books::class)->getBookJson($bookEntity->getId());

    }

    public function removeBook($id){
        $em= $this->entityManager;
        $bookEntity = $em->find(Books::class, $id);
        $bookName = $bookEntity->getName();
        $em->remove($bookEntity);
        $em->flush();
        return $bookName;
    }

    public function setEntityManager($em)
    {
        $this->entityManager = $em;
        return $this;
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function setBookEntity($bookEntity)
    {
        $this->bookEntity = $bookEntity;
        return $this;
    }

    public function getBookEntity()
    {
        return $this->bookEntity;
    }
}
