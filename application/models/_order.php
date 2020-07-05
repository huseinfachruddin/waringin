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
            $this->db->like('p.name',$key);
            $this->db->or_like('u.name',$key);
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

    public function crate_cart($id=null)
    {

        $hasil=$this->db->update('product',$set);
        return $hasil;
    }

    public function crate_order($set=null)
    {
        if ($this->db->insert('order',$set)==true) {
            $this->db->order_by('id','DESC');
            $this->db->limit(1);
            $order=$this->db->get('order')->row_array();
            $id=$order['id'];
            $set = [
                'order_id'=> $id
            ];
            
            $this->db->where('order_id', '0');
            $hasil=$this->db->update('cart',$set);

        }
        else{
            $hasil='error';
        }
        

        return $hasil;
    }

}