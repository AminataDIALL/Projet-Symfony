<?php

namespace CSRU\CSRUBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CSRU\CSRUBundle\Entity\DossierMedical;
use CSRU\CSRUBundle\Form\DossierMedicalType;
use CSRU\CSRUBundle\Entity\Prescription;
use CSRU\CSRUBundle\Form\PrescriptionType;
use CSRU\CSRUBundle\Entity\Hospitalisation;
use CSRU\CSRUBundle\Form\HospitalisationType;
use CSRU\CSRUBundle\Entity\Consultation;
use CSRU\CSRUBundle\Form\ConsultationType;
use CSRU\CSRUBundle\Entity\Antecedant;
use CSRU\CSRUBundle\Form\AntecedantType;
use CSRU\CSRUBundle\Entity\Examen;
use CSRU\CSRUBundle\Form\ExamenType;
use CSRU\CSRUBundle\Entity\FicheSortie;
use CSRU\CSRUBundle\Form\FicheSortieType;
use CSRU\CSRUBundle\Entity\Rdv;
use CSRU\CSRUBundle\Form\RdvType;

class PatientController extends Controller {

    //Affichage de la liste des patients
    public function listePatientAction() {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->findAll();
        return $this->render('CSRUCSRUBundle:PatientViews:listePatient.html.twig', array('dossier' => $dossier));
    }

    //fonction permettant d'affecter un dossier Medical à un étudiant
    public function ajoutDossierMedicalAction($id) {
        $dossier_medical = new DossierMedical();
        $dossier_medical->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $etudiant = $em->getRepository('CSRUCSRUBundle:Etudiant')->find($id);
        $form = $this->createform(new DossierMedicalType, $dossier_medical);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $dossiers = $em->getRepository('CSRUCSRUBundle:DossierMedical')->findAll();
                $nom = $etudiant->getNom();
                $prenom = $etudiant->getPrenom();
                $existe = false;
                foreach ($dossiers as $d) {
                    if ($d->getEtudiant() == $etudiant) {
                        $existe = true;
                    }
                }
                if ($existe) {
                    $this->addFlash(
                            'info', 'Le dossier medical de' . ' ' . $nom . ' ' . $prenom . ' ' . 'existe déjà');
                    return $this->render('CSRUCSRUBundle:PatientViews:ajoutDossierMedical.html.twig', array('form' => $form->createView()));
                }
                $dossier_medical->setEtudiant($etudiant);
                $user = $this->getUser();
                $dossier_medical->setUtilisateur($user);
                $em->persist($dossier_medical);
                $em->flush();
                return $this->redirect($this->generateUrl('dossierMedical', array('id' => $dossier_medical->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutDossierMedical.html.twig', array('form' => $form->createView()));
    }

    //fonction permettant d'afficher le dossier medical d'un dossier médical
    public function dossierMedicalAction($id) {
        $dossier = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        return $this->render('CSRUCSRUBundle:PatientViews:dossierMedical.html.twig', array(
                    'dossier' => $dossier,
                    'id' => $id,
        ));
    }

    //Formulaire d'ajout d'une prescription
    public function ajoutPrescriptionAction($id) {
        $prescription = new Prescription();
        $prescription->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $form = $this->createform(new PrescriptionType, $prescription);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $prescription->setDossierMedical($dossier);
                $user = $this->getUser();
                $prescription->setUtilisateur($user);
                $em->persist($prescription);
                $em->flush();
                return $this->redirect($this->generateUrl('prescription', array(
                                    'id' => $dossier->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutPrescription.html.twig', array('form' => $form->createView(), 'dossier' => $dossier));
    }

    //Affichage de la liste des prescriptions d'un dossier médical selectionné
    public function prescriptionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $prescriptions = $em->getRepository('CSRUCSRUBundle:Prescription')->findBy(array('DossierMedical' => $dossier));
        return $this->render('CSRUCSRUBundle:PatientViews:listePrescription.html.twig', array(
                    'dossier' => $dossier,
                    'prescriptions' => $prescriptions));
    }

    //fonction permettant d'afficher le détail d'une prescription
    public function detailPrescriptionAction($id) {
        $prescription = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:Prescription')->find($id);
        return $this->render('CSRUCSRUBundle:PatientViews:detailPrescription.html.twig', array(
                    'prescription' => $prescription,
        ));
    }

    //Formulaire d'ajout d'une hospitalisation
    public function ajoutHospitalisationAction($id) {
        $hospitalisation = new Hospitalisation();
        $hospitalisation->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $form = $this->createform(new HospitalisationType, $hospitalisation);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $hospitalisation->setDossierMedical($dossier);
                $user = $this->getUser();
                $hospitalisation->setUtilisateur($user);
                $em->persist($hospitalisation);
                $em->flush();
                return $this->redirect($this->generateUrl('hospitalisation', array(
                                    'id' => $dossier->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutHospitalisation.html.twig', array('form' => $form->createView(), 'dossier' => $dossier));
    }

    //Affichage de la liste des hospitalisations d'un dossier médical selectionné
    public function hospitalisationAction($id) {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $hospitalisations = $em->getRepository('CSRUCSRUBundle:Hospitalisation')->findBy(array('DossierMedical' => $dossier));
        return $this->render('CSRUCSRUBundle:PatientViews:listeHospitalisation.html.twig', array('dossier' => $dossier,
                    'hospitalisations' => $hospitalisations));
    }

    //fonction permettant d'afficher le détail d'une hospitalisation
    public function detailHospitalisationAction($id) {
        $fiche = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:FicheSortie')->find($id);
        $hospitalisation = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:Hospitalisation')->find($id);
        return $this->render('CSRUCSRUBundle:PatientViews:detailHospitalisation.html.twig', array(
                    'hospitalisation' => $hospitalisation,
                    'fiche' => $fiche,
        ));
    }

    //Formulaire d'ajout d'une consultation
    public function ajoutConsultationAction($id) {
        $consultation = new Consultation();
        $consultation->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $form = $this->createform(new ConsultationType, $consultation);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $consultation->setDossierMedical($dossier);
                $user = $this->getUser();
                $consultation->setUtilisateur($user);
                $em->persist($consultation);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Consultation ajoutée avec succès');
                return $this->redirect($this->generateUrl('ajoutConsultation', array(
                                    'id' => $dossier->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutConsultation.html.twig', array('form' => $form->createView(), 'dossier' => $dossier));
    }

    //Affichage de la liste des consultations d'un dossier médical selectionné
    public function consultationAction($id) {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $consultations = $em->getRepository('CSRUCSRUBundle:Consultation')->findBy(array('dossierMedical' => $dossier));
        return $this->render('CSRUCSRUBundle:PatientViews:listeConsultation.html.twig', array('dossier' => $dossier,
                    'consultations' => $consultations));
    }

    //fonction permettant d'afficher le détail d'une consultation
    public function detailConsultationAction($id) {
        $consultation = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:Consultation')->find($id);
        return $this->render('CSRUCSRUBundle:PatientViews:detailConsultation.html.twig', array(
                    'consultation' => $consultation,
        ));
    }

    //Formulaire d'ajout d'un antecedant
    public function ajoutAntecedantAction($id) {
        $antecedant = new Antecedant();
        $antecedant->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $form = $this->createform(new AntecedantType, $antecedant);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $antecedant->setDossierMedical($dossier);
                $user = $this->getUser();
                $antecedant->setUtilisateur($user);
                $em->persist($antecedant);
                $em->flush();
                return $this->redirect($this->generateUrl('antecedant', array(
                                    'id' => $dossier->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutAntecedant.html.twig', array('form' => $form->createView(), 'dossier' => $dossier));
    }

    //Affichage de la liste des antécedants d'un dossier médical selectionné
    public function antecedantAction($id) {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $antecedants = $em->getRepository('CSRUCSRUBundle:Antecedant')->findBy(array('dossierMedical' => $dossier));
        //var_dump($dossier);
        return $this->render('CSRUCSRUBundle:PatientViews:listeAntecedant.html.twig', array('dossier' => $dossier,
                    'antecedants' => $antecedants));
    }

    //fonction permettant d'afficher le détail d'un antécédent
    public function detailAntecedantAction($id) {
        $antecedant = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:Antecedant')->find($id);
        return $this->render('CSRUCSRUBundle:PatientViews:detailAntecedant.html.twig', array(
                    'antecedant' => $antecedant,
        ));
    }

    //Formulaire d'ajout d'un examen pour un patient
    public function ajoutExamenAction($id) {
        $examen = new Examen();
        $examen->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $form = $this->createform(new ExamenType, $examen);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $examen->setDossierMedical($dossier);
                $user = $this->getUser();
                $examen->setUtilisateur($user);
                $em->persist($examen);
                $em->flush();
                return $this->redirect($this->generateUrl('examen', array(
                                    'id' => $dossier->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutExamen.html.twig', array('form' => $form->createView(), 'dossier' => $dossier));
    }

    //Affichage de la liste des antécedants d'un dossier médical selectionné
    public function examenAction($id) {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $examens = $em->getRepository('CSRUCSRUBundle:Examen')->findBy(array('DossierMedical' => $dossier));
        return $this->render('CSRUCSRUBundle:PatientViews:listeExamen.html.twig', array('dossier' => $dossier,
                    'examens' => $examens));
    }

    //fonction permettant d'afficher le détail d'un examen
    public function detailExamenAction($id) {
        $examen = $this->getDoctrine()->getManager()->getRepository('CSRUCSRUBundle:Examen')->find($id);
        return $this->render('CSRUCSRUBundle:PatientViews:detailExamen.html.twig', array(
                    'examen' => $examen,
        ));
    }

    //fonction permettant d'afficher le détail d'une fiche de sortie
    public function ficheSortieAction($id) {
        $em = $this->getDoctrine()->getManager();
        $hospitalisation = $em->getRepository('CSRUCSRUBundle:Hospitalisation')->find($id);
        $fiche = $em->getRepository('CSRUCSRUBundle:FicheSortie')->findBy(array('hospitalisation' => $hospitalisation));
        return $this->render('CSRUCSRUBundle:PatientViews:ficheSortie.html.twig', array('hospitalisation' => $hospitalisation,
                    'fiche' => $fiche));
    }

    //fonction permettant d'ajouter une fiche de sortie après une hospitalisation
    public function ajoutFicheSortieAction($id) {
        $fiche = new FicheSortie();
        $em = $this->getDoctrine()->getManager();
        $hospitalisation = $em->getRepository('CSRUCSRUBundle:Hospitalisation')->find($id);
        $form = $this->createform(new FicheSortieType, $fiche);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $fiche->setHospitalisation($hospitalisation);
                $em->persist($fiche);
                $em->flush();
                return $this->redirect($this->generateUrl('ficheSortie', array(
                                    'id' => $hospitalisation->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutFicheSortie.html.twig', array('form' => $form->createView(), 'fiche' => $fiche));
    }
    
     //fonction permettant d'afficher la liste des rendez-vous d'un patient
      public function rdvAction($id) {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $rdv = $em->getRepository('CSRUCSRUBundle:Rdv')->findBy(array('dossierMedical' => $dossier));
        return $this->render('CSRUCSRUBundle:PatientViews:rdvPatient.html.twig', array('dossier' => $dossier,
                    'rdv' => $rdv));
    }
    
     //fonction permettant la création d'un rendez-vous
     public function ajoutRdvAction($id) {
        $rdvs = new Rdv();
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('CSRUCSRUBundle:DossierMedical')->find($id);
        $form = $this->createform(new RdvType, $rdvs);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isvalid()) {
                $rdvs->setDossierMedical($dossier);
                $user = $this->getUser();
                $rdvs->setUtilisateur($user);
                $em->persist($rdvs);
                $em->flush();
                return $this->redirect($this->generateUrl('rdv', array(
                                    'id' => $dossier->getId())));
            }
        }
        return $this->render('CSRUCSRUBundle:PatientViews:ajoutRdv.html.twig', array('form' => $form->createView(),'dossier'=>$dossier));
    }

}
