<?php

namespace AdherentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/espace-adherent/home", name="adherent-solde")
     */
    public function indexAction()
    {
        //$this->get('session')->getFlashBag()->clear();
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'solde');

        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        //On recupere la liste de tous les comptes de l'utilisateur
        /*$em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM compte WHERE COD_ADH = '$code_adherent' ORDER BY DateCompte desc ";
        $conn = $em->getConnection()->prepare($sql);
        $conn->execute();
        $count = $conn->rowCount();*/

        //return $this->render('adherent/index.html.twig', array('code_adherent'=>$code_adherent, 'compte'=>$conn, 'nb'=>$count,'sousMenu'=>'home'));
        return $this->render('adherent/index.html.twig', array('code_adherent'=>$code_adherent, 'sousMenu'=>'home'));

    }

    /**
     * Fonction retournant True ou False si le mot de passe de l'utilisateur courant est correct
     * @Route("/check-password/{pwd}", name="checkPassword")
     */
    public function checkPasswordAction($pwd){
        
        $userManager = $this->get('fos_user.user_manager');
        $user = $this->getUser();//On recupère les informations courantes de l'user
        $currentPassword = $pwd;
        $encoderService = $this->container->get('security.password_encoder'); //Encodage du mot de passe entré
        $match = $encoderService->isPasswordValid($user, $currentPassword); //Comparaison du mot de passe actuel avec celui entré
        
        $response = new Response(json_encode($match));
        $response->headers->set('Content-Type','application/json');
        return $response;
    }
}
