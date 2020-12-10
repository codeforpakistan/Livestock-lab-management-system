<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
		function __construct()
		{
			parent::__construct();
            $config['operation']       = 'addition';
            $config['question_format'] = 'numeric';
            $config['answer_format']   = 'numeric';
            $this->mathcaptcha->init();
			date_default_timezone_set('Asia/Karachi');
           
		}
	 public function index()
	 {
	 	// $data['comInfo']     = $this->Login_m->singleRow('settings');
         $data['math_captcha_question'] = $this->mathcaptcha->get_question();
         $this->form_validation->set_rules('captcha', 'Answer', 'required|callback__check_math_captcha');
     
         if ($this->form_validation->run() == FALSE)
         {
            $this->load->view('login',$data);
         }
         else
         {
             $this->load->view('login',$data);
         }
	 	
	 }
     public function user_labs_selection()
     {
        if(empty($this->session->userdata('temp')))
        {
            redirect('Login/logout');
        }
        $temp_user_id  = $this->session->userdata('temp')['user_id'];
        $data['labs']  = $this->Login_m->getDesireLabList($temp_user_id);
        $labs          = $this->Login_m->getDesireLabList($temp_user_id);
        $count         = count($labs);
        $lab_id        =  '';
$role                  = $this->API_m->singleRecord('users',['user_id'=>$temp_user_id]);
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role->user_role]); 
if($permissions[0]->show_all == 1 && $permissions[1]->show_all==1  && $permissions[2]->show_all==1  && $permissions[3]->show_all==1 && $permissions[4]->show_all==1)
{
    $lab_id = $labs[0]->ul_lab_id;
    redirect('Login/AdminVerify/'.$lab_id);
}else if($count==1)
{
     $lab_id = $labs[0]->ul_lab_id;
    redirect('Login/AdminVerify/'.$lab_id);
}else
{

    $this->load->view('user_labs_selection',$data);
}
        // echo "<pre>"."<br>";
        // echo $count;
        // echo "<pre>"."<br>";
        // print_r($labs[0]->ul_lab_id);
        // exit();
     }
     public function check_labs_selection()
     {
        // echo "<pre>";
        // print_r($_POST);
        // exit();       
        if($this->input->post('submit')) {

// $this->form_validation->set_rules('admin_email', 'Username', 'required|xss_clean|trim|htmlspecialchars|min_length[5]|max_length[15]|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
// $this->form_validation->set_rules('admin_pass', 'Password', 'required|xss_clean|trim|htmlspecialchars|min_length[5]|max_length[15]|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

        $this->form_validation->set_rules('captcha', 'Answer', 'required|callback__check_math_captcha');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->form_validation->run() === FALSE) {
// echo "if statement";
// exit();   
                // unset($this->session->userdata);
                // $data['captcha_question'] = $this->mathcaptcha->get_question();
                $this->session->set_flashdata('Msg', 'You Entered Wrong Captcha');
                redirect('Login/index');
            } else {
// echo "else statement";
// exit();
        $email        = $this->input->post('admin_email');
        $password     = $this->input->post('admin_pass');
        $condition = [
            'user_email' => $email,
            
        ];
       $returnedData = $this->Login_m->singleRecordArray('users', $condition);
            $size = sizeof($returnedData);
        if ($size == 1) {
            foreach ($returnedData as $user) {
                // ($this->password->verify_hash
                if ($this->password->verify_hash($password,$user->user_password)) {
                    if($user->is_block==1)
                    {
                        $this->session->set_flashdata('Msg', 'Your account has been blocked by Admin');
                        redirect('Login/index');
                    }
                        $sessionData = [
                            'user_id'     => $user->user_id,
                            'username'    => $user->user_name,
                            'email'       => $user->user_email,
                            'password'    => $password,
                        ];
                  
                    $this->session->set_userdata('temp', $sessionData);
                    $this->session->set_flashdata('Msg', 'Select Your Lab');
                    redirect('Login/user_labs_selection');
                } else {
                    $this->session->set_flashdata('Msg', 'Wrong Credentials!');
                    redirect('Login/index');
                }
            }
        } 
        else {
            $this->session->set_flashdata('Msg', 'Wrong Credentials!');
            redirect('Login');
        }
} 
}else {
    // echo "login out";
    // exit();
    $this->session->set_flashdata('Msg', 'Wrong Credentials!');
    redirect('Login/index');
}
     }


	

// verifying user credientials
	public function AdminVerify($id='') {
		// echo "<pre>";
		// print_r($_POST);
		// exit();
       
        $email        = $this->session->userdata('temp')['email'];
        $password     = $this->session->userdata('temp')['password'];
        $lab_id       = '';
        if(empty($id))
        {
            $lab_id       = $this->input->post('lab_id');
        }else
        {
            $lab_id       = $id;
        }
        $condition = [
            'user_email' => $email,
            
        ];
      
        $returnedData = $this->Login_m->singleRecordArray('users', $condition);
        // echo "<pre>";
        // print_r($returnedData);
        // exit();
        $size = sizeof($returnedData);
        if ($size == 1) {
            foreach ($returnedData as $user) {
            	// ($this->password->verify_hash
                if ($this->password->verify_hash($password,$user->user_password)) {
                    if($user->is_block==1)
                    {
                        $this->session->set_flashdata('Msg', 'Your account has been blocked by Admin');
                        redirect('Login/index');
                    }
                        $sessionData = [
                            'user_id'     => $user->user_id,
                            'username'    => $user->user_name,
                            'lab_id'      => $lab_id,
                            'center_id'   => $user->center_station_id,
                            'email'       => $user->user_email,
                            'role'        => $user->user_role
                        ];

unset($_SESSION['temp']);
                    $this->session->set_userdata('user', $sessionData);
// echo "<pre>";
// print_r($this->session->userdata('temp'));
// echo '<br>';
// print_r($this->session->userdata('user'));
// exit();
                    $this->session->set_flashdata('Msg', 'Login Successfull!');
$role_id      = $this->session->userdata('user')['role'];
$permissions  = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[0]->module_id == 1 && $permissions[0]->show_none==0)
{
    redirect('Dashboard/index');
}
elseif($permissions[2]->module_id == 3 && $permissions[2]->show_none==0)
{
    redirect('Tests/test_records');
}elseif($permissions[1]->module_id == 2 && $permissions[1]->show_none==0)
{
    redirect('Pagescontroller/directorates');
}elseif($permissions[3]->module_id == 4 && $permissions[3]->show_none==0)
{
    redirect('User/index');
}elseif($permissions[4]->module_id == 5 && $permissions[3]->show_none==0)
{
    redirect('Reports/lab_wise_view');
}else
{
unset($_SESSION['user']);
$this->session->set_flashdata('Msg', ' Your Account is restricted to all modules!');
redirect('Login/index');
}
                   
                } else {
                    $this->session->set_flashdata('Msg', 'Wrong Credentials!');
                    redirect('Login/index');
                }
            }
        } else {
            $this->session->set_flashdata('Msg', 'Wrong Credentials!');
            redirect('Login');
        }
    }

    public function user_profile()
    {
        $data['logUser']   = $this->User_m->getLogUserInfo();
        $data['logLab']    = $this->User_m->getLogUserLabInfo();
        $this->load->view('template_parts/header',$data);
        $this->load->view('template_parts/menu');
        $this->load->view('template_parts/asidemenu');
        $this->load->view('pages/user_profile');
        $this->load->view('template_parts/footer');
     }
    public function changeProfileImg()
    {
        $img_name = $this->API_m->upload('user_images');
        $user_id  = $this->session->userdata('user')['user_id'];
        $data = [
        'user_img'  => $img_name
        ];
            
        $this->User_m->updateRecord('users',['user_id'=>$user_id],$data);
        $this->session->set_flashdata('Msg', ' Images Changed Successfull');
        redirect('Login/user_profile/');
    }

    public function DeleteProfileImg($user_id)
      {
        $data = [
        'user_img'  => ''
        ];
            
        $this->User_m->updateRecord('users',['user_id'=>$user_id],$data);
        $this->session->set_flashdata('Msg', ' Images Deleted Successfull');
        redirect('Login/user_profile/');
    }
    public function UpdatePassword()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $user_id = $this->session->userdata('user')['user_id'];
        $newPass = $this->input->post('New_Password');

        $pass = $this->password->hash($newPass);
        
        $passData = array (
            'user_password' => $pass
        );
         $this->User_m->updateRecord('users',['user_id'=>$user_id],$passData);
         $this->session->set_flashdata('Msg', ' Password Changed Successfully!');
        redirect('Login/user_profile');
    }
    public function logout(){
// $role_id               = $this->session->userdata('user')['role'];
// $permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
// echo "<pre>";
// print_r($permissions);
// exit();
        unset($_SESSION['user']);
        $this->session->set_flashdata('Msg', ' Logout Successfull!');
        redirect('Login/index');
    }

// QUERIES FOR JS CODE IN FOOTER
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
        $section  = $this->API_m->GetSectionsItems($id);
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
    public function getTestSamples()
    {
        $test_id = $this->input->post('test_id');
        $samples = $this->API_m->getAllTestSamples($test_id);
        // echo "<pre>";
       echo json_encode($samples);
  
    }
    public function getTestHelpId()
    {
        $test_id   = $this->input->post('test_id');
        $testHelp  = $this->API_m->singleRecord('tests',['test_id' => $test_id,'is_trash' => 0]);
        echo json_encode($testHelp);
    }
    public function GetClient_cnic()
    {
        $cnic    = $this->input->post('cnic');
        $client  = $this->API_m->GetCnicRecord('client_info',['client_cnic' => $cnic]);
        // echo "<pre>";
        // print_r($client);
        // exit();
       echo json_encode($client);
  
    }
    public function getTestFee()
    {
        $test_id    = $this->input->post('t_id');
        $testfee    = $this->API_m->singleRecord('tests',['test_id' => $test_id]);
       echo json_encode($testfee);
  
    }
    public function getTestItemFee()
    {
        $test_id    = $this->input->post('t_id');
        // $testfee    = $this->API_m->singleRecord('tests',['test_id' => $test_id]);
        $fee        = $this->API_m->singleRecord('testHelp',['testHelp_id' => $test_id]);
        // echo "<pre>";
       echo json_encode($fee);
  
    }
    public function GetTehsils()
    {
        $district_id = $this->input->post('district_id');
        $tehsil      = $this->API_m->getRecordWhere('tehsil',['district_id' => $district_id,'is_trash' => 0]);
        // echo "<pre>";
       echo json_encode($tehsil);
  
    }
   
    public  function _check_math_captcha($str) {
        if ($this->mathcaptcha->check_answer($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('_check_math_captcha', 'Your Answer is Wrong');
            return FALSE;
        }
    }

    public function GetQuartors()
   {
        $q_id     = $this->input->post('q_id');
        $quartors = '';
        if($q_id==1)
        {
            
            $total       = $this->Reports_model->firstQuartor_t();
            $progress    = $this->Reports_model->firstQuartor_Inpr();
            $completed   = $this->Reports_model->firstQuartor_com();
            $cancelled   = $this->Reports_model->firstQuartor_can();
            $ims         = $this->Reports_model->firstQuartor_ims();
            $hemt        = $this->Reports_model->firstQuartor_hemt();
            $mast        = $this->Reports_model->firstQuartor_mast();
            $urine       = $this->Reports_model->firstQuartor_urine();
            $brucella    = $this->Reports_model->firstQuartor_brucella();
            $banimal     = $this->Reports_model->firstQuartor_banimal();
            $bhuman      = $this->Reports_model->firstQuartor_bhuman();
            $tuberculin  = $this->Reports_model->firstQuartor_tuberculin();
            $waterbact   = $this->Reports_model->firstQuartor_waterbact();
            $afs         = $this->Reports_model->firstQuartor_afs();


            $quartors = [
                    'total'      => $total,
                    'progress'   => $progress,
                    'completed'  => $completed,
                    'cancelled'  => $cancelled,
                    'ims'        => $ims,
                    'hemt'       => $hemt,
                    'mast'       => $mast,
                    'urine'      => $urine,
                    'brucella'   => $brucella,
                    'banimal'    => $banimal,
                    'bhuman'     => $bhuman,
                    'tuberculin' => $tuberculin,
                    'waterbact'  => $waterbact,
                    'afs'        => $afs,
            ];
        }

        else if($q_id==2)
        {
            $quartors = 'second quartor';
            $total       = $this->Reports_model->secondtQuartor_t();
            $progress    = $this->Reports_model->secondQuartor_Inpr();
            $completed   = $this->Reports_model->secondQuartor_com();
            $cancelled   = $this->Reports_model->secondQuartor_can();
            $ims         = $this->Reports_model->secondQuartor_ims();
            $hemt        = $this->Reports_model->secondQuartor_hemt();
            $mast        = $this->Reports_model->secondQuartor_mast();
            $urine       = $this->Reports_model->secondQuartor_urine();
            $brucella    = $this->Reports_model->secondQuartor_brucella();
            $banimal     = $this->Reports_model->secondQuartor_banimal();
            $bhuman      = $this->Reports_model->secondQuartor_bhuman();
            $tuberculin  = $this->Reports_model->secondQuartor_tuberculin();
            $waterbact   = $this->Reports_model->secondQuartor_waterbact();
            $afs         = $this->Reports_model->secondQuartor_afs();


            $quartors = [
                    'total'      => $total,
                    'progress'   => $progress,
                    'completed'  => $completed,
                    'cancelled'  => $cancelled,
                    'ims'        => $ims,
                    'hemt'       => $hemt,
                    'mast'       => $mast,
                    'urine'      => $urine,
                    'brucella'   => $brucella,
                    'banimal'    => $banimal,
                    'bhuman'     => $bhuman,
                    'tuberculin' => $tuberculin,
                    'waterbact'  => $waterbact,
                    'afs'        => $afs,
            ];
        }
        else if($q_id==3)
        {
            $quartors = 'third quartor';
            $total       = $this->Reports_model->thirdQuartor_t();
            $progress    = $this->Reports_model->thirdQuartor_Inpr();
            $completed   = $this->Reports_model->thirdQuartor_com();
            $cancelled   = $this->Reports_model->thirdQuartor_can();
            $ims         = $this->Reports_model->thirdQuartor_ims();
            $hemt        = $this->Reports_model->thirdQuartor_hemt();
            $mast        = $this->Reports_model->thirdQuartor_mast();
            $urine       = $this->Reports_model->thirdQuartor_urine();
            $brucella    = $this->Reports_model->thirdQuartor_brucella();
            $banimal     = $this->Reports_model->thirdQuartor_banimal();
            $bhuman      = $this->Reports_model->thirdQuartor_bhuman();
            $tuberculin  = $this->Reports_model->thirdQuartor_tuberculin();
            $waterbact   = $this->Reports_model->thirdQuartor_waterbact();
            $afs         = $this->Reports_model->thirdQuartor_afs();


            $quartors = [
                    'total'      => $total,
                    'progress'   => $progress,
                    'completed'  => $completed,
                    'cancelled'  => $cancelled,
                    'ims'        => $ims,
                    'hemt'       => $hemt,
                    'mast'       => $mast,
                    'urine'      => $urine,
                    'brucella'   => $brucella,
                    'banimal'    => $banimal,
                    'bhuman'     => $bhuman,
                    'tuberculin' => $tuberculin,
                    'waterbact'  => $waterbact,
                    'afs'        => $afs,
            ];
        }
        else if($q_id==4)
        {
            $quartors = '4th quartor';
            $total       = $this->Reports_model->FourthQuartor_t();
            $progress    = $this->Reports_model->FourthQuartor_Inpr();
            $completed   = $this->Reports_model->FourthQuartor_com();
            $cancelled   = $this->Reports_model->FourthQuartor_can();
            $ims         = $this->Reports_model->FourthQuartor_ims();
            $hemt        = $this->Reports_model->FourthQuartor_hemt();
            $mast        = $this->Reports_model->FourthQuartor_mast();
            $urine       = $this->Reports_model->FourthQuartor_urine();
            $brucella    = $this->Reports_model->FourthQuartor_brucella();
            $banimal     = $this->Reports_model->FourthQuartor_banimal();
            $bhuman      = $this->Reports_model->FourthQuartor_bhuman();
            $tuberculin  = $this->Reports_model->FourthQuartor_tuberculin();
            $waterbact   = $this->Reports_model->FourthQuartor_waterbact();
            $afs         = $this->Reports_model->FourthQuartor_afs();


            $quartors = [
                    'total'      => $total,
                    'progress'   => $progress,
                    'completed'  => $completed,
                    'cancelled'  => $cancelled,
                    'ims'        => $ims,
                    'hemt'       => $hemt,
                    'mast'       => $mast,
                    'urine'      => $urine,
                    'brucella'   => $brucella,
                    'banimal'    => $banimal,
                    'bhuman'     => $bhuman,
                    'tuberculin' => $tuberculin,
                    'waterbact'  => $waterbact,
                    'afs'        => $afs,
            ];
        }
       
            echo json_encode($quartors);          
    }	
}


?>