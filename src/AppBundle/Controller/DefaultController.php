<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DefaultController extends Controller
{
    /**
     * @Route("/site-institutionnel/index", name="homepage")
     */
    public function indexAction(Request $request, \Swift_Mailer $mailer)
    {
        /*
        $this->get('session')->getFlashBag()->add('home', 'active');
        
            $message = (new \Swift_Message('Inscription - Choix du mot de passe'))
            ->setFrom('infoadherents@ma2e.ci')
            ->setTo("saffoumani@gs2e.ci")
            ->setBody("Lorem ipsum dolor sit amet consectetur adipisicing elit");
    
            $response = $mailer->send($message, $failure);

            //var_dump($failure) or die();
            ===============================> Test d'envoi de mail 
    
        */
            $this->get('session')->getFlashBag()->add('home', 'active');
            return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/site-institutionnel/notre-mutuelle", name="ma2e")
     */
    public function redirectMa2e()
    {
        $this->get('session')->getFlashBag()->add('maee', 'active');
        return $this->render('default/ma2e.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/produits-epargne", name="all-products")
     */
    public function redirectProducts()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/produits-epargne.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/formule-credit", name="all-credits")
     */
    public function redirectCredits()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/formule-credit.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/produit-epargne/epargne-express", name="epargne-expresse")
     */
    public function redirectEpargneExpress()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/epargne-expresse.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/produit-epargne/epargne-ordinaire", name="epargne-ordinaire")
     */
    public function redirectEpargneOrdinaire()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/epargne-ordinaire.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/depot-garantie", name="epargne-complementaire")
     */
    public function redirectEpargneComplementaire()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/epargne-complementaire.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/produit-epargne/epargne-logement", name="epargne-logement")
     */
    public function redirectEpargneLogement()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/epargne-logement.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/produit-epargne/depots-simple", name="depot-simple")
     */
    public function redirectDepotSimple()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/depot-simple.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/produit-epargne/depots-versements-progressifs", name="depot-progressif")
     */
    public function redirectDepotProgressif()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/depot-versements-progressifs.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/formule-credit/credit-ordinaire", name="credit-ordinaire")
     */
    public function redirectCreditOrdinaire()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/credit-ordinaire.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/formule-credit/credit-express", name="credit-express")
     */
    public function redirectCreditExpress()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/credit-expresse.html.twig');
    }

    /**
     * @Route("/site-institutionnel/notre-mutuelle/notre-organisation", name="notre-organisation")
     */
    public function redirectOurOrganization()
    {
        $this->get('session')->getFlashBag()->add('maee', 'active');
        return $this->render('default/notre-organisation.html.twig');
    }

    /**
     * @Route("/site-institutionnel/formule-credit/credit-immobilier", name="credit-immobilier")
     */
    public function redirectCreditImmo()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/credit-immobilier.html.twig');
    }

    /**
     * @Route("/site-institutionnel/formule-credit/credit-immobilier-differe", name="credit-immobilier-differe")
     */
    public function redirectCreditImmoDiff()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/credit-immobilier-differe.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier", name="projet-immobilier")
     */
    public function redirectProjetImmo()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/projet-immobilier.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier/duplex-5-pieces", name="duplex-5")
     */
    public function redirectDuplex5()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/duplex-5.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier/duplex-4-pieces", name="duplex-4")
     */
    public function redirectDuplex4()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/duplex-4.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier/villa-5-pieces", name="villa-5")
     */
    public function redirectVilla5()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/villa-5.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier/villa-4-pieces", name="villa-4")
     */
    public function redirectVilla4()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/villa-4.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier/villa-3-pieces", name="villa-3")
     */
    public function redirectVilla3()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/villa-3.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier/condition-attribution", name="condition-maison")
     */
    /*public function redirectConditionAttribution()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/condition-attribution-logement.html.twig');
    }*/

    /**
     * @Route("/site-institutionnel/produits/notre-mutuelle/galerie", name="galerie")
     */
    public function redirectGalerie()
    {
        $this->get('session')->getFlashBag()->add('maee', 'active');
        return $this->render('default/galerie.html.twig');
    }

    /**
     * @Route("/site-institutionnel/produits/projet-immobilier/dossier", name="immobilier-dossier")
     */
    public function redirectDossier()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/infos-projet-immobilier.html.twig');
    }

    /**
     * @Route("/site-institutionnel/events", name="event")
     */
    public function redirectEvent()
    {
        $this->get('session')->getFlashBag()->add('infos', 'active');
        return $this->render('default/events.html.twig');
    }

    /**
     * @Route("/site-institutionnel/events/2018/ag", name="event-ag")
     */
    public function redirectEventAg()
    {
        $this->get('session')->getFlashBag()->add('event', 'active');
        return $this->render('default/ag-2018.html.twig');
    }

    /**
     * @Route("/site-institutionnel/events/2019/ag", name="event-ag2019")
     */
    public function redirectEvent2019Ag()
    {
        $this->get('session')->getFlashBag()->add('event', 'active');
        return $this->render('default/ag-2019.html.twig');
    }

    /**
     * @Route("/site-institutionnel/simulateur/credit-immobilier", name="simulateur-immo")
     */
    public function redirectSimulateurImmo()
    {
        $this->get('session')->getFlashBag()->add('simulateur', 'active');
        return $this->render('default/simulateur.html.twig');
    }

    /**
     * @Route("/site-institutionnel/simulateur/credit-ordinaire-express", name="simulateur-ordinaire")
     */
    public function redirectSimulateurCredit()
    {
        $this->get('session')->getFlashBag()->add('simulateur', 'active');
        return $this->render('default/simulateur-credit-ordinaire.html.twig');
    }

    /**
     * @Route("/site-institutionnel/vision-fondateur", name="vision-fondateur")
     */
    public function redirectVisionFondateur()
    {
        $this->get('session')->getFlashBag()->add('home', 'active');
        return $this->render('default/vision-fondateur.html.twig');
    }

    /**
     * @Route("/site-institutionnel/Premiere-tranche", name="premiere-tranche")
     */
    public function redirect1ereTranche()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/first-tranche.html.twig');
    }

    /**
     * @Route("/site-institutionnel/events/2018/journee-nationale-microfinance", name="journee-microfinance")
     */
    public function redirectJourneeMicrofinance()
    {
        $this->get('session')->getFlashBag()->add('event', 'active');
        return $this->render('default/journee-microfinance.html.twig');
    }

    /**
     * @Route("/site-institutionnel/events/2017/remise-operation-immobiliere", name="op-immo-2017")
     */
    public function redirectRemiseCle2017()
    {
        $this->get('session')->getFlashBag()->add('event', 'active');
        return $this->render('default/remise-cle-2017.html.twig');
    }

    /**
     * @Route("/site-institutionnel/infos/depeche", name="depeche")
     */
    public function redirectDepeche()
    {
        $this->get('session')->getFlashBag()->add('infos', 'active');
        return $this->render('default/depeche.html.twig');
    }

    /**
     * @Route("/site-institutionnel/infos/documents", name="info-document")
     */
    public function redirectInfosDocuments()
    {
        $this->get('session')->getFlashBag()->add('infos', 'active');
        return $this->render('default/infos-document.html.twig');
    }

    /**
     * Envoi de mail de contact
     * @Route("/sendmail/contact", name="contact-mail")
     */
    public function mailContactAction(Request $req)
    {
      $nom = $req->get('nom');
      $tel = $req->get('tel');
      $sujet = $req->get('sujet');
      $mail = $req->get('mail');
      $corps = $req->get('message');
        $message = (new \Swift_Message('Mail de contact'))
        ->setFrom($mail)
        ->setTo('info@ma2e.ci')
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'Emails/mail-contact.html.twig',
                array('nom' => $nom, 'tel'=>$tel, "sujet"=>$sujet, "corps"=>$corps)
            ),
            'text/html'
        );

        $this->get('mailer')->send($message);

        // return $this->redirectToRoute("homepage");
        return $this->redirectToRoute("homepage");

    }

    /**
     * Documents à télécharger sous menu de Produit
     * @Route("/site-institutionnel/produits/documents-a-telecharger", name="document_a_telecharger")
     */
    public function documentsDownloadsProduitAction()
    {
        $this->get('session')->getFlashBag()->add('product', 'active');
        return $this->render('default/documents-a-telecharger.html.twig');
    }
    
}
