<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiples_m extends CI_Model {

     public function save($d)
     {
       $this->db->insert('emp',$d);
     }
}