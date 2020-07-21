<?php

namespace AdherentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DdeSouscription
 *
 * @ORM\Table(name="dde_souscription")
 * @ORM\Entity(repositoryClass="AdherentBundle\Repository\DdeSouscriptionRepository")
 */
class DdeSouscription
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
     * @ORM\Column(name="revenu_mensuel", type="string", length=100, nullable=true)
     */
    private $revenuMensuel;

    /**
     * @var string
     *
     * @ORM\Column(name="type_carte", type="string", length=255, nullable=true)
     */
    private $typeCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_carte", type="string", length=255, nullable=true)
     */
    private $nomCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="type_compte", type="string", length=100, nullable=true)
     */
    private $typeCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="client_uba", type="string", length=5, nullable=true)
     */
    private $clientUba;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_carte", type="string", length=100, nullable=true)
     */
    private $numeroCarte;

    /**
     * @var string
     *
     * @ORM\Column(name="image_cni", type="string", length=100, nullable=true)
     */
    private $imageCni;

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
     * Set codeAdherent
     *
     * @param string $codeAdherent
     *
     * @return DdeSouscription
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
     * Set typeCarte
     *
     * @param string $typeCarte
     *
     * @return DdeSouscription
     */
    public function setTypeCarte($typeCarte)
    {
        $this->typeCarte = $typeCarte;

        return $this;
    }

    /**
     * Get typeCarte
     *
     * @return string
     */
    public function getTypeCarte()
    {
        return $this->typeCarte;
    }

    /**
     * Set nomCarte
     *
     * @param string $nomCarte
     *
     * @return DdeSouscription
     */
    public function setNomCarte($nomCarte)
    {
        $this->nomCarte = $nomCarte;

        return $this;
    }

    /**
     * Get nomCarte
     *
     * @return string
     */
    public function getNomCarte()
    {
        return $this->nomCarte;
    }

    /**
     * Set typeCompte
     *
     * @param string $typeCompte
     *
     * @return DdeSouscription
     */
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    /**
     * Get typeCompte
     *
     * @return string
     */
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }

    /**
     * Set clientUba
     *
     * @param string $clientUba
     *
     * @return DdeSouscription
     */
    public function setClientUba($clientUba)
    {
        $this->clientUba = $clientUba;

        return $this;
    }

    /**
     * Get clientUba
     *
     * @return string
     */
    public function getClientUba()
    {
        return $this->clientUba;
    }

    /**
     * Set numeroCarte
     *
     * @param string $numeroCarte
     *
     * @return DdeSouscription
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
    public function getNumeroCarte()
    {
        return $this->numeroCarte;
    }

    /**
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return DdeSouscription
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
     * @return DdeSouscription
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
     * Set revenuMensuel
     *
     * @param string $revenuMensuel
     *
     * @return DdeSouscription
     */
    public function setRevenuMensuel($revenuMensuel)
    {
        $this->revenuMensuel = $revenuMensuel;

        return $this;
    }

    /**
     * Get revenuMensuel
     *
     * @return string
     */
    public function getRevenuMensuel()
    {
        return $this->revenuMensuel;
    }

    /**
     * Set dateValidation
     *
     * @param string $dateValidation
     *
     * @return DdeSouscription
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
     * @return DdeSouscription
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
     * @return DdeSouscription
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
     * @return DdeSouscription
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
    
    /**
     * Set imageCni
     *
     * @param string $imageCni
     *
     * @return DdeSouscription
     */
    public function setImageCni($imageCni)
    {
        $this->imageCni = $imageCni;

        return $this;
    }

    /**
     * Get imageCni
     *
     * @return string
     */
    public function getImageCni()
    {
        return $this->imageCni;
    }
}
