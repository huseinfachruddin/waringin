<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _user extends CI_Model 
{
    public function get($key=null)
    {
        $this->db->select(  'u.id as id,
                            u.name as name,
                            email,
                            r.name as role,
                            ');
		$this->db->from('user as u');
        $this->db->join('role as r', 'u.role_id = r.id','left');
        if ($key!=null) {
            $this->db->like('u.name',$key);
        }
        $hasil=$this->db->get()->result();
        return $hasil;
    }
    public function show($id=null)
    {
        $this->db->select(  'u.id as id,
                            u.name as name,
                            password,
                            img,
                            email,
                            address,
                            phone,
                            role_id,
                            r.name as role,
                            date_created,
                            ');
		$this->db->from('user as u');
        $this->db->join('role as r', 'u.role_id = r.id','left');
        $this->db->where('u.id',$id);
        $hasil=$this->db->get()->row_array();
        return $hasil;
    }
}