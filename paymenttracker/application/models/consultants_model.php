<?php
 class Consultants_model extends CI_Model 
{
        function db_select_conslt ()
    {
    	$query = $this->db->query("SELECT * FROM ci_consultants where conslt_id<>1"); 
    	return $query;
    }
    function db_emp_list()
    {
        $query=  $this->db->query('SELECT emp_id,emp_cmpname FROM ci_employer');
        return $query;
    }
    function db_client_list()
    {
        $query=  $this->db->query('SELECT client_id,client_name FROM ci_client');
        return $query;
         
    }
	function get_product_selections($product_ids = array())
	{
		$this->db->select('*');
		$this->db->from('ci_products');
		$this->db->where_in('product_id', $product_ids);
		$products = $this->db->get();
		return $products;
	}
	function delete_consultant($conslt_id = 0)
	{
		//delete product
		$this->db->where('conslt_id', $conslt_id);
		$this->db->delete('ci_consultants');
	}
		
}
