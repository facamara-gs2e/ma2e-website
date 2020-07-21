<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DdeReedition
 *
 * @ORM\Table(name="dde_reedition")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\DdeReeditionRepository")
 */
class DdeReedition
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
     * @ORM\Column(name="numero_carte", type="string", length=30, nullable=true)
     */
    private $numeroCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="date_demande", type="string", length=30)
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
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return DdeReedition
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
     * Set numeroCarte
     *
     * @param string $numeroCarte
     *
     * @return DdeReedition
     */
    public function setNumeroCarte($dateSouhaitee)
    {
        $this->numeroCarte = $dateSouhaitee;

        return $this;
    }

    /**
     * Get numeroCarte
     *
     * @return string
     */
    public function getNumeroCarte()
    {
        return $this->numeroCarte;
    }

    /**
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return DdeReedition
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
     * @return DdeReedition
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
     * @return DdeReedition
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
     * @return DdeReedition
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
     * @return DdeReedition
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
     * @return DdeReedition
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
