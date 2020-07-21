<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\DdeSouscription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SousciptionUBAController extends Controller
{
    /**
     * Demande de souscription de carte UBA
     * @Route("/espace-adherent/dde-souscription-carte-visa", name="souscription-uba")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'carte');
        
        return $this->render("adherent/dde-souscription-uba.html.twig", array('sousMenu'=>'dde-souscription'));
    }

    /**
     * Enregistrement de la demande de souscription
     * @Route("/espace-adherent/dde-souscription-carte-visa/save", name="actionSouscription")
     */
    public function saveSouscription(Request $req)
    {
        /*Upload CNI*/
        $img = $req->files->get('cni');
        $imgName = md5 ( uniqid()). '.' .$img->guessExtension ();
        $pathImg = $this->container->getParameter('kernel.root_dir').'/../web/assets/images/cni/'; //Repertoire pour l'upload
        $img->move($pathImg, $imgName);

        /**End upload */

        //var_dump('ok');
        //die();
        $demande = new DdeSouscription();

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $demande->setCodeAdherent($code_adherent);
        $demande->setRevenuMensuel($req->get('revenu_mensuel'));
        $demande->setTypeCarte($req->get('type_carte'));
        $demande->setNomCarte(strtoupper($req->get('nom_carte')));
        $demande->setTypeCompte($req->get('type_compte'));
        $demande->setClientUba($req->get('client_uba'));
        $demande->setImageCni($imgName);
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        if ($req->get('client_uba') == 'OUI'){
            $demande->setNumeroCarte(strtoupper($req->get('numero_carte')));
        }else{
            $demande->setNumeroCarte('');
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande de souscription effectuée avec succès!');

        return $this->redirectToRoute('souscription-uba');

    }
}
