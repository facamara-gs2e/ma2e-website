<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DdeVirement
 *
 * @ORM\Table(name="dde_virement")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\DdeVirementRepository")
 */
class DdeVirement
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
     * @ORM\Column(name="code_adherent", type="string", length=30, nullable=true)
     */
    private $codeAdherent;

    /**
     * @var string
     *
     * @ORM\Column(name="compte_a_debiter", type="string", length=100, nullable=true)
     */
    private $compteADebiter;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_a_debiter", type="string", length=100, nullable=true)
     */
    private $montantADebiter;

    /**
     * @var string
     *
     * @ORM\Column(name="compte_a_crediter", type="string", length=100, nullable=true)
     */
    private $compteACrediter;

    /**
     * @var string
     *
     * @ORM\Column(name="date_effet_souhaitee", type="string", length=30, nullable=true)
     */
    private $dateEffetSouhaitee;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="text", nullable=true)
     */
    private $motif;

    /**
     * @var string
     *
     * @ORM\Column(name="date_demande", type="string", length=100, nullable=true)
     */
    private $dateDemande;

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
     * @var string
     *
     * @ORM\Column(name="date_create", type="string", length=100, nullable=true)
     */
    private $dateCreate;


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
     * @return DdeVirement
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
     * Set compteADebiter
     *
     * @param string $compteADebiter
     *
     * @return DdeVirement
     */
    public function setCompteADebiter($compteADebiter)
    {
        $this->compteADebiter = $compteADebiter;

        return $this;
    }

    /**
     * Get compteADebiter
     *
     * @return string
     */
    public function getCompteADebiter()
    {
        return $this->compteADebiter;
    }

    /**
     * Set montantADebiter
     *
     * @param string $montantADebiter
     *
     * @return DdeVirement
     */
    public function setMontantADebiter($montantADebiter)
    {
        $this->montantADebiter = $montantADebiter;

        return $this;
    }

    /**
     * Get montantADebiter
     *
     * @return string
     */
    public function getMontantADebiter()
    {
        return $this->montantADebiter;
    }

    /**
     * Set compteACrediter
     *
     * @param string $compteACrediter
     *
     * @return DdeVirement
     */
    public function setCompteACrediter($compteACrediter)
    {
        $this->compteACrediter = $compteACrediter;

        return $this;
    }

    /**
     * Get compteACrediter
     *
     * @return string
     */
    public function getCompteACrediter()
    {
        return $this->compteACrediter;
    }

    /**
     * Set dateEffetSouhaitee
     *
     * @param string $dateEffetSouhaitee
     *
     * @return DdeVirement
     */
    public function setDateEffetSouhaitee($dateEffetSouhaitee)
    {
        $this->dateEffetSouhaitee = $dateEffetSouhaitee;

        return $this;
    }

    /**
     * Get dateEffetSouhaitee
     *
     * @return string
     */
    public function getDateEffetSouhaitee()
    {
        return $this->dateEffetSouhaitee;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return DdeVirement
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return DdeVirement
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
     * @return DdeVirement
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
     * @return DdeVirement
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
     * @return DdeVirement
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
     * @return DdeVirement
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
     * @return DdeVirement
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
