<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class class_mltp_models extends CI_Model
    {
        public function save($d)
        {
          $this->db->insert('class',$d);
        }

        public function getDataKode()
        {
           $query = $this->db->query("");
        }


        // public function kodeClass()
        // {
        //     $this->db->select('RIGHT(class.kode_class,2) as kode_class', FALSE);
        //     $this->db->order_by('kode_class', 'DESC');
        //     $this->db->limit(1);
        //     $query = $this->db->get('class');  //cek dulu apakah ada sudah ada kode di tabel.    
        //     if ($query->num_rows() <> 0) {
        //       //cek kode jika telah tersedia    
        //       $data = $query->row();
        //       $kode = intval($data->kode_class) + 1;
        //     } else {
        //       $kode = 1;  //cek jika kode belum terdapat pada table
        //     }
        //     $kodetampil = $kode;  //format kode
        //     return $kodetampil;
        //   }


          function kodeClass(){
            $q = $this->db->query("SELECT MAX(RIGHT(kode_class,4)) AS kd_max FROM class ");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%04s", $tmp);
                }
            }else{
                $kd = "0001";
            }
            date_default_timezone_set('Asia/Jakarta');
            return date('dmy').$kd;
        }
    

    }

    