<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActivityRepository")
 */
class Activity
{
    /**
     *
     * @var /date
     *
     * @ORM\Column(name="creationDate", type="date", nullable=false)
     */
    private $creationDate;

    /*
     * Relationship Mapping Metadata
     */

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Offer", mappedBy="activity")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activities;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Organization", inversedBy="organizationActivity")
     * @ORM\JoinColumn(nullable=false)
     */
    private $organizationActivities;

    /*
     * Autogenerated methods / variables
     */

    /**
     *
     * @var int
     *
     * @ORM\Column(name="id",               type="integer")
     * @Assert\Type("integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32)
     * @Assert\Regex(pattern="/^[a-zàâçéèêëîïôûùüÿñæœ .-]*$/i", message="Votre prénom ne doit être composé que de lettres.")
     * @Assert\Type("string")
     * @Assert\NotBlank(
     *     message = "Veuillez saisir un nom"
     * )
     * @Assert\Length(
     *      min = 2,
     *      max = 32,
     * )
     */
    private $name;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="nameCanonical", type="string", length=32, nullable=true)
     */
    private $nameCanonical;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 32,
     * )
     */
    private $type;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     *
     * @Assert\NotBlank(
     *     message="Veuillez détailler votre activité"
     * )
     * @Assert\Length(
     *      min = 32,
     *      max = 255,
     * )
     */
    private $description;

    /**
     *
     * @var date
     *
     * @ORM\Column(name="dateStart", type="date")
     *
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $dateStart;

    /**
     *
     * @var date
     *
     * @ORM\Column(name="dateEnd", type="date")
     *
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $dateEnd;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=64, nullable=true)
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 64,
     * )
     */
    private $address;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="mainGame", type="string", length=32, nullable=true)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 32,
     * )
     */
    private $mainGame;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="urlVideo", type="string", length=128, nullable=true)
     *
     * @Assert\Length(
     *      max = 128,
     * )
     * @Assert\Url(
     *     protocols = {"http", "https", "ftp"},
     *     checkDNS = "ANY",
     * )
     */
    private $urlVideo;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="achievement", type="string", nullable=true)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     * )
     */
    private $achievement;

    /**
     *
     * @var array
     *
     * @ORM\Column(name="socialLink", type="array")
     *
     * @Assert\NotBlank()
     */
    private $socialLink;

    /**
     *
     * @ORM\Column(name="uploadPdf", type="string", nullable=true)
     *
     * @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage="Le type du fichier est invalide ({{ type }}). Le type accepté est PDF"
     * )
     */
    private $uploadPdf;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setCreationDate(new \DateTime());
    }

    // Adding personal methods

    /**
     * Return id string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->id . '';
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Activity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameCanonical
     *
     * @param string $nameCanonical
     *
     * @return Activity
     */
    public function setNameCanonical($nameCanonical)
    {
        $this->nameCanonical = $nameCanonical;

        return $this;
    }

    /**
     * Get nameCanonical
     *
     * @return string
     */
    public function getNameCanonical()
    {
        return $this->nameCanonical;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Activity
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Activity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Activity
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set mainGame
     *
     * @param string $mainGame
     *
     * @return Activity
     */
    public function setMainGame($mainGame)
    {
        $this->mainGame = $mainGame;

        return $this;
    }

    /**
     * Get mainGame
     *
     * @return string
     */
    public function getMainGame()
    {
        return $this->mainGame;
    }

    /**
     * Set urlVideo
     *
     * @param string $urlVideo
     *
     * @return Activity
     */
    public function setUrlVideo($urlVideo)
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    /**
     * Get urlVideo
     *
     * @return string
     */
    public function getUrlVideo()
    {
        return $this->urlVideo;
    }

    /**
     * Set achievement
     *
     * @param string $achievement
     *
     * @return Activity
     */
    public function setAchievement($achievement)
    {
        $this->achievement = $achievement;

        return $this;
    }

    /**
     * Get achievement
     *
     * @return string
     */
    public function getAchievement()
    {
        return $this->achievement;
    }

    /**
     * Set socialLink
     *
     * @param array $socialLink
     *
     * @return Activity
     */
    public function setSocialLink($socialLink)
    {
        $this->socialLink = $socialLink;

        return $this;
    }

    /**
     * Get socialLink
     *
     * @return array
     */
    public function getSocialLink()
    {
        return $this->socialLink;
    }

    /**
     * Add activity
     *
     * @param \AppBundle\Entity\Offer $activity
     *
     * @return Activity
     */
    public function addActivity(Offer $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove activity
     *
     * @param \AppBundle\Entity\Offer $activity
     */
    public function removeActivity(Offer $activity)
    {
        $this->activities->removeElement($activity);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set organizationActivities
     *
     * @param \AppBundle\Entity\Organization $organizationActivities
     *
     * @return Activity
     */
    public function setOrganizationActivities(Organization $organizationActivities)
    {
        $this->organizationActivities = $organizationActivities;

        return $this;
    }

    /**
     * Get organizationActivities
     *
     * @return \AppBundle\Entity\Organization
     */
    public function getOrganizationActivities()
    {
        return $this->organizationActivities;
    }

    /**
     * Set creationDate.
     *
     * @param \DateTime $creationDate
     *
     * @return Activity
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate.
     *
     * @return Date
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set dateStart.
     *
     * @param \DateTime $dateStart
     *
     * @return Activity
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart.
     *
     * @return Date
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd.
     *
     * @param \DateTime $dateEnd
     *
     * @return Activity
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd.
     *
     * @return Date
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    public function getUploadPdf()
    {
        return $this->uploadPdf;
    }

    public function setUploadPdf($uploadPdf)
    {
        $this->uploadPdf = $uploadPdf;

        return $this;
    }
}
