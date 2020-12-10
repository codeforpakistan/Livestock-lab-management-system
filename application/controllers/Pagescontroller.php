<?php 
	
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pagescontroller extends CI_Controller {


		function __construct()
		{
			parent::__construct();
            date_default_timezone_set('Asia/Karachi');
            if(empty($this->session->userdata('user')))
            {
                redirect('Login/logout');
            }
$role_id               = $this->session->userdata('user')['role'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[1]->module_id == 2 && $permissions[1]->show_none==1)
{
 redirect('Login/logout');
}        
			
		}


		public function district()
		{
			# code...
			$data['districts'] = $this->Districtmodel->getRecordWhere('districts',['is_trash'=>0]);
			$data['logUser']   = $this->User_m->getLogUserInfo();
			$data['logLab']    = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/district',$data);
			$this->load->view('template_parts/footer');
		}
		public function tehsil()
		{
			# code...
			$data['districts'] = $this->Districtmodel->getRecordWhere('districts',['is_trash'=>0]);
			$data['tehsils']   = $this->API_m->getTehsil();
			$data['logUser']   = $this->User_m->getLogUserInfo();
			$data['logLab']    = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/tehsil',$data);
			$this->load->view('template_parts/footer');
		}
		public function districtlabs()
		{
			$data['sections']      = $this->API_m->getRecordWhere('sections',['is_trash' => 0]);
			$data['directorates']  = $this->API_m->getRecordWhere('directorates',['is_trash' => 0]);
			$data['districtlab']   = $this->API_m->get_districtlab();
			$data['logUser']       = $this->User_m->getLogUserInfo();
			$data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/districtlabs',$data);
			$this->load->view('template_parts/footer');
		}
		public function test_section()
		{
			$data['directorates']    = $this->API_m->getRecordWhere('directorates',['is_trash' => 0]);
			$data['sectionhelp']     = $this->API_m->getRecordWhere('sectionhelp',['is_trash' => 0]);
			$data['testsection']     = $this->API_m->get_testsection();
			$data['logUser']         = $this->User_m->getLogUserInfo();
			$data['logLab']          = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/testsection',$data);
			$this->load->view('template_parts/footer');
		}
		public function samples()
		{
			$data['samples']   = $this->API_m->getRecordWhere('samples',['is_trash'=>0]);
            $data['logUser']   = $this->User_m->getLogUserInfo();
            $data['logLab']    = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/samples',$data);
			$this->load->view('template_parts/footer');
		}
        public function test_types()
        {
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
$data['tests']         = '';
$data['labs']          = '';
 if($permissions[1]->module_id == 2 && $permissions[1]->show_all==1)
 {
     $data['tests']         = $this->API_m->getTestTypes();
     $data['labs']          = $this->API_m->getRecordWhere('labs',['is_trash'=>0]);
 }else if($permissions[1]->module_id == 2 && $permissions[1]->show_lab_by==1)
 {
     $data['tests']         = $this->API_m->getTestTypes_byLab($lab_id);
     $data['labs']          = $this->API_m->getRecordWhere('labs',['is_trash'=>0, 'lab_id'=> $lab_id]);
 }else if($permissions[1]->module_id == 2 && $permissions[1]->show_none==1)
 {
	$data['tests']         = '';
	$data['labs']          = '';
      
 }
            $data['directorates']  = $this->API_m->getRecordWhere('directorates',['is_trash'=>0]);
            $data['testItems']     = $this->API_m->getRecordWhere('testhelp',['is_trash'=>0]);
            $data['samples']       = $this->API_m->getRecordWhere('samples',['is_trash'=>0]);
            $data['logUser']       = $this->User_m->getLogUserInfo();
            $data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/tests',$data);
            $this->load->view('template_parts/footer');
        }
        public function antibiotics()
        {
            $data['antibiotics']  = $this->API_m->getRecordWhere('antibiotics',['is_trash'=>0]);
            $data['logUser']      = $this->User_m->getLogUserInfo();
            $data['logLab']       = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/antibiotics',$data);
            $this->load->view('template_parts/footer');
        }
		public function directorates()
		{
			$data['directorates']  = $this->API_m->getRecordWhere('directorates',['is_trash' => 0]);
			$data['logUser']       = $this->User_m->getLogUserInfo();
			$data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/directorates',$data);
			$this->load->view('template_parts/footer');
		}
		public function centerStations()
		{
			$data['stations']      = $this->API_m->Getstations();
			$data['directorates']  = $this->API_m->getRecordWhere('directorates',['is_trash' => 0]);
			$data['districts']     = $this->API_m->getRecordWhere('districts',['is_trash' => 0]);
			$data['logUser']       = $this->User_m->getLogUserInfo();
			$data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/centerStations',$data);
			$this->load->view('template_parts/footer');
		}
		public function sectionItems()
		{
			$data['sectionItems']  = $this->API_m->getRecordWhere('sectionhelp',['is_trash' => 0]);
			$data['logUser']       = $this->User_m->getLogUserInfo();
			$data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/sectionItems',$data);
			$this->load->view('template_parts/footer');
		}
		public function testItems()
		{
			$data['testItems']  = $this->API_m->getRecordWhere('testhelp',['is_trash' => 0]);
			$data['logUser']    = $this->User_m->getLogUserInfo();
			$data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/testItems',$data);
			$this->load->view('template_parts/footer');
		}
		public function cattles()
		{
			$data['cattles']       = $this->API_m->getRecordWhere('cattles',['is_trash' => 0]);
			$data['logUser']       = $this->User_m->getLogUserInfo();
			$data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/cattles',$data);
			$this->load->view('template_parts/footer');
		}
		public function breeds()
		{
			$data['cattles']   = $this->API_m->getRecordWhere('cattles',['is_trash' => 0]);
			$data['breeds']    = $this->API_m->getBreeds();
			$data['logUser']   = $this->User_m->getLogUserInfo();
			$data['logLab']    = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/breeds',$data);
			$this->load->view('template_parts/footer');
		}
	
		public function getStations()
		{
			$id       = $this->input->post('directorate_id');
	        $stations = $this->API_m->getRecordWhere('center_station',['directorate_id' => $id,'is_trash' => 0]);
	        // echo "<pre>";
	        // print_r($stations);
	        // exit();
	        echo json_encode($stations);
		}
		public function GetSections()
		{
			$id       = $this->input->post('center_station_id');
	        $section  = $this->API_m->getRecordWhere('sections',['center_station_id' => $id,'is_trash' => 0]);
	        // echo "<pre>";
	        echo json_encode($section);
		}
		public function GetLabs()
		{
			$id       = $this->input->post('section_id');
	        $labs     = $this->API_m->getRecordWhere('labs',['section_id' => $id,'is_trash' => 0]);
	        // echo "<pre>";
	        echo json_encode($labs);
		}
		public function GetBreeds()
		{
			$id      = $this->input->post('cattle_id');
	        $breeds  = $this->API_m->getRecordWhere('breeds',['cattle_id' => $id,'is_trash' => 0]);
	        // echo "<pre>";
	        echo json_encode($breeds);
		}

		//DIRECTORATE CRUD
		public function AddDirectorate()
		{
			$this->form_validation->set_rules('directorate_name', 'directorate name', 'required|numeric');
			$this->form_validation->set_rules('directorate_head', 'directorate_head', 'required|numeric');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/directorates');
			}
			$data = [
			        'directorate_name' => $this->input->post('directorate_name'),
			        'directorate_head' => $this->input->post('directorate_head'),
			        'created_by'       => $this->session->userdata('user')['user_id']

			        ];
			$this->API_m->create('directorates',$data);
			$this->session->set_flashdata('Msg', ' Record Created Successfull');
			redirect('Pagescontroller/directorates');

		}
		public function directorateDelete($id)
		{
		    # code...
		    $data = [
		        'is_trash'  => 1
		        ];
		    
		    $this->API_m->updateRecord('directorates',['directorate_id'=>$id],$data);
		    $this->session->set_flashdata('Msg', 'Record has been deleted');
		    redirect('Pagescontroller/directorates');
		}


		public function directoreatesUpdate()
		{
			$id =$this->input->post('directorate_id');
			$data = array(
				'directorate_name' => $this->input->post('directorate_name'),
				'directorate_head' => $this->input->post('directorate_head'),
			 );
			$this->API_m->updateRecord('directorates',['directorate_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been Updated!');
			redirect('Pagescontroller/directorates');

		}
// CATTLE CRUD
		public function AddCattle()
		{

				$this->form_validation->set_rules('cattle_name', 'attle name', 'required|numeric|min_length[2]|max_length[15]');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/cattles');
			}
			$data = [
			        'cattle_name'  => $this->input->post('cattle_name'),
			        'created_by'   => $this->session->userdata('user')['user_id']

			        ];
			$this->API_m->create('cattles',$data);
			$this->session->set_flashdata('Msg', ' Record Created Successfull');
			redirect('Pagescontroller/cattles');

		}
		public function cattleDelete($id)
		{
		    # code...
		    $data = [
		        'is_trash'  => 1
		        ];
		    
		    $this->API_m->updateRecord('cattles',['cattle_id'=>$id],$data);
		    $this->session->set_flashdata('Msg', 'Record has been deleted');
		    redirect('Pagescontroller/cattles');
		}
		public function cattleUpdate()
		{
			$id =$this->input->post('cattle_id');
			$data = array(
				'cattle_name'  => $this->input->post('cattle_name'),
			 );
			$this->API_m->updateRecord('cattles',['cattle_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been Updated!');
			redirect('Pagescontroller/cattles');

		}

//  BREAD CRUD
		public function AddBreed()
		{
			$this->form_validation->set_rules('breed_name', 'Breed Name', 'required|numeric|min_length[2]|max_length[15]');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/breeds');
			}
			$data = [
			        'cattle_id'    => $this->input->post('cattle_id'),
			        'breed_name'   => $this->input->post('breed_name'),
			        'created_by'   => $this->session->userdata('user')['user_id']

			        ];
			$this->API_m->create('breeds',$data);
			$this->session->set_flashdata('Msg', ' Record Created Successfull');
			redirect('Pagescontroller/breeds');

		}
		public function BreedDelete($id)
		{
		    # code...
		    $data = [
		        'is_trash'  => 1
		        ];
		    
		    $this->API_m->updateRecord('breeds',['breed_id'=>$id],$data);
		    $this->session->set_flashdata('Msg', 'Record has been deleted');
		    redirect('Pagescontroller/breeds');
		}
		public function BreedUpdate()
		{
			$id =$this->input->post('breed_id');
			$data = array(
				'cattle_id'    => $this->input->post('cattle_id'),
			    'breed_name'   => $this->input->post('breed_name'),
			 );
			$this->API_m->updateRecord('breeds',['breed_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been Updated!');
			redirect('Pagescontroller/breeds');

		}

//  CENTER/STATION CRUD
		public function AddStation()
		{
			$data = [
			        'center_station_name'       => $this->input->post('center_station_name'),
			        'center_station_phone'      => $this->input->post('center_station_phone'),
			        'center_station_fax'        => $this->input->post('center_station_fax'),
			        'center_station_email'      => $this->input->post('center_station_email'),
			        'center_station_website'    => $this->input->post('center_station_website'),
			        'directorate_id'            => $this->input->post('directorate_id'),
			        'district_id'               => $this->input->post('district_id'),
			        'center_station_address'    => $this->input->post('center_station_address'),
			        'created_by'                => $this->session->userdata('user')['user_id']
			        ];

			$this->API_m->create('center_station',$data);
			$this->session->set_flashdata('Msg', ' Record Created Successfull');
			redirect('Pagescontroller/centerStations');

		}
		public function StationDelete($id)
		{
		    # code...
		    $data = [
		        'is_trash'  => 1
		        ];
		    
		    $this->API_m->updateRecord('center_station',['center_station_id'=>$id],$data);
		    $this->session->set_flashdata('Msg', 'Record has been deleted');
		    redirect('Pagescontroller/centerStations');
		}


		public function StationUpdate()
		{
			$id =$this->input->post('center_station_id');
			$data = array(
				    'center_station_name'        => $this->input->post('center_station_name'),
				    'center_station_phone'       => $this->input->post('center_station_phone'),
				    'center_station_fax'         => $this->input->post('center_station_fax'),
				    'center_station_email'       => $this->input->post('center_station_email'),
			        'center_station_website'     => $this->input->post('center_station_website'),
			        'directorate_id'             => $this->input->post('directorate_id'),
			        'district_id'                => $this->input->post('district_id'),
			        'center_station_address'     => $this->input->post('center_station_address'),
			 );
			$this->API_m->updateRecord('center_station',['center_station_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been Updated!');
			redirect('Pagescontroller/centerStations');

		}

//  Section items
		public function AddsectionItem()
		{
			$data = [
			        'sectionHelp_name' => $this->input->post('sectionHelp_name'),
			        'created_by'          => $this->session->userdata('user')['user_id']

			        ];
			$this->API_m->create('sectionhelp',$data);
			$this->session->set_flashdata('Msg', ' Record Created Successfull');
			redirect('Pagescontroller/sectionItems');

		}
		public function DeleteSectionItem($id)
		{
		    # code...
		    $data = [
		        'is_trash'  => 1
		        ];
		    
		    $this->API_m->updateRecord('sectionhelp',['sectionHelp_id'=>$id],$data);
		    $this->session->set_flashdata('Msg', 'Record has been deleted');
		    redirect('Pagescontroller/sectionItems');
		}


		public function SectionItemUpdate()
		{
			$id =$this->input->post('sectionHelp_id');
			$data = array(
				    'sectionHelp_name' => $this->input->post('sectionHelp_name'),
			 );
			$this->API_m->updateRecord('sectionhelp',['sectionHelp_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been Updated!');
			redirect('Pagescontroller/sectionItems');

		}

// test Items portion
		public function AddTestItem()
		{
			$data = [
			        'testHelp_name'        => $this->input->post('testHelp_name'),
			        'testHelp_fee'         => $this->input->post('testHelp_fee'),
			        'disease_or_research'  => $this->input->post('disease_or_research'),
			        'created_by'           => $this->session->userdata('user')['user_id']

			        ];
			$this->API_m->create('testhelp',$data);
			$this->session->set_flashdata('Msg', ' Record Created Successfull');
			redirect('Pagescontroller/testItems');

		}
		public function DeleteTestItem($id)
		{
		    # code...
		    $data = [
		        'is_trash'  => 1
		        ];
		    
		    $this->API_m->updateRecord('testhelp',['testHelp_id'=>$id],$data);
		    $this->session->set_flashdata('Msg', 'Record has been deleted');
		    redirect('Pagescontroller/testItems');
		}


		public function testItemUpdate()
		{
			$id =$this->input->post('testHelp_id');
			$data = array(
				    'testHelp_name'        => $this->input->post('testHelp_name'),
				    'testHelp_fee'         => $this->input->post('testHelp_fee'),
				    'disease_or_research'  => $this->input->post('disease_or_research'),
			 );
			$this->API_m->updateRecord('testhelp',['testHelp_id'=>$id],$data);
			$this->session->set_flashdata('Msg', 'Record has been Updated!');
			redirect('Pagescontroller/testItems');

		}

		public function addSample()
    {

    	$this->form_validation->set_rules('sample_name', 'Center station Name', 'required|numeric|min_length[2]|max_length[15]');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/samples');
			}
       $data = [
                'sample_name'     => $this->input->post('sample_name'),
                'created_by'      => $this->session->userdata('user')['user_id']

                ];
        $role_id = $this->API_m->create('samples',$data);
        $this->session->set_flashdata('Msg', ' Record Created Successfull');
        redirect('Pagescontroller/samples');

     }

    public function updateSampleRecord()
    {
     
            $role_id  = $this->input->post('sample_id');

        $data = [
                'sample_name'  => $this->input->post('sample_name')
                ];
            
        $this->API_m->updateRecord('samples',['sample_id'=>$role_id],$data);
        $this->session->set_flashdata('Msg', ' Record Updated Successfull');
        redirect('Pagescontroller/samples');
    
    }
    public function deleteSample($sample_id)
    {
  
        $data = [
                'is_trash'  => 1
                ];
            
        $this->API_m->updateRecord('samples',['sample_id'=>$sample_id],$data);
        $this->session->set_flashdata('Msg', ' Record Deleted Successfull');
        redirect('Pagescontroller/samples');
    
    }

    public function Addtest_section()
    {
    	$this->form_validation->set_rules('section_name', 'section_name', 'required|numeric|min_length[2]|max_length[15]');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/test_section');
			}
        $testsection = array(
        'sectionHelp_id'      => $this->input->post('sectionHelp_id'),
        'directorate_id'      => $this->input->post('directorate_id'),
        'center_station_id'   => $this->input->post('center_station_id'),
        'created_by'          => $this->session->userdata('user')['user_id']
         );

        $this->API_m->create('sections', $testsection);
        $this->session->set_flashdata('Msg', 'Record has been Added!');
        redirect('Pagescontroller/test_section');
    }
// TESTS TYPES 
    public function addTest()
    {

       $data = [
                'testHelp_id'       => $this->input->post('testHelp_id'),
                'test_fee'          => $this->input->post('test_fee'),
                'directorate_id'    => $this->input->post('directorate_id'),
                'center_station_id' => $this->input->post('center_station_id'),
                'section_id'        => $this->input->post('section_id'),
                'lab_id'            => $this->input->post('lab_id'),
                'description'       => $this->input->post('test_desc'),
                'created_by'        => $this->session->userdata('user')['user_id']

                ];
         $test_id = $this->API_m->create('tests',$data);
         $sample_id  = $this->input->post('sample_id');
        // echo "<pre>";
        // print_r($sample_id);
        // exit();
        if(!empty($sample_id))
        {
             for($i=0; $i<sizeof($sample_id); $i++)
             {
                $arr = [
                    'test_id'    => $test_id,
                    'sample_id'  => $sample_id[$i],
                    'created_by' => $this->session->userdata('user')['user_id']

                ];
                $this->API_m->create('test_samples',$arr);
             }
        }
        $this->session->set_flashdata('Msg', ' Record Created Successfull');
        redirect('Pagescontroller/test_types');

     }

    public function updateTestRecord()
    {
     
            $test_id    = $this->input->post('test_id');
            $sample_id  = $this->input->post('sample_id');

        $data = [
                'testHelp_id'         => $this->input->post('testHelp_id'),
                'test_fee'          => $this->input->post('test_fee'),
                'directorate_id'    => $this->input->post('directorate_id'),
                'center_station_id' => $this->input->post('center_station_id'),
                'section_id'        => $this->input->post('section_id'),
                'lab_id'            => $this->input->post('lab_id'),
                'description'       => $this->input->post('test_desc')

                ];
            
        $this->API_m->updateRecord('tests',['test_id' => $test_id],$data);
        $this->API_m->delete('test_samples',['test_id'=> $test_id]);
        if(!empty($sample_id))
        {
            for($i=0; $i<sizeof($sample_id); $i++)
            {
                $arr = [
                    'test_id'   => $test_id,
                    'sample_id' => $sample_id[$i]
                ];
                $this->API_m->create('test_samples',$arr);
            }
        }
        $this->session->set_flashdata('Msg', 'Record Updated Successfull');
        redirect('Pagescontroller/test_types');
    
    }
    public function deleteTest($test_id)
    {
  
        $data = [
                'is_trash'  => 1
                ];
            
        $this->API_m->updateRecord('tests', ['test_id'  => $test_id],$data);
        $this->API_m->delete('test_samples',['test_id'  => $test_id]);
        $this->session->set_flashdata('Msg', ' Record Deleted Successfull');
        redirect('Pagescontroller/test_types');
    
    }

	public function delete($id)
	{
	    # code...
	    $data = [
	        'is_trash'  => 1
	        ];
	    
	    $this->API_m->updateRecord('sections',['section_id'=>$id],$data);
	    $this->session->set_flashdata('Msg', 'Record has been deleted');
	    redirect('Pagescontroller/test_section');
	}


	public function testSectionUpdate()
	{
	    # code...
	$sid =$this->input->post('section_id');
	$data = array(
	'sectionHelp_id'      => $this->input->post('sectionHelp_id'),
	'directorate_id'      => $this->input->post('directorate_id'),
	'center_station_id'   => $this->input->post('center_station_id')
	 );
	$this->API_m->updateRecord('sections',['section_id'=>$sid],$data);
	$this->session->set_flashdata('Msg', 'Record has been Updated!');
	redirect('Pagescontroller/test_section');

	}

	// ANTIBIOTICS CRUD
	public function AddAntibiotics()
	{
		$this->form_validation->set_rules('antibiotic_name', 'antibiotic name', 'required|numeric|min_length[2]|max_length[15]');
			if ($this->form_validation->run() == TRUE) {
				# code...
				
				redirect('Pagescontroller/antibiotics');
			}
	   $data = [
	            'antibiotics_name' => $this->input->post('antibiotic_name'),
	            'created_by'       => $this->session->userdata('user')['user_id']

	            ];
	    $this->API_m->create('antibiotics',$data);
	    $this->session->set_flashdata('Msg', ' Record Created Successfull');
	    redirect('Pagescontroller/antibiotics');

	 }

	public function updateAntibioticRecord()
	{
	 
	        $role_id  = $this->input->post('antibiotic_id');

	    $data = [
	            'antibiotics_name'  => $this->input->post('antibiotic_name')
	            ];
	        
	    $this->API_m->updateRecord('antibiotics',['antibiotics_id'=>$role_id],$data);
	    $this->session->set_flashdata('Msg', ' Record Updated Successfull');
	    redirect('Pagescontroller/antibiotics');

	}
	public function DeleteAntibiotic($anti_id)
	{

	    $data = [
	            'is_trash'  => 1
	            ];
	        
	    $this->API_m->updateRecord('antibiotics', ['antibiotics_id'  => $anti_id],$data);
	    $this->session->set_flashdata('Msg', ' Record Deleted Successfull');
	    redirect('Pagescontroller/antibiotics');

	}


		
	}
	

 ?>