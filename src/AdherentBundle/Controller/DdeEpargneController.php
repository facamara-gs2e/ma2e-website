<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\DdeEparge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DdeEpargneController extends Controller
{
    /**
     * Demande d'épargne
     * @Route("/espace-adherent/dde-epargne", name="dde-epargne")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'operation');

        return $this->render("adherent/dde-epargne.html.twig", array('sousMenu'=>'dde-epargne'));
    }

    /**
     * Traitement de la demande d'epargne
     * @Route("/espace-adherent/dde-epargne/save", name="actionDdeEpargne")
     */
    public function saveEpargne(Request $req)
    {
        $demande = new DdeEparge();

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel


        $demande->setCodeAdherent($code_adherent);
        $demande->setTypeEpargne($req->get('type_epargne'));
        $demande->setMontantQuotite($req->get('montant_quotite'));
        $demande->setRetenueMensuelle($req->get('retenue_mensuelle'));
        $demande->setDateDebutRetenue($req->get('date_start'));
        $demande->setDateFinRetenue($req->get('date_end'));
        $demande->setMontantEpargneTotale($req->get('montant_epargne'));
        $demande->setModePaiement($req->get('mode_paiement'));
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande d\'épargne effectuée avec succès!');

        return $this->redirectToRoute('dde-epargne');
    }
}
