<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\DdeVirement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DdeVirementController extends Controller
{
    /**
     * Demande de virement
     * @Route("/espace-adherent/dde-virement", name="dde-virement")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'operation');

        return $this->render("adherent/dde-virement.html.twig", array('sousMenu'=>'dde-virement'));
    }

    /**
     * Traitement de la demande de virement
     * @Route("/espace-adherent/dde-virement/save", name="actionVirement")
     */
    public function saveAction(Request $req)
    {
        $demande = new DdeVirement();

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel


        $demande->setCodeAdherent($code_adherent);
        $demande->setCompteADebiter($req->get('compte_a_debiter'));
        $demande->setMontantADebiter($req->get('montant_a_debiter'));
        $demande->setCompteACrediter($req->get('compte_a_crediter'));
        $demande->setDateEffetSouhaitee($req->get('date_effet_souhaitee'));
        $demande->setMotif($req->get('motif'));
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande de virement effectuée avec succès!');

        return $this->redirectToRoute('dde-virement');
    }
}
