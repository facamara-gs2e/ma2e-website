<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DdeSouscriptionDat
 *
 * @ORM\Table(name="dde_souscription_dat")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\DdeSouscriptionDatRepository")
 */
class DdeSouscriptionDat
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
     * @ORM\Column(name="caracteristiques_dat", type="string", length=255)
     */
    private $caracteristiquesDat;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_depose", type="string", length=255)
     */
    private $montantDepose;

    /**
     * @var string
     *
     * @ORM\Column(name="duree_mois", type="string", length=255)
     */
    private $dureeMois;

    /**
     * @var string
     *
     * @ORM\Column(name="action_terme", type="string", length=255)
     */
    private $actionTerme;

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
     * @var int
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
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return DdeSouscriptionDat
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
     * Set caracteristiquesDat
     *
     * @param string $caracteristiquesDat
     *
     * @return DdeSouscriptionDat
     */
    public function setCaracteristiquesDat($caracteristiquesDat)
    {
        $this->caracteristiquesDat = $caracteristiquesDat;

        return $this;
    }

    /**
     * Get caracteristiquesDat
     *
     * @return string
     */
    public function getCaracteristiquesDat()
    {
        return $this->caracteristiquesDat;
    }

    /**
     * Set montantDepose
     *
     * @param string $montantDepose
     *
     * @return DdeSouscriptionDat
     */
    public function setMontantDepose($montantDepose)
    {
        $this->montantDepose = $montantDepose;

        return $this;
    }

    /**
     * Get montantDepose
     *
     * @return string
     */
    public function getMontantDepose()
    {
        return $this->montantDepose;
    }

    /**
     * Set dureeMois
     *
     * @param string $dureeMois
     *
     * @return DdeSouscriptionDat
     */
    public function setDureeMois($dureeMois)
    {
        $this->dureeMois = $dureeMois;

        return $this;
    }

    /**
     * Get dureeMois
     *
     * @return string
     */
    public function getDureeMois()
    {
        return $this->dureeMois;
    }

    /**
     * Set actionTerme
     *
     * @param string $actionTerme
     *
     * @return DdeSouscriptionDat
     */
    public function setActionTerme($actionTerme)
    {
        $this->actionTerme = $actionTerme;

        return $this;
    }

    /**
     * Get actionTerme
     *
     * @return string
     */
    public function getActionTerme()
    {
        return $this->actionTerme;
    }

    /**
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return DdeSouscriptionDat
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
     * @return DdeSouscriptionDat
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
     * @return DdeSouscriptionDat
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
     * @return DdeSouscriptionDat
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
     * @return DdeSouscriptionDat
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
     * @return DdeSouscriptionDat
     */
    public function setIdOperatrice($idOperatrice)
    {
        $this->idOperatrice = $idOperatrice;

        return $this;
    }

    /**
     * Get idOperatrice
     *
     * @return int
     */
    public function getIdOperatrice()
    {
        return $this->idOperatrice;
    }
}

