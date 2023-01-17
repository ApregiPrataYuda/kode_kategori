<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productdatamodels extends CI_Model {

   public function getdataall()
   {
     return $this->db->query("SELECT A.kode_header, A.nama_header, A.berat_satuan, A.nama_subkategori, A.price_total, A.total_qty, A.image, A.description_header
     FROM header_product AS A 
     LEFT JOIN tk_subkategori AS B 
     ON A.kode_subkategori  = B.kode_subkategori
     ORDER BY kode_header DESC")->result();
   }

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
            'kode_header' => $kode_subkatthrowdata,
            'nama_header' => $post['nama_header'],
            'berat_satuan' => $post['berat_satuan'],
            'description_header' => $post['description_header'],
            'kode_subkategori' => $kode_subkategori,
            'nama_subkategori' => $nama_subkategori,
            'image' => $post['image']
        ];
        // var_dump($params); die();
        $this->db->insert('header_product',$params);
      }

      public function printkodeproduct($kode_subkategori)
      {
       $this->db->select('RIGHT(header_product.kode_header,6) as kode_header', FALSE);
         $this->db->where('kode_subkategori', $kode_subkategori);
         $this->db->order_by('kode_header', 'DESC');
         $this->db->limit(1);
         $query = $this->db->get('header_product');  //cek dulu apakah ada sudah ada kode di tabel.    
         if ($query->num_rows() <> 0) {
           //cek kode jika telah tersedia    
           $data = $query->row();
           // $kode = intval($data->kode_class) + 1;
           //cara mengambil digit dari kode kode sub class dari belakang
           $kode = substr($data->kode_header, -3) + 1;
         } else {
           $kode = 1;  //cek jika kode belum terdapat pada table
         }
         // $tgl = date('ym');
         $batas = sprintf("%06d", $kode);
         $kodetampil =  $kode_subkategori . $batas;  //format kode
         // var_dump($kodetampil); die();
         return $kodetampil;
      }


      public function getkode($kode_header)
    {
      $this->db->from('header_product');
        $this->db->where('kode_header', $kode_header);
      $query = $this->db->get();
      return  $query;
    }

    public function delete($kode_header)
    {
        $this->db->where('kode_header',$kode_header);
        $this->db->delete('header_product');
    }
}

