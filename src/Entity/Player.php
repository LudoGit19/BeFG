<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 * @Vich\Uploadable
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=30,minMessage="minimum 2 caractères",maxMessage="maximum 30 caractères")
     */
    private $fname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=30,minMessage="minimum 2 caractères",maxMessage="maximum 30 caractères")
     */
    private $lname;
// @Assert\Regex(pattern="[0-9]", message="number_only") 
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10,max=10)
     * 
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;


     /**
     * @Vich\UploadableField(mapping="player_image", fileNameProperty="image")
     *
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="joueurs")
     */
    private $team;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $yearOfBirth;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(string $fname): self
    {
        $this->fname = $fname;

        return $this;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function setLname(string $lname): self
    {
        $this->lname = $lname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }


    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;


    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }



    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getYearOfBirth(): ?string
    {
        return $this->yearOfBirth;
    }

    public function setYearOfBirth(string $yearOfBirth): self
    {
        $this->yearOfBirth = $yearOfBirth;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }


     public function __toString()
    {
           return (string) $this->lname;
    }
}
