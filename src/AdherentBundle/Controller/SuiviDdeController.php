<?php

namespace AdherentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SuiviDdeController extends Controller
{
    /**
     * Demande de virement
     * @Route("/espace-adherent/suivi-demandes", name="suivi-dde")
     */
    public function indexAction()
    {
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'operation');

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $em = $this->getDoctrine()->getManager();
        
        //Souscription
        $sql1 = "SELECT * FROM dde_souscription WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $souscription = $em->getConnection()->prepare($sql1);
        $souscription->execute();
        
        //Souscription DAT
        $sqlX = "SELECT * FROM dde_souscription_dat WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $souscriptionDat = $em->getConnection()->prepare($sqlX);
        $souscriptionDat->execute();
        
        //Souscription DAT à versement progressif
        $sqlY = "SELECT * FROM dde_souscription_dat_progressif WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $souscriptionDatP = $em->getConnection()->prepare($sqlY);
        $souscriptionDatP->execute();
        
        
        //Rechargement
        $sql2 = "SELECT * FROM dde_rechargement WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $rechargement = $em->getConnection()->prepare($sql2);
        $rechargement->execute();
        
        //var_dump($sql2) or die();
        //Reedition
        $sql3 = "SELECT * FROM dde_reedition WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $reedition = $em->getConnection()->prepare($sql3);
        $reedition->execute();
        
        //Regularisation
        $sql4 = "SELECT * FROM dde_regularisation WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $regularisation = $em->getConnection()->prepare($sql4);
        $regularisation->execute();
        
        //Epargne
        $sql5 = "SELECT * FROM dde_epargne WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $epargne = $em->getConnection()->prepare($sql5);
        $epargne->execute();
        
        //Virement
        $sql6 = "SELECT * FROM dde_virement WHERE code_adherent = '$code_adherent' ORDER BY date_demande DESC";
        $virement = $em->getConnection()->prepare($sql6);
        $virement->execute();
        
        //Retourne le count de chaque requête
        $countVirement = count($virement);
        $countEpargne = count($epargne);
        $countRegularisation = count($regularisation);
        $countReedition = count($reedition);
        $countRechargement = count($rechargement);
        $countSouscription = count($souscription);
        $countSouscriptionDat = count($sqlX);
        $countSouscriptionDatProgressif = count($sqlY);

        $total = count($virement) + count($epargne) + count($regularisation) + count($reedition) + count($rechargement) + count($souscription) + count($sqlX) + count($sqlY);

        return $this->render("adherent/suivi-dde.html.twig", array('sousMenu'=>'suivi-dde','dde_souscription'=>$souscription,
        'dde_rechargement'=>$rechargement, 'dde_reedition'=>$reedition, 
        'dde_regularisation'=>$regularisation, 'dde_epargne'=>$epargne, 'dde_virement'=>$virement,
        'total'=> $total, 'dde_souscription_dat'=>$souscriptionDat, 'dde_souscription_dat_progressif'=>$souscriptionDatP,
        'countVirement' => $countVirement,
        'countEpargne' => $countEpargne,
        'countRegularisation' => $countRegularisation,
        'countReedition' => $countReedition,
        'countRechargement' => $countRechargement,
        'countSouscription' => $countSouscription,
        'countSouscriptionDat' => $countSouscriptionDat,
        'countSouscriptionDatProgressif' => $countSouscriptionDatProgressif));
    }
}
