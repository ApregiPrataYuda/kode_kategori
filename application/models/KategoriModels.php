<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModels extends CI_Model {

public function getAll()
{
    return $this->db->query("SELECT tb3.status, tb1.kategori_id, tb1.kode_class, tb1.nama_class, tb1.kode_subclass, tb1.nama_subclass, tb1.kode_kategori, tb1.nama_kategori, tb1.created 
    FROM tk_kategori AS tb1 
    LEFT JOIN tk_subclass AS tb2 
    ON tb1.kode_subclass = tb2.kode_subclass
    LEFT JOIN tk_class AS tb3 
    ON tb2.kode_class = tb3.kode_class
    WHERE tb3.status = 'Aktif'
    ORDER BY tb1.kode_kategori DESC")->result();
}

    public function add($post, $kodesubclassview)
    {

        $getdata = explode(' | ',$post['kode_subclass']);
          $kode_subclass = $getdata[0];
          $nama_subclass =$getdata[1];

          $kode_class = substr($kode_subclass,0,1);

          $tblmsclass = $this->db->query("SELECT nama_class FROM tk_class 
           WHERE kode_class = '$kode_class'")->result();
           $nama_class = $tblmsclass[0]->nama_class;
           
          $params = [
              'kode_class' => $kode_class,
              'nama_class' =>  ucwords($nama_class),
              'kode_subclass' =>  $kode_subclass,
              'nama_subclass' => ucwords($nama_subclass),
              'kode_kategori' => $kodesubclassview,
              'nama_kategori' => ucwords($post['nama_kategori'])
          ];
          $this->db->insert('tk_kategori',$params);
    }



    public function edit($post)
    {
          $params = [
              'nama_kategori' => $post['nama_kategori']
          ];
          $this->db->where('kategori_id', $post['kategori_id']);
          $this->db->update('tk_kategori',$params);
    }



    public function delete($kategori_id)
    {
      $this->db->where('kategori_id', $kategori_id);
      $this->db->delete('tk_kategori');
    }





  public function kodeKategori($kode_subclass)
  {
    $this->db->select('RIGHT(tk_kategori.kode_kategori,3) as kode_kategori', FALSE);
    $this->db->where('kode_subclass', $kode_subclass);
    $this->db->order_by('kode_kategori', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('tk_kategori');  //cek dulu apakah ada sudah ada kode di tabel.    
    if ($query->num_rows() <> 0) {
      //cek kode jika telah tersedia    
      $data = $query->row();
      // $kode = intval($data->kode_class) + 1;
      //cara mengambil digit dari kode kode sub class dari belakang
      $kode = substr($data->kode_kategori, -3) + 1;
    } else {
      $kode = 1;  //cek jika kode belum terdapat pada table
    }
    // $tgl = date('ym');
    $batas = sprintf("%03d", $kode);
    $kodetampil =  $kode_subclass . $batas;  //format kode
    return $kodetampil;
  }

  


  public function getid($kategori_id = null)
  {
     $this->db->from('tk_kategori');
       if ($kategori_id != null) {
             $this->db->where('kategori_id',$kategori_id);
       }
           $query = $this->db->get();
            return $query;
  }
}