<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubClassDataModels extends CI_Model {


    public function getAll()
    {
       return $this->db->query("SELECT tb1.subclass_id, tb1.kode_class, tb1.nama_class , tb1.kode_subclass, tb1.nama_subclass, tb1.created 
       FROM tk_subclass AS tb1 LEFT JOIN tk_class AS tb2 ON tb1.kode_class = tb2.kode_class WHERE tb2.status = 'Aktif' ORDER BY tb1.kode_subclass DESC")->result();
    }

    public function add($post, $kodesubclassview)
    {
        date_default_timezone_set('Asia/Jakarta');

        $getkodeandnameclass = explode('|', $post['kode_class']);
               $kode_class = $getkodeandnameclass[0];
               $nama_class = $getkodeandnameclass[1];

       $params = [
            'kode_class' => $kode_class,
            'nama_class' => ucwords($nama_class),
            'nama_subclass' => ucwords($post['nama_subclass']),
            'kode_subclass' => $kodesubclassview,
       ];
       $this->db->insert('tk_subclass', $params);
    }

    public function kodesubclass($kode_class)
    {
      $this->db->select('RIGHT(tk_subclass.kode_subclass,1) as kode_subclass', FALSE);
      $this->db->where('kode_class', $kode_class);
      $this->db->order_by('kode_subclass', 'DESC');
      $this->db->limit(1);
      $query = $this->db->get('tk_subclass');
      if ($query->num_rows() <> 0) {
        $data = $query->row();
        $kode = substr($data->kode_subclass, -1) + 1;
      } else {
        $kode = 1;
      }
      $kodetampil =  $kode_class . $kode;
      return $kodetampil;
    }

    public function getid($id = null)
      {
         $this->db->from('tk_subclass');
           if ($id != null) {
                 $this->db->where('subclass_id',$id);
           }
               $query = $this->db->get();
                return $query;
      }


      public function edit($post)
      {
          $saved = [
             'nama_subclass' => ucwords($post['nama_subclass']) 
          ];
          $this->db->where('subclass_id',$post['subclass_id']);
          $this->db->update('tk_subclass', $saved);
      }


      public function delete($subclass_id)
    {
    $this->db->where('subclass_id',$subclass_id);
    $this->db->delete('tk_subclass');
    }
}
