<?php 
require_once('fpdf/fpdf.php'); 
require_once('../Model/UserModel.php');
class pdfMaker
{
    private $newPdf;
    function __construct() {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $this->newPdf = new FPDF();
    }
    public function Receipt($userName,$PaymentId) 
    {
        
    $this->newPdf->AddPage();
    $this->newPdf->SetFont('Arial','B',16);
    $this->newPdf->Cell(0,10,'Dear '.$userName,0,1,'C');
    $this->newPdf->Cell(0,10,'Thank you for your payment',0,1,'C');
    $this->newPdf->Cell(0,10,'your payment #'. $PaymentId .' has been successfully submited',0,1,'C');
    $this->newPdf->Output('D','Payment.pdf');

    //header('location:');
    }
    public function photoPdf(){
        $user = unserialize($_SESSION['user']);
        $userID=$user->getID();
        $userName=$user->getFirstName();
        $this->newPdf->AddPage();
        $this->newPdf->SetFont('Arial','B',16);
        $this->newPdf->Cell(0,10,'Dear '.$userName,0,1,'C');
        $this->newPdf->Cell(0,10,'This is a QR code for our social media page',0,1,'C');
        $this->newPdf->Image('../frame.png',80,60,-100);
        
        $this->newPdf->Output('D','QR.pdf');
    }
}