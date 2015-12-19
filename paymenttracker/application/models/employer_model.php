<?php
 class Employer_model extends CI_Model 
{
        function db_product_list()
        {
            $query=  $this->db->query("SELECT conslt_id,conslt_name FROM ci_consultants");
            return $query;
        }
        function db_select_emp()
        {
            $query=  $this->db->query("SELECT e.*,c.conslt_name FROM ci_employer e,ci_consultants c WHERE c.conslt_id=e.conslt_id ");
            return $query;
        }
        function select_record_emp($idvalue)
        {
                $results=  $this->db->query('SELECT e.*,c.conslt_name,c.conslt_id FROM ci_employer e ,ci_consultants c WHERE c.conslt_id=e.conslt_id AND e.emp_id='.$idvalue);
                /*
                $this->db->select('*');
		$this->db->from('ci_employer');
                $this->db->join('ci_consultants','ci_consultants.conslt_id=ci_employer.product_id');
		$this->db->where('emp_id',$idvalue);
		$results = $this->db->get();*/
                return $results->row();
            
        }
	function get_product_selections($product_ids = array())
	{
		$this->db->select('*');
		$this->db->from('ci_employer');
		$this->db->where_in('emp_id', $product_ids);
		$products = $this->db->get();
		return $products;
	}
	function delete_employer($emp_id = 0)
	{
		//delete product
		$this->db->where('emp_id', $emp_id);
		$this->db->delete('ci_employer');
	}
		
}
