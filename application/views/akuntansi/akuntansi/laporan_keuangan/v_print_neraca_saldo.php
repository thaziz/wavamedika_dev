<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=NeracaSaldo.xls");
$start_debit=0;
        $start_credit=0;
        $debit=0;
        $credit=0;
        $end_debit=0;
        $end_credit=0;
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("P", "A4");
        $pdf->SetFont("helvetica", "", 9);
        


    // $html = '<img src="'.$source_img.'" >';

    $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
    $html .= '
    <style>
        table, thead, tr, th {
            border:0.5px solid black;
            font-size: 7.5px;
        }
    </style>
    <div align="center"><b><u>NERACA SALDO</u></b><br>
        Periode tanggal '.$_POST["tgl1"].' s/d '.$_POST["tgl2"].'</div>
    <br><br>
    <b>Kode Rekening Awal: '.$data["coa1"].'</b>
    <br>
    <b>Kode Rekening Akhir: '.$data["coa2"].'</b>
    <br><br>
    <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
        <tr>
            <th align="center" rowspan="2" width="8%">Kode Rekening</th>
            <th align="center" rowspan="2" width="20%">Nama Rekening</th>
            <th align="center" colspan="2">Saldo Awal</th>
            <th align="center" colspan="2">Mutasi</th>
            <th align="center" colspan="2">Saldo Akhir</th>
        </tr>
        <tr>
            <th align="center">Debet</th>
            <th align="center">Kredit</th>
            <th align="center">Debet</th>
            <th align="center">Kredit</th>
            <th align="center">Debet</th>
            <th align="center">Kredit</th>
        </tr>';

            foreach ($data["rows"] as $key => $v) {
                $html .='<tr>
                            <td style="border-right:0.5px solid black;" align="center">'.$v->coa_code.'</td>
                            <td style="border-right:0.5px solid black;">'.$v->coa_name.'</td>
                            <td style="border-right:0.5px solid black;" align="right">'.number_format($v->start_debit,'2',',','.').'</td>
                            <td style="border-right:0.5px solid black;" align="right">'.number_format($v->start_credit,'2',',','.').'</td>
                            <td style="border-right:0.5px solid black;" align="right">'.number_format($v->debit,'2',',','.').'</td>
                            <td style="border-right:0.5px solid black;" align="right">'.number_format($v->credit,'2',',','.').'</td>
                            <td style="border-right:0.5px solid black;" align="right">'.number_format($v->end_debit,'2',',','.').'</td>
                            <td align="right">'.number_format($v->end_credit,'2',',','.').'</td>
                        </tr>';
                $start_debit+=$v->start_debit;
                $start_credit+=$v->start_credit;
                $debit+=$v->debit;
                $credit+=$v->credit;
                $end_debit+=$v->end_debit;
                $end_credit+=$v->end_credit;
            }

 $html .='
        <tr>
            <td style="border-right:0.5px solid black; border-top:0.5px solid black;" colspan="2" align="right">Total</td>
            <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($start_debit,'2',',','.').'</td>
            <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($start_credit,'2',',','.').'</td>
            <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($debit,'2',',','.').'</td>
            <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($credit,'2',',','.').'</td>
            <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($end_debit,'2',',','.').'</td>
            <td style="border-top:0.5px solid black;" align="right">'.number_format($end_credit,'2',',','.').'</td>
        </tr>
    </table>';
echo $html;
?>