<?php
namespace App\Services;

use App\Entity\Author;
use App\Entity\Books;
use App\Entity\Country;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

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
        $author = $data->input("authors");
        $realeaseDate = $data->input("release_date"); //fix this date format
        
        $bookEntity->setName($data->input('name'))
            ->setIsbn($data->input("isbn"))
            ->setCountry($em->find(Country::class, $data->input("country")))
            ->setCreatedOn(new DateTime())
            ->setNumber_of_pages($data->input("number_of_pages"))
            ->setRelease_date($realeaseDate);

            if(is_numeric($author)){
                $bookEntity->addAuthors($em->find(Author::class, $author));
            }else if(is_string($author)){

                $authorEntity = new Author;
                $authorEntity->setAuthorName($author)->setBook($bookEntity);
                $em->persist($authorEntity);
            }else{
                throw new Exception("Invalid Format");
            }


            $em->persist($bookEntity);
            $em->flush();
    }

    public function getBook(int $id)
    {
        // $this->entityManager
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

    public function getBookEntoty()
    {
        return $this->bookEntity;
    }
}
