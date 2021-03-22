<?php

namespace CSRU\CSRUBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class PDFController extends Controller {

    //fonction gerant le fichier PDF d'une prescription
    public function prescriptionPDFAction($id) {
        $em = $this->getDoctrine()->getManager();
        $prescription = $em->getRepository('CSRUCSRUBundle:Prescription')->find($id);
        if (!$prescription) {
            $this->get('session')->getFlashBag()->add('error', 'une erreur est survenue');
        }

        //on stock la vue à convertir en PDF en oubliant pas les parametres twig si la vue comporte les données dynamiques
        $html = $this->renderView('CSRUCSRUBundle:PDFViews:prescriptionPDF.html.twig', array('prescription' => $prescription));

        $html2pdf = new \Html2Pdf_Html2Pdf('P', 'A4', 'fr');
        $html2pdf->pdf->SetAuthor('CSRU-MALI');
        $html2pdf->pdf->SetTitle('Prescription ');
        $html2pdf->pdf->SetSubject('Prescription CSRU-MALI');
        $html2pdf->pdf->SetKeywords('Prescription, CSRU-MALI');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $content = $html2pdf->Output('Prescription.pdf', true);

        $response = new Response;
        $response->setContent($content);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-disposition', 'filename= Prescription.pdf');
        return $response;
    }

    //fonction gerant le fichier PDF d'une fiche de sortie
    public function ficheSortiePDFAction($id) {
        $em = $this->getDoctrine()->getManager();
        $fiche = $em->getRepository('CSRUCSRUBundle:FicheSortie')->find($id);
        if (!$fiche) {
            $this->get('session')->getFlashBag()->add('error', 'une erreur est survenue');
        }

        //on stock la vue à convertir en PDF en oubliant pas les parametres twig si la vue comporte les données dynamiques
        $html = $this->renderView('CSRUCSRUBundle:PDFViews:ficheSortiePDF.html.twig', array('fiche' => $fiche));

        $html2pdf = new \Html2Pdf_Html2Pdf('P', 'A4', 'fr');
        $html2pdf->pdf->SetAuthor('CSRU-MALI');
        $html2pdf->pdf->SetTitle('Fiche_Sortie ');
        $html2pdf->pdf->SetSubject('Fiche_Sortie CSRU-MALI');
        $html2pdf->pdf->SetKeywords('Fiche_Sortie, CSRU-MALI');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $content = $html2pdf->Output('Fiche_Sortie.pdf', true);

        $response = new Response;
        $response->setContent($content);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-disposition', 'filename= Fiche_Sortie.pdf');
        return $response;
    }

}
