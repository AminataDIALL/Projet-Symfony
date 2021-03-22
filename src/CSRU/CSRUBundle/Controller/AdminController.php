<?php

namespace CSRU\CSRUBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CSRU\CSRUBundle\Entity\Etudiant;
use CSRU\CSRUBundle\Form\EtudiantType;
use CSRU\CSRUBundle\Entity\Medicament;
use CSRU\CSRUBundle\Form\MedicamentType;
use CSRU\CSRUBundle\Entity\Profil;
use CSRU\CSRUBundle\Form\ProfilType;
use CSRU\CSRUBundle\Entity\Centre;
use CSRU\CSRUBundle\Form\CentreType;

class AdminController extends Controller {

    //fonction permettant d'afficher la page d'accueil côté administrateur
    public function accueilAdminAction() {
        return $this->render('CSRUCSRUBundle:AdminViews:accueilAdmin.html.twig');
    }

    //fonction permettant d'afficher la liste des étudiants de la FST
    public function listeEtudiantFSTAction() {
        $em = $this->getDoctrine()->getManager();
        $etudiant = $em->getRepository('CSRUCSRUBundle:Etudiant')->findAll();
        return $this->render('CSRUCSRUBundle:AdminViews:listeEtudiantFST.html.twig', array('etudiant' => $etudiant));
    }

    //fonction permettant de completer l'inscription d'un utilisateur
    public function completerUtilisateurAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CSRUCSRUBundle:Utilisateur')->find($id);
        $form = $this->createFormBuilder($user)
                ->add('username')
                ->add('email')
                ->add('profil', new ProfilType())
                ->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('inscription_valide', array('id' => $user->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:completerUtilisateur.html.twig', array('form' => $form->createView(),
                    'user' => $user
        ));
    }

    //fonction permettant d'afficher le détail d'un personnel juste après son inscription
    public function inscription_valideAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CSRUCSRUBundle:Utilisateur')->find($id);
        return $this->render('CSRUCSRUBundle:AdminViews:inscription_valide.html.twig', array(
                    'user' => $user,
                    'id' => $id,));
    }

    //fonction permettant d'afficher les statistiques sur les patients suivants leurs genre et leurs universités
    public function statistiqueAction() {
        $em = $this->getDoctrine()->getManager();
        $all = $em->getRepository('CSRUCSRUBundle:DossierMedical')->findAll();
        $tous = $em->getRepository('CSRUCSRUBundle:DossierMedical')->findAll();
        $homme = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueHomme();
        $femme = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueFemme();
        $usttb = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueUSTTB();
        $ussgb = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueUSSGB();
        $usjpb = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueUSJPB();
        $ulshb = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueULSHB();
        $us = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueUS();
        //$fst = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getStatistiqueCENTRE();

        return $this->render('CSRUCSRUBundle:AdminViews:statistique.html.twig', array('all' => $all,
                    'tous' => $tous,
                    'homme' => $homme,
                    'femme' => $femme,
                    'usttb' => $usttb,
                    'ussgb' => $ussgb,
                    'usjpb' => $usjpb,
                    'ulshb' => $ulshb,
                    'us' => $us,
                /* 'fst' => $fst */                ));
    }

    //fonction permettant d'afficher les statistiques sur les personnels suivants leurs genre et leurs centres
    public function statistiquePersoCsruAction() {
        $em = $this->getDoctrine()->getManager();
        $all = $em->getRepository('CSRUCSRUBundle:Utilisateur')->findAll();
        $prof = $em->getRepository('CSRUCSRUBundle:Utilisateur')->findAll();
        $fst = $em->getRepository('CSRUCSRUBundle:Utilisateur')->getStatistiqueCentreFST();
        $ipr = $em->getRepository('CSRUCSRUBundle:Utilisateur')->getStatistiqueCentreIPR();
        $segou = $em->getRepository('CSRUCSRUBundle:Utilisateur')->getStatistiqueCentreSEGOU();
        $cenou = $em->getRepository('CSRUCSRUBundle:Utilisateur')->getStatistiqueCentreCENOU();
        $infir = $em->getRepository('CSRUCSRUBundle:Utilisateur')->getStatistiqueCentreCENOU();
        $presta = $em->getRepository('CSRUCSRUBundle:Utilisateur')->getStatistiqueCentreCENOU();
        $admin = $em->getRepository('CSRUCSRUBundle:Utilisateur')->getStatistiqueCentreCENOU();
        return $this->render('CSRUCSRUBundle:AdminViews:statistiquePersoCsru.html.twig', array('all' => $all,
                    'prof' => $prof,
                    'fst' => $fst,
                    'ipr' => $ipr,
                    'segou' => $segou,
                    'cenou' => $cenou,
                    'admin' => $admin,
                    'presta' => $presta,
                    'infir' => $infir,));
    }

    //fonction permettant d'ajouter les etudiants dans le système
    public function ajoutEtudiantAction() {
        $etudiant = new Etudiant();
        //$membre->setDate(new \DateTime());
        $form = $this->createform(new EtudiantType, $etudiant);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em = $this->getDoctrine()->getManager();
                $etudinats = $em->getRepository('CSRUCSRUBundle:Etudiant')->findAll();
                $existe = false;
                $numMlle = $etudiant->getMatricule();
                foreach ($etudinats as $b) {
                    if ($b->getMatricule() == $numMlle) {
                        $existe = true;
                    }
                }
                if ($existe) {
                    $this->addFlash(
                            'info', 'Le numero matricule' . ' ' . $numMlle . ' ' . 'existe déjà'
                    );
                    return $this->render('CSRUCSRUBundle:AdminViews:ajoutEtudiant.html.twig', array('form' => $form->createView()));
                }
                $em->persist($etudiant);
                $em->flush();
                return $this->redirect($this->generateUrl('ajoutEtudiant_succes'));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:ajoutEtudiant.html.twig', array('form' => $form->createView()));
    }

    //fonction permettant d'afficher la page de succès apres enrégistrement d'un étudiant
    public function ajoutEtudiant_succesAction() {
        $etudiant = new Etudiant();
        $form = $this->createform(new EtudiantType, $etudiant);
        return $this->render('CSRUCSRUBundle:AdminViews:ajoutEtudiant_succes.html.twig', array('form' => $form->createView()));
    }

    //fonction permettant d'ajouter les médicaments dans les différents pharmacies
    public function ajoutMedicamentAction() {
        $medi = new Medicament();
        $form = $this->createform(new MedicamentType, $medi);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($medi);
                $em->flush();
                $this->get('session')->getFlashBag()->add('medicament', 'Médicament ajouté avec succes !!!');
                return $this->redirect($this->generateUrl('ajoutMedicament'));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:ajoutMedicament.html.twig', array('form' => $form->createView()));
    }

    //fonction permettant d'ajouter les différents centres
    public function ajoutCentreAction() {
        $centre = new Centre();
        $form = $this->createform(new CentreType, $centre);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($centre);
                $em->flush();
                $this->get('session')->getFlashBag()->add('centre', 'Centre ajouté avec succes !!!');
                return $this->redirect($this->generateUrl('ajoutCentre'));
            }
            $this->get('session')->getFlashBag()->add('centre', 'Centre non ajouté, un problème a dû survenu');
        }
        return $this->render('CSRUCSRUBundle:AdminViews:ajoutCentre.html.twig', array('form' => $form->createView()));
    }

    //fonction permettant d'afficher les médicaments de la pharmacie FST
    public function medicamentFSTAction() {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->findAll();
        return $this->render('CSRUCSRUBundle:AdminViews:MedicamentFST.html.twig', array('medi' => $medi));
    }

    //fonction permettant d'afficher les médicaments de la pharmacie IPR
    public function medicamentIPRAction() {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->findAll();
        return $this->render('CSRUCSRUBundle:AdminViews:MedicamentIPR.html.twig', array('medi' => $medi));
    }

    //fonction permettant d'afficher les médicaments de la pharmacie SEGOU
    public function medicamentSEGOUAction() {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->findAll();
        return $this->render('CSRUCSRUBundle:AdminViews:MedicamentSEGOU.html.twig', array('medi' => $medi));
    }

    //fonction permettant de supprimer un médicament dans la pharmacie IPR
    public function supprimerMedicamentIPRAction($id) {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->find('CSRUCSRUBundle:Medicament', $id);
        $em->remove($medi);
        $em->flush();
        return $this->redirect($this->generateUrl('medicamentIPR'));
    }
    
    //fonction permettant de supprimer un médicament dans la pharmacie FST
     public function supprimerMedicamentFSTAction($id) {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->find('CSRUCSRUBundle:Medicament', $id);
        $em->remove($medi);
        $em->flush();
        return $this->redirect($this->generateUrl('medicamentFST'));
    }
    
    //fonction permettant de supprimer un médicament dans la pharmacie SEGOU
     public function supprimerMedicamentSEGOUAction($id) {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->find('CSRUCSRUBundle:Medicament', $id);
        $em->remove($medi);
        $em->flush();
        return $this->redirect($this->generateUrl('medicamentSEGOU'));
    }

    //fonction permettant de modifier un médicament dans la pharmacie IPR 
    public function modifierMedicamentIPRAction($id) {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->find($id);
        $form = $this->createFormBuilder($medi)
                ->add('nom')
                ->add('description')
                ->add('quantite')
                ->add('prix')
                ->add('date', 'date')
                ->add('datePerime', 'date')
                ->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('medicamentIPR'));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:modifierMedicamentIPR.html.twig', array('form' => $form->createView(),
                    'medi' => $medi));
    }
    
    //fonction permettant de modifier un médicament dans la pharmacie FST
     public function modifierMedicamentFSTAction($id) {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->find($id);
        $form = $this->createFormBuilder($medi)
                ->add('nom')
                ->add('description')
                ->add('quantite')
                ->add('prix')
                ->add('date', 'date')
                ->add('datePerime', 'date')
                ->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('medicamentFST'));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:modifierMedicamentFST.html.twig', array('form' => $form->createView(),
                    'medi' => $medi));
    }
    
     //fonction permettant de modifier un médicament dans la pharmacie SEGOU
     public function modifierMedicamentSEGOUAction($id) {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->find($id);
        $form = $this->createFormBuilder($medi)
                ->add('nom')
                ->add('description')
                ->add('quantite')
                ->add('prix')
                ->add('date', 'date')
                ->add('datePerime', 'date')
                ->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('medicamentSEGOU'));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:modifierMedicamentSEGOU.html.twig', array('form' => $form->createView(),
                    'medi' => $medi));
    }

    //fonction permettant d'afficher la liste de tous les utilisateurs  
    public function listeUtilisateurAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CSRUCSRUBundle:Utilisateur')->findAll();
        return $this->render('CSRUCSRUBundle:AdminViews:listeUtilisateur.html.twig', array('user' => $user));
    }

    //fonction permettant de modifier un utilisateur 
    public function modifierUtilisateurAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CSRUCSRUBundle:Utilisateur')->find($id);
        $form = $this->createFormBuilder($user)
                ->add('username')
                ->add('email')
                ->add('profil', new ProfilType())
                ->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('listeUtilisateur'));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:modifierUtilisateur.html.twig', array('form' => $form->createView(),
                    'user' => $user
        ));
    }

    //fonction permettant de supprimer un utlisateur 
    public function supprimerUtilisateurAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->find('CSRUCSRUBundle:Utilisateur', $id);
        $em->remove($user);
        $em->flush();
        return $this->redirect($this->generateUrl('listeUtilisateur'));
    }

    //fonction d'affichage des détails sur un utilisateur
    public function detailUtilisateurAction($id) {
        $user = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:Utilisateur')->find($id);
        return $this->render('CSRUCSRUBundle:AdminViews:detailUtilisateur.html.twig', array(
                    'user' => $user,
        ));
    }

    //fonction permettant d'afficher la liste des differents centres CSRU
    public function listeCentreAction() {
        $em = $this->getDoctrine()->getManager();
        $centre = $em->getRepository('CSRUCSRUBundle:Centre')->findAll();
        return $this->render('CSRUCSRUBundle:AdminViews:listeCentre.html.twig', array('centre' => $centre));
    }

    //fonction permettant de supprimer un centre 
    public function supprimerCentreAction($id) {
        $em = $this->getDoctrine()->getManager();
        $centre = $em->find('CSRUCSRUBundle:Centre', $id);
        $em->remove($centre);
        $em->flush();
        return $this->redirect($this->generateUrl('listeCentre'));
    }

    //fonction permettant de modifier un centre 
    public function modifierCentreAction($id) {
        $em = $this->getDoctrine()->getManager();
        $centre = $em->getRepository('CSRUCSRUBundle:Centre')->find($id);
        $form = $this->createFormBuilder($centre)
                ->add('nom')
                ->getForm();
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('listeCentre'));
            }
        }
        return $this->render('CSRUCSRUBundle:AdminViews:modifierCentre.html.twig', array('form' => $form->createView(),
                    'centre' => $centre));
    }

}
