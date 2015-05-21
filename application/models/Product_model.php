<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{
    
    //
    //Get Products Method
    //
    public function get_products(){
        $this->db->select('*');
        $this->db->from('shop_products');
        $query = $this->db->get();
        return $query->result();
    }
    
    //
    //Get Single Product
    //
    public function get_product_details($id){
        $this->db->select('*');
        $this->db->from('shop_products');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    //
    //Get Categories
    //
    public function get_categories(){
        $this->db->select('*');
        $this->db->from('shop_categories');
        $query = $this->db->get();
        return $query->result();
    }
    
    //
    //Get Most Popular Product
    //
    public function get_popular(){
        $this->db->select('P.*,COUNT(O.product_id) as total');
        $this->db->from('shop_orders AS O');
        $this->db->join('shop_products AS P', 'O.product_id = P.id', 'INNER');
        $this->db->group_by('O.product_id');
        $this->db->order_by('total','desc');
        $query=$this->db->get();
        return $query->result();
    }
    
    //
    //Add Order To Database
    //    
    public function add_order($order_data){
        $insert = $this->db->insert('shop_orders', $order_data);
        return $insert;
    }
}


?>