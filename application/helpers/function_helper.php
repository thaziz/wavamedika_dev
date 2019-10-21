<?php

function helper_dd($data)
{
    if ($data == null) {
        echo 'null atau array kosong' ;
    } else {
        echo '<pre>';
        print_r($data);
    }
    die();
}

function convert_date_to_indonesia($date)
{
    $tanggal = date('j', strtotime($date));
    $nomor_bulan = date('n', strtotime($date));
    $tahun = date('Y', strtotime($date));

    switch ($nomor_bulan) {
        case 1:
            $bulan = 'Januari';
            break;
        case 2:
            $bulan = 'Februari';
            break;
        case 3:
            $bulan = 'Maret';
            break;
        case 4:
            $bulan = 'April';
            break;
        case 5:
            $bulan = 'Mei';
            break;
        case 6:
            $bulan = 'Juni';
            break;
        case 7:
            $bulan = 'Juli';
            break;
        case 8:
            $bulan = 'Agustus';
            break;
        case 9:
            $bulan = 'September';
            break;
        case 10:
            $bulan = 'Oktober';
            break;
        case 11:
            $bulan = 'November';
            break;
        case 12:
            $bulan = 'Desember';
            break;
    }

    return $tanggal.' '.$bulan.' '.$tahun;
}
