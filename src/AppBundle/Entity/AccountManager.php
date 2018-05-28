<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountManager
 *
 * @ORM\Table(name="account_manager")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccountManagerRepository")
 */
class AccountManager
{
    /*
     * Autogenerated methods / variables
     */

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Offer", mappedBy="managerOffer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $managerOffers;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Organization", mappedBy="managerOganization")
     * @ORM\JoinColumn(nullable=false)
     */
    private $managerOrganizations;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=64)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=32)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=32)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=64)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return AccountManager
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return AccountManager
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return AccountManager
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return AccountManager
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return AccountManager
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->managerOffers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->managerOrganizations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add managerOffer
     *
     * @param \AppBundle\Entity\Offer $managerOffer
     *
     * @return AccountManager
     */
    public function addManagerOffer(\AppBundle\Entity\Offer $managerOffer)
    {
        $this->managerOffers[] = $managerOffer;

        return $this;
    }

    /**
     * Remove managerOffer
     *
     * @param \AppBundle\Entity\Offer $managerOffer
     */
    public function removeManagerOffer(\AppBundle\Entity\Offer $managerOffer)
    {
        $this->managerOffers->removeElement($managerOffer);
    }

    /**
     * Get managerOffers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManagerOffers()
    {
        return $this->managerOffers;
    }

    /**
     * Add managerOrganization
     *
     * @param \AppBundle\Entity\Organization $managerOrganization
     *
     * @return AccountManager
     */
    public function addManagerOrganization(\AppBundle\Entity\Organization $managerOrganization)
    {
        $this->managerOrganizations[] = $managerOrganization;

        return $this;
    }

    /**
     * Remove managerOrganization
     *
     * @param \AppBundle\Entity\Organization $managerOrganization
     */
    public function removeManagerOrganization(\AppBundle\Entity\Organization $managerOrganization)
    {
        $this->managerOrganizations->removeElement($managerOrganization);
    }

    /**
     * Get managerOrganizations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManagerOrganizations()
    {
        return $this->managerOrganizations;
    }
}
