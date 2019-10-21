<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisa_rasio extends CI_Controller {

    private $data_respon = [];

    function __construct()
 	{
 		parent::__construct();
        if ($this->session->userdata('username') == '') {
        	$this->session->set_flashdata('notifikasi', '<div id="notifikasi">SILAKAN LOGIN TERLEBIH DAHULU</div>');
            redirect('login');
        }
        $this->data_respon['head'] = [];
        $this->data_respon['navbar'] = [
            'username' => $this->session->userdata('username'),
        ];
        $this->data_respon['sidebar'] = [];
 	}

    public function index()
    {
        $this->data_respon['data'] = '';
    	$this->load->view('akuntansi/akuntansi/laporan_keuangan/v_analisa_rasio', $this->data_respon);
    }

    function cetak() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("P", "F4");
        $pdf->SetFont("helvetica", "", 9);

        // $source_img = base_url('assets/global/img/header.png');

        // $html = '<img src="'.$source_img.'" >';
        // $html = '

        $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html .= '
        <style>
            table, thead, tr, th {
                font-family: "helvetica";
                font-size: 9px;
            }
            p {
              font-size: 9px;
              text-align: justify;
              margin: 0px;
              padding: 0px;
            }
        </style>
        <div align="center"><b><u>LAPORAN ANALISA RASIO KEUANGAN</u></b><br>
            September 2019</div>
        <br>
        <h4>1. RASIO LIKUIDITAS</h4>
        <p>Merupakan suatu indikator mengenai kemampauan perusahaan membayar semua kewajiban fianansial jangka pendek pada saat jatuh tempo dengan menggunakan aktiva lancar yang tersedia Likuidiatas tidak hanya berkenaan dengan keadaan keseluruhan keuangan perusahaan, tetapi juga berkaitan dengan kemampuannya mengubah aktiva lancar tertentu menjadi uang kas</p>
        <p>a. Current Ratio (Rasio Lancar)</p>
        <p>Current ratio menunjukkan sejauh mana akitva lancar menutupi kewajiban-kewajiban lancar Semakin besar perbandingan aktiva lancar dan kewajiban lancar semakin tinggi kemampuan perusahaan menutupi kewajiban jangka pendeknya</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Current Ratio</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Aktiva Lancar</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">22.032.325.048</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">129.31%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Hutang Lancar</td>
                <td width="15%" align="center">17.038.099.545</td>
            </tr>
        </table>
        <p>b. Cash Ratio (Rasio Kas)</p>
        <p>Rasio ini merupakan rasio yang menunjukkan posisi kas yang dapat menutupi hutang lancar dengan kata lain cash ratio merupakan rasio yang menggambarkan kemampuan kas yang dimiliki dalam manajemen kewajiban lancar tahun yang bersangkutan</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Cash Ratio</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Kas</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">3.234.719.412</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">18.99%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Hutang Lancar</td>
                <td width="15%" align="center">17.038.099.545</td>
            </tr>
        </table>
        <h4>2. RASIO PROFITABILITAS</h4>
        <p>Merupakan rasio yang bertujuan untuk mengetahui kemampuan perusahaan dalam menghasilkan laba selama periode tertentu dan juga memberikan gambaran tentang tingkat efektifitas manajemen dalam melaksanakan kegiatan operasinya Efektifitas manajemen disini dilihat dari laba yang dihasilkan terhadap penjualan dan investasi perusahaan Rasio ini disebut juga rasio rentabilitas</p>
        <p>a. Gross Profit Margin (Margin Laba Kotor)</p>
        <p>Gross profit margin merupakan persentase laba kotor dibandingkan dengan sales Semakin besar gross profit margin semakin baik keadaan operasi perusahaan, karena hal ini menunjukkan bahwa harga pokok penjualan relatif lebih rendah dibandingkan dengan sales, demikian pula sebaliknya, semakin rendah gross profit margin semakin kurang baik operasi perusahaan</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Gross Profit Margin</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Penjualan - Harga Pokok</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">24.125.459.658</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">38.03%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Penjualan</td>
                <td width="15%" align="center">63.435.507.868</td>
            </tr>
        </table>
        <p>b. Net Profit Margin (Margin Laba Bersih)</p>
        <p>Rasio ini mengukur laba bersih setelah pajak terhadap penjualan Semakin tinggi Net profit margin semakin baik operasi suatu Perusahaan</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Net Profit Margin</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Laba Bersih setelah Pajak</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">2.593.754.325</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">4.09%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Penjualan</td>
                <td width="15%" align="center">63.435.507.868</td>
            </tr>
        </table>
        <p>c. Return on Investment</p>
        <p>Return on Investment merupakan perbandingan antara laba bersih setelah pajak dengan total aktiva Return on investment adalah merupakan rasio yang mengukur kemampuan perusahaan secara keseluruhan di dalam menghasilkan  keuntungan dengan jumlah keseluruhan aktiva yang tersedia di dalam perusahaan</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Return on Investment</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Laba Bersih setelah Pajak</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">2.593.754.325</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">2.82%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Total Aktiva</td>
                <td width="15%" align="center">91.841.499.179</td>
            </tr>
        </table>
        <p>d. Return on Equity</p>
        <p>Return on equity adalah  rasio yang memperlihatkan sejauh manakah perusahaan mengelola modal sendiri (net worth) secara efektif, mengukur tingkat keuntungan dari investasi yang telah dilakukan pemilik modal sendiri atau pemegang saham perusahaan ROE menunjukkan rentabilitas modal sendiri atau yang sering disebut rentabilitas usaha</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Return on Equity</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Laba Bersih setelah Pajak</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">2.593.754.325</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">7.52%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Ekuitas</td>
                <td width="15%" align="center">34.478.207.748</td>
            </tr>
        </table>
        ';

        $pdf->writeHTML($html, true, false, true, false);
        $pdf->lastPage();

        $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html .= '
        <style>
            table, thead, tr, th {
                font-family: "helvetica";
                font-size: 9px;
            }
            p {
              font-size: 9px;
              text-align: justify;
              margin: 0px;
              padding: 0px;
            }
        </style>
        <h4>3. RASIO AKTIVITAS</h4>
        <p>Rasio Aktivitas adalah rasio yang mengukur seberapa efektif perusahaan dalam memanfaatkan semua sumber daya yang ada padanya Semua rasio aktivitas ini melibatkan perbandingan antara tingkat penjualan dan investasi pada berbagai jenis aktiva Rasio-rasio aktivitas menganggap bahwa sebaiknya terdapat keseimbangan yang layak antara penjualan dan beragai unsur aktiva misalnya persediaan, aktiva tetap dan aktiva lainnya</p>
        <p>a. Total Assets Turn Over (perputaran aktiva)</p>
        <p>Total assets turn over merupakan perbandingan antara penjualan dengan total aktiva suatu perusahaan dimana rasio ini  menggambarkan kecepatan perputarannya total aktiva dalam satu periode tertentu Jadi semakin besar rasio ini semakin  baik yang berarti bahwa aktiva dapat lebih cepat berputar dan meraih laba dan menunjukkan semakin efisien penggunaan keseluruhan aktiva dalam menghasilkan penjualan</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Total Asset Turn Over</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Penjualan</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">63.435.507.868</td>
                <td width="10%" rowspan="2" align="center">x 1 kali</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">0.69 kali</td>
            </tr>
            <tr>
                <td width="25%" align="center">Total Aktiva</td>
                <td width="15%" align="center">91.841.499.179</td>
            </tr>
        </table>
        <p>b. Working Capital Turn Over (Rasio Perputaran Modal Kerja)</p>
        <p>Perputaran modal kerja merupakan perbandingan antara penjualan dengan modal kerja bersih Dimana modal kerja bersih adalah aktiva lancar dikurangi utang lancar Perputaran modal kerja merupakan rasio mengukur aktivitas bisnis terhadap kelebihan aktiva lancar atas kewajiban lancar serta menunjukkan banyaknya penjualan (dalam rupiah) yang dapat diperoleh perusahaan untuk tiap rupiah modal kerja</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Working Capital Turn Over</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Penjualan</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">63.435.507.868</td>
                <td width="10%" rowspan="2" align="center">x 1 kali</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">12.70 kali</td>
            </tr>
            <tr>
                <td width="25%" align="center">Aktiva Lancar - Hutang Lancar</td>
                <td width="15%" align="center">4.994.225.503</td>
            </tr>
        </table>
        <p>c. Rasio perputaran persediaan (Inventory Turnover)</p>
        <p>Inventory Turnover menunjukkan kemampuan dana yang tertanam dalam inventory berputar dalam suatu periode tertentu, atau likuiditas dari inventory dan tendensi untuk adanya overstock</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Perputaran Persediaan (At market)</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Penjualan</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">63.435.507.868</td>
                <td width="10%" rowspan="2" align="center">x 1 kali</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">23.68 kali</td>
            </tr>
            <tr>
                <td width="25%" align="center">Persediaan</td>
                <td width="15%" align="center">2.678.947.808</td>
            </tr>
        </table>
        <h4>4. RASIO SOLVABILITAS</h4>
        <p>Suatu perusahaan menunjukkan kemampuan perusahaan untuk memenuhi kewajiban financialnya baik jangka pendek maupun jangka panjang apabila sekiranya perusahaan dilikuidasi</p>
        <p>a. Rasio hutang modal / Debt to Equity Ratio</p>
        <p>Rasio hutang modal menggambarkan sampai sejauh mana modal pemilik dapat menutupi hutang-hutang kepada pihak luar dan merupakan rasio yang mengukur hingga sejauh mana perusahaan dibiayai dari hutang Rasio ini disebut juga rasio leverage</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Debt to Equity Ratio</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Total Hutang</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">54.769.537.104</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">147.74%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Modal (Equity)</td>
                <td width="15%" align="center">37.071.962.073</td>
            </tr>
        </table>
        <p>b. Total Asets to Total Debt Ratio/ Debt Ratio</p>
        <p>Rasio ini merupakan perbandingan antara total hutang dengan total aktiva Sehingga rasio ini menunjukkan sejauh mana hutang dapat ditutupi oleh aktiva Menurut Sawir (2008:13) debt ratio merupakan rasio yang memperlihatkan proposi antara kewajiban yang dimiliki dan seluruh kekayaan yang dimiliki</p>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td width="25%" rowspan="2" align="left">Total Asets to Total Debt Ratio/ Debt Ratio</td>
                <td width="5%" rowspan="2" align="center">:</td>
                <td width="25%" style="border-bottom:0.5px solid black;" align="center">Total Hutang</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="15%" style="border-bottom:0.5px solid black;" align="center">54.769.537.104</td>
                <td width="10%" rowspan="2" align="center">x 100%</td>
                <td width="5%" rowspan="2" align="center">=</td>
                <td width="10%" rowspan="2" align="center">59.63%</td>
            </tr>
            <tr>
                <td width="25%" align="center">Total Aktiva</td>
                <td width="15%" align="center">91.841.499.179</td>
            </tr>
        </table>
        ';

        $pdf->writeHTML($html, true, false, true, false);
        $pdf->lastPage();

        $pdf->Output("assets/file/cetak_analisa_rasio.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
}
