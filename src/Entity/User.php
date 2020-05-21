<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields = {"username"},
 * message = "le user existe déjà !" )
 */
class User implements UserInterface  
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,max=10,minMessage="Au moins 5 caractères",maxMessage="max 10 caractères")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Regex(pattern="/^(?=.*[a-z])(?=.*\d).{6,}$/i", message="New password is required to be minimum 6 chars in length and to include at least one letter and one number.")
     */
    private $password;
//  @Assert\Length(min=5,max=10,minMessage="Au moins 5 caractères",maxMessage="max 10 caractères")
    /**
     * @Assert\EqualTo(propertyPath="password", message="Les mdp ne correspondent pas")
     *
     * @Assert\Regex(pattern="/^(?=.*[a-z])(?=.*\d).{6,}$/i", message="New password is required to be minimum 6 chars in length and to include at least one letter and one number.")
     */
    private $checkPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getRoles(): array
    {
        return [$this->roles];
    }

    public function setRoles(?string $roles): self
    {
        if($roles === null) {
            $this->roles= "ROLE_USER" ;
        } else {
            $this->roles = $roles;
        }

        return $this;
    }

    /**
     * Get the value of checkPassword
     */ 
    public function getCheckPassword()
    {
        return $this->checkPassword;
    }

    /**
     * Set the value of checkPassword
     *
     * @return  self
     */ 
    public function setCheckPassword($checkPassword)
    {
        $this->checkPassword = $checkPassword;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }
}
