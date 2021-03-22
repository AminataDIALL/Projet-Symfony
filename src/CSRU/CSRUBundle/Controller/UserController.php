<?php

namespace CSRU\CSRUBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CSRU\CSRUBundle\Entity\Reservation;
use CSRU\CSRUBundle\Form\ForumType;
use CSRU\CSRUBundle\Entity\Forum;
use CSRU\CSRUBundle\Entity\Profil;
use CSRU\CSRUBundle\Form\ProfilType;
use CSRU\CSRUBundle\Form\ReservationType;

class UserController extends Controller {

    //fonction d'affichage de la page d'accueil côté utilisateur
    public function accueilAction() {
        return $this->render('CSRUCSRUBundle:UserViews:accueil.html.twig');
    }

    // fonction d'affichage de la liste de tous les étudiants
    public function listeEtudiantAction() {
        $em = $this->getDoctrine()->getManager();
        $etudiant = $em->getRepository('CSRUCSRUBundle:Etudiant')->findAll();
        return $this->render('CSRUCSRUBundle:UserViews:listeEtudiant.html.twig', array('etudiant' => $etudiant));
    }

    // fonction d'affichage de la liste de tous les médicaments de CSRU
    public function pharmacieAction() {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->findAll();
        //var_dump($dossier);
        return $this->render('CSRUCSRUBundle:UserViews:pharmacie.html.twig', array('medi' => $medi));
    }

    // fonction d'affichage de la liste de tous les médicaments de CSRU de la FST
    public function pharmacieFSTAction() {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->findAll();
        return $this->render('CSRUCSRUBundle:UserViews:pharmacieFST.html.twig', array('medi' => $medi));
    }

    // fonction d'affichage de la liste de tous les médicaments de CSRU de l'IPR
    public function pharmacieIPRAction() {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->findAll();
        return $this->render('CSRUCSRUBundle:UserViews:pharmacieIPR.html.twig', array('medi' => $medi));
    }

    // fonction d'affichage de la liste de tous les médicaments de CSRU de SEGOU
    public function pharmacieSEGOUAction() {
        $em = $this->getDoctrine()->getManager();
        $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->findAll();
        return $this->render('CSRUCSRUBundle:UserViews:pharmacieSEGOU.html.twig', array('medi' => $medi));
    }

    // fonction permettant de prendre un médicament dans la pharmacie d'un CSRU donné
    public function reserverAction($id) {
        $reservation = new Reservation;
        $reservation->setDate(new \DateTime());
        $medicament = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:Medicament')->find($id);
        $form = $this->createform(new ReservationType, $reservation);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em = $this->getDoctrine()->getManager();
                $user = $this->getUser();
                $reservation->setUtilisateur($user);
                $reservation->setNom($medicament->getNom());
                if ($medicament->getQuantite() < $reservation->getQuantite()) {
                    $this->get('session')->getFlashBag()->add('reservation', 'Oupsss Quantité disponible insuffisante dans la pharmacie');
                    return $this->render('CSRUCSRUBundle:UserViews:reserver.html.twig', array('medicament' => $medicament,
                                'form' => $form->createView()));
                }
                $nombre = $medicament->getQuantite() - $reservation->getQuantite();
                $medicament->setQuantite($nombre);
                $em->persist($medicament);
                $em->persist($reservation);
                $em->flush();
                $this->get('session')->getFlashBag()->add('reservation', 'Opération faite avec succès');
                return $this->render('CSRUCSRUBundle:UserViews:reserver.html.twig', array('reservation' => $reservation,
                            'id' => $reservation->getId(),
                            'form' => $form->createView()));
            }
        }
        return $this->render('CSRUCSRUBundle:UserViews:reserver.html.twig', array('medicament' => $medicament,
                    'form' => $form->createView()));
    }

    // fonction d'affichage du résultat de la recherche d'un patient
    public function resultatPatientAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $data = $_POST['recherchePATIENT'];
            $em = $this->getDoctrine()->getManager();
            $patients = $em->getRepository('CSRUCSRUBundle:DossierMedical')->getPatient($data);
            return $this->render('CSRUCSRUBundle:UserViews:resultatPatient.html.twig', array('patients' => $patients,
                        'data' => $data));
        } else {
            throw $this->createNotFoundException('Aucun patient retrouvé');
        }
        return $this->render('CSRUCSRUBundle:UserViews:resultatPatient.html.twig');
    }

    //fonction d'affichage du résultat de la recherche d'un medicament dans le CSRU de la FST
    public function resultatMediFstAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $data = $_POST['rechercheMediFst'];
            $em = $this->getDoctrine()->getManager();
            $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->getMediFst($data);
            return $this->render('CSRUCSRUBundle:UserViews:resultatMediFST.html.twig', array('medi' => $medi,
                        'data' => $data));
        } else {
            throw $this->createNotFoundException('Aucun médicament retrouvé');
        }
        return $this->render('CSRUCSRUBundle:UserViews:resultatMediFST.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    //fonction d'affichage du résultat de la recherche d'un medicament dans le CSRU de l'IPR
    public function resultatMediIprAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $data = $_POST['rechercheMediIpr'];
            $em = $this->getDoctrine()->getManager();
            $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->getMediIpr($data);
            return $this->render('CSRUCSRUBundle:UserViews:resultatMediIPR.html.twig', array('medi' => $medi,
                        'data' => $data));
        } else {
            throw $this->createNotFoundException('Aucun médicament retrouvé');
        }
        return $this->render('CSRUCSRUBundle:UserViews:resultatMediIPFR.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    //fonction d'affichage du résultat de la recherche d'un medicament dans le CSRU de SEGOU
    public function resultatMediSegouAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $data = $_POST['rechercheMediSegou'];
            $em = $this->getDoctrine()->getManager();
            $medi = $em->getRepository('CSRUCSRUBundle:Medicament')->getMediSegou($data);
            return $this->render('CSRUCSRUBundle:UserViews:resultatMediSEGOU.html.twig', array('medi' => $medi,
                        'data' => $data));
        } else {
            throw $this->createNotFoundException('Aucun médicament retrouvé');
        }
        return $this->render('CSRUCSRUBundle:UserViews:resultatMediSEGOU.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    //fonction gerant le forum
    public function forumAction($page = 1) {
        $forums = new Forum();
        $forums->setDate(new \DateTime());
        $form = $this->createform(new ForumType, $forums);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $em = $this->getDoctrine()->getManager();
                $user = $this->getUser();
                $forums->setUtilisateur($user);
                $em->persist($forums);
                $em->flush();
                return $this->redirect($this->generateUrl('forum'));
            }
        }
        //Récupération des publications avec le numéro de page (1 si non renseigné)
        //et le maximum de publication à afficher (30 ici)
        $forum = $this->getDoctrine()->getRepository('CSRUCSRUBundle:Forum')
                ->findAll($page, 30);

        //Informations pour la pagination: la page actuelle, le nom de la route,
        //le nombre de pages retournées
        $pagination = array(
            'page' => $page,
            'route' => 'forum',
            'pages_count' => ceil(count($forum) / 2),
            'route_params' => array()
        );
        //On retourne le tout
        return $this->render('CSRUCSRUBundle:UserViews:forum.html.twig', array(
                    'forum' => $forum,
                    'pagination' => $pagination,
                    'form' => $form->createView()
        ));
    }
    
    
    public function agendaAction() {
        $em = $this->getDoctrine()->getManager();
        $agenda = $em->getRepository('CSRUCSRUBundle:Rdv')->byRdv($this->getUser());
        return $this->render('CSRUCSRUBundle:UserViews:agenda.html.twig', array('agenda' => $agenda));
    }

}
