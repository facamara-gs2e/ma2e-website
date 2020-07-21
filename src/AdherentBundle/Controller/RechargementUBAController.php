<?php

namespace AdherentBundle\Controller;

use AdherentBundle\Entity\DdeRechargement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest\Request as uniRequest;

class RechargementUBAController extends Controller
{
    public $urls = "http://10.109.19.234";

    /**
     * Demande de rechargement de carte UBA
     * @Route("/espace-adherent/dde-rechargement", name="rechargement-uba")
     */
    public function indexAction()
    {
        $url = $this->urls;
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'carte');

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent();

        $headers = array('Accept' => 'application/json');
        $query = array('code' => $code_adherent);
        $response = uniRequest::get($url.'/api-ma2e/web/api/v1/codeCompteDecroissant/'.$code_adherent, $query);

        //var_dump($response->body->data) or die();
        //$base_url+"/api-ma2e/web/api/v1/codeCompteDecroissant/" + code_adherent

        return $this->render("adherent/uba-dde-rechargement.html.twig", array('sousMenu'=>'dde-rechargement', 'comptes'=>$response->body->data));
    }


    /**
     * Enregistrement de la demande de rechargement
     * @Route("/espace-adherent/dde-rechargement/save", name="actionRechargement")
     */
    public function saveRechargement(Request $req)
    {
        $demande = new DdeRechargement();

        //Traitement du compte à indiquer pour la facturation
        $a = $req->get('compte_dispo');

        //var_dump('ok') or die();

        if(isset($a) &&  $a == "Compte d'épargne"){
            $demande->setInfosCompte($req->get('compte'));
        }
        /*    elseif(isset($a) &&  $a == "Compte DAT")
        {
            $demande->setInfosCompte($req->get('numero_compte_dat'));
        }
            elseif( isset($a) &&  $a == "Accord de prêt")
        {
            $demande->setInfosCompte($req->get('date_accord_pret'));
        }*/
        else
        {
            $demande->setInfosCompte("aaa");
            $this->get('session')->getFlashBag()->add('error', 'Veuillez remplir tous les champs');
        }

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $demande->setCodeAdherent($code_adherent);
        $demande->setReferenceCarte(strtoupper($req->get('reference_carte')));
        $demande->setSommeTransferer($req->get('somme'));
        $demande->setCompteDisponible($req->get('compte_dispo'));
        $demande->setDateDemande(date('d/m/Y'));
        $demande->setDateCreate(date('d/m/Y H:i:s'));
        $demande->setInfosCompte($req->get('compte'));
        //Statut de la demande
        $demande->setStatut('En cours de traitement');

        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Demande de rechargement effectuée avec succès!');

        return $this->redirectToRoute('rechargement-uba');

    }
}
