<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassDataModels extends CI_Model {

  public function getall()
  {
   return $this->db->query("SELECT * FROM tk_class ORDER BY kode_class DESC")->result();
  }

  public function gets()
  {
   return $this->db->query("SELECT * FROM tk_class WHERE status = 'Aktif' ORDER BY kode_class DESC")->result();
  }

  public function add($post)
  {
    
      $saved = [
         'nama_class' => ucwords($post['nama_class']),
         'kode_class' => $post['kode_class'],
         'status' => ucwords($post['status'])
      ];
      $this->db->insert('tk_class', $saved);
  }


  public function edit($post)
  {
      $saved = [
         'nama_class' => ucwords($post['nama_class']),
         'kode_class' => $post['kode_class'],
         'status' => ucwords($post['status'])
      ];
      $this->db->where('class_id',$post['class_id']);
      $this->db->update('tk_class', $saved);
  }


  public function delete($id)
  {
    $this->db->where('class_id',$id);
    $this->db->delete('tk_class');
  }
  

	public function kodeClass()
    {
        $this->db->select('RIGHT(tk_class.kode_class,2) as kode_class', FALSE);
        $this->db->order_by('kode_class', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tk_class');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
          //cek kode jika telah tersedia    
          $data = $query->row();
          $kode = intval($data->kode_class) + 1;
        } else {
          $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $kodetampil = $kode;  //format kode
        return $kodetampil;
      }


      public function getid($id = null)
      {
         $this->db->from('tk_class');
           if ($id != null) {
                 $this->db->where('class_id',$id);
           }
               $query = $this->db->get();
                return $query;
      }

      
    }
	
