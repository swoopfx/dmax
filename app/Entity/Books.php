<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 */
class Books
{

    /**
     *
     * @var int @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="namee", type="string", nullable=true)
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="isbn", type="string", nullable=true)
     *
     * @var string
     */
    private $isbn;

    /**
     * @ORM\OneToMany(targetEntity="Author", mappedBy="books")
     *
     * @var
     *
     */
    private $authors;

    /**
     * @ORM\ManyToOne(targetEntity="Country")
     *
     * @var Country
     */
    private $country;

    /**
     * @ORM\Column(name="number_of_pages", type="string", nullable=true)
     *
     * @var string
     */
    private $number_of_pages;

    /**
     * @ORM\Column(name="publisher", type="string", nullable=true)
     *
     * @var string
     */
    private $publisher;

    /**
     * @ORM\Column(name="release_date", type="date", nullable=true)
     *
     * @var Datetime
     */
    private $release_date;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
     *
     * @var Datetime
     */
    private $createdOn;

    /**
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     *
     * @var Datetime
     */
    private $updatedOn;

    public function __contruct()
    {
        $this->authors = new ArrayCollection();
    }

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return the $isbn
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     *
     * @return the $authors
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     *
     * @return the $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     *
     * @return the $number_of_pages
     */
    public function getNumber_of_pages()
    {
        return $this->number_of_pages;
    }

    /**
     *
     * @return the $publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     *
     * @return the $release_date
     */
    public function getRelease_date()
    {
        return $this->release_date;
    }

    /**
     *
     * @return the $createdOn
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     *
     * @return the $updatedOn
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     *
     * @param number $id            
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @param string $name            
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @param string $isbn            
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
        return $this;
    }

    // /**
    // * @param \App\Entity\Collection $authors
    // */
    // public function setAuthors($authors)
    // {
    // $this->authors = $authors;
    // return $this;
    // }
    public function addAuthors(Author $authors)
    {
        if (! $this->subscriber->contains($authors)) {
            $this->authors[] = $authors;
            $authors->setBook($this);
        }
        return $this;
    }

    public function removeAuthors(Author $authors)
    {
        if ($this->subscriber->contains($authors)) {
            $this->authors->removeElement($authors);
            $authors->setBook(NULL);
        }
        return $this;
    }

    /**
     *
     * @param \App\Entity\Country $country            
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     *
     * @param string $number_of_pages            
     */
    public function setNumber_of_pages($number_of_pages)
    {
        $this->number_of_pages = $number_of_pages;
        return $this;
    }

    /**
     *
     * @param string $publisher            
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     *
     * @param \App\Entity\Datetime $release_date            
     */
    public function setRelease_date($release_date)
    {
        $this->release_date = $release_date;
        return $this;
    }

    /**
     *
     * @param \App\Entity\Datetime $createdOn            
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        $this->updatedOn = $createdOn;
        return $this;
    }

    /**
     *
     * @param \App\Entity\Datetime $updatedOn            
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updatedOn = $updatedOn;
        return $this;
    }
}