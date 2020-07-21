<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DdeEparge
 *
 * @ORM\Table(name="dde_epargne")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\DdeEpargeRepository")
 */
class DdeEparge
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
     * @ORM\Column(name="type_epargne", type="string", length=100)
     */
    private $typeEpargne;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_quotite", type="string", length=30, nullable=true)
     */
    private $montantQuotite;

    /**
     * @var string
     *
     * @ORM\Column(name="retenue_mensuelle", type="string", length=30, nullable=true)
     */
    private $retenueMensuelle;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut_retenue", type="string", length=30, nullable=true)
     */
    private $dateDebutRetenue;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_retenue", type="string", length=30, nullable=true)
     */
    private $dateFinRetenue;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_epargne_totale", type="string", length=100, nullable=true)
     */
    private $montantEpargneTotale;

    /**
     * @var string
     *
     * @ORM\Column(name="mode_paiement", type="string", length=100, nullable=true)
     */
    private $modePaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="code_adherent", type="string", length=30, nullable=true)
     */
    private $codeAdherent;

    /**
     * @var string
     *
     * @ORM\Column(name="date_demande", type="string", length=255, nullable=true)
     */
    private $dateDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="date_create", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="statut", type="string", length=30, nullable=true)
     */
    private $statut;
    
    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="text", nullable=true)
     */
    private $observation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="id_operatrice", type="integer", nullable=true)
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
     * Set typeEpargne
     *
     * @param string $typeEpargne
     *
     * @return DdeEparge
     */
    public function setTypeEpargne($typeEpargne)
    {
        $this->typeEpargne = $typeEpargne;

        return $this;
    }

    /**
     * Get typeEpargne
     *
     * @return string
     */
    public function getTypeEpargne()
    {
        return $this->typeEpargne;
    }

    /**
     * Set montantQuotite
     *
     * @param string $montantQuotite
     *
     * @return DdeEparge
     */
    public function setMontantQuotite($montantQuotite)
    {
        $this->montantQuotite = $montantQuotite;

        return $this;
    }

    /**
     * Get montantQuotite
     *
     * @return string
     */
    public function getMontantQuotite()
    {
        return $this->montantQuotite;
    }

    /**
     * Set retenueMensuelle
     *
     * @param string $retenueMensuelle
     *
     * @return DdeEparge
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
     * Set dateDebutRetenue
     *
     * @param string $dateDebutRetenue
     *
     * @return DdeEparge
     */
    public function setDateDebutRetenue($dateDebutRetenue)
    {
        $this->dateDebutRetenue = $dateDebutRetenue;

        return $this;
    }

    /**
     * Get dateDebutRetenue
     *
     * @return string
     */
    public function getDateDebutRetenue()
    {
        return $this->dateDebutRetenue;
    }

    /**
     * Set dateFinRetenue
     *
     * @param string $dateFinRetenue
     *
     * @return DdeEparge
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
     * @param string $montantEpargneTotale
     *
     * @return DdeEparge
     */
    public function setMontantEpargneTotale($montantEpargneTotale)
    {
        $this->montantEpargneTotale = $montantEpargneTotale;

        return $this;
    }

    /**
     * Get montantEpargneTotale
     *
     * @return string
     */
    public function getMontantEpargneTotale()
    {
        return $this->montantEpargneTotale;
    }

    /**
     * Set modePaiement
     *
     * @param string $modePaiement
     *
     * @return DdeEparge
     */
    public function setModePaiement($modePaiement)
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    /**
     * Get modePaiement
     *
     * @return string
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }

    /**
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return DdeEparge
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
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return DdeEparge
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
     * @return DdeEparge
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
     * @return DdeEparge
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
     * @return DdeEparge
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
     * @return DdeEparge
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
     * @param integer $idOperatrice
     *
     * @return DdeEparge
     */
    public function setIdOperatrice($idOperatrice)
    {
        $this->idOperatrice = $idOperatrice;

        return $this;
    }

    /**
     * Get idOperatrice
     *
     * @return integer
     */
    public function getIdOperatrice()
    {
        return $this->idOperatrice;
    }
}
