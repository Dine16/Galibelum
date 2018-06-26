<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /*
     * Relationship Mapping Metadata
     */
    public function __toString()
    {
        return  $this->firstName . ' - ' . $this->lastName . ' - ' . $this->phoneNumber;
    }

    /*
     * Relationship Mapping Metadata
     */

    /**
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Organization", inversedBy="user")
     * @ORM\JoinColumn(nullable=true)
     */
    private $organization;

    /*
     * Autogenerated methods / variables
     */

    /**
     *
     * @var int
     *
     * @ORM\Column(name="id",               type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="firstName",                                   type="string", length=32)
     * @Assert\Regex(pattern="/^[a-zàâçéèêëîïôûùüÿñæœ .-]*$/i", message="Votre prénom ne doit être composé que de lettres.")
     * @Assert\Length(min=2,                                           minMessage="Un prénom d'une lettre sérieusement ?")
     * @Assert\Length(max=32,                                          maxMessage="Le prénom doit être en dessous de 32 caractères.")
     */
    private $firstName;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=32)

     * @Assert\Regex(pattern="/^[a-zàâçéèêëîïôûùüÿñæœ .-]*$/i", message="Votre nom ne doit être composé que de lettres.")
     * @Assert\Length(min=2,                                           minMessage="Un nom inférieur à deux lettres sérieusement ?")
     * @Assert\Length(max=32,                                          maxMessage="Le nom doit être en dessous de 32 caractères.")
     */
    private $lastName;

    /**
     *
     * @var string
     *
     * @Assert\Regex(pattern="/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/",
     *     message="Votre numéro de téléphone doit être composé comme ceci : 06 00 00 00 00 ou +33 6.")
     * @ORM\Column(name="phoneNumber",                                                                                                     type="string", length=32)
     *
     * * @Assert\Type("string")
     * @Assert\NotBlank(
     *     message = "Veuillez saisir un numéro de téléphone"
     * )
     * @Assert\Length(
     *     min = 9,
     *     max = 32,
     *     exactMessage = "Veuillez saisir un numéro de téléphone valide"
     * )
     * @Assert\Regex(
     *     pattern = "/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/",
     *     message = "Veuillez saisir un numéro de téléphone valide"
     * )
     */
    private $phoneNumber;

    /**
     *
     * @var bool
     *
     * @ORM\Column(name="cgu", type="boolean")
     */
    private $cgu;

    /**
     *
     * @var string
     *
     * @Assert\Regex(pattern="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
     *     message="Le mot de passe doit au moins contenir 8 caractères alphanumériques dont au moins un chiffre.")
     */
    protected $plainPassword;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     *
     * @return User
     */
    public function setOrganization(Organization $organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return \AppBundle\Entity\Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber.
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $email = is_null($email) ? '' : $email;
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }


    /**
     * Set cgu.
     *
     * @param bool $cgu
     *
     * @return User
     */
    public function setCgu($cgu)
    {
        $this->cgu = $cgu;

        return $this;
    }

    /**
     * Get cgu.
     *
     * @return bool
     */
    public function getCgu()
    {
        return $this->cgu;
    }
}
