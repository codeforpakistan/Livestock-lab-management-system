<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {


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
if($permissions[0]->module_id == 1 && $permissions[0]->show_none==1)
{
     redirect('Login/logout');
}        
			
		}
	
		public function index()
		{	

		
$user_id               = $this->session->userdata('user')['user_id'];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
$data['registered']                = '';
$data['pending']                   = '';
$data['posted']                    = '';
$data['cancelled']                 = '';
$data['labs']                      = '';
$data['tests']                     = '';
$data['testTypes']                 = '';
$data['mastitis']                  = '';
$data['haematology']               = '';
$data['impression_smear']          = '';
$data['urine_examination']         = '';
$data['brucella_human']            = '';
$data['brucella_animal_combine']   = '';
$data['brucella_animal_ind']       = '';
$data['tb_and_vph']                = '';
$data['water_bacteriology']        = '';
$data['afs']                       = '';
$data['today']                     = '';
$data['current_week']              = '';
$data['current_month']             = '';
$data['current_year']              = '';
if($permissions[0]->module_id == 1 && $permissions[0]->show_all==1)
{
$data['registered']              = $this->API_m->countAllRows('testdetails');
$data['pending']                 = $this->API_m->countWhereAllRows('testdetails',['post_status' => 0, 'is_cancel'   => 0]);
$data['posted']                  = $this->API_m->countWhereAllRows('testdetails',['post_status' => 1, 'is_cancel'   => 0]);
$data['cancelled']               = $this->API_m->countWhereAllRows('testdetails',['is_cancel'   => 1, 'post_status' => 0]);
$data['testTypes']               = $this->User_m->getRecordWhere('testhelp',['is_trash' => 0]); 
$data['labs']                    = $this->API_m->countWhereAllRows('labs',['is_trash' => 0]);
$data['tests']                   = $this->API_m->countAllRows('tests');

$data['today']                   = $this->API_m->today_All();
$data['current_week']            = $this->API_m->current_week_All();
$data['current_month']           = $this->API_m->current_month_All();
$data['current_year']            = $this->API_m->current_year_All();

}else if($permissions[0]->module_id == 1 && $permissions[0]->show_lab_by==1)
{
$data['registered']              = $this->API_m->countByLabTestdetails($lab_id);
$data['pending']                 = $this->API_m->countByLabTestdetailsPending($lab_id);
$data['posted']                  = $this->API_m->countByLabTestdetailsPosted($lab_id);
$data['cancelled']               = $this->API_m->countByLabTestdetailsCancelled($lab_id);
$data['labs']                    = $this->API_m->countWhereAllRows('labs',['lab_id'=>$lab_id,'is_trash' => 0]);
$data['testTypes']               = $this->User_m->getRecordWhere('tests',['lab_id' => $lab_id]); 
$data['tests']                   = $this->API_m->countAllRows('tests',['lab_id'=>$lab_id]);

$data['today']                   = $this->API_m->today_ByLab($lab_id);
$data['current_week']            = $this->API_m->current_week_ByLab($lab_id);
$data['current_month']           = $this->API_m->current_month_ByLab($lab_id);
$data['current_year']            = $this->API_m->current_year_ByLab($lab_id);
}else if($permissions[0]->module_id == 1 && $permissions[0]->show_none==1)
{
$data['registered']                = '';
$data['pending']                   = '';
$data['posted']                    = '';
$data['cancelled']                 = '';
$data['labs']                      = '';
$data['tests']                     = '';
$data['mastitis']                  = '';
$data['haematology']               = '';
$data['impression_smear']          = '';
$data['urine_examination']         = '';
$data['brucella_human']            = '';
$data['brucella_animal_combine']   = '';
$data['brucella_animal_ind']       = '';
$data['tb_and_vph']                = '';
$data['water_bacteriology']        = '';
$data['afs']                       = '';
$data['today']                     = '';
$data['current_week']              = '';
$data['current_month']             = '';
$data['current_year']              = '';
}
			$data['logUser']   = $this->User_m->getLogUserInfo();
			$data['logLab']    = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/index',$data);
			$this->load->view('template_parts/footer');
			
		}

	public function infoDetails($url)
	{
		$status = '';
		if($url=='Totals')
		{
			$status = [];
		}
		else if($url=='InProgress')
		{
			$status = ['post_status' => 0, 'is_cancel' => 0];
		}
		else if($url=='Completed')
		{
			$status = ['post_status' => 1, 'is_cancel' => 0];
		}
		else if($url=='cancelled')
		{
			$status = ['post_status' => 0, 'is_cancel' => 1];
		}
		// echo $url;
		// print_r($status);
		// exit();

$user_id               = $this->session->userdata('user')['user_id'];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
$data['registered']                = '';
$data['pending']                   = '';
$data['posted']                    = '';
$data['cancelled']                 = '';
$data['labs']                      = '';
$data['tests']                     = '';
$data['testTypes']                 = '';
$data['mastitis']                  = '';
$data['haematology']               = '';
$data['impression_smear']          = '';
$data['urine_examination']         = '';
$data['spat_human']                = '';
$data['mrt']                       = '';
$data['rbpt']                      = '';
$data['tuberculin_skin_test']      = '';
$data['water_bacteriology']        = '';
$data['elisa_human']               = '';
$data['elisa_animal']              = '';
$data['pcr_human']                 = '';
$data['pcr_animal']                = '';
$data['culture_sensitivity']       = '';
$data['afs']                       = '';
$data['today']                     = '';
$data['current_week']              = '';
$data['current_month']             = '';
$data['current_year']              = '';
if($permissions[0]->module_id == 1 && $permissions[0]->show_all==1)
{
$data['registered']              = $this->API_m->countAllRows('testdetails');
$data['pending']                 = $this->API_m->countWhereAllRows('testdetails',['post_status' => 0, 'is_cancel'   => 0]);
$data['posted']                  = $this->API_m->countWhereAllRows('testdetails',['post_status' => 1, 'is_cancel'   => 0]);
$data['cancelled']               = $this->API_m->countWhereAllRows('testdetails',['is_cancel'   => 1, 'post_status' => 0]);
$data['testTypes']               = $this->User_m->getRecordWhere('testhelp',['is_trash' => 0]); 
$data['labs']                    = $this->API_m->countWhereAllRows('labs',['is_trash' => 0]);
$data['tests']                   = $this->API_m->countAllRows('tests');
$data['impression_smear']        = $this->API_m->countTotalByTestType(1,$status);
$data['haematology']             = $this->API_m->countTotalByTestType(2,$status);
$data['mastitis']                = $this->API_m->countTotalByTestType(3,$status);
$data['culture_sensitivity']     = $this->API_m->countTotalByTestType(4,$status);
$data['urine_examination']       = $this->API_m->countTotalByTestType(5,$status);
$data['mrt']                     = $this->API_m->countTotalByTestType(6,$status);
$data['rbpt']                    = $this->API_m->countTotalByTestType(7,$status);
$data['spat_human']              = $this->API_m->countTotalByTestType(8,$status);
$data['tuberculin_skin_test']    = $this->API_m->countTotalByTestType(9,$status);
$data['water_bacteriology']      = $this->API_m->countTotalByTestType(10,$status);
$data['afs']                     = $this->API_m->countTotalByTestType(11,$status);
$data['elisa_human']             = $this->API_m->countTotalByTestType(12,$status);
$data['elisa_animal']            = $this->API_m->countTotalByTestType(13,$status);
$data['pcr_human']               = $this->API_m->countTotalByTestType(14,$status);
$data['pcr_animal']              = $this->API_m->countTotalByTestType(15,$status);
$data['today']                   = $this->API_m->today_All();
$data['current_week']            = $this->API_m->current_week_All();
$data['current_month']           = $this->API_m->current_month_All();
$data['current_year']            = $this->API_m->current_year_All();

}else if($permissions[0]->module_id == 1 && $permissions[0]->show_lab_by==1)
{
$data['registered']              = $this->API_m->countByLabTestdetails($lab_id);
$data['pending']                 = $this->API_m->countByLabTestdetailsPending($lab_id);
$data['posted']                  = $this->API_m->countByLabTestdetailsPosted($lab_id);
$data['cancelled']               = $this->API_m->countByLabTestdetailsCancelled($lab_id);
$data['labs']                    = $this->API_m->countWhereAllRows('labs',['lab_id'=>$lab_id,'is_trash' => 0]);
$data['testTypes']               = $this->API_m->getTestNames($lab_id); 
$data['tests']                   = $this->API_m->countAllRows('tests',['lab_id'=>$lab_id]);
$data['impression_smear']        = $this->API_m->countByLabTestType($lab_id,1,$status);
$data['haematology']             = $this->API_m->countByLabTestType($lab_id,2,$status);
$data['mastitis']                = $this->API_m->countByLabTestType($lab_id,3,$status);
$data['culture_sensitivity']     = $this->API_m->countByLabTestType($lab_id,4,$status);
$data['urine_examination']       = $this->API_m->countByLabTestType($lab_id,5,$status);
$data['mrt']                     = $this->API_m->countByLabTestType($lab_id,6,$status);
$data['rbpt']                    = $this->API_m->countByLabTestType($lab_id,7,$status);
$data['spat_human']              = $this->API_m->countByLabTestType($lab_id,8,$status);
$data['tuberculin_skin_test']    = $this->API_m->countByLabTestType($lab_id,9,$status);
$data['water_bacteriology']      = $this->API_m->countByLabTestType($lab_id,10,$status);
$data['afs']                     = $this->API_m->countByLabTestType($lab_id,11,$status);
$data['elisa_human']             = $this->API_m->countByLabTestType($lab_id,12,$status);
$data['elisa_animal']            = $this->API_m->countByLabTestType($lab_id,13,$status);
$data['pcr_human']               = $this->API_m->countByLabTestType($lab_id,14,$status);
$data['pcr_animal']              = $this->API_m->countByLabTestType($lab_id,15,$status);
$data['today']                   = $this->API_m->today_ByLab($lab_id);
$data['current_week']            = $this->API_m->current_week_ByLab($lab_id);
$data['current_month']           = $this->API_m->current_month_ByLab($lab_id);
$data['current_year']            = $this->API_m->current_year_ByLab($lab_id);
}else if($permissions[0]->module_id == 1 && $permissions[0]->show_none==1)
{
$data['registered']                = '';
$data['pending']                   = '';
$data['posted']                    = '';
$data['cancelled']                 = '';
$data['labs']                      = '';
$data['tests']                     = '';
$data['mastitis']                  = '';
$data['haematology']               = '';
$data['impression_smear']          = '';
$data['urine_examination']         = '';
$data['spat_human']                = '';
$data['mrt']                       = '';
$data['rbpt']                      = '';
$data['tuberculin_skin_test']      = '';
$data['water_bacteriology']        = '';
$data['afs']                       = '';
$data['today']                     = '';
$data['current_week']              = '';
$data['current_month']             = '';
$data['current_year']              = '';
}
			$data['logUser']   = $this->User_m->getLogUserInfo();
			$data['logLab']    = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
			$this->load->view('pages/index_details',$data);
			$this->load->view('template_parts/footer');
		
	}
}