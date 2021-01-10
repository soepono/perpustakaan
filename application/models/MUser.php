<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MUser extends CI_Model
{

    public $table = 'user';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->db->order_by('nama_lengkap', 'ASC');
        return $this->db->get($this->table)->result();
    }    

    public function CheckUser($u, $p)
    {
        // SELECT * FROM user WHERE username = '$username' AND password = '$paswword'
        $query = $this->db->get_where($this->table, 
                 array('username'=>$u, 
                       'password'=>$p)
                );
        // cek apakah ada atau tidak
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        } 
    }

    function get_by_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get($this->table)->row();
    }

}
