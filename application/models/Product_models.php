<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_models extends CI_Model {

      public function getdatasub()
      {
        return $this->db->query("SELECT d.kode_class, c.kode_subclass, b.kode_kategori, a.kode_subkategori, a.nama_subkategori, a.nama_warna,
        a.merk, a.satuan, a.tipe, DATE(a.created) AS Tanggal_input, a.id
        FROM tk_subkategori AS a 
        LEFT JOIN tk_kategori AS b 
        ON a.kode_kategori = b.kode_kategori
        LEFT JOIN tk_subclass AS c
        ON a.kode_subclass = c.kode_subclass
        LEFT JOIN tk_class AS d
        ON a.kode_class = d.kode_class
        WHERE d.status = 'Aktif'
        ORDER BY a.id")->result();
      }

      public function add($post, $kode_subkatthrowdata)
   {

    $kodesub = explode(' | ', $post['kode_subkategori']);
    $kode_subkategori =  $kodesub[0];
    $nama_subkategori =  $kodesub[1];

     $params = [
         'kode_product' => $kode_subkatthrowdata,
         'nama_product' => $post['nama_product'],
         'price' => $post['price'],
         'description' => $post['description'],
         'kode_subkategori' => $kode_subkategori,
         'nama_subkategori' => $nama_subkategori,
         'image' => $post['image']
     ];
    //  var_dump($params); die();
     $this->db->insert('product_tb',$params);
   }


   public function printkodeproduct($kode_subkategori)
   {
    $this->db->select('RIGHT(product_tb.kode_product,6) as kode_product', FALSE);
      $this->db->where('kode_subkategori', $kode_subkategori);
      $this->db->order_by('kode_product', 'DESC');
      $this->db->limit(1);
      $query = $this->db->get('product_tb');  //cek dulu apakah ada sudah ada kode di tabel.    
      if ($query->num_rows() <> 0) {
        //cek kode jika telah tersedia    
        $data = $query->row();
        // $kode = intval($data->kode_class) + 1;
        //cara mengambil digit dari kode kode sub class dari belakang
        $kode = substr($data->kode_product, -3) + 1;
      } else {
        $kode = 1;  //cek jika kode belum terdapat pada table
      }
      // $tgl = date('ym');
      $batas = sprintf("%06d", $kode);
      $kodetampil =  $kode_subkategori . $batas;  //format kode
      // var_dump($kodetampil); die();
      return $kodetampil;
   }
    
}