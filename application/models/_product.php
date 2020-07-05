<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _product extends CI_Model
{
    public function get($key=null)
    {
        $this->db->select( 'p.id as id,
                            p.name as name,
                            harga_ecer,
                            harga_member,
                            harga_grosir,
                            category_id,
                            c.name as category
                            ');
        $this->db->from('product as p');
        $this->db->join('category as c', 'p.category_id = c.id','left');
        if ($key!=null) {
            $this->db->like('p.name',$key);
            $this->db->or_like('c.name',$key);
        }
        $hasil=$this->db->get()->result();
        return $hasil;
    }
    public function show($id=null)
    {
        $this->db->select( 'p.id as id,
                            p.name as name,
                            detail,
                            img,
                            harga_ecer,
                            harga_member,
                            harga_grosir,
                            category_id,
                            c.name as category,
                            ');
        $this->db->from('product as p');
        $this->db->join('category as c', 'p.category_id = c.id','left');
        $this->db->where('p.id',$id);
        $hasil=$this->db->get()->row_array();
        return $hasil;
    }
}