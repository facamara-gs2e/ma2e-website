<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\Regularisation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegulationDebitController extends Controller
{
    /**
     * Demande de regulation de débit à tort de la carte VISA
     * @Route("/espace-adherent/dde-regulation", name="dde-regulation-debit")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'carte');

        return $this->render("adherent/dde-regulation-debit.html.twig", array('sousMenu'=>'dde-regularisation'));
    }

    /**
     * Traitement de la demande de regularisation de débit à tord
     * @Route("/espace-adherent/dde-regularisation/save", name="actionRegularisation")
     */
    public function saveAction(Request $req)
    {
        $demande = new Regularisation();

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $demande->setCodeAdherent($code_adherent);
        $demande->setDateOperation($req->get('date_operation'));
        $demande->setLieuOperation($req->get('lieu_operation'));
        $demande->setMontantDebite($req->get('montant_debite'));
        $demande->setNumeroCarte($req->get('numero_carte'));
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande de regularisation de débit à tord effectuée avec succès!');

        return $this->redirectToRoute('dde-regulation-debit');
    }
}
