<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Unirest\Request as uniRequest;
use Unirest\Request\Body as unireqbody;

class AuthController extends Controller
{
    /**
     * Page d'entrée dans le site
     * @Route("/welcome", name="welcome")
     */
    public function indexAction()
    {

        return $this->render('authentification/welcome.html.twig');
    }
    /**
     * PAge d'authentification du site login
     * @Route("/", name="login")
     */
    public function loginAction()
    {
        return $this->render('default/index.html.twig');
        // return $this->redirectToRoute('fos_user_security_login');
    }

    /**
     * PAge d'inscription du site
     * @Route("/inscription", name="register")
     */
    public function registerAction()
    {
        //Recuperation des sociétés de la BD
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM societe ORDER BY libelle asc ";
        $conn = $em->getConnection()->prepare($sql);
        $conn->execute(); 

        $sql2 = "SELECT * FROM societe ORDER BY libelle asc ";
        $conn2 = $em->getConnection()->prepare($sql2);
        $conn2->execute();

        return $this->render('authentification/register.html.twig', array('societes'=> $conn, 'societies'=> $conn2));
    }

    /**
     * Exécution de la requête d'enregistrement
     * @Route("/authentification/register", name="action_register")
     */
    public function registeruserAction(Request $req,\Swift_Mailer $mailer)
    {
        $code_adherent = $req->get('code_adherent');
        $mail = strtolower($req->get('email'));
        $username = "username".rand(0,1000000);
        $societe = $req->get('societe');
        $matricule = $req->get('matricule');
        $password = "123456";
        $date_create = date('d-m-Y h:i:s');
        
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM societe ORDER BY libelle asc ";
        $conn = $em->getConnection()->prepare($sql);
        $conn->execute();

        /**
         * Filtre de m'adresse email
         */
       // $explode = explode("@", $mail);

        //var_dump($explode[0]) or die();

        /**
         * Fin Filtre de m'adresse email
         */


        if($code_adherent!="" && $mail!= "" && $societe!="" && $matricule!= ""){
            $succesfullyRegistered = $this->register($username,$code_adherent,$mail,$matricule,$password, $societe,$date_create);
     
            if($succesfullyRegistered){
                // Message à afficher pour l'enregistrement effectué avec succès
                $sendmailing = $this->changePassword($mail, $matricule,$date_create, $societe, $mailer); //Envoi du mail
                
                $this->get('session')->getFlashBag()->add('success', "Inscription effectuée avec succès! Un email vous a été envoyé pour la configuration de votre nom d'utilisateur et votre mot de passe.");
                return $this->redirectToRoute('register');
            }else{
                // Message à afficher pour l'echec d'un enregistrement
                $this->get('session')->getFlashBag()->add('error', "L'inscription a échoué! Veuillez vérifier les informations saisies.");
                return $this->redirectToRoute('register');
            }

        }else{
            $this->get('session')->getFlashBag()->add('error', "Veuillez renseigner tous les champs!");
            return $this->redirectToRoute('register');

        }
        

    }

    /**
    * This method registers an user in the database manually.
    *
    * @return boolean User registered / not registered
    **/
   private function register($username,$code_adherent,$email,$matricule,$password, $societe,$date_create)
   {
        $userManager = $this->get('fos_user.user_manager');
        
        $email_exist = $userManager->findUserByEmail($email);
        $adherent_exist = $userManager->findUserByEmail($code_adherent);

        // Check if the user exists to prevent Integrity constraint violation error in the insertion
        if($email_exist)
        {
            return false;
            $this->get('session')->getFlashBag()->add('error', 'Adresse email déjà utilisée!');
        }
        if($adherent_exist)
        {
            return false;
            $this->get('session')->getFlashBag()->add('error', 'Ce code adhérent est déjà associé à un compte!');
        }
        
        //Verification de l'existence de l'adhérent
        /*$em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM adherent WHERE CodeAdherent = '$code_adherent' and  Matricule = '$matricule' and Societe = '$societe'";
        $conn = $em->getConnection()->prepare($sql);
        $conn->execute();
        $countAdherent = $conn->rowCount();*/

        // Recherche d'utilisateur correspondant au code adherent, matricule et societe
        $headers = array('Content-type' => 'application/json');
        $query = array('code' => $code_adherent, 'matricule' => $matricule , 'societe'=>$societe);
        $body = unireqbody::form($query);

        $request = Request::createFromGlobals();
        $url_host = $request->server->get('HTTP_HOST');
        //var_dump($request->getRequestUri()); die; 

        if($url_host == "172.16.2.118"){
            $url = 'http://'.$request->server->get('HTTP_HOST');
        }else{
            $url = 'http://'.$request->server->get('HTTP_HOST');
        }
        //var_dump($url); die();
        //$url = $request->getSchemeAndHttpHost(); //Recupere le Schema http ou https
        
        /*var_dump($_SERVER['HTTP_HOST']);
        die();*/
        //$url1 = $url.'/api-ma2e/web/api/v1/adherents/'.$code_adherent.'/'.$matricule.'/'.$societe;
        //var_dump($url1);
        //die();

        $url1 = $url.'/api-ma2e/web/api/v1/adherents/'.$code_adherent.'/'.$matricule.'/'.$societe;
        

       // var_dump($url1); die();
        
        $response = uniRequest::get($url1, $headers, $query);

        //var_dump($response); die();

        //$countAdherent = $response->body->total;
        $countAdherent = $response->body->total;
        //var_dump($countAdherent) or die();

        if( $countAdherent != 0)
        {
            $user = $userManager->createUser();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setEmailCanonical($email);
            $user->setSociete($societe);
            $user->setCodeAdherent($code_adherent);
            $user->setMatricule($matricule);
            $user->setDateCreate($date_create);
            // $user->setLocked(0); // don't lock the user
            //$user->setEnabled(0); // enable the user or enable it later with a confirmation token in the email
            // this method will encrypt the password with the default settings :)
            $user->setPlainPassword($password);
            $userManager->updateUser($user);
            return true;
        }else{
            //Informations incorrectes
            return false;
            $this->get('session')->getFlashBag()->add('error', 'Les informations entrées sont incorrectes!');
        }
   }

    private function changePassword($mail, $matricule,$date_create, $societe, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Inscription - Choix du mot de passe'))
        ->setFrom('infoadherents@ma2e.ci')
        ->setTo($mail)
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'Emails/registration.html.twig',
                array('matricule' => $matricule, 'date_create'=>$date_create,'mail'=>$mail, 'societe'=>$societe)
            ),
            'text/html'
        );

        $mailer->send($message);

    }
}
