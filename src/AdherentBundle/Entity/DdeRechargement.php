<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DdeRechargement
 *
 * @ORM\Table(name="dde_rechargement")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\DdeRechargementRepository")
 */
class DdeRechargement
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
     * @ORM\Column(name="reference_carte", type="string", length=255, nullable=true)
     */
    private $referenceCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="somme_transferer", type="string", length=20, nullable=true)
     */
    private $sommeTransferer;

    /**
     * @var string
     *
     * @ORM\Column(name="compte_disponible", type="string", length=50, nullable=true)
     */
    private $compteDisponible;

    /**
     * @var string
     *
     * @ORM\Column(name="infos_compte", type="string", length=50, nullable=true)
     */
    private $infosCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="date_demande", type="string", length=255, nullable=true)
     */
    private $dateDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="date_create", type="string", length=100, nullable=true)
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
     * @return DdeRechargement
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
     * Set referenceCarte
     *
     * @param string $referenceCarte
     *
     * @return DdeRechargement
     */
    public function setReferenceCarte($referenceCarte)
    {
        $this->referenceCarte = $referenceCarte;

        return $this;
    }

    /**
     * Get referenceCarte
     *
     * @return string
     */
    public function getReferenceCarte()
    {
        return $this->referenceCarte;
    }

    /**
     * Set sommeTransferer
     *
     * @param string $sommeTransferer
     *
     * @return DdeRechargement
     */
    public function setSommeTransferer($sommeTransferer)
    {
        $this->sommeTransferer = $sommeTransferer;

        return $this;
    }

    /**
     * Get sommeTransferer
     *
     * @return string
     */
    public function getSommeTransferer()
    {
        return $this->sommeTransferer;
    }

    /**
     * Set compteDisponible
     *
     * @param string $compteDisponible
     *
     * @return DdeRechargement
     */
    public function setCompteDisponible($compteDisponible)
    {
        $this->compteDisponible = $compteDisponible;

        return $this;
    }

    /**
     * Get compteDisponible
     *
     * @return string
     */
    public function getCompteDisponible()
    {
        return $this->compteDisponible;
    }

    /**
     * Set infosCompte
     *
     * @param string $infosCompte
     *
     * @return DdeRechargement
     */
    public function setInfosCompte($infosCompte)
    {
        $this->infosCompte = $infosCompte;

        return $this;
    }

    /**
     * Get infosCompte
     *
     * @return string
     */
    public function getInfosCompte()
    {
        return $this->infosCompte;
    }

    /**
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return DdeRechargement
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
     * @return DdeRechargement
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
     * @return DdeRechargement
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
     * @return DdeRechargement
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
     * @return DdeRechargement
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
     * @return DdeRechargement
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
