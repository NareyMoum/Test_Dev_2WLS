<?php

namespace App\Entity;

use ApiPlatform\Core\Validator\ValidatorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
 use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use App\Validator\Constraints as AcmeAssert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}}
 * )
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @AcmeAssert\ContainsUser
 */
class User
{

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('phone', new Assert\Regex([
            'pattern' => '/^((06)|(07))[0-9]{8}$/',
            'message'=> 'please insert a valid phone number starting with 06 or 07'
        ]));

     }


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
      */
    private $id;



    /**
     * @ORM\Column(type="string", length=180   )
     * @Assert\NotBlank
     * @Groups({"user:read", "user:write"})
      */
    private $birthDate;


    /**
     * @ORM\Column(type="string", length=180  )
     * @Assert\NotBlank
     * @Groups({"user:read", "user:write"})
     * @Assert\NotBlank()
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=180  )
     * @Assert\NotBlank

     * @Groups({"user:read", "user:write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=180  )
     *
     * @Groups({"user:read", "user:write"})
     */
    private $lastName;


    /**
     * @ORM\Column(type="string", length=180  )
     * @Assert\NotBlank

     * @Groups({"user:read", "user:write"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=180   )
     * @Assert\NotBlank

     * @Groups({"user:read", "user:write"})
     */
    private $country;



    /**
     * @ORM\Column(type="datetime", length=180   )
     *
     * @Groups({"user:read", })
     */
    private $registrationDate = null;

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate(  $birthDate): void
    {
         $this->birthDate =   $birthDate;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getRegistrationDate()
    {
        return  $this->registrationDate;
    }

    /**
     * @param mixed $registrationDate
     */
    public function setRegistrationDate( \DateTimeInterface  $registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }

    /**
     * @ORM\Column(type="string", length=180   )
     *
     * @Groups({"user:read" })
     */
    private $state;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
}
