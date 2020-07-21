<?php

namespace AdherentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EpargneController extends Controller
{
    /**
     * Affichage du menu de épargne
     * @Route("/espace-adherent/epargne/c={numCompte}", name="adherent-epargne")
     */
    public function indexAction($numCompte)
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'solde');

        //Recuperation du compte en question
        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        /*$em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM operation o, compte c WHERE c.COD_ADH = '$code_adherent' and c.NumeroCompte = o.NUM_CPTE and o.NUM_CPTE = '$numCompte' ORDER BY DateOperation desc  ";
        $conn = $em->getConnection()->prepare($sql);
        $conn->execute();
        $count = $conn->rowCount();

        $sql2 = "SELECT Produit FROM compte c WHERE c.NumeroCompte = '$numCompte' ";
        $conn2 = $em->getConnection()->prepare($sql2);
        $conn2->execute();*/

        //return $this->render('adherent/epargne.html.twig', array('operations'=>$conn, 'nb'=>$count, 'produit'=>$conn2,'sousMenu'=>'home'));
        return $this->render('adherent/epargne.html.twig', array('code_adherent'=>$code_adherent,'numcpte'=>$numCompte,'sousMenu'=>'home'));

    }
}
