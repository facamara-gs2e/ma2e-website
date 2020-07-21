<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=30)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="code_adherent", type="string", length=30)
     */
    private $codeAdherent;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=30)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="date_create", type="string", length=100)
     */
    private $date_create;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return User
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return User
     */
    public function setCodeAdherent($codeAdherent)
    {
        $this->codeAdherent = $codeAdherent;

        return $this;
    }

    /**
     * Get codeAdherent
     *
     * @return string
     */
    public function getCodeAdherent()
    {
        return $this->codeAdherent;
    }

    /**
     * Set societe
     *
     * @param string $societe
     *
     * @return User
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set dateCreate
     *
     * @param string $dateCreate
     *
     * @return User
     */
    public function setDateCreate($dateCreate)
    {
        $this->date_create = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return string
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }
}
