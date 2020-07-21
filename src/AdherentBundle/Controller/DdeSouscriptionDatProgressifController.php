<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\DdeSouscriptionDatProgressif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DdeSouscriptionDatProgressifController extends Controller
{
    /**
     * Affichage de la page de souscription au DAT à versement progressif
     * @Route("espace-adherent/dde-souscription-dat-versement-progressif", name="souscription-dat-progressif")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'operation');

        return $this->render("/adherent/dde-souscription-dat-progressif.html.twig", array('sousMenu'=>'dde-souscription-dat-progressif'));
    }


    /**
     * Enregistrement du formulaire de demande
     * @Route("espace-adherent/dde-souscription-dat-progressif/save", name="save_souscription_dat_progressif")
     */
    public function saveAction(Request $req)
    {
        
        $demande = new DdeSouscriptionDatProgressif();

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $demande->setCodeAdherent($code_adherent);
        $demande->setQuotiteCessible($req->get('quotite_cessible'));
        $demande->setRetenueMensuelle($req->get('retenue_mensuelle'));
        $demande->setDateDebutRetenue($req->get('date_start'));
        $demande->setDateFinRetenue($req->get('date_end'));
        $demande->setMontantEpargneTotale($req->get('montant_epargne'));
        //$demande->setConditionRenouvellement($req->get('condition_renouvellement'));
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande de souscription au DAT à versement progressif effectuée avec succès!');

        return $this->redirectToRoute('souscription-dat-progressif');

    }
}
