<?php 


	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Districtlabscontroller extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
            date_default_timezone_set('Asia/Karachi');
            if(empty($this->session->userdata('user')))
            {
                redirect('Login/logout');
            }
           
			
		}
		public function districtlab()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('lab_name', 'Lab name', 'required|numeric|min_length[2]|max_length[15]');
			$this->form_validation->set_rules('lab_address', 'Lab address', 'required|numeric|min_length[2]|max_length[15]');
			$this->form_validation->set_rules('lab_description', 'Lab description', 'required|numeric|min_length[2]|max_length[15]');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/districtlabs');
			} 

			$districtlab = array(
			'lab_name'         => $this->input->post('lab_name'),
			'directorate_id'   => $this->input->post('directorate_id'),
			'center_station_id'=> $this->input->post('center_station_id'),
			'section_id'       => $this->input->post('section_id'),
			'lab_description'  => $this->input->post('lab_description'),
			'lab_address'      => 'lab',
			'created_by'       => $this->session->userdata('user')['user_id']
			 );

			$this->API_m->create('labs', $districtlab);
			$this->session->set_flashdata('Msg', 'Record has been Added!');
			redirect('Pagescontroller/districtlabs');
		}

		public function UpdateLab()
		{
			$lab_id = $this->input->post('lab_id');
			$districtlab = array(
			'lab_name'         => $this->input->post('labname'),
			'directorate_id'   => $this->input->post('directorate_id'),
			'center_station_id'=> $this->input->post('center_station_id'),
			'section_id'       => $this->input->post('section_id'),
			'lab_description'  => $this->input->post('lab_description'),
			'lab_address'      => 'lab',
			 );

			$this->API_m->updateRecord('labs',['lab_id'=> $lab_id], $districtlab);
			$this->session->set_flashdata('Msg', 'Record has been Updated!');
			redirect('Pagescontroller/districtlabs');
		}

		public function delete($id)
		{
			$data = [
                'is_trash'  => 1
                ];
			$this->API_m->updateRecord('labs',['lab_id' => $id],$data);
			$this->session->set_flashdata('Delete', ' Record deleted successfully');
			redirect('Pagescontroller/districtlabs');
		}
	
	}


	
	/* End of file districtlabscontroller.php */
	/* Location: ./application/controllers/districtlabscontroller.php */




 ?>