<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultants extends MY_Controller {

	protected $title 	= 'Consultants';
	protected $activemenu 	= 'consultants';
	
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('consultants_model');
	}
/*---------------------------------------------------------------------------------------------------------
| Function to display consultants
|----------------------------------------------------------------------------------------------------------*/
	public function index()
	{
		$data = array();
		$data['title'] 		= $this->title;
		$data['activemenu'] 	= $this->activemenu;
		$data['consultant']	= $this->consultants_model->db_select_conslt();
		$data['pagecontent'] 	= 'consultants/consultants';
		$this->load->view('common/holder', $data);
	}
/*---------------------------------------------------------------------------------------------------------
| Function to create new consultants
|----------------------------------------------------------------------------------------------------------*/
	function createconsultant()
	{
		$data = array();
		if($this->input->post('createconsultantbtn'))
		{
			$this->form_validation->set_rules('conslt_name', 'Consultant name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('conslt_skill', 'Skills', 'trim|required|xss_clean');
			$this->form_validation->set_rules('conslt_buy_price', 'Buy price', 'trim|numeric|required|xss_clean');
                        $this->form_validation->set_rules('conslt_sell_price', 'Sell price', 'trim|numeric|required|xss_clean');
			$this->form_validation->set_error_delimiters('<p class="has-error"><label class="control-label">', '</label></p>');
			if($this->form_validation->run())
			{
				$consultant_details = array('conslt_name'		=> $this->input->post('conslt_name'),
									  'conslt_skill'	=> $this->input->post('conslt_skill'),
									  'conslt_buy_price'	=> $this->input->post('conslt_buy_price'),
                                                                          'conslt_sell_price'	=> $this->input->post('conslt_sell_price'),
									 );
				$this->common_model->dbinsert('ci_consultants', $consultant_details);
				$this->session->set_flashdata('success', 'Consultant has been added successfully !!');
				redirect('consultants/createconsultant');
			}
		}
		$data['title'] 		=  $this->title;
		$data['activemenu'] 	=  $this->activemenu;
                $data['emp_list']       =  $this->consultants_model->db_emp_list();
                $data['client_list']    =  $this->consultants_model->db_client_list();
		$data['pagecontent'] 	= 'consultants/newconsultant';
		$this->load->view('common/holder', $data);
	}
/*---------------------------------------------------------------------------------------------------------
| Function to edit product
|----------------------------------------------------------------------------------------------------------*/
	function editconsultant($conslt_id = 0)
	{
		$data = array();
		if($this->input->post('editconsultantbtn'))
		{
			$this->form_validation->set_rules('conslt_name', 'Consultant name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('conslt_skill', 'Skills', 'trim|required|xss_clean');
			$this->form_validation->set_rules('conslt_buy_price', 'Buy price', 'trim|numeric|required|xss_clean');
                        $this->form_validation->set_rules('conslt_sell_price', 'Sell price', 'trim|numeric|required|xss_clean');
			$this->form_validation->set_error_delimiters('<p class="has-error"><label class="control-label">', '</label></p>');
			if($this->form_validation->run())
			{
				$consultant_details = array('conslt_name'		=> $this->input->post('conslt_name'),
									  'conslt_skill'	=> $this->input->post('conslt_skill'),
									  'conslt_buy_price'	=> $this->input->post('conslt_buy_price'),
                                                                          'conslt_sell_price'	=> $this->input->post('conslt_sell_price'),
									 );
				$this->common_model->update_records('ci_consultants', 'conslt_id', $conslt_id, $consultant_details);
				$this->session->set_flashdata('success', 'Consultant has been updated successfully !!');
				redirect('consultants');
			}
		}
		$data['title'] 		= $this->title;
		$data['activemenu'] 	= $this->activemenu;
		$data['consultant'] 	= $this->common_model->select_record('ci_consultants', 'conslt_id', $conslt_id);
		$data['pagecontent'] 	= 'consultants/editconsultant';
		$this->load->view('common/holder', $data);
	}
/*---------------------------------------------------------------------------------------------------------
| Function to process products selected to be added to an invoice
|----------------------------------------------------------------------------------------------------------*/
	function process_products_selections()
	{
		$product_ids = $this->input->post('products_lookup_ids');
		$products = $this->products_model->get_product_selections($product_ids)->result();
		echo json_encode($products);
	}
/*---------------------------------------------------------------------------------------------------------
| Function to delete a product
|----------------------------------------------------------------------------------------------------------*/
	function delete($conslt_id = 0)
	{
		$this->consultants_model->delete_consultant($conslt_id);
		$this->session->set_flashdata('success', 'The consultant has been deleted successfully !!');
		redirect('consultants');
	}
	
}