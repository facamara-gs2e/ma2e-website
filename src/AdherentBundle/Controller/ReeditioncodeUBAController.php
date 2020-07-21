<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\DdeReedition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ReeditioncodeUBAController extends Controller
{
    /**
     * Demande de réédition du code de carte UBA
     * @Route("/espace-adherent/dde-reedition-code", name="reedition-code-uba")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'carte');

        return $this->render("adherent/uba-dde-reedition-code.html.twig", array('sousMenu'=>'dde-reedition'));
    }

    /**
     * Traitement de la demande réédition de la carte VISA UBA
     * @Route("/espace-adherent/dde-reedition-code/save", name="actionReedition")
     */
    public function saveAction(Request $req)
    {
        $demande = new DdeReedition();

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $demande->setCodeAdherent($code_adherent);
        $demande->setNumeroCarte($req->get('numero_carte'));
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande de réédition de code de la carte effectuée avec succès!');

        return $this->redirectToRoute('reedition-code-uba');

    }
}
