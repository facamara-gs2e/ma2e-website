<?php

namespace AuthenticateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ChangePasswordController extends Controller
{ /**
    * Page de changement du mot de passe
    * @Route("/config-user/create-password/{date_create}/{matricule}/{mail}/{societe}", name="create_password")
    */
   public function indexAction($date_create, $matricule, $mail, $societe)
   {
       //On s'assure que les données entrées en paramètre sont correctes et correspondent à un compte inactif

       $em = $this->getDoctrine()->getManager();
       $sql = "SELECT * FROM fos_user WHERE date_create = '$date_create' and matricule='$matricule' and email='$mail' and societe='$societe' and enabled=0 and username LIKE 'username%' ";
       $conn = $em->getConnection()->prepare($sql);
       $conn->execute();
       $countAdherent = $conn->rowCount();

       if($countAdherent != 0)
       {
           //Lien correct
        return $this->render('authentification/config-user.html.twig', array('date_create'=>$date_create, 'matricule'=>$matricule, 'mail'=>$mail, 'societe'=>$societe));
       }
       else
       {
        return $this->render('Erreurs/404.html.twig');
       }

   }

   /**
    * fonction retournant la liste des usernames de la BD
    *@Route("/verification-username",name="checkUsername")
    */
    public function listUsernameAction(Request $req){

        $username = $req->get('username');

        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM fos_user WHERE username='$username' ";
        $conn = $em->getConnection()->prepare($sql);
        $conn->execute();
        $countUsername = $conn->rowCount();

        return new response($countUsername);

        //return new JsonResponse(array('username'=>$countAdherent));
    }

    /**
     * Traitement de la validation de l'inscription
     * @Route("/validation-inscription/{date_create}/{matricule}/{mail}/{societe}",name="valide_register")
     */
    public function traitementValidationRegister(Request $req, $date_create, $matricule, $mail, $societe)
    {
        $code_adherent = $req->get('code_adherent');
        $password = $req->get('password');
        $c_password = $req->get('confirme_pwd');

            $em = $this->getDoctrine()->getManager();
            $sql = "SELECT * FROM fos_user WHERE date_create = '$date_create' and matricule='$matricule' and email='$mail' and societe='$societe' and enabled=0 and username LIKE 'username%' and code_adherent = '$code_adherent' ";
            $conn = $em->getConnection()->prepare($sql);
            $conn->execute();
            $countAdherent = $conn->rowCount();

            if($countAdherent != 0)
            {
                $userManager = $this->get('fos_user.user_manager');
                $user = $userManager->findUserByEmail($mail);
                //$user = $userManager->createUser();
                $user->setEnabled(1);
                $user->setPlainPassword($password);

                $userManager->updateUser($user);

                $this->get('session')->getFlashBag()->add('success', 'Votre compte est maintenant fonctionnel. Veuillez vous connecter pour accéder à la plateforme');

            }else{
                $this->get('session')->getFlashBag()->add('error', 'Erreur! Veuillez réessayer svp!');
            }
            return $this->redirectToRoute("login");
        
    }
}
