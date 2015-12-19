<?php if(!defined('BASEPATH'))exit('No direct access allowed');
class Employer extends MY_Controller{
    protected  $title='Employer';
    protected $activemenu='employer';
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('employer_model');        
    }
    
    
    public function  index()
    {
        $data=array();
        $data['title']=  $this->title;
        $data['activemenu']=  $this->activemenu;
        //$data['employer']=  $this->common_model->db_select('ci_employer');
        $data['employer']=  $this->employer_model->db_select_emp();
       
        $data['pagecontent']='employers/employer';
        $this->load->view('common/holder',$data);
                
    }
    
    
    function createemployer()
    {
        $data=array();
        if($this->input->post('createemployerbtn'))
        {
            
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|xss_clean');
                        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|numeric|required|xss_clean');
                        $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
                        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
                        $this->form_validation->set_rules('product_id', 'Consultant', 'trim|required|xss_clean');
                        $this->form_validation->set_error_delimiters('<p class="has-error"><label class="control-label">', '</label></p>');
                        
                        if($this->form_validation->run())
			{
                            $employer_details = array(                    'emp_cmpname'	=> $this->input->post('company_name'),
									  'emp_cpname'	=> $this->input->post('contact_person'),
									  'emp_email'	=> $this->input->post('email'),
                                                                          'emp_phoneno'	=> $this->input->post('phone_no'),
                                                                          'emp_city'	=> $this->input->post('city'),
                                                                          'emp_address'	=> $this->input->post('address'),
                                                                          'conslt_id'	=> $this->input->post('product_id')
									 );
                                                                            
				$x=$this->common_model->dbinsert('ci_employer', $employer_details);
				$this->session->set_flashdata('success','Employer has been added successfully !!' );
				redirect('employer/createemployer');
                            
                            
                            
                        }
                        
                        
        } 
       
        $data['title']=  $this->title;
        $data['activemenu']=  $this->activemenu;
        $data['products']=  $this->employer_model->db_product_list();
        $data['pagecontent']='employers/newemployer';
        $this->load->view('common/holder',$data);
    }
    function editemployer($emp_id=0)
    {
        $data=array();
        if($this->input->post('editemployerbtn'))
        {
                        //echo $this->input->post('product_id');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|xss_clean');
                        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|numeric|required|xss_clean');
                        $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
                        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
                        $this->form_validation->set_error_delimiters('<p class="has-error"><label class="control-label">', '</label></p>');
                        
                        if($this->form_validation->run())
			{
                           
                            $employer_details = array(                    'emp_cmpname'	=> $this->input->post('company_name'),
									  'emp_cpname'	=> $this->input->post('contact_person'),
									  'emp_email'	=> $this->input->post('email'),
                                                                          'emp_phoneno'	=> $this->input->post('phone_no'),
                                                                          'emp_city'	=> $this->input->post('city'),
                                                                          'emp_address'	=> $this->input->post('address'),
                                                                          'conslt_id'	=> $this->input->post('product_id')
									 );
                                                                          
				$x=$this->common_model->update_records('ci_employer', 'emp_id',$emp_id,$employer_details);
				$this->session->set_flashdata('success','Successfully Updated Empluyer !!' );
				redirect('employer');
                            
                            
                            
                        }
                        
                        
        } 
       
        $data['title']=  $this->title;
        $data['activemenu']=  $this->activemenu;
        $data['employer']=  $this->employer_model->select_record_emp($emp_id);
        $data['products']=  $this->employer_model->db_product_list();
        $data['pagecontent']='employers/editemployer';
        $this->load->view('common/holder',$data);
    }
    function delete($emp_id = 0)
    {
	$this->employer_model->delete_employer($emp_id);
	$this->session->set_flashdata('success', 'The employer has been deleted successfully !!');
	redirect('employer');
    }
    
    
    
    
}








?>