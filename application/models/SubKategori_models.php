<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubKategori_models extends CI_Model {

    public function getc()
    {
        return $this->db->query("SELECT * FROM tk_warna ORDER BY id ASC")->result();
    }

    public function getid($id)
    {
     $query = $this->db->query("SELECT * FROM tk_subkategori WHERE id = '$id' ");
     return $query;
    }


    public function getAll()
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


    public function add($post, $sendkode)
    {
       
        $kodex = explode(' | ', $post['kode_kategori']);
        $kode_kategori = $kodex[0];
        $nama_kategori = $kodex[1];


        $kodez = explode(' | ', $post['kode_warna']);
        $kode_warna = $kodez[0];
        $nama_warna = $kodez[1];

        $kode_class = substr($sendkode, 0, 1);
        $query = $this->db->query("SELECT nama_class FROM tk_class WHERE kode_class = '$kode_class' ")->result();
        $nama_class = $query[0]->nama_class;


        $kode_subclass = substr($sendkode, 0, 2);
        $querys = $this->db->query("SELECT nama_subclass FROM tk_subclass WHERE kode_subclass = '$kode_subclass' ")->result();
        $nama_subclass = $querys[0]->nama_subclass;


        $params = [
            'kode_class' => $kode_class,
            'nama_class' => ucwords($nama_class),
            'kode_subclass' => $kode_subclass,
            'nama_subclass' => ucwords($nama_subclass),
            'kode_kategori' => $kode_kategori,
            'nama_kategori' => ucwords($nama_kategori),
            'kode_subkategori' => $sendkode,
            'nama_subkategori' => ucwords($post['nama_subkategori']),
            'merk' => ucwords($post['merk']),
            'tipe' => ucwords($post['tipe']),
            'nama_warna' => ucwords($nama_warna),
            'kode_warna' => ucwords($kode_warna),
            'satuan' => ucwords($post['satuan'])
        ];
        $this->db->insert('tk_subkategori', $params);
    }

    public function edit($post,  $sendkode)
    {
      $kodex = explode(' | ', $post['kode_kategori']);
      $kode_kategori = $kodex[0];
      $nama_kategori = $kodex[1];


      $kodez = explode(' | ', $post['kode_warna']);
      $kode_warna = $kodez[0];
      $nama_warna = $kodez[1];

      $kode_class = substr($sendkode, 0, 1);
      $query = $this->db->query("SELECT nama_class FROM tk_class WHERE kode_class = '$kode_class' ")->result();
      $nama_class = $query[0]->nama_class;


      $kode_subclass = substr($sendkode, 0, 2);
      $querys = $this->db->query("SELECT nama_subclass FROM tk_subclass WHERE kode_subclass = '$kode_subclass' ")->result();
      $nama_subclass = $querys[0]->nama_subclass;

      $params = [
        'kode_class' => $kode_class,
        'nama_class' => ucwords($nama_class),
        'kode_subclass' => $kode_subclass,
        'nama_subclass' => ucwords($nama_subclass),
        'kode_kategori' => $kode_kategori,
        'nama_kategori' => ucwords($nama_kategori),
        'kode_subkategori' => $sendkode,
        'nama_subkategori' => ucwords($post['nama_subkategori']),
        'merk' => ucwords($post['merk']),
        'tipe' => ucwords($post['tipe']),
        'nama_warna' => ucwords($nama_warna),
        'kode_warna' => ucwords($kode_warna),
        'satuan' => ucwords($post['satuan'])
    ];
    $this->db->where('id', $post['id']);
    $this->db->update('tk_subkategori',$params);
    }

    public function subcode($kode_kategori, $kode_warna)
    {
      $this->db->select('RIGHT(tk_subkategori.kode_subkategori,6) as kode_subkategori', FALSE);
      $this->db->where('kode_kategori', $kode_kategori);
      $this->db->where('kode_warna', $kode_warna);
      $this->db->order_by('kode_subkategori', 'DESC');
      $this->db->limit(1);
      $query = $this->db->get('tk_subkategori');  //cek dulu apakah ada sudah ada kode di tabel.    
      if ($query->num_rows() <> 0) {
        //cek kode jika telah tersedia    
        $data = $query->row();
        // $kode = intval($data->kode_class) + 1;
        //cara mengambil digit dari kode kode sub class dari belakang
        $kode = substr($data->kode_subkategori, -3) + 1;
      } else {
        $kode = 1;  //cek jika kode belum terdapat pada table
      }
      // $tgl = date('ym');
      $batas = sprintf("%06d", $kode);
      $kodetampil =  $kode_kategori . $kode_warna . $batas;  //format kode
      // var_dump($kodetampil); die();
      return $kodetampil;
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tk_subkategori');
    }
  
}