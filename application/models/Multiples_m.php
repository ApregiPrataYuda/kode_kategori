<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiples_m extends CI_Model {

     public function save($d)
     {
       $this->db->insert('emp',$d);
     }


     public function getdata()
     {
        $query = $this->db->query("SELECT * FROM emp ORDER BY id DESC");
        return $query;
     }
}