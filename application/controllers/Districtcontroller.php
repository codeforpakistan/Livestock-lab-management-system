<?php 

	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Districtcontroller extends CI_Controller {
		function __construct()
		{
			parent::__construct();
            date_default_timezone_set('Asia/Karachi');
            if(empty($this->session->userdata('user')))
            {
                redirect('Login/logout');
            }
		}
	
		public function district_insert()
		{		
			$this->load->library('form_validation');
			$this->form_validation->set_rules('district_name', 'District name', 'required|numeric|min_length[2]|max_length[15]');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/district');
			} 

			$district = array(
			 'district_name'   => $this->input->post('district_name'),
			 'created_by'      => $this->session->userdata('user')['user_id']
			 );

			$this->Districtmodel->create('districts',$district);
			$this->session->set_flashdata('Msg', 'Record has been Added!');
			redirect('Pagescontroller/district');
		}

		public function districtUpdate()
		{
			 $district_id   = $this->input->post('district_id');
			$district = array(
			 'district_name'   => $this->input->post('district_name')
			 );

			
			$this->API_m->updateRecord('districts',['district_id'=> $district_id],$district);
			$this->session->set_flashdata('Msg', 'Record has been updated!');
			redirect('Pagescontroller/district');
		}

		public function deleteDistrict($id)
		{
			# code...
			$data = [
                'is_trash'  => 1
                ];
            
        	$this->API_m->updateRecord('districts',['district_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been deleted');
			redirect('Pagescontroller/district');
		}

//  TEHSIL OPERATIONS/CRUD
		public function tehsil_insert()
		{		
			
			$tehsil = array(
			 'tehsil_name'   => $this->input->post('tehsil_name'),
			 'district_id'   => $this->input->post('district_id'),
			 'created_by'      => $this->session->userdata('user')['user_id']
			 );

			$this->Districtmodel->create('tehsil',$tehsil);
			$this->session->set_flashdata('Msg', 'Record has been Added!');
			redirect('Pagescontroller/tehsil');
		}

		public function tehsilUpdate()
		{
			 $tehsil_id   = $this->input->post('tehsil_id');
			$tehsil = array(
			 'tehsil_name'   => $this->input->post('tehsil_name'),
			 'district_id'   => $this->input->post('district_id')
			 );

			
			$this->API_m->updateRecord('tehsil',['tehsil_id'=> $tehsil_id],$tehsil);
			$this->session->set_flashdata('Msg', 'Record has been updated!');
			redirect('Pagescontroller/tehsil');
		}

		public function deleteTehsil($id)
		{
			# code...
			$data = [
                'is_trash'  => 1
                ];
            
        	$this->API_m->updateRecord('tehsil',['tehsil_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been deleted');
			redirect('Pagescontroller/tehsil');
		}
	
	}
	

	/* End of file districtcontroller.php */
	/* Location: ./application/controllers/districtcontroller.php */


 ?>