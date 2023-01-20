<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authmodel extends CI_Model
    {
      public function checkusername($username)
      {
         $query =  $this->db->query("SELECT username FROM tk_user WHERE username = '$username' LIMIT 1");
         return  $query;
      }

      public function passwordandusername($username, $password)
      {
        $query =  $this->db->query("SELECT * FROM tk_user WHERE username = '$username' AND password = sha1('$password')");
        return  $query;
      }
    }