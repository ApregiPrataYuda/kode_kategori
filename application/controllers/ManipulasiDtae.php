<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManipulasiDtae extends CI_Controller {

	
	public function index()
	{
		
        function manipulasiTanggal($tgl,$jumlah=1,$format='days'){
            $currentDate = $tgl;
            return date('Y-m-d', strtotime($jumlah.' '.$format, strtotime($currentDate)));
        }

        // $tgl= date('Y-m-d');
        // echo manipulasiTanggal($tgl,'6','months'); 
    
        // echo manipulasiTanggal($tgl,'-6','months');
        date_default_timezone_set('Asia/Jakarta');
        // echo strtotime("1-16-2022");

        // $datenow = date('format[, timestamp]');

        // echo  $datenow;

//         $timestamp = 1234567890;
// $stringDate = date('d-m-Y H:i', $timestamp);

// echo "Timestamp: {$timestamp} <br>";
// echo "String date: {$stringDate} <br>";


// echo 'Waktu sekarang: ' . date('Y-m-d H:i:s') . '<br/>';
// echo '1 menit kedepan: ' . date('Y-m-d H:i:s', time() + 60) . '<br/>';
// echo '1 jam kedepan: ' . date('Y-m-d H:i:s', time() + (60 * 60)) . '<br/>';
// echo '1 hari kedepan: ' . date('Y-m-d H:i:s', time() + (60 * 60 * 24)) . '<br/>';
// echo '7 hari kedepan: ' . date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 7)) . '<br/>';



echo date('d-m-Y');   '<br/>'; // 18-01-2017 
echo date('d-m-Y', mktime( 0, 0, 0, date('n'), date('j') + 30, date('y'))); '<br/>'; // 17-02-2017
echo date('d-m-Y', mktime( 0, 0, 0, date('n') - 1, date('j'), date('y'))); '<br/>'; // 18-12-2017

	}
}