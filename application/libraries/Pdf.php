<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once dirname(__FILE__) . '/tcpdf/config/lang/eng.php';
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{

	public function Header() {
		// Logo
		// $this->Image('resource/images/logo.jpg',15,4,35,10);
		// $this->Image('assets/global/img/header.png', 0, 0, '', '', '', '', 'center', 'true');
		// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array())
		// $this->Image('assets/global/img/header.png', 0, 0, '', '', '', '', 'center', true, 300, '', false, false, 0, true, false, true, false);
		// $this->Image('resource/images/logo.jpg',160,4,35,10);
		// $this->SetY(14);
		// $this->SetFont('Times','B',11);
		// $this->Cell(0,5,'NAMA_APLIKASI',0,1,'R');
		// $this->SetFont('Times','',8);
		// $this->Cell(0,5,'F Jl. Rungkut Industri I/27 Surabaya, Phone: (031) 8472401-05 Ext 1802',0,1,'R');
		// $this->SetFont('Times','',10);
		// $this->Ln(1);
		// $this->Cell(0,0,"","B");
		// $this->Ln(5);
		 // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	//Page footer
	function Footer(){
		// $this->SetY(-10);
		// $this->SetFont('Times','B',8);
		// $this->Cell(0,0,"","B",1);
		// $this->SetX(-10);
		// $this->Cell(0,5,'Waktu Cetak : '.date("d M Y").'      '.date("H:i:s").'            Hal : '.$this->PageNo().'',0,1,'R');

		// Position at 25 mm from bottom
		// $this->SetY(-25);
		$this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '', 7.5);
        // Page number
        $this->Cell(0, 0, 'Waktu Cetak : '.date("d/m/Y").' '.date("H:i:s").' oleh Dedy Prasetyo'.
        	'                                                                                                                        Halaman '.$this->getAliasNumPage().' dari '.$this->getAliasNbPages().' halaman', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}

}
//class MYPDF extends mPDF
//{
//	public function Header() {
//		// Logo
//		//$this->SetX(-10);
//		//function Image($file,$x,$y,$w=0,$h=0,$type='',$link='',$paint=true, $constrain=true, $watermark=false, $shownoimg=true, $allowvector=true) {
//
//		$this->Image('resource/images/logo.jpg',15,4,35,10);
//		$this->SetY(4);
//		$this->SetFont('Times','B',11);
//		$this->Cell(0,5,NAMA_APLIKASI,0,1,'R');
//		$this->SetFont('Times','',8);
//		$this->Cell(0,5,'F Jl. Rungkut Industri I/27 Surabaya, Phone: (031) 8472401-05 Ext 1802',0,1,'R');
//		$this->SetFont('Times','',10);
//		$this->Ln(1);
//		$this->Cell(0,0,"","B");
//		$this->Ln(5);
//	}
//
//	//Page footer
//	function Footer(){
//		$this->SetY(-10);
//		$this->SetFont('Times','B',8);
//		$this->Cell(0,0,"","B",1);
//		$this->SetX(-10);
//		$this->Cell(0,5,'Tanggal Cetak : '.date("d M Y").'      '.date("H:i:s").'            Hal : '.$this->PageNo().'',0,1,'R');
//	}
//
//}

function tcpdf(){
	return new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
}

//function mpdf(){
//	return new MYPDF('c','A4','','',8,8,20,10,16,13);
//}

?>
