<?php

namespace AuthenticateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FindPassword
 *
 * @ORM\Table(name="find_password")
 * @ORM\Entity(repositoryClass="AuthenticateBundle\Repository\FindPasswordRepository")
 */
class FindPassword
{
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
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="code_adherent", type="string", length=30)
     */
    private $codeAdherent;

    /**
     * @var string
     *
     * @ORM\Column(name="url_link", type="string", length=255)
     */
    private $urlLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="datetime")
     */
    private $dateDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expire", type="datetime")
     */
    private $dateExpire;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=15)
     */
    private $statut;


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
     * Set email
     *
     * @param string $email
     *
     * @return FindPassword
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
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return FindPassword
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
     * Set urlLink
     *
     * @param string $urlLink
     *
     * @return FindPassword
     */
    public function setUrlLink($urlLink)
    {
        $this->urlLink = $urlLink;

        return $this;
    }

    /**
     * Get urlLink
     *
     * @return string
     */
    public function getUrlLink()
    {
        return $this->urlLink;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return FindPassword
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set dateExpire
     *
     * @param \DateTime $dateExpire
     *
     * @return FindPassword
     */
    public function setDateExpire($dateExpire)
    {
        $this->dateExpire = $dateExpire;

        return $this;
    }

    /**
     * Get dateExpire
     *
     * @return \DateTime
     */
    public function getDateExpire()
    {
        return $this->dateExpire;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return FindPassword
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
