<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
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
if($permissions[3]->module_id == 4 && $permissions[3]->show_none==1)
{
     redirect('Login/logout');
}
			
		}
/*******************************************************************
*                                                                  *
*                VIEWS FOR USER & ROLES                            * 
*                                                                  *
********************************************************************/
    	 public function index()
    	 {
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
$data['users']         = '';
$data['labs']          = '';
 if($permissions[3]->module_id == 4 && $permissions[3]->show_all==1)
 {
    $data['users']         = $this->User_m->getAllUsers();
    $data['labs']          = $this->API_m->getRecordWhere('labs',['is_trash'=>0]);

 }else if($permissions[3]->module_id == 4 && $permissions[3]->show_lab_by==1)
 {
    $data['users']         = $this->User_m->getAllUsers_byLab($lab_id);
    $data['labs']          = $this->API_m->getRecordWhere('labs',['is_trash'=>0, 'lab_id'=> $lab_id]);
 }else if($permissions[3]->module_id == 4 && $permissions[3]->show_none==1)
 {
        $data['users']         = '';
        $data['labs']          = '';
 }

            $data['directorates']  = $this->API_m->getRecordWhere('directorates',['is_trash'=>0]);
            $data['roles']         = $this->API_m->getRecordWhere('roles',['is_trash'=>0]);
            $data['logUser']       = $this->User_m->getLogUserInfo();
            $data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
    	    $this->load->view('pages/users',$data);
            $this->load->view('template_parts/footer');
    	 }
         public function user_detail_info($user_id)
         {
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
$data['labs']          = '';
if($permissions[3]->module_id == 4 && $permissions[3]->show_all==1)
{
$data['labs']          = $this->API_m->getRecordWhere('labs',['is_trash'=>0]);
}else if($permissions[3]->module_id == 4 && $permissions[3]->show_lab_by==1)
{
$data['labs']          = $this->API_m->getRecordWhere('labs',['is_trash'=>0, 'lab_id'=> $lab_id]);
}else if($permissions[3]->module_id == 4 && $permissions[3]->show_none==1)
{
$data['labs']          = '';
}
            $data['user_labs']      = $this->API_m->getRecordWhere('user_labs',['ul_user_id' => $user_id]);
            $data['user']           = $this->User_m->detailUserInfo($user_id);
            $data['directorates']   = $this->API_m->getRecordWhere('directorates',['is_trash'=>0]);
            $data['roles']          = $this->API_m->getRecordWhere('roles',['is_trash'=>0]);
            $data['logUser']        = $this->User_m->getLogUserInfo();
            $data['logLab']         = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/users_detail_info',$data);
            $this->load->view('template_parts/footer');
         }
         public function roles()
         {
            $data['roles']     = $this->API_m->getRecordWhere('roles',['is_trash'=>0]);
            $data['logUser']   = $this->User_m->getLogUserInfo();
            $data['logLab']    = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/roles',$data);
            $this->load->view('template_parts/footer');
         }
         public function role_permissions($id=null)
         {
            $role_id = '';
            if($id!='')
            {
                $role_id = $id;
            }else
            {
                $role_id = $this->session->userdata('user')['role'];
            }
            $data['permissions']   = $this->User_m->GetPermisionModules($role_id);
            $data['roles']         = $this->User_m->singleRecord('roles',['role_id' => $role_id]);
            $data['logUser']       = $this->User_m->getLogUserInfo();
            $data['logLab']        = $this->User_m->getLogUserLabInfo();
            $this->load->view('template_parts/header',$data);
            $this->load->view('template_parts/menu');
            $this->load->view('template_parts/asidemenu');
            $this->load->view('pages/role_permissions',$data);
            $this->load->view('template_parts/footer');
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

    

/*******************************************************************
*                                                                  *
*                OPERATIONS FOR USER & ROLES                       * 
*                                                                  *
********************************************************************/
 public function ChangePassword()
 {
    // echo "<pre>";
    // print_r($_POST);
    // exit();
        $user_id = $this->input->post('user_id');
        $newPass = $this->input->post('new_password');
        $pass = $this->password->hash($newPass);
        
        $passData = array (
            'user_password' => $pass
        );
         $this->User_m->updateRecord('users',['user_id'=>$user_id],$passData);
         $this->session->set_flashdata('Msg', ' Password Changed Successfully!');
        redirect('User/user_detail_info/'.$user_id);
 }


//  New User Registration 

     public function Registration()
     { 
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $this->form_validation->set_rules('user_name', 'user name', 'required|numeric');
            if ($this->form_validation->run() == TRUE) {
                # code...
                
                redirect('User/index');
            }

            $lab_id = $this->input->post('lab_id');
        $user_img = '';
        $user_ps  = $this->input->post('user_pass');
        $pass     = $this->password->hash($user_ps);
        $img_name = $this->API_m->upload('user_images');
       $data = [
                'user_name'          => $this->input->post('user_name'),
                'user_email'         => $this->input->post('user_email'),
                'user_contact'       => $this->input->post('user_contact'),
                'user_password'      => $pass,
                'designation'        => $this->input->post('user_desi'),
                'gender'             => $this->input->post('user_gender'),
                'user_role'          => $this->input->post('role_id'),
                'directorate_id'     => $this->input->post('directorate_id'),
                'center_station_id'  => $this->input->post('center_station_id'),
                'section_id'         => $this->input->post('section_id'),
                // 'lab_id'             => 1,
                'user_img'           => $img_name,
                'created_by'         => $this->session->userdata('user')['user_id']

                ];
        $user_id = $this->User_m->create('users',$data);
        if(!empty($lab_id))
        {
            for($i=0; $i<sizeof($lab_id); $i++)
            {

             $ul_data = [
                    'ul_user_id'  => $user_id,
                    'ul_lab_id'   => $lab_id[$i],

                    ];
                    $this->User_m->create('user_labs',$ul_data);
            }
        }
        $this->session->set_flashdata('Msg', ' Record Created Successfull');
        redirect('User/index');

     }


// checking email availability
    public function check_email()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $email = $_POST['email'];

        $res = $this->User_m->check_email($email);

        // print_r($res);
        // exit();
    }

    
    public function updateUserRecord()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit();
            $user_id  = $this->input->post('user_id');
            $uri      = $this->input->post('uri');
            $img_name = '';

            if($_FILES['file']['name'] != '')
            {
               $img_name = $this->API_m->upload('user_images');
            }
            else
            {
               $img_name  = $this->input->post('old_img');
            }

        $data = [
                'user_name'          => $this->input->post('user_name'),
                'user_email'         => $this->input->post('user_email'),
                'user_contact'       => $this->input->post('user_contact'),
                'designation'        => $this->input->post('user_desi'),
                'gender'             => $this->input->post('user_gender'),
                'user_role'          => $this->input->post('role_id'),
                'directorate_id'     => $this->input->post('directorate_id'),
                'center_station_id'  => $this->input->post('center_station_id'),
                'section_id'         => $this->input->post('section_id'),
                // 'lab_id'             => 1,
                'user_img'           => $img_name,

                ];
            
        $this->User_m->updateRecord('users',['user_id'=>$user_id],$data);
        $this->User_m->delete('user_labs',['ul_user_id'=>$user_id],$data);
     $lab_id = $this->input->post('lab_id');
        if(!empty($lab_id))
        {
            for($i=0; $i<sizeof($lab_id); $i++)
            {

             $ul_data = [
                    'ul_user_id'  => $user_id,
                    'ul_lab_id'   => $lab_id[$i],

                    ];
                    $this->User_m->create('user_labs',$ul_data);
            }
        }

        $this->session->set_flashdata('Msg', ' Record Updated Successfull');
       if($uri=='user_detail_info')
        {
          redirect('User/'.$uri.'/'.$user_id);
        }
        else
        {
          redirect('User/'.$uri);
        }
    
    }
     public function DeleteImg($uri,$table,$user_id)
     {  

        $data = [
        'user_img'  => ''
        ];
            
        $this->User_m->updateRecord($table,['user_id'=>$user_id],$data);
        $this->session->set_flashdata('Msg', ' Images Deleted Successfull');
        if($uri=='user_detail_info')
        {
          redirect('User/'.$uri.'/'.$user_id);
        }
        else
        {
          redirect('User/'.$uri);
        }
    
     }

//  FOR CLIENT SIDE
      public function DeleteProfileImg($user_id)
      {
        $data = [
        'user_img'  => ''
        ];
            
        $this->User_m->updateRecord('users',['user_id'=>$user_id],$data);
        $this->session->set_flashdata('Msg', ' Images Deleted Successfull');
        redirect('User/user_profile/');
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
        redirect('User/user_profile/');
    }

    public function deleteUser($user_id)
    {
  
        $data = [
                'is_trash'  => 1
                ];
            
        $this->User_m->updateRecord('users',['user_id'=>$user_id],$data);
        $this->session->set_flashdata('Msg', ' Record Deleted Successfull');
        redirect('User/index');
    
    }

    //this function is used to verified user old password

    public function verifiedOldPassword() {
        echo json_encode($this->User_m->verifiedOldPassword($this->input->post('oldPassword')));
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
        redirect('User/user_profile');
    }

//  OPERATION FOR ROLES
     public function addRole()
     {
       $data = [
                'role_name'       => $this->input->post('role_name'),
                'created_by'      => $this->session->userdata('user')['user_id']

                ];
        $role_id  = $this->User_m->create('roles',$data);
        $modules  = $this->API_m->getRecordWhere('modules',['is_trash'=>0]);
         foreach($modules as $mod)
         {
             $not_specified = 0;
            if($mod->module_id==1)
            {
                $not_specified = 2;
            }else if($mod->module_id==2)
            {
                $not_specified = 2;
            }else if($mod->module_id==3)
            {
                $not_specified = 2;
            }else if($mod->module_id==4)
            {
                $not_specified = 2;
            }else if($mod->module_id==5)
            {
                $not_specified = 2;
            }
             $perm = [
                    'module_id'       => $mod->module_id,
                    'role_id'         => $role_id,
                    'show_all'        => 0,
                    'show_none'       => 1,
                    'show_lab_by'     => 0,
                    'show_created_by' => $not_specified,

                    ];
                $this->User_m->create('role_permissions',$perm);
            
         }
        $this->session->set_flashdata('Msg', ' Record Created Successfull');
        redirect('User/role_permissions/'.$role_id);

     }

    public function updateRoleRecord()
    {
     
        $role_id  = $this->input->post('role_id');

        $data = [
                'role_name'       => $this->input->post('role_name')
                ];
        
        $this->User_m->updateRecord('roles',['role_id'=>$role_id],$data);
        $this->session->set_flashdata('Msg', ' Record Updated Successfull');
        redirect('User/roles');
    
    }
    public function deleteRole($role_id)
    {
  
        $data = [
                'is_trash'  => 1
                ];
            
        $this->User_m->updateRecord('roles',['role_id'=>$role_id],$data);
        $this->User_m->delete('role_permissions',['role_id'=>$role_id]);
        $this->session->set_flashdata('Msg', ' Record Deleted Successfull');
        redirect('User/roles');
    
    }

    public function updateRolePermissions()
    {
        $role_id   = $this->input->post('role_id');
        $module    = $this->input->post('module');
        // echo "<pre>";
        // print_r($_POST);
        // exit();
         foreach($module as $mod)
         {
             $perm = [
                    // 'module_id'       => $mod->module_id,
                    // 'role_id'         => $role_id,
                    'show_created_by' => $mod['show_created_by'],
                    'show_lab_by'     => $mod['show_lab_by'],
                    'show_all'        => $mod['show_all'],
                    'show_none'       => $mod['show_none'],

                    ];
                $this->User_m->updateRecord('role_permissions',['role_perm_id' => $mod['role_perm_id']],$perm);
            
         }
        $this->session->set_flashdata('Msg', ' Record updated Successfully');
        redirect('User/role_permissions/'.$role_id);
    }

    public function ChangeStatus($status,$user_id)
    {
        $data = [
                'is_block'  => $status
                ];
            
        $this->User_m->updateRecord('users',['user_id'=>$user_id],$data);
        $this->session->set_flashdata('Msg', ' Status changed Successfull');
        redirect('User/user_detail_info/'.$user_id);
    }

}
?>