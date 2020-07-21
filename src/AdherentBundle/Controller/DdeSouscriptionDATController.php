<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\DdeSouscriptionDat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DdeSouscriptionDATController extends Controller
{
    /**
     * Affichage de la page de souscription au DAT
     * @Route("espace-adherent/dde-souscription-depot-a-terme", name="souscription-dat")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'operation');

        return $this->render("/adherent/dde-souscription-dat.html.twig", array('sousMenu'=>'dde-souscription-dat'));
    }

    /**
     * Enregistrement du formulaire de demande
     * @Route("espace-adherent/dde-souscription-dat/save", name="save_souscription_dat")
     */
    public function saveAction(Request $req)
    {
        $demande = new DdeSouscriptionDat();

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $demande->setCodeAdherent($code_adherent);
        $demande->setCaracteristiquesDat($req->get('caracteristiques_dat'));
        $demande->setMontantDepose($req->get('montant_depose'));
        $demande->setDureeMois($req->get('duree_mois'));
        $demande->setActionTerme($req->get('action_terme'));
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande de souscription au DAT effectuée avec succès!');

        return $this->redirectToRoute('souscription-dat');

    }
}
