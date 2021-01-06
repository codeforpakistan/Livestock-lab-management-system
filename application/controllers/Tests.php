<?php 

	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Tests extends CI_Controller {
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
if($permissions[2]->module_id == 3 && $permissions[2]->show_none==1)
{
   redirect('Login/logout');
}   
		}

/****************************************************
*													*
*		Tests, Samples, Tests Types VIEWS			*
*													*
****************************************************/
		
        public function test_records()
        {

            $data['records']    = $this->API_m->get_testdetail();
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/test_records',$data);
            $this->load->view('template_parts/footer');
        }
        public function pending_records()
        {

            $data['records']    = $this->API_m->get_Pendingtestdetail();
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/pending_records',$data);
            $this->load->view('template_parts/footer');
        }
        public function posted_records()
        {

            $data['records']    = $this->API_m->get_Postedtestdetail();
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/posted_records',$data);
            $this->load->view('template_parts/footer');
        }
        public function cancelled_records()
        {

            $data['records']    = $this->API_m->get_Cancelledtestdetail();
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/cancelled_records',$data);
            $this->load->view('template_parts/footer');
        }
        public function addNew_test()
        {

            // $data['testdetail'] = $this->API_m->get_testdetail();
$user_id               = $this->session->userdata('user')['user_id'];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
 $data['tests']        = '';
if($permissions[2]->module_id == 3 && $permissions[2]->show_all==1)
{
$data['tests']      = $this->API_m->getAllTestTypes();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_lab_by==1)
{
 $data['tests']      = $this->API_m->getAllTestTypes_byLab($lab_id);
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_created_by==1)
{
// $data['tests']      = $this->API_m->getRecordWhere('tests',['created_by'=>$user_id,'is_trash'=>0]);
 $data['tests']      = $this->API_m->getAllTestTypes_byLab($lab_id);
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_none==1)
{
$data['tests']         = '';
}

            $data['cattles']    = $this->API_m->getRecordWhere('cattles',['is_trash'=>0]);
            $data['districts']  = $this->API_m->getRecordWhere('districts',['is_trash'=>0]);
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/addNew_test',$data);
            $this->load->view('template_parts/footer');
        }
        public function updateTestDetailsRecord($id)
        {
$user_id               = $this->session->userdata('user')['user_id'];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
 $data['tests']        = '';
if($permissions[2]->module_id == 3 && $permissions[2]->show_all==1)
{
$data['tests']      = $this->API_m->getAllTestTypes();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_lab_by==1)
{
 $data['tests']      = $this->API_m->getAllTestTypes_byLab($lab_id);
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_created_by==1)
{
// $data['tests']      = $this->API_m->getRecordWhere('tests',['created_by'=>$user_id,'is_trash'=>0]);
 $data['tests']      = $this->API_m->getAllTestTypes_byLab($lab_id);
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_none==1)
{
$data['tests']         = '';
}
            $data['cattles']    = $this->API_m->getRecordWhere('cattles',['is_trash'=>0]);
            $data['districts']  = $this->API_m->getRecordWhere('districts',['is_trash'=>0]);
            // $data['tehsils']    = $this->API_m->getRecordWhere('tehsil',['is_trash'=>0]);
            $data['rec']        = $this->API_m->SingleTestRecord($id);
            $data['samples']    = $this->API_m->getAllTestSamples($data['rec']['testDetails']->test_id);
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/updateTestDetailsRecord',$data);
            $this->load->view('template_parts/footer');
        }
         public function singleTestDetailRecord($id)
         {
            $data['rec']        = $this->API_m->SingleTestdetailsRecord($id);
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/test_details_info',$data);
            $this->load->view('template_parts/footer');
        }
        public function quick_test_receipt($id)
        {
            $data['rec']        = $this->API_m->SingleTestdetailsRecord($id);
            $data['logUser']    = $this->User_m->getLogUserInfo();
            $data['logLab']     = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/quick_receipt',$data);
            $this->load->view('template_parts/footer');
        }

/****************************************************
*													*
*	OPERATION OF Tests, Samples, Tests Types     	*
*													*
****************************************************/

	

// MAIN TEST PORTION 

    public function getTestSamples()
    {
        $test_id = $this->input->post('test_id');
        $samples = $this->API_m->getAllTestSamples($test_id);
        // echo "<pre>";
       echo json_encode($samples);
  
    }

    public function AddNewTestRec()
    {
// echo "<pre>";
// print_r($_POST);
// exit();
// <tracking id code>
            $count      = $this->API_m->countAllRows('testdetails');
            $trackingID = $count+1 . date('m').date('y');

         do
         {
            $count      = $this->API_m->countAllRows('testdetails');
            $trackingID = $count+1 . date('m').date('y');
           $tracking_record = $this->db->where('tracking_id',$trackingID)->get('testdetails')->row();
         
         }
         while(!empty($tracking_record));
       
//  <./tracking id>

            $test_id     = $this->input->post('test_id');
            $tests       = $this->API_m->singleRecord('tests', ['test_id' => $test_id]);
            $type        = $this->input->post('client_type');
      $dept_name      = '';
      $dept_phone     = '';
      $client_name    = '';
      $client_cnic    = '';
      $client_address = '';
      $client_contact = '';
      if($type=='farmer' || $type=='Patient' || $type=='farm_visited')
      { 
        $client_name     =  $this->input->post('client_name');
        $client_contact  =  $this->input->post('client_contact');
        $client_cnic     =  $this->input->post('client_cnic');
        $client_address  =  $this->input->post('client_address');
      }else if($type=='own_dept')
      {
        $dept_name       =  $this->input->post('dept_name');
        $dept_phone      =  $this->input->post('dept_phone');
      }else if($type=='other_dept')
      {
            $client_name     =  $this->input->post('client_name');
            $client_contact  =  $this->input->post('client_contact');
            $dept_name       =  $this->input->post('dept_name');
            $dept_phone      =  $this->input->post('dept_phone');
            $client_cnic     =  $this->input->post('client_cnic');
            $client_address  =  $this->input->post('client_address');
      }

$clientInfo  = [
        'client_name'          => ucwords($client_name),
        'client_contact'       => $client_contact,
        'dept_name'            => $dept_name,
        'dept_phone'           => $dept_phone,
        'type'                 => $type,
        'client_cnic'          => $client_cnic,
        'client_address'       => $client_address,
        'client_vil_uc_area'   => $this->input->post('client_vil_uc_area'),
        'referred_by'          => $this->input->post('referred_by'),
        'district_id'          => $this->input->post('district_id'),
        'tehsil_id'            => $this->input->post('tehsil_id'),
        'created_by'           => $this->session->userdata('user')['user_id'],
    ];
 $res = $this->API_m->singleRecord('client_info',['client_cnic'=>$client_cnic]);
  $client_id = '';
if(empty($res))
{
 $client_id = $this->API_m->create('client_info',$clientInfo);
}else
{
    $this->API_m->updateRecord('client_info',['client_id' => $res->client_id],$clientInfo);
    $client_id = $res->client_id;
}


            $TestInfo = [
                'tracking_id'       => $trackingID,
                'test_id'           => $test_id,
                'sample_id'         => $this->input->post('sample_id'),
                'sample_desc'       => $this->input->post('sample_desc'),
                'client_id'         => $client_id,
                'cattle_name'       => $this->input->post('cattle_name'),
                'cattle_tag_no'     => $this->input->post('cattle_tag_no'),
                'cattle_sex'        => $this->input->post('cattle_sex'),
                'cattle_year'       => $this->input->post('cattle_year'),
                'cattle_month'      => $this->input->post('cattle_month'),
                'sender_name'       => $this->input->post('sender_name'),
                'sender_designation'=> $this->input->post('sender_designation'),
                'cattle_breed'      => $this->input->post('cattle_breed'),
                'cattle_total_no'   => $this->input->post('cattle_total_no'),
                'cows_no'           => $this->input->post('cows_no'),
                'buffalos_no'       => $this->input->post('buffalos_no'),
                'goat_no'           => $this->input->post('goat_no'),
                'sheep_no'          => $this->input->post('sheep_no'),
                'test_total_fee'    => $this->input->post('test_total_fee'),
                'symptoms_info'     => $this->input->post('symptoms_info'),
                'house_hold_or_farm_info'   => $this->input->post('house_hold_or_farm_info'),
                'additional_info'   => $this->input->post('additional_info'),
                'received_date'     => date('Y-m-d',strtotime($this->input->post('received_date'))),
                'created_by'        => $this->session->userdata('user')['user_id'],
            ];
        $TestInfo_id = $this->API_m->create('testdetails',$TestInfo);
        if($tests->testHelp_id==1)
        {
            $ImpressionSmear = [
                'testDetails_id'   =>  $TestInfo_id,
                'type_specimen'    =>  $this->input->post('type_specimen'),
                'animals_specimen' =>  $this->input->post('animals_specimen'),
                'examined_for'     =>  $this->input->post('examined_for'),
                'result'           =>  $this->input->post('result'),
                'remarks'          =>  $this->input->post('remarks'),
                'examined_by'      =>  $this->input->post('examined_by'),
                'created_by'       =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('impression_smear',$ImpressionSmear);
            
        }else if($tests->testHelp_id==2)
        {
            $haematology = [
                'testDetails_id' =>  $TestInfo_id,
                'WBC'            => $this->input->post('WBC'),
                'lymph1'         => $this->input->post('lymph1'),   
                'mon1'           => $this->input->post('mon1'),
                'gran1'          => $this->input->post('gran1'),
                'lymph2'         => $this->input->post('lymph2'),    
                'mon2'           => $this->input->post('mon2'),
                'gran2'          => $this->input->post('gran2'),
                'RBC'            => $this->input->post('RBC'),
                'HGB'            => $this->input->post('HGB'),
                'HCT'            => $this->input->post('HCT'),
                'MCV'            => $this->input->post('MCV'),
                'MCH'            => $this->input->post('MCH'),
                'MCHC'           => $this->input->post('MCHC'),
                'RDW'            => $this->input->post('RDW'),
                'PLT'            => $this->input->post('PLT'),
                'MPV'            => $this->input->post('MPV'),
                'PDW'            => $this->input->post('PDW'),
                'PCT'            => $this->input->post('PCT'),
                'created_by'     => $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('haematology',$haematology);
        }else if($tests->testHelp_id==3)
        {
            $Mastitis = [
                'testDetails_id'                 => $TestInfo_id,
                'daily_milk_production'          => $this->input->post('daily_milk_production'),
                'lactation_no'                   => $this->input->post('lactation_no'),
                'total_animals_at_farm'          => $this->input->post('total_animals_at_farm'),
                'in_milk'                        => $this->input->post('in_milk'),
                'dry_period_given'               => $this->input->post('dry_period_given'),
                'cal_kid_lambing_date'           => $this->input->post('cal_kid_lambing_date'),
                'prev_mastatis_rec_of_anim'      => $this->input->post('prev_mastatis_rec_of_anim'),
                'prev_mastatis_rec_of_farm'      => $this->input->post('prev_mastatis_rec_of_farm'),
                'prac_mastatis_test_at_farm'     => $this->input->post('prac_mastatis_test_at_farm'),
                'refer_to_bacteriology_sec_for'  => $this->input->post('refer_to_bacteriology_sec_for'),
                'result_status'                  => '',
                'created_by'                     => $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('mastitis',$Mastitis);
        }else if($tests->testHelp_id==4)
        {
            $culture_sensitivity = [
                'testDetails_id'     => $TestInfo_id,
                'amipicilin'                   => $this->input->post('amipicilin'),
                'norfloxacin'                  => $this->input->post('norfloxacin'),
                'ampiclox'                     => $this->input->post('ampiclox'),
                'kanamycin'                    => $this->input->post('kanamycin'),
                'toramycin'                    => $this->input->post('toramycin'),
                'lincomycin'                   => $this->input->post('lincomycin'),
                'chlorampherical'              => $this->input->post('chlorampherical'),
                'flumiquine'                   => $this->input->post('flumiquine'),
                'cloacilin'                    => $this->input->post('cloacilin'),
                'ciprofloxacin'                => $this->input->post('ciprofloxacin'),
                'neomycin'                     => $this->input->post('neomycin'),
                'negram'                       => $this->input->post('negram'),
                'cephradin'                    => $this->input->post('cephradin'),
                'oxytetracyclin'               => $this->input->post('oxytetracyclin'),
                'cephradin'                    => $this->input->post('cephradin'),
                'penicillin'                   => $this->input->post('penicillin'),
                'doxyeyclin'                   => $this->input->post('doxyeyclin'),
                'polymixin'                    => $this->input->post('polymixin'),
                'erythromycin'                 => $this->input->post('erythromycin'),
                'sulphamethoxazoe'             => $this->input->post('sulphamethoxazoe'),
                'amoxicillin'                  => $this->input->post('amoxicillin'),
                'streptomycin'                 => $this->input->post('streptomycin'),
                'enrofloxacin'                 => $this->input->post('enrofloxacin'),
                'urixin'                       => $this->input->post('urixin'),
                'gentamicin'                   => $this->input->post('gentamicin'),
                'augmentin'                    => $this->input->post('augmentin'),
                'ofloxacinl'                   => $this->input->post('ofloxacinl'),
                'fLoramphenical'               => $this->input->post('fLoramphenical'),
                'cefotaxime_Clavulanic_acid'   => $this->input->post('cefotaxime_Clavulanic_acid'),
                'tylosin'                      => $this->input->post('tylosin'),
                'sulfamethoxazole'             => $this->input->post('sulfamethoxazole'),
                'sulfamethoxazoleTrimethoprim' => $this->input->post('sulfamethoxazoleTrimethoprim'),
                'doxycycline'                  => $this->input->post('doxycycline'),
                'tilmicosin'                   => $this->input->post('tilmicosin'),
                'reports'                      => $this->input->post('reports'),
                'created_by'                   => $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('culture_sensitivity',$culture_sensitivity);
        }else if($tests->testHelp_id==5)
        {
            $urine_examination = [
                'testDetails_id'   =>  $TestInfo_id,
                'colour'           => $this->input->post('colour'),
                'pus_cell'         => $this->input->post('pus_cell'),
                'appearance'       => $this->input->post('appearance'),
                'epithelial_cell'  => $this->input->post('epithelial_cell'),
                'leukocytes'       => $this->input->post('leukocytes'),
                'rb_cs'            => $this->input->post('rb_cs'),
                'nitrite'          => $this->input->post('nitrite'),
                'casts'            => $this->input->post('casts'),
                'urobilinogen'     => $this->input->post('urobilinogen'),
                'crystals'         => $this->input->post('crystals'),
                'protein'          => $this->input->post('protein'),
                'amorphous'        => $this->input->post('amorphous'),
                'ph'               => $this->input->post('ph'),
                'parasites'        => $this->input->post('parasites'),
                'blood'            => $this->input->post('blood'),
                'bacteria'         => $this->input->post('bacteria'),
                'specific_gravity' => $this->input->post('specific_gravity'),
                'yeastFungi'       => $this->input->post('yeastFungi'),
                'ketone_bodies'    => $this->input->post('ketone_bodies'),
                'bilirubin'        => $this->input->post('bilirubin'),
                'glucose'          => $this->input->post('glucose'),
                'created_by'       =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('urine_examination',$urine_examination);
        }else if($tests->testHelp_id==6)
        {
            $mrt = [
                'testDetails_id'           =>  $TestInfo_id,
                'parity'                   =>  $this->input->post('parity'),
                'vac_against_brucellosis'  =>  $this->input->post('vac_against_brucellosis'),
                'abortion_history'         =>  $this->input->post('abortion_history'),
                'result_status'            =>  '',
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('mrt',$mrt);
        }
        else if($tests->testHelp_id==7)
        {
             $rbpt = [
                'testDetails_id'           =>  $TestInfo_id,
                'parity'                   =>  $this->input->post('parity'),
                'vac_against_brucellosis'  =>  $this->input->post('vac_against_brucellosis'),
                'result_status'            =>  '',
                'abortion_history'         =>  $this->input->post('abortion_history'),
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('rbpt',$rbpt);
        }
        else if($tests->testHelp_id==8)
        {
             $spat_human = [
                'testDetails_id'           =>  $TestInfo_id,
                'brucella_abortus_20'      =>  $this->input->post('brucella_abortus_20'),
                'brucella_abortus_40'      =>  $this->input->post('brucella_abortus_40'),
                'brucella_abortus_80'      =>  $this->input->post('brucella_abortus_80'),
                'brucella_abortus_160'     =>  $this->input->post('brucella_abortus_160'),
                'brucella_abortus_320'     =>  $this->input->post('brucella_abortus_320'),
                'brucella_meletensis_20'   =>  $this->input->post('brucella_meletensis_20'),
                'brucella_meletensis_40'   =>  $this->input->post('brucella_meletensis_40'),
                'brucella_meletensis_80'   =>  $this->input->post('brucella_meletensis_80'),
                'brucella_meletensis_160'  =>  $this->input->post('brucella_meletensis_160'),
                'brucella_meletensis_320'  =>  $this->input->post('brucella_meletensis_320'),
                'clinical_sign'            =>  $this->input->post('clinical_sign'),
                'animal_contact'           =>  $this->input->post('animal_contact'),
                'treatment_used'           =>  $this->input->post('treatment_used'),
                'result_status'            =>  '',
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('spat_human',$spat_human);
        }
        else if($tests->testHelp_id==9)
        {
             $tst = [
                'testDetails_id'  => $TestInfo_id,
                'A_1st'           => $this->input->post('A_1st'),
                'A_2nd'           => $this->input->post('A_2nd'),
                'A_result'        => $this->input->post('A_result'),
                'M_1st'           => $this->input->post('M_1st'),
                'M_2nd'           => $this->input->post('M_2nd'),
                'M_result'        => $this->input->post('M_result'),
            ];
         $this->API_m->create('tuberculin_skin_test',$tst);
        } else if($tests->testHelp_id==10)
        {
             $water_bacteriology = [
               'testDetails_id'   =>  $TestInfo_id,
                'type_specimen'    =>  $this->input->post('type_specimen'),
                'animals_specimen' =>  $this->input->post('animals_specimen'),
                'examined_for'     =>  $this->input->post('examined_for'),
                'result'           =>  $this->input->post('result'),
                'remarks'          =>  $this->input->post('remarks'),
                'examined_by'      =>  $this->input->post('examined_by'),
                'created_by'       =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('water_bacteriology',$water_bacteriology);
        } else if($tests->testHelp_id==11)
        {
             $acid_fast_staining = [
                'testDetails_id'        =>  $TestInfo_id,
                'afs_lab_findings'      => $this->input->post('afs_lab_findings'),
                'daily_milk_production' => $this->input->post('daily_milk_production'),
                'parity'                => $this->input->post('parity'),
                'afs_remarks'           => '',
            ];
         $this->API_m->create('acid_fast_staining',$acid_fast_staining);
        }
        else if($tests->testHelp_id==12)
        {
             $elisa_human = [
                'testDetails_id'           =>  $TestInfo_id,
                'clinical_sign'            =>  $this->input->post('clinical_sign'),
                'animal_contact'           =>  $this->input->post('animal_contact'),
                'treatment_used'           =>  $this->input->post('treatment_used'),
                'result_status'            =>  '',
                // 'intibody_index'           =>  '',
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('elisa_human',$elisa_human);
        } 
        else if($tests->testHelp_id==13)
        {
             $elisa_animal = [
                'testDetails_id'           =>  $TestInfo_id,
                'parity'                   =>  $this->input->post('parity'),
                'vac_against_brucellosis'  =>  $this->input->post('vac_against_brucellosis'),
                'result_status'            =>  '',
                'abortion_history'         =>  $this->input->post('abortion_history'),
                // 'antibody_index'           =>  '',
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('elisa_animal',$elisa_animal);
        } 
        else if($tests->testHelp_id==14)
        {
             $pcr_human = [
                'testDetails_id'           =>  $TestInfo_id,
                'clinical_sign'            =>  $this->input->post('clinical_sign'),
                'animal_contact'           =>  $this->input->post('animal_contact'),
                'treatment_used'           =>  $this->input->post('treatment_used'),
                'result_status'            =>  '',
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('pcr_human',$pcr_human);
        }
         else if($tests->testHelp_id==15)
        {
             $pcr_animal = [
                'testDetails_id'           =>  $TestInfo_id,
                'parity'                   =>  $this->input->post('parity'),
                'vac_against_brucellosis'  =>  $this->input->post('vac_against_brucellosis'),
                'result_status'            =>  '',
                'abortion_history'         =>  $this->input->post('abortion_history'),
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->create('pcr_animal',$pcr_animal);
        }

          $this->session->set_flashdata('Msg', ' Record Added Successfull');
          redirect('Tests/quick_test_receipt/'.$TestInfo_id);

    }


    public function update_testDetails_Record()
    {
         // echo "<pre>";
         // print_r($_POST);
         // exit();
         $testDetails_id        = $this->input->post('testDetails_id');
         $client_id             = $this->input->post('client_id');
         $test_id               = $this->input->post('test_id');

      // $type           = $this->input->post('client_type');
      // $dept_name      = '';
      // $dept_phone     = '';
      // $client_name    = '';
      // $client_cnic    = '';
      // $client_address = '';
      // $client_contact = '';
//       if($type=='farmer')
//       { 
//         $client_name     =  $this->input->post('client_name');
//         $client_contact  =  $this->input->post('client_contact');
//         $client_cnic     =  $this->input->post('client_cnic');
//         $client_address  =  $this->input->post('client_address');
//       }else if($type=='own_dept')
//       {
//         $dept_name       =  $this->input->post('dept_name');
//         $dept_phone      =  $this->input->post('dept_phone');
//       }else if($type=='other_dept')
//       {
//             $client_name     =  $this->input->post('client_name');
//             $client_contact  =  $this->input->post('client_contact');
//             $dept_name       =  $this->input->post('dept_name');
//             $dept_phone      =  $this->input->post('dept_phone');
//             $client_cnic     =  $this->input->post('client_cnic');
//             $client_address  =  $this->input->post('client_address');
//       }
// $clientInfo  = [
//         'client_name'      => $client_name,
//         'client_contact'   => $client_contact,
//         'dept_name'        => $dept_name,
//         'dept_phone'       => $dept_phone,
//         'type'             => $type,
//         'client_cnic'      => $client_cnic,
//         'client_address'   => $client_address,
//         'referred_by'      => $this->input->post('referred_by'),
//         'district_id'      => $this->input->post('district_id'),
//         'tehsil_id'        => $this->input->post('tehsil_id'),
//         'created_by'       => $this->session->userdata('user')['user_id'],
//     ];
   
   // $this->API_m->updateRecord('client_info',['client_id' => $client_id],$clientInfo);
            $TestInfo = [
                'test_id'          => $test_id,
                // 'client_id'        => $client_id,
                // 'sample_id'        => $this->input->post('sample_id'),
                // 'sample_desc'      => $this->input->post('sample_desc'),
                // 'cattle_name'      => $this->input->post('cattle_name'),
                // 'cattle_tag_no'    => $this->input->post('cattle_tag_no'),
                // 'cattle_sex'       => $this->input->post('cattle_sex'),
                // 'cattle_age'       => $this->input->post('cattle_age'),
                // 'cattle_breed'     => $this->input->post('cattle_breed'),
                // 'cattle_total_no'  => $this->input->post('cattle_total_no'),
                // 'test_total_fee'   => $this->input->post('test_total_fee'),
                // 'additional_info'  => $this->input->post('additional_info'),
                // 'received_date'    => date('Y-m-d',strtotime($this->input->post('received_date'))),
                'disease_found'    => $this->input->post('disease_found'),
                'disease_name'     => $this->input->post('disease_name'),
                'recommendations'  => $this->input->post('recommendations'),
                'examined_by'      => $this->input->post('examined_by'),
                'examined_by_desi' => $this->input->post('examined_by_desi'),
                'result_date'      => date('Y-m-d',strtotime($this->input->post('result_date'))),
                'modified_date'    => date('Y-m-d H:i:s'),
                'created_by'       => $this->session->userdata('user')['user_id'],
            ];
            $this->API_m->updateRecord('testdetails',['testDetails_id' => $testDetails_id],$TestInfo);
            $rs = $this->API_m->singleRecord('tests',['test_id' => $test_id]);
            $testHelp_id = $rs->testHelp_id;
            // echo "<pre>";
            // echo $this->input->post('afs_lab_findings');;
            // print_r($rs);
            // exit();
      if($testHelp_id==1)
        {
            $impression_smear_id   = $this->input->post('impression_smear_id');
            $ImpressionSmear = [
                'testDetails_id'   =>  $testDetails_id,
                'examined_for'     =>  $this->input->post('examined_for'),
                'result'           =>  $this->input->post('result'),
                'remarks'          =>  $this->input->post('recommendations'),
                'examined_by'      =>  $this->input->post('examined_by'),
                'created_by'       =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->updateRecord('impression_smear',['impression_smear_id' => $impression_smear_id],$ImpressionSmear);
            
        } else if($testHelp_id==10)
        {
            $water_bacteriology_id   = $this->input->post('water_bacteriology_id');
            $water_bacteriology = [
                'testDetails_id'   =>  $testDetails_id,
                'result'           =>  $this->input->post('result'),
                'remarks'          =>  $this->input->post('recommendations'),
                'examined_by'      =>  $this->input->post('examined_by'),
                'created_by'       =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->updateRecord('water_bacteriology',['water_bacteriology_id' => $water_bacteriology_id],$water_bacteriology);
            
        }
        else if($testHelp_id==2)
        {
            $haematology_id   = $this->input->post('haematology_id');
            $haematology = [
                'testDetails_id' =>  $testDetails_id,
                'WBC'            => $this->input->post('WBC'),
                'lymph1'         => $this->input->post('lymph1'),   
                'mon1'           => $this->input->post('mon1'),
                'gran1'          => $this->input->post('gran1'),
                'lymph2'         => $this->input->post('lymph2'),    
                'mon2'           => $this->input->post('mon2'),
                'gran2'          => $this->input->post('gran2'),
                'RBC'            => $this->input->post('RBC'),
                'HGB'            => $this->input->post('HGB'),
                'HCT'            => $this->input->post('HCT'),
                'MCV'            => $this->input->post('MCV'),
                'MCH'            => $this->input->post('MCH'),
                'MCHC'           => $this->input->post('MCHC'),
                'RDW'            => $this->input->post('RDW'),
                'PLT'            => $this->input->post('PLT'),
                'MPV'            => $this->input->post('MPV'),
                'PDW'            => $this->input->post('PDW'),
                'PCT'            => $this->input->post('PCT'),
                'created_by'     => $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->updateRecord('haematology',['haematology_id' => $haematology_id],$haematology);
        }else if($testHelp_id==3)
        {
            $mastitis_id   = $this->input->post('mastitis_id');
            $Mastitis = [
                'testDetails_id'                => $testDetails_id,
                'result_status'                 => $this->input->post('result_status'),
                'neg_ph'                        => $this->input->post('neg_ph'),
                'neg_ssc'                       => $this->input->post('neg_ssc'),
                'neg_gross_appearance'          => $this->input->post('neg_gross_appearance'),
                'refer_to_bacteriology_sec_for' => $this->input->post('refer_to_bacteriology_sec_for'),
                'clinical_or_sub'               => $this->input->post('clinical_or_sub'),
                'composite_or_ind'              => $this->input->post('composite_or_ind'),
                'clinical_gross_appearance'     => $this->input->post('clinical_gross_appearance'),
                'quarters'                      => $this->input->post('quarters'),
                'mastitis_severity'             => $this->input->post('mastitis_severity'),
                'milk_ph'                       => $this->input->post('milk_ph'),
                's_c_c'                         => $this->input->post('s_c_c'),
                'gross_appearance'              => $this->input->post('gross_appearance'),
                'mastitis_r1'                   => $this->input->post('mastitis_r1'),
                'milk_ph_r1'                    => $this->input->post('milk_ph_r1'),
                's_c_c_r1'                      => $this->input->post('s_c_c_r1'),
                'gross_appearance_r1'           => $this->input->post('gross_appearance_r1'),
                'mastitis_r2'                   => $this->input->post('mastitis_r2'),
                'milk_ph_r2'                    => $this->input->post('milk_ph_r2'),
                's_c_c_r2'                      => $this->input->post('s_c_c_r2'),
                'gross_appearance_r2'           => $this->input->post('gross_appearance_r2'),
                'mastitis_l1'                   => $this->input->post('mastitis_l1'),
                'milk_ph_l1'                    => $this->input->post('milk_ph_l1'),
                's_c_c_l1'                      => $this->input->post('s_c_c_l1'),
                'gross_appearance_l1'           => $this->input->post('gross_appearance_l1'),
                'mastitis_l2'                   => $this->input->post('mastitis_l2'),
                'milk_ph_l2'                    => $this->input->post('milk_ph_l2'),
                's_c_c_l2'                      => $this->input->post('s_c_c_l2'),
                'gross_appearance_l2'           => $this->input->post('gross_appearance_l2'),
            ];
         $this->API_m->updateRecord('mastitis',['mastitis_id' => $mastitis_id],$Mastitis);
        }else if($testHelp_id==4)
        {
            $culture_sensitivity_id   = $this->input->post('culture_sensitivity_id');
            $culture_sensitivity = [
                'testDetails_id'               => $testDetails_id,
                'amipicilin'                   => $this->input->post('amipicilin'),
                'norfloxacin'                  => $this->input->post('norfloxacin'),
                'ampiclox'                     => $this->input->post('ampiclox'),
                'kanamycin'                    => $this->input->post('kanamycin'),
                'toramycin'                    => $this->input->post('toramycin'),
                'lincomycin'                   => $this->input->post('lincomycin'),
                'chlorampherical'              => $this->input->post('chlorampherical'),
                'flumiquine'                   => $this->input->post('flumiquine'),
                'cloacilin'                    => $this->input->post('cloacilin'),
                'ciprofloxacin'                => $this->input->post('ciprofloxacin'),
                'neomycin'                     => $this->input->post('neomycin'),
                'negram'                       => $this->input->post('negram'),
                'cephradin'                    => $this->input->post('cephradin'),
                'oxytetracyclin'               => $this->input->post('oxytetracyclin'),
                'cephradin'                    => $this->input->post('cephradin'),
                'penicillin'                   => $this->input->post('penicillin'),
                'doxyeyclin'                   => $this->input->post('doxyeyclin'),
                'polymixin'                    => $this->input->post('polymixin'),
                'erythromycin'                 => $this->input->post('erythromycin'),
                'sulphamethoxazoe'             => $this->input->post('sulphamethoxazoe'),
                'amoxicillin'                  => $this->input->post('amoxicillin'),
                'streptomycin'                 => $this->input->post('streptomycin'),
                'enrofloxacin'                 => $this->input->post('enrofloxacin'),
                'urixin'                       => $this->input->post('urixin'),
                'gentamicin'                   => $this->input->post('gentamicin'),
                'augmentin'                    => $this->input->post('augmentin'),
                'ofloxacinl'                   => $this->input->post('ofloxacinl'),
                'fLoramphenical'               => $this->input->post('fLoramphenical'),
                'cefotaxime_Clavulanic_acid'   => $this->input->post('cefotaxime_Clavulanic_acid'),
                'tylosin'                      => $this->input->post('tylosin'),
                'sulfamethoxazole'             => $this->input->post('sulfamethoxazole'),
                'sulfamethoxazoleTrimethoprim' => $this->input->post('sulfamethoxazoleTrimethoprim'),
                'doxycycline'                  => $this->input->post('doxycycline'),
                'tilmicosin'                   => $this->input->post('tilmicosin'),
                'reports'                      => $this->input->post('reports'),
            ];
         $this->API_m->updateRecord('culture_sensitivity',['culture_sensitivity_id' => $culture_sensitivity_id],$culture_sensitivity);
        }else if($testHelp_id==5)
        {
            $urine_id   = $this->input->post('urine_id');
            $urine_examination = [
                'testDetails_id'   =>  $testDetails_id,
                'colour'           => $this->input->post('colour'),
                'pus_cell'         => $this->input->post('pus_cell'),
                'appearance'       => $this->input->post('appearance'),
                'epithelial_cell'  => $this->input->post('epithelial_cell'),
                'leukocytes'       => $this->input->post('leukocytes'),
                'rb_cs'            => $this->input->post('rb_cs'),
                'nitrite'          => $this->input->post('nitrite'),
                'casts'            => $this->input->post('casts'),
                'urobilinogen'     => $this->input->post('urobilinogen'),
                'crystals'         => $this->input->post('crystals'),
                'protein'          => $this->input->post('protein'),
                'amorphous'        => $this->input->post('amorphous'),
                'ph'               => $this->input->post('ph'),
                'parasites'        => $this->input->post('parasites'),
                'blood'            => $this->input->post('blood'),
                'bacteria'         => $this->input->post('bacteria'),
                'specific_gravity' => $this->input->post('specific_gravity'),
                'yeastFungi'       => $this->input->post('yeastFungi'),
                'ketone_bodies'    => $this->input->post('ketone_bodies'),
                'bilirubin'        => $this->input->post('bilirubin'),
                'glucose'          => $this->input->post('glucose'),
            ];
         $this->API_m->updateRecord('urine_examination',['urine_id' => $urine_id],$urine_examination);
        }else if($testHelp_id==6)
        {
            $mrt_id   = $this->input->post('mrt_id');
               $mrt = [
                'testDetails_id'           =>  $testDetails_id,
                'result_status'            =>  $this->input->post('result_status'),
            ];
          $this->API_m->updateRecord('mrt',['mrt_id' => $mrt_id],$mrt);
        }
        else if($testHelp_id==7)
        {
            $rbpt_id   = $this->input->post('rbpt_id');
               $rbpt = [
                'testDetails_id'           =>  $testDetails_id,
                'result_status'            =>  $this->input->post('result_status'),
            ];
          $this->API_m->updateRecord('rbpt',['rbpt_id' => $rbpt_id],$rbpt);
        }
        else if($testHelp_id==8)
        {
            $spat_human_id   = $this->input->post('spat_human_id');
             $spat_human = [
                'testDetails_id'           =>  $testDetails_id,
                'brucella_abortus_20'      =>  $this->input->post('brucella_abortus_20'),
                'brucella_abortus_40'      =>  $this->input->post('brucella_abortus_40'),
                'brucella_abortus_80'      =>  $this->input->post('brucella_abortus_80'),
                'brucella_abortus_160'     =>  $this->input->post('brucella_abortus_160'),
                'brucella_abortus_320'     =>  $this->input->post('brucella_abortus_320'),
                'brucella_meletensis_20'   =>  $this->input->post('brucella_meletensis_20'),
                'brucella_meletensis_40'   =>  $this->input->post('brucella_meletensis_40'),
                'brucella_meletensis_80'   =>  $this->input->post('brucella_meletensis_80'),
                'brucella_meletensis_160'  =>  $this->input->post('brucella_meletensis_160'),
                'brucella_meletensis_320'  =>  $this->input->post('brucella_meletensis_320'),
                'result_status'            =>  $this->input->post('result_status'),
                'created_by'               =>  $this->session->userdata('user')['user_id'],
            ];
         $this->API_m->updateRecord('spat_human',['spat_human_id' => $spat_human_id],$spat_human);
        }
        else if($testHelp_id==9)
        {
            $tst_id   = $this->input->post('tst_id');
             $tst = [
                'testDetails_id'  => $testDetails_id,
                'A_1st'           => $this->input->post('A_1st'),
                'A_2nd'           => $this->input->post('A_2nd'),
                'A_result'        => $this->input->post('A_result'),
                'M_1st'           => $this->input->post('M_1st'),
                'M_2nd'           => $this->input->post('M_2nd'),
                'M_result'        => $this->input->post('M_result'),
            ];
         $this->API_m->updateRecord('tuberculin_skin_test',['tst_id' => $tst_id],$tst);
        }
        else if($testHelp_id==11)
        {
            $afs_id   = $this->input->post('afs_id');
             $acid_fast_staining = [
                'testDetails_id'   => $testDetails_id,
                // 'afs_parity'       => $this->input->post('afs_parity'),
                'afs_lab_findings' => $this->input->post('afs_lab_findings'),
                'afs_remarks'      => $this->input->post('recommendations'),
            ];
         $this->API_m->updateRecord('acid_fast_staining',['afs_id' => $afs_id],$acid_fast_staining);
        } else if($testHelp_id==12)
        {
            $elisa_human_id   = $this->input->post('elisa_human_id');
                 $elisa_human = [
                'testDetails_id'           =>  $testDetails_id,
                'result_status'            =>  $this->input->post('result_status'),
                'intibody_index'           =>  $this->input->post('antibody_index'),
            ];
         $this->API_m->updateRecord('elisa_human',['elisa_human_id' => $elisa_human_id],$elisa_human);
        } 
         else if($testHelp_id==13)
        {
            $elisa_animal_id   = $this->input->post('elisa_animal_id');
                 $elisa_animal = [
                'testDetails_id'           =>  $testDetails_id,
                'result_status'            =>  $this->input->post('result_status'),
                'antibody_index'           =>  $this->input->post('antibody_index'),
            ];
         $this->API_m->updateRecord('elisa_animal',['elisa_animal_id' => $elisa_animal_id],$elisa_animal);
        }else if($testHelp_id==14)
        {
            $pcr_human_id   = $this->input->post('pcr_human_id');
                 $pcr_human = [
                'testDetails_id'           =>  $testDetails_id,
                'result_status'            =>  $this->input->post('result_status'),
            ];
         $this->API_m->updateRecord('pcr_human',['pcr_human_id' => $pcr_human_id],$pcr_human);
        }
        else if($testHelp_id==15)
        {
            $pcr_animal_id   = $this->input->post('pcr_animal_id');
                 $pcr_animal = [
                'testDetails_id'           =>  $testDetails_id,
                'result_status'            =>  $this->input->post('result_status'),
            ];
         $this->API_m->updateRecord('pcr_animal',['pcr_animal_id' => $pcr_animal_id],$pcr_animal);
        }

$data = [
        'post_status'   =>  1,
        'posted_date'   =>  date('Y-m-d'),
    ];  
          $this->API_m->updateRecord('testdetails',['testDetails_id' => $testDetails_id],$data);
          $this->session->set_flashdata('Msg', ' Record Saved Successfully');
          redirect('Tests/singleTestDetailRecord/'.$testDetails_id);
    }


    public function TestRecordCancel()
    {
         // echo "<pre>";
         // print_r($_POST);
         // exit();
         $testDetails_id        = $this->input->post('testDetails_id');
         $uri                   = $this->input->post('uri');
         $data = [
                'is_cancel'          =>  1,
                'cancel_reason'      =>  $this->input->post('cancel_reason'),
                'cancel_by'          =>  $this->session->userdata('user')['user_id'],
            ];
        $this->API_m->updateRecord('testdetails',['testDetails_id' => $testDetails_id],$data);
        $this->session->set_flashdata('Msg', ' Record Cancelled Successfully');
         redirect('Tests/singleTestDetailRecord/'.$testDetails_id);   
    }
    // public function TestRecordPost()
    // {
    //      // echo "<pre>";
    //      // print_r($_POST);
    //      // exit();
    //      $testDetails_id        = $this->input->post('testDetails_id');
    //      $uri                   = $this->input->post('uri');
    //      $data = [
    //             'post_status'   =>  1,
    //             'posted_date'   =>  date('Y-m-d'),
    //         ];
    //     $this->API_m->updateRecord('testdetails',['testDetails_id' => $testDetails_id],$data);
    //     $this->session->set_flashdata('Msg', ' Record Posted Successfully');
    //      redirect('Tests/singleTestDetailRecord/'.$testDetails_id);   
    // }


}

 ?>