<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DdeSouscriptionDatProgressif
 *
 * @ORM\Table(name="dde_souscription_dat_progressif")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\DdeSouscriptionDatProgressifRepository")
 */
class DdeSouscriptionDatProgressif
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
     * @ORM\Column(name="code_adherent", type="string", length=30)
     */
    private $codeAdherent;

    /**
     * @var string
     *
     * @ORM\Column(name="quotite_cessible", type="string", length=255, nullable=true)
     */
    private $quotiteCessible;

    /**
     * @var string
     *
     * @ORM\Column(name="retenue_mensuelle", type="string", length=255, nullable=true)
     */
    private $retenueMensuelle;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut_retenue", type="string", length=30, nullable=true)
     */
    private $date_debut_retenue;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_retenue", type="string", length=30)
     */
    private $dateFinRetenue;

    /**
     * @var int
     *
     * @ORM\Column(name="montant_epargne_totale", type="integer", nullable=true)
     */
    private $montantEpargneTotale;


    /**
     * @var string
     *
     * @ORM\Column(name="date_demande", type="string", length=255)
     */
    private $dateDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="date_create", type="string", length=255)
     */
    private $dateCreate;

    /**
     * @var string
     *
     * @ORM\Column(name="date_validation", type="string", length=255, nullable=true)
     */
    private $dateValidation;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=255, nullable=true)
     */
    private $observation;

    /**
     * @var string
     *
     * @ORM\Column(name="id_operatrice", type="string", length=255, nullable=true)
     */
    private $idOperatrice;


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
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return DdeSouscriptionDatProgressif
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
     * Set quotiteCessible
     *
     * @param string $quotiteCessible
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setQuotiteCessible($quotiteCessible)
    {
        $this->quotiteCessible = $quotiteCessible;

        return $this;
    }

    /**
     * Get quotiteCessible
     *
     * @return string
     */
    public function getQuotiteCessible()
    {
        return $this->quotiteCessible;
    }

    /**
     * Set retenueMensuelle
     *
     * @param string $retenueMensuelle
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setRetenueMensuelle($retenueMensuelle)
    {
        $this->retenueMensuelle = $retenueMensuelle;

        return $this;
    }

    /**
     * Get retenueMensuelle
     *
     * @return string
     */
    public function getRetenueMensuelle()
    {
        return $this->retenueMensuelle;
    }

    /**
     * Set dateFinRetenue
     *
     * @param string $dateFinRetenue
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setDateFinRetenue($dateFinRetenue)
    {
        $this->dateFinRetenue = $dateFinRetenue;

        return $this;
    }

    /**
     * Get dateFinRetenue
     *
     * @return string
     */
    public function getDateFinRetenue()
    {
        return $this->dateFinRetenue;
    }

    /**
     * Set montantEpargneTotale
     *
     * @param integer $montantEpargneTotale
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setMontantEpargneTotale($montantEpargneTotale)
    {
        $this->montantEpargneTotale = $montantEpargneTotale;

        return $this;
    }

    /**
     * Get montantEpargneTotale
     *
     * @return int
     */
    public function getMontantEpargneTotale()
    {
        return $this->montantEpargneTotale;
    }

    /**
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return string
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set dateCreate
     *
     * @param string $dateCreate
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return string
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set dateValidation
     *
     * @param string $dateValidation
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setDateValidation($dateValidation)
    {
        $this->dateValidation = $dateValidation;

        return $this;
    }

    /**
     * Get dateValidation
     *
     * @return string
     */
    public function getDateValidation()
    {
        return $this->dateValidation;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return DdeSouscriptionDatProgressif
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

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set idOperatrice
     *
     * @param string $idOperatrice
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setIdOperatrice($idOperatrice)
    {
        $this->idOperatrice = $idOperatrice;

        return $this;
    }

    /**
     * Get idOperatrice
     *
     * @return string
     */
    public function getIdOperatrice()
    {
        return $this->idOperatrice;
    }

    /**
     * Set dateDebutRetenue
     *
     * @param string $dateDebutRetenue
     *
     * @return DdeSouscriptionDatProgressif
     */
    public function setDateDebutRetenue($dateDebutRetenue)
    {
        $this->date_debut_retenue = $dateDebutRetenue;

        return $this;
    }

    /**
     * Get dateDebutRetenue
     *
     * @return string
     */
    public function getDateDebutRetenue()
    {
        return $this->date_debut_retenue;
    }

}
