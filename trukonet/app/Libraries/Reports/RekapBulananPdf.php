<?php

namespace App\Libraries\Reports;

use App\Libraries\Fpdf\MY_FPDF;

class RekapBulananPdf extends MY_FPDF {

    var $kelompok;

    //Page header
    function Header() {
        //Logo
//            $this->Image('logo.jpg',10,8,33);
        //arial bold 15
        $this->SetDrawColor(0,0,0);
        $this->SetTextColor(0,0,0);
        $this->SetFont('arial', '', 8);
        $this->SetY(10);
        $this->Cell(55, 4, $this->companyname, 0, 0, 'L');
        $this->SetY(14);
        $this->Cell(55, 4, $this->companyaddress, 0, 0, 'L');

        $this->SetY(10);
        $this->SetX(135);
        $this->Cell(65, 5, 'Tanggal Cetak : ' . date("d-m-Y H:i:s"), 0, 0, 'R', false);
        $this->SetFont('arial', 'B', 14);

        //Move to the right
//            $this->Cell(130);
        //Title
        $this->SetY(14);
        $this->SetX(10);
        $this->Cell(190, 8, $this->getTitle(), 0, 0, 'C');
        $this->SetY(22);
//        $this->Line(5, $this->GetY(), 292, $this->GetY());
        $this->SetFont('arial', 'B', 12);
        $this->SetX(10);
        $this->Cell(190, 5, 'THBL Pelunasan : ' . $this->dataheader[0], 0, 0, 'C', false);
        $this->SetTextColor(0, 0, 0);
        $this->SetY(28);
//        $this->Line(5, $this->GetY(), 290, $this->GetY());
        //Line break 37 y
        $this->Ln(1);
    }

    //Page footer
    function Footer() {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //arial italic 8
        $this->SetFont('arial', 'I', 8);
        //Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    public function set_header_column($w) {
//    $this->Ln();
$header  = array('Tanggal', 'Pelanggan', 'Tagihan', 'Bi Admin', 'Total Tagihan');
        // $header = array('', 'Debet', 'Kredit', 'Debet', 'Kredit', 'Debet', 'Kredit', 'Debet', 'Kredit', 'Debet', 'Kredit');
        $hcell = 5;
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('arial', '', 10);
//                $this->SetTextColor(0);
//                $this->SetFont('arial','B',10);
        // $this->Line(5,$this->GetY(),200,$this->GetY());
$this->SetX(30);
        $this->Cell($w[0], $hcell, $header[0], 'TB', 0, 'C', true);
        $this->Cell($w[1], $hcell, $header[1], 'TB', 0, 'C', true);
        $this->Cell($w[2], $hcell, $header[2], 'TB', 0, 'R', true);
        $this->Cell($w[3], $hcell, $header[3], 'TB', 0, 'R', true);
        $this->Cell($w[4], $hcell, $header[4], 'TB', 0, 'R', true);
        
        $this->Ln();
        $this->Ln(0.5);
        $this->SetFont('arial', '', 10);
        // if ($this->kelompok === 'TOTAL') {
        //         $this->SetFont('arial', 'B', 8);
        //         $this->SetTextColor(64, 14, 15);
        //     }
//        $this->Ln();
    }

    function create_pdf($data) {
        $header  = array('Tanggal', 'Pelanggan', 'Tagihan', 'Bi Admin', 'Total Tagihan');
        $this->AddPage();
//        $this->SetAutoPageBreak(true, 18);
        $this->SetDrawColor(0, 0, 0);
        $this->SetTextColor(0, 0, 0);
        $this->SetLineWidth(.1);
        $this->SetFont('arial', '', 10);
        $this->lineh = 5;
        $w = array(30, 30, 30, 30, 30);
        $a = array('C', 'C', 'R', 'R', 'R');
        $this->SetWidths($w);
//        $this->SetAligns($a);

        $this->SetWidths($w);
        $this->set_header_column($w);
        
        $pelanggan = 0;
        $tagihan = 0;
        $bi_admin = 0;
        $total_tagihan = 0;        
        $al = array('C', 'C', 'R', 'R', 'R');
        for ($i = 0; $i < count($data); $i++) {

                // $this->Line(5, $this->GetY(), 290, $this->GetY());
                // $this->SetFont('arial', 'B', 8);
                // $this->SetTextColor(23, 108, 157);  
                // $this->SetTextColor(0, 0, 0);

              
            
            $pelanggan += $data[$i]['pelanggan'];            
            $tagihan += $data[$i]['tagihan'];
            $bi_admin += $data[$i]['bi_admin'];
            $total_tagihan += $data[$i]['total_tagihan'];
            

            $datarow = array(
                $data[$i]['tgl_lunas'],
                $data[$i]['pelanggan'] > null ? $data[$i]['pelanggan'] : '-',
                $data[$i]['tagihan'] > null ? number_format($data[$i]['tagihan'], 0) : '-',
                $data[$i]['bi_admin'] > null ? number_format($data[$i]['bi_admin'], 0) : '-',
                $data[$i]['total_tagihan'] > null ? number_format($data[$i]['total_tagihan'], 0) : '-'                
            );

            if (($this->GetY() + ($this->lineh)) > 250) {
//                $this->SetTextColor(0, 0, 0);                
                $this->AddPage();
                $this->set_header_column($w);
            }
//            function RowHead3($data,$wd,$al,$hkali,$rect,$pb=0,$b=0,$bcolumn=NULL,
//                $usenumberformat=false,$numberdecimal=0,$numbercolumn=NULL,$bordertype=NULL,$celllines=false)

$this->SetX(30);
            $this->RowHead3(
                    $datarow, $w, $al, $this->lineh, 0, 0, 0, null
                    , false, 0, null, null, false);            
            $this->SetTextColor(0, 0, 0);
        }
        $this->Ln(.3);
        $this->Line(30, $this->GetY(), 180, $this->GetY());

        $datarow = array(''
            ,
            number_format($pelanggan),
            number_format($tagihan),
            number_format($bi_admin),
            number_format($total_tagihan)               
        );
        $this->SetFont('arial', 'B', 10);
        $this->SetX(30);
        // $this->SetY(($this->GetY())+1);
        $this->RowHead3(
                $datarow, $w, $al, $this->lineh, 0, 0, 0, null
                , false, 0, null, null, false);            
        
    }

}

?>