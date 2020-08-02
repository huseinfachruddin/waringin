<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _setting extends CI_Model 
{
    public function get($key=2)
    {
        $this->db->select( 's.id as id,
        product_id,
        p.name as name,
        p.img as img,
        harga,
        satuan,
        c.name as content,
        ');
        $this->db->from('sub_content as s');
        $this->db->join('product as p', 's.product_id = p.id','left');
        $this->db->join('content as c', 's.content_id = c.id','inner');
        $this->db->where('content_id',$key);
        $hasil=$this->db->get()->result();
        return $hasil;
    }
   

}