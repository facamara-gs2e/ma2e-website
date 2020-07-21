<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regularisation
 *
 * @ORM\Table(name="dde_regularisation")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\RegularisationRepository")
 */
class Regularisation
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
     * @ORM\Column(name="date_operation", type="string", length=50, nullable=true)
     */
    private $dateOperation;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_operation", type="string", length=100, nullable=true)
     */
    private $lieuOperation;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_debite", type="string", length=30, nullable=true)
     */
    private $montantDebite;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_carte", type="text", nullable=true)
     */
    private $numeroCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="code_adherent", type="string", length=30, nullable=true)
     */
    private $codeAdherent;

    /**
     * @var string
     *
     * @ORM\Column(name="date_demande", type="string", length=100, nullable=true)
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
     * @ORM\Column(name="observation_op", type="text", nullable=true)
     */
    private $observationOp;
    
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
     * Set dateOperation
     *
     * @param string $dateOperation
     *
     * @return Regularisation
     */
    public function setDateOperation($dateOperation)
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    /**
     * Get dateOperation
     *
     * @return string
     */
    public function getDateOperation()
    {
        return $this->dateOperation;
    }

    /**
     * Set lieuOperation
     *
     * @param string $lieuOperation
     *
     * @return Regularisation
     */
    public function setLieuOperation($lieuOperation)
    {
        $this->lieuOperation = $lieuOperation;

        return $this;
    }

    /**
     * Get lieuOperation
     *
     * @return string
     */
    public function getLieuOperation()
    {
        return $this->lieuOperation;
    }

    /**
     * Set montantDebite
     *
     * @param string $montantDebite
     *
     * @return Regularisation
     */
    public function setMontantDebite($montantDebite)
    {
        $this->montantDebite = $montantDebite;

        return $this;
    }

    /**
     * Get montantDebite
     *
     * @return string
     */
    public function getMontantDebite()
    {
        return $this->montantDebite;
    }

    /**
     * Set numeroCarte
     *
     * @param string $numeroCarte
     *
     * @return Regularisation
     */
    public function setNumeroCarte($numeroCarte)
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    /**
     * Get numeroCarte
     *
     * @return string
     */
    public function getnumeroCarte()
    {
        return $this->numeroCarte;
    }

    /**
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return Regularisation
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
     * @return Regularisation
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
     * @return Regularisation
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
     * @return Regularisation
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
     * @return Regularisation
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
     * Set observationOp
     *
     * @param string $observationOp
     *
     * @return Regularisation
     */
    public function setObservationOp($observationOp)
    {
        $this->observationOp = $observationOp;

        return $this;
    }

    /**
     * Get observationOp
     *
     * @return string
     */
    public function getObservationOp()
    {
        return $this->observationOp;
    }

    /**
     * Set idOperatrice
     *
     * @param integer $idOperatrice
     *
     * @return Regularisation
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
