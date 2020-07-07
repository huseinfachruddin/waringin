<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _order extends CI_Model 
{
    public function get($key=null)
    {
        $this->db->select( 'o.id as id,
                            u.name as name,
                            status,
                            date
                            ');
        $this->db->from('order as o');
        $this->db->join('cart as c', 'o.id = c.order_id','inner');
        $this->db->join('user as u', 'c.user_id = u.id','inner');
        $this->db->group_by('o.id');

        if ($key!=null) {
            $this->db->like('u.name',$key);
            $this->db->or_like('status',$key);
        }
        $hasil=$this->db->get()->result();
        return $hasil;
    }
        public function show_order($id=null)
    {
        $this->db->select( 'o.id as id,
                            u.name as name,
                            COUNT(p.id) as jumlah,
                            SUM(harga_product*amount) as total,
                            date,
                            ');
        $this->db->from('cart as c');
        $this->db->join('order as o', 'c.order_id = o.id','inner');
        $this->db->join('user as u', 'c.user_id = u.id','inner');
        $this->db->join('product as p', 'c.product_id = p.id','inner');
        $this->db->where('order_id',$id);

        $hasil=$this->db->get()->row_array();
        return $hasil;
    }
    public function show_cart($id=null)
    {
        $this->db->select( 'c.id as id,
                            p.name as product,
                            harga_product,
                            amount,
                            (harga_product*amount) as harga,
                            ');
        $this->db->from('cart as c');
        $this->db->join('order as o', 'c.order_id = o.id','inner');
        $this->db->join('user as u', 'c.user_id = u.id','inner');
        $this->db->join('product as p', 'c.product_id = p.id','inner');
        $this->db->where('order_id',$id);

        $hasil=$this->db->get()->result();
        return $hasil;
    }

    public function crate_order($id=null,$status)
    {
        
            $data=[
                'id'=>$id,
                'status'=>$status,
                'date'=>time()
                
            ];
            $hasil=$this->db->insert('order',$data);
            return $hasil;
    }

}