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


      public function edit($post, $kode_subkatthrowdata)
      {
   
       $kodesub = explode(' | ', $post['kode_subkategori']);
       $kode_subkategori =  $kodesub[0];
       $nama_subkategori =  $kodesub[1];
   
        $params = [
            'kode_header' => $kode_subkatthrowdata,
            'nama_header' =>  $post['nama_header'],
            'berat_satuan' => $post['berat_satuan'],
            'description_header' => $post['description_header'],
            'kode_subkategori' => $kode_subkategori,
            'nama_subkategori' => $nama_subkategori,
            // 'image' => $post['image']
        ];
        if($post['image'] != null) {
          $params['image'] = $post['image'];
      }
        $this->db->where('header_id', $post['header_id']);
        $this->db->update('header_product',$params);
      }


      // public function edit($post, $kode_subkatthrowdata)
      // {
   
      //  $kodesub = explode(' | ', $post['kode_subkategori']);
      //  $kode_subkategori =  $kodesub[0];
      //  $nama_subkategori =  $kodesub[1];
   
      //   $params = [
      //       'kode_header' => $kode_subkatthrowdata != "" ? $kode_subkatthrowdata : null,
      //       'nama_header' =>  $post['nama_header'] != "" ? $post['nama_header'] : null,
      //       'berat_satuan' => $post['berat_satuan'] != "" ? $post['berat_satuan'] : null,
      //       'description_header' => $post['description_header'] != "" ? $post['description_header'] : null,
      //       'kode_subkategori' => $kode_subkategori != ""  ? $kode_subkategori : null,
      //       'nama_subkategori' => $nama_subkategori != ""  ? $nama_subkategori : null,
      //       // 'image' => $post['image']
      //   ];
      //   if($post['image'] != null) {
      //     $params['image'] = $post['image'];
      // }
      //   $this->db->where('header_id', $post['header_id']);
      //   $this->db->update('header_product',$params);
      // }

      public function printkodeproduct($kode_subkategori)
      {
       $this->db->select('RIGHT(header_product.kode_header,3) as kode_header', FALSE);
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
         $batas = sprintf("%03d", $kode);
         $kodetampil =  $kode_subkategori . $batas;  //format kode
         // var_dump($kodetampil); die();
         return $kodetampil;
      }


      public function kodeedit($kode_subkategori)
      {
       $this->db->select('RIGHT(header_product.kode_header,3) as kode_header', FALSE);
         $this->db->where('kode_subkategori', $kode_subkategori);
         $this->db->order_by('kode_header', 'DESC');
         $this->db->limit(1);
         $query = $this->db->get('header_product');  //cek dulu apakah ada sudah ada kode di tabel.    
         if ($query->num_rows() <> 0) {
           //cek kode jika telah tersedia    
           $data = $query->row();
           // $kode = intval($data->kode_class) + 1;
           //cara mengambil digit dari kode kode sub class dari belakang
           $kode = substr($data->kode_header, -3);
         } else {
           $kode = 1;  //cek jika kode belum terdapat pada table
         }
         // $tgl = date('ym');
         $batas = sprintf("%03d", $kode);
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


    public function getid($header_id)
    {
      $this->db->from('header_product');
      $this->db->where('header_id', $header_id);
      $query = $this->db->get();
      return  $query;
    }

    public function delete($kode_header)
    {
        $this->db->where('kode_header',$kode_header);
        $this->db->delete('header_product');
    }

    // method product detail

    public function getdataatkodeheader($kode_header)
    {
      $query =  $this->db->query("SELECT * FROM detail_product WHERE kode_header = '$kode_header' ORDER BY detail_id DESC")->result();
      return $query;
    }


    public function kodeproductreal($cetakkodeheader)
    {
      $q = $this->db->query("SELECT MAX(RIGHT(kode_product,4)) AS kode_product FROM detail_product WHERE kode_header = '$cetakkodeheader' ");
      $kd = "";
      if($q->num_rows()>0){
          foreach($q->result() as $k){
              $tmp = ((int)$k->kode_product)+1;
              $kd = sprintf("%04s", $tmp);
          }
      }else{
          $kd = "0001";
      }
      return $cetakkodeheader.$kd;
    }


    public function adddetail($post, $kirimkodeheader)
    {
      $kodeheader = explode(' ', $post['kode_header']);
      $cetakkodeheader = $kodeheader[0];

      $price_satuan = $post['price_satuan'];
      $qty = $post['qty'];

      $sumtotal = $price_satuan * $qty;


      $params = [
        'kode_header' => $cetakkodeheader,
        'kode_product' => $kirimkodeheader,
        'nama_product' => $post['nama_product'],
        'kondisi' => $post['kondisi'],
        'warna' => $post['warna'],
        'type_product' => $post['type_product'],
        'qty' => $qty,
        'price_satuan' =>  $price_satuan,
        'total_price' => $sumtotal,
        'description' => $post['description'],
      ];
      // var_dump($params); die();
      $this->db->insert('detail_product',$params);

      //query update tabel header
      $sum_detail = $this->db->query("SELECT IFNULL(SUM(qty),0) AS total_qty, IFNULL(SUM(total_price),0) AS total_harga FROM detail_product WHERE kode_header = '$cetakkodeheader'")->result();
      $kodex = [
          'total_qty' => $sum_detail[0]->total_qty,
          'price_total' => $sum_detail[0]->total_harga
      ];
      $this->db->where('kode_header', $post['kode_header']);
      $this->db->update('header_product', $kodex);
    }



    public function deletedetails($detail_id, $kode_header)
    {
      $this->db->where('detail_id',$detail_id);
      $this->db->delete('detail_product');

       //query update tabel header
       $sum_detail = $this->db->query("SELECT IFNULL(SUM(qty),0) AS total_qty, IFNULL(SUM(total_price),0) AS total_harga 
       FROM detail_product 
       WHERE kode_header = '$kode_header'")->result();
       $kodex = [
           'total_qty' => $sum_detail[0]->total_qty,
           'price_total' => $sum_detail[0]->total_harga
       ];
       $this->db->where('kode_header', $kode_header);
       $this->db->update('header_product', $kodex);
    }


    public function getdetail($detail_id = null)
    {
       $this->db->from('detail_product');
       $this->db->order_by('detail_id', 'DESC');
       if ($detail_id != null) {
          $this->db->where('detail_id', $detail_id);
       }
       $query = $this->db->get();
       return $query;
    }

    public function editdetail($post)
    {
      $kodeheader = explode(' ', $post['kode_header']);
      $cetakkodeheader = $kodeheader[0];

      $price_satuan = $post['price_satuan'];
      $qty = $post['qty'];

      $sumtotal = $price_satuan * $qty;


      $params = [
        'kode_header' => $cetakkodeheader,
        // 'kode_product' => $kirimkodeheader,
        'nama_product' => $post['nama_product'],
        'kondisi' => $post['kondisi'],
        'warna' => $post['warna'],
        'type_product' => $post['type_product'],
        'qty' => $qty,
        'price_satuan' =>  $price_satuan,
        'total_price' => $sumtotal,
        'description' => $post['description'],
      ];
      $this->db->where('detail_id', $post['detail_id']);
      $this->db->update('detail_product',$params);

      //query update tabel header
      $sum_detail = $this->db->query("SELECT IFNULL(SUM(qty),0) AS total_qty, IFNULL(SUM(total_price),0) AS total_harga FROM detail_product WHERE kode_header = '$cetakkodeheader'")->result();
      $kodex = [
          'total_qty' => $sum_detail[0]->total_qty,
          'price_total' => $sum_detail[0]->total_harga
      ];
      $this->db->where('kode_header', $post['kode_header']);
      $this->db->update('header_product', $kodex);
    }
  }


