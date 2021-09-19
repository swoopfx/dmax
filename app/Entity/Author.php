<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="author")
 */

class Author {

     /**
     *
     * @var int @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="author_name", type="string", nullable=true)
     * @var string
     */
    private $authorName;

    /**
     * @ORM\ManyToOne(targetEntity="Books", inversedBy="author")
     * @var Books
     */
    private $book;
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $authorName
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @return the $book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
        return $this;
    }

    /**
     * @param \App\Entity\Books $book
     */
    public function setBook($book)
    {
        $this->book = $book;
        return $this;
    }

}