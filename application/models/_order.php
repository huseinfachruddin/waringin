<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _order extends CI_Model 
{

    public function rules()
    {
        return [
            ['field' => 'phone',
            'label' => 'Nomer telepon',
            'rules' => 'required|numeric'],
    
            ['field' => 'address',
            'label' => 'Alamat',
            'rules' => 'required']
        ];
    }

    public function get($key=null)
    {
        $this->db->select( 'o.id as id,
                            u.name as name,
                            status,
                            o.date as date
                            ');
        $this->db->from('order as o');
        $this->db->join('cart as c', 'o.id = c.order_id','inner');
        $this->db->join('user as u', 'c.user_id = u.id','inner');
        $this->db->order_by('o.date','DESC');
        $this->db->group_by('c.order_id');

        if ($key!=null) {
            $this->db->like('u.name',$key);
            $this->db->or_like('status',$key);
            $this->db->or_like('o.id',$key);
        }
        $hasil=$this->db->get()->result();
        return $hasil;
    }

    public function get_order_all($id=null)
    {
        $this->db->select( 'o.id as id,
                            o.date as date,
                            status
                            ');
        $this->db->from('order as o');
        $this->db->join('cart as c', 'o.id = c.order_id','inner');
        $this->db->join('user as u', 'c.user_id = u.id','inner');
        $this->db->where('u.id',$id);
        $this->db->order_by('o.date','DESC');
        $this->db->group_by('c.order_id');

        $hasil=$this->db->get()->result();
        return $hasil;
    }
        public function show_order($id=null)
    {
        $this->db->select( 'o.id as id,
                            u.id as user_id,
                            u.name as name,
                            u.phone as phone,
                            u.address as address,
                            status,
                            COUNT(p.id) as jumlah,
                            SUM(p.harga*amount) as total,
                            o.date,
                            ');
        $this->db->from('cart as c');
        $this->db->join('order as o', 'c.order_id = o.id','inner');
        $this->db->join('user as u', 'c.user_id = u.id','inner');
        $this->db->join('product as p', 'c.product_id = p.id','inner');
        $this->db->where('o.id',$id);

        $hasil=$this->db->get()->row_array();
        return $hasil;
    }
    public function show_cart($id=null)
    {
        $this->db->select( 'c.id as id,
                            p.id as product_id,
                            p.name as product,
                            p.harga as harga_product,
                            p.satuan as satuan,
                            amount,
                            (p.harga*amount) as harga,
                            ');
        $this->db->from('cart as c');
        $this->db->join('order as o', 'c.order_id = o.id','inner');
        $this->db->join('product as p', 'c.product_id = p.id','inner');
        $this->db->where('order_id',$id);
        $this->db->group_by('c.id');
        $hasil=$this->db->get()->result();
        return $hasil;
    }
    public function show_cart_kosong($id=null,$user=null)
    {
        $this->db->select( 'c.id as id,
                            p.id as product_id,
                            p.name as product,
                            p.harga as harga_product,
                            p.satuan as satuan,
                            amount,
                            (p.harga*amount) as harga,
                            order_id
                            ');
        $this->db->from('cart as c');
        $this->db->join('product as p', 'c.product_id = p.id','inner');
        $this->db->where('order_id',$id);
        $this->db->where('user_id',$user);
        $this->db->group_by('c.id');

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
    public function crate_cart()
    {
            $hasil=$this->db->insert('cart',$data);
            return $hasil;
    }


}