<?php

namespace AuthenticateBundle\Controller;

use AuthenticateBundle\Entity\FindPassword;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ForgetPasswordController extends Controller
{
    /**
     * Affichage de la page forget password
     * @Route("/authentification/forgot-password", name="forgot_password")
     */
    public function indexAction()
    {
        return $this->render("authentification/forget-password.html.twig");
    }


    private function findPassword($mail, $url)
    {
        $message = (new \Swift_Message('Retrouver mon mot de passe'))
        ->setFrom('infoadherents@ma2e.ci')
        ->setTo($mail)
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'Emails/forgot-password.html.twig',
                array('url' => $url)
            ),
            'text/html'
        );

        //$mailer->send($message);
        $this->get('mailer')->send($message);

    }

    /**
     * Traitement de la demande de modification de mot de passe
     * @Route("/authentification/forgot-password/reset", name="actionForgotPassword")
     */
    public function TraitResetPasswordAction(Request $req)
    {
        //Verification que le code adherent est associé au mail

        $code_adherent = $req->get('code_adherent');
        $email = $req->get('email');

        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM fos_user WHERE code_adherent = '$code_adherent' and email = '$email' ";
        $query = $em->getConnection()->prepare($sql);
        $query->execute();
        $count = $query->rowCount();

        if($count != 0)
        {
            //Envoi de mail et enregistrement d'un lien expirable
            $url = "authentification/forgot-password/change/".rand(0,100000);

            $dateAct = date("Y-m-d H:i:s");
            $dateNow = new \DateTime($dateAct);

            $dateFut = date('Y-m-d H:i:s',strtotime('+5 minutes',strtotime($dateAct)));
            $dateExpire = new \DateTime($dateFut);

            $demande = new FindPassword();

            $demande->setCodeAdherent($code_adherent);
            $demande->setEmail($email);
            $demande->setUrlLink($url);
            $demande->setDateDemande($dateNow);
            $demande->setDateExpire($dateExpire);
            $demande->setStatut("ON");


            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();
            //Appeler ici la fontion d'envoi de mail avec le lien de réinitialisation

            $sendmail = $this->findPassword($email, $url);


            $this->get('session')->getFlashBag()->add('success', 'Un lien de changement de mot de passe vous ai envoyé par mail.');

        }else{
            $this->get('session')->getFlashBag()->add('error', 'Aucun code adhérent n\'est associé à cette adresse email! ');
        }

        return $this->redirectToRoute('forgot_password');

    }

    /**
     * Affichage de la page de modification de mail
     * @Route("/authentification/forgot-password/change/{id}", name="showFindPassword")
     */
    public function showPageFindPassword($id)
    {
        $em = $this->getDoctrine()->getManager();
        $current_url = "authentification/forgot-password/change/".$id;

        //Validité de l'url
        $dateactu = date('Y-m-d H:i:s');
        //var_dump($dateactu) or die();

        $sql = "SELECT email FROM find_password WHERE url_link = '$current_url' AND '$dateactu' <= date_expire AND statut= 'ON' ";
        $query = $em->getConnection()->prepare($sql);
        $query->execute();
        $row = $query->fetch();
        $email = $row['email'];
        $nb = $query->rowCount();



        if($nb != 0)
        {
            //Le lien n'a pas expiré
            return $this->render('authentification/reset-password.html.twig', array('email'=>$email));
        }
        else{
            //Le lien a expiré
            $this->get('session')->getFlashBag()->add('error', 'Le lien de réinitialisation du mot de passe est à expiration. Veuillez refaire la demande!');
            return $this->redirectToRoute('forgot_password');
        }

    }

    /**
     * Traitement du changement de mot de passe
     * @Route("/authentification/reset-password", name="resetActionPassword")
     */
    public function PaswwordResetAction(Request $req)
    {
        $mail = $req->get('_mail');
        $password = $req->get('password');
        $c_password = $req->get('confirme_pwd');

        if($password == $c_password)
        {
            $userManager = $this->get('fos_user.user_manager');
                $user = $userManager->findUserByEmail($mail);
                //$user = $userManager->createUser();
                $user->setEnabled(1);
                $user->setPlainPassword($password);

                $userManager->updateUser($user);

            //On change le statut de la demande de réinitialisation
                $em = $this->getDoctrine()->getManager();
                $sql = "UPDATE find_password SET statut = 'OFF' WHERE email = '$mail' ";
                $query = $em->getConnection()->prepare($sql);
                $query->execute();

                $this->get('session')->getFlashBag()->add('success', 'Votre mot de passe a été réinitialisé! Vous pouvez désormais vous connecter.');

                return $this->redirectToRoute("login");

        }
        else{
                $this->get('session')->getFlashBag()->add('error', 'Les mots de passe ne concordent pas!');
                return $this->redirectToRoute("showFindPassword");
        }
    }


}
