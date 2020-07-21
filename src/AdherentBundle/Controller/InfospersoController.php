<?php

namespace AdherentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InfospersoController extends Controller
{
    /**
     * @Route("/espace-adherent/infos-perso", name="adherent-infos-perso")
     */
    public function indexAction()
    {
        
        $this->get('session')->getFlashBag()->get('sidebar');
        $this->get('session')->getFlashBag()->add('sidebar', 'profil');

        //Recupération des infos utilisateur
        $user = $this->getUser();
        $code_adherent = $user->getCodeAdherent(); //Code adherent de l'utilisateur actuel

        $em = $this->getDoctrine()->getManager();

        /*$sql = "SELECT * FROM adherent WHERE CodeAdherent = '$code_adherent'";
        $conn = $em->getConnection()->prepare($sql);
        $conn->execute();*/

        //return $this->render('adherent/profil.html.twig',array('sousMenu'=>'Profil', 'adherent'=>$conn));
        return $this->render('adherent/profil.html.twig',array('sousMenu'=>'Profil', 'code_adherent'=>$code_adherent));
    }

    /**
     * Modification du mot de passe utilisateur depuis l'applicaton
     * @Route("/espace-adherent/profile/change-password", name="actionChangePwd")
     */
    public function changePwd(Request $req)
    {
        $pwd = $req->request->get('password');
        $new_pwd = $req->request->get('new_password');
        $c_new_pwd = $req->request->get('c_new_password');

        $userManager = $this->get('fos_user.user_manager');
        $user = $this->getUser();//On recupère les informations courantes de l'user
        $currentPassword = $pwd;
        $encoderService = $this->container->get('security.password_encoder'); //Encodage du mot de passe entré
        $match = $encoderService->isPasswordValid($user, $currentPassword); //Comparaison du mot de passe actuel avec celui entré
        
        //On s'assure que le mot de passe entré est correct en premier lieu

        if($match == "true") //Le mot de passe entré est correct
        {
            //On vérifie que le nouveau mot de passe et le mot de passe confirmé sont identique
            if($new_pwd == $c_new_pwd)
            {
                $password = $new_pwd;
                $user->setPlainPassword($password);
                $userManager->updateUser($user);

                $this->get('session')->getFlashBag()->add('success', 'Votre mot de passe a été modifié avec succès!');
            }else{
                $this->get('session')->getFlashBag()->add('error', 'Les mots de passe ne sont pas identiques!');
            }
        }else{
            $this->get('session')->getFlashBag()->add('error', 'Veuillez vérifier votre mot de passe actuel');
        }

        return $this->redirectToRoute('adherent-infos-perso');

        //return new response($match);
    }

}
