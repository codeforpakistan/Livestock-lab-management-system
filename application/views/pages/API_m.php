<?php

class API_m extends CI_Model {

    // this function is used to get last record
    public function get_last_Rec($table) {

        return $this->db->limit(1)->get($table)->row();
    }

    //this funtion will recieve table name and return all the data of that table

    public function get($table_name) {
        return $this->db->get($table_name)->result();
    }

    //this funtion will recieve table name and a condition and return  the data 

    public function getRecordWhere($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->get($table_name)->result();
    }

    // this function will recieved two parameter first one table name second one where clause (['table_field'=>$id])

    public function singleRecord($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->get($table_name)->row();
    }

    // this function will recieved two parameter first one table name second one where clause (['table_field'=>$id])

    public function singleRecordArray($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->get($table_name)->result();
    }

    //this is used to insert data into database
    public function create($table_name, $table_field_name_with_value) {
        $result = $this->db->insert($table_name, $table_field_name_with_value);
        if (!$result) {
            return 0;
        } else {
            return $this->db->insert_id();
        }
    }

    //this function is used to count all rows of table under a condition
    public function countWhereAllRows($table, $arg) {
        return $this->db->where($arg)->count_all_results($table);
    }
    //this function is used to count all rows of table under a condition
    public function countAllRows($table) {
        return $this->db->count_all_results($table);
    }
    // this function will recieved three parameter first one table name second one where clause (['table_field'=>$id]) and thrid one table field name with value in array form.

    public function updateRecord($table_name, $table_field_name, $table_field_data) {
        return $this->db->where($table_field_name)->update($table_name, $table_field_data);
    }

    //this function will recieved two parameter first one table name second one where cluase (['table_field'=>$id])

    public function delete($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->delete($table_name);
    }

    //this function will recieve three parameter fist one table name second table_key_field and third one is descion(Ascending or Descending)

    public function getOrderBy($table_name, $table_key_field, $decision) {
        return $this->db->order_by($table_key_field, $decision)->get($table_name)->result();
    }

    // this function will recieved directory name and store in that particular directory and return image name

    public function upload($dir_name) {
        $file = '';
        if ($_FILES['file']['name'] != '') {
            $new_name = date('s') . str_replace(' ', '', $_FILES["file"]['name']);
            $adver = realpath(APPPATH . '../img_uploads/' . $dir_name . '/');
            $config = [
                'upload_path' => $adver,
                'allowed_types' => 'gif|jpeg|jpg|png',
                'remove_spaces' => true,
                'image_library' => 'gd2',
                'quality' => 60,
                'file_name' => $new_name
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $file = $new_name;
            } else {
                $file = $this->upload->display_errors();
            }
        }
        return $file;
    }

    //this function will received three paramerter first one dirctory name and second one table name and thrid table field data

    public function multipleUploads($dirName, $table_name, $table_field_data) {
        $adver = realpath(APPPATH . "../user_uploads/" . $dirName);
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['file']['name']);
        $img_array = [];
        for ($i = 0; $i < $cpt; $i++) {
            echo $i;
            $_FILES['file']['name'] = $files['file']['name'][$i];
            $_FILES['file']['type'] = $files['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['file']['error'][$i];
            $_FILES['file']['size'] = $files['file']['size'][$i];

            if (!$_FILES["file"]['name']) {
                $new_name = '';
            } else {
                $new_name = date('s') . str_replace(' ', '', $_FILES["file"]['name']);
            }

            $config = [
                'upload_path' => $adver,
                'allowed_types' => 'gif|png|jpg|jpeg',
                'remove_spaces' => TRUE,
                'image_library' => 'gd2',
                'quality' => 60,
                'file_name' => $new_name
            ];
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $table_field_data['image_name'] = $new_name;

                $this->db->insert($table_name, $table_field_data);
            }
        }
        return 1;
    }

    //this function is used to get max id of table
    public function getMaxId($table, $column_name) {
        return $this->db->select_max($column_name)->get($table)->row();
    }

// this function is used to get next inserted id    
    public function getNextInsertedId($table_name, $column_name) {
        $a = $this->db->limit(1)->order_by($column_name, 'DESC')->get($table_name)->row();
        if (!empty($a)) {
            $id = $a->$column_name;
        } else {
            $id = 0;
        }
        return $id;
    }

 /**********************************
        special methods
 **********************************/  
    public function prefix()
    {
        $prefix = '';
        
        $row = $this->db->get('settings')->row();
        if(!empty($row))
        {
           $prefix =  $row->bill_prefix;
        }
        return $prefix;
    }
    
    public function get_districtlab()
    {
        return $this->db->select('*')
                         ->from('labs as l')
                         ->join('sections as s','s.section_id=l.section_id','left')
                         ->join('sectionhelp as sh','sh.sectionHelp_id=s.sectionHelp_id','left')
                         ->join('directorates as d','d.directorate_id=l.directorate_id','left')
                         ->join('center_station as cs','cs.center_station_id=l.center_station_id','left')
                         ->where('l.is_trash',0)
                         ->get()->result();
    }

 public function getAllTestTypes()
 {
    return $this->db->select('*')
                     ->from('tests')
                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                     ->where('tests.is_trash',0)
                     ->get()->result();
 }
public function getAllTestTypes_byLab($lab_id)
 {
    return $this->db->select('*')
                     ->from('tests')
                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                     ->where('tests.is_trash',0)
                     ->where('tests.lab_id',$lab_id)
                     ->get()->result();
 }

    public function getTestTypes()
    {
        return $this->db->select('*')
                         ->from('tests')
                         ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                         ->join('labs as l','l.lab_id=tests.lab_id')
                         ->where('tests.is_trash',0)
                         ->get()->result();
     }

    public function GetSectionsItems($id)
    {
        return $this->db->select('*')
                         ->from('sections as s')
                         ->join('sectionhelp as sh','sh.sectionHelp_id=s.sectionHelp_id','left')
                         ->where('s.is_trash',0)
                         ->where('s.center_station_id',$id)
                         ->get()->result();
     }

     public function getTestTypes_byLab($lab_id)
     {
        return $this->db->select('*')
                         ->from('tests')
                         ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                         ->join('labs as l','l.lab_id=tests.lab_id')
                         ->where('tests.is_trash',0)
                         ->where('tests.lab_id',$lab_id)
                         ->get()->result();
     }

     public function delete_lab($id)
     {
        # code...
        $this->db->where('lab_id',$id);
        $this->db->delete("labs");
     }

        public function get_testsection()
        {
         return $this->db->select('*')
                         ->from('sections as s')
                         ->join('sectionhelp as sh','sh.sectionHelp_id=s.sectionHelp_id','left')
                         ->join('center_station as cs','cs.center_station_id=s.center_station_id')
                         ->join('directorates as d','d.directorate_id=s.directorate_id')
                         ->where('s.is_trash',0)
                         ->get()->result();
        }

        public function delete_section($id)
            {
                # code...
                $this->db->where('section_id',$id);
                $this->db->delete("sections");
            }

    public function getAllTestSamples($test_id)
    {
        return $this->db->select('*')
                         ->from('test_samples as ts')
                         ->join('samples as s','ts.sample_id=s.sample_id')
                         ->where('s.is_trash',0)
                         ->where('ts.test_id',$test_id)
                         ->get()->result();
    }
    public function Getstations()
    {
        return $this->db->select('*')
                         ->from('center_station as cs')
                         ->join('directorates as d','cs.directorate_id=d.directorate_id')
                         ->join('districts as dt','dt.district_id=cs.district_id')
                         ->where('cs.is_trash',0)
                         ->get()->result();
    }
//  GET ONLY CANCELLED RECORDS
     public function get_Cancelledtestdetail()
    {
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[2]->module_id == 3 && $permissions[2]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.is_cancel',1)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.is_cancel',1)
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.is_cancel',1)
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_none==1)
{
               $query1    = [];
}
            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 
    }
// GET ONLY POSTED RECORDS
    public function get_Postedtestdetail()
    {
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[2]->module_id == 3 && $permissions[2]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',1)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',1)
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',1)
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_none==1)
{
               $query1    = [];
}
            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 
    }
//  GET ONLY PENDING RECORDS
    public function get_Pendingtestdetail()
    {
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[2]->module_id == 3 && $permissions[2]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                     ->join("districts", 'districts.district_id=client_info.district_id','left')
                                    ->join("tehsil", 'tehsil.tehsil_id=client_info.tehsil_id','left')
                                    ->where('testdetails.post_status',0)
                                    ->where('testdetails.is_cancel',0)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                     ->join("districts", 'districts.district_id=client_info.district_id','left')
                                    ->join("tehsil", 'tehsil.tehsil_id=client_info.tehsil_id','left')
                                    ->where('testdetails.post_status',0)
                                    ->where('testdetails.is_cancel',0)
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                     ->join("districts", 'districts.district_id=client_info.district_id','left')
                                    ->join("tehsil", 'tehsil.tehsil_id=client_info.tehsil_id','left')
                                    ->where('testdetails.post_status',0)
                                    ->where('testdetails.is_cancel',0)
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_none==1)
{
               $query1    = [];
}
            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 
    }


//   ALL RECORDS 

    public function get_testdetail(){
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[2]->module_id == 3 && $permissions[2]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id','left')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id','left')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id','left')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_none==1)
{
               $query1    = [];
}

            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 

        }

      public function SingleTestRecord($id){
            $res= []; 
            $query1  =  $this->db->select("*")
                                            ->from("testdetails")
                                            ->join("client_info",'client_info.client_id=testdetails.client_id')
                                            ->join("tests",'tests.test_id=testdetails.test_id')
                                            // ->join("samples",'samples.sample_id=testdetails.sample_id')
                                            ->where("testdetails.testDetails_id",$id)
                                            // 
                                            ->get()->row();
                    if($query1->testHelp_id==1)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }else if($query1->testHelp_id==10)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($query1->testHelp_id==2)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($query1->testHelp_id==3)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($query1->testHelp_id==4)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($query1->testHelp_id==5)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    } else if($query1->testHelp_id==6)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    } else if($query1->testHelp_id==7)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    } else if($query1->testHelp_id==8)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("brucella_human")
                                                        ->where("brucella_human.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }else if($query1->testHelp_id==9)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("tb_and_vph")
                                                        ->where("tb_and_vph.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }

                return $res;

        }
        public function SingleTestdetailsRecord($id){
            $res= []; 
            $query1  =  $this->db->select("*")
                                            ->from("testdetails")
                                            ->join("client_info",'client_info.client_id=testdetails.client_id')
                                            ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                            ->join("tests",'tests.test_id=testdetails.test_id')
                                            ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                            ->join("samples",'samples.sample_id=testdetails.sample_id')
                                            // ->join("cattles",'cattles.cattle_id=testdetails.cattle_name','left')
                                            ->join("breeds",'breeds.breed_id=testdetails.cattle_breed','left')
                                            ->where("testdetails.testDetails_id",$id)
                                            ->get()->row();
            // echo "<pre>";
            // print_r($query1);
            // exit();
                    if($query1->testHelp_id==1)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }else if($query1->testHelp_id==10)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                     else if($query1->testHelp_id==2)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($query1->testHelp_id==3)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($query1->testHelp_id==4)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($query1->testHelp_id==5)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    } else if($query1->testHelp_id==6)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    } else if($query1->testHelp_id==7)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    } else if($query1->testHelp_id==8)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("brucella_human")
                                                        ->where("brucella_human.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }else if($query1->testHelp_id==9)
                    {
                        $res['testDetails'] = $query1;
                        $res['testType']    = $this->db->select("*")
                                                        ->from("tb_and_vph")
                                                        ->where("tb_and_vph.testDetails_id",$query1->testDetails_id)
                                                        ->get()->row();
                    }

                return $res;

        }

        public function getBreeds()
        {
            return $this->db->select("*")
                            ->from("breeds")
                            ->join("cattles",'cattles.cattle_id=breeds.cattle_id')
                            ->where("breeds.is_trash",0)
                            ->get()->result();
        }

        public function countByLabTestdetails($lab_id)
        {
            $testDetails =  $this->db->select('*')
                            ->from('testdetails')
                            ->join("tests",'tests.test_id=testdetails.test_id')
                             ->where('tests.lab_id',$lab_id)
                             ->get()->result();
                    return count($testDetails);
        }
        public function countByLabTestdetailsPending($lab_id)
        {
            $pending =    $this->db->select('*')
                                    ->from('testdetails')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->where('testdetails.post_status', 0)
                                    ->where('testdetails.is_cancel',0)
                                    ->where('tests.lab_id',$lab_id)
                                     ->get()->result();
                    return count($pending);
        }
        public function countByLabTestdetailsPosted($lab_id)
        {
            $posted =    $this->db->select('*')
                                    ->from('testdetails')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->where('testdetails.post_status', 1)
                                    ->where('testdetails.is_cancel',0)
                                    ->where('tests.lab_id',$lab_id)
                                     ->get()->result();
                    return count($posted);
        }
        public function countByLabTestdetailsCancelled($lab_id)
        {
            $cancelled =    $this->db->select('*')
                                    ->from('testdetails')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->where('testdetails.is_cancel',1)
                                    ->where('testdetails.post_status', 0)
                                    ->where('tests.lab_id',$lab_id)
                                     ->get()->result();
                    return count($cancelled);
        }
        public function countByLabTestType($lab_id,$id)
        {
            
              if($id==1)
                {
                        $impression_smear =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("impression_smear",'impression_smear.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($impression_smear);
                } else if($id==10)
                {
                  $water_bacteriology =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("water_bacteriology",'water_bacteriology.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($water_bacteriology);
                }else if($id==11)
                    {
                       $afs =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("acid_fast_staining",'acid_fast_staining.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($afs);
                    }
                 else if($id==2)
                {
                  $haematology =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("haematology",'haematology.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($haematology);
                }
                else if($id==3)
                {
                    $mastitis =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("mastitis",'mastitis.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($mastitis);
                  
                }
                else if($id==4)
                {
                  
                $culture_sensitivity =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("culture_sensitivity",'culture_sensitivity.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($culture_sensitivity);
                }
                else if($id==5)
                {
                   $urine_examination =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("urine_examination",'urine_examination.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($urine_examination);
                  
                } else if($id==6)
                {
 
                        $brucella_animal_combine =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("brucella_animal_combine",'brucella_animal_combine.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($brucella_animal_combine);                           

                } else if($id==7)
                {
                   
          $brucella_animal_ind =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("brucella_animal_ind",'brucella_animal_ind.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($brucella_animal_ind);  
                } else if($id==8)
                {
                      $brucella_human =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("brucella_human",'brucella_human.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($brucella_human);  
                    
                }else if($id==9)
                {
                    
                      $tb_and_vph =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join("tb_and_vph",'tb_and_vph.testDetails_id=testdetails.testDetails_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->get()->result();
                            return count($tb_and_vph);  
                }
        }


// REPORTS QURIES
    public function get_CancelledReports()
    {
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[4]->module_id == 5 && $permissions[4]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.is_cancel',1)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.is_cancel',1)
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.is_cancel',1)
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_none==1)
{
               $query1    = [];
}
            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 
    }
// GET ONLY POSTED Reports
    public function get_PostedReports()
    {
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[4]->module_id == 5 && $permissions[4]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',1)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',1)
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                     ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',1)
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_none==1)
{
               $query1    = [];
}
            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 
    }
//  GET ONLY PENDING Reports
    public function get_PendingReports()
    {
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[4]->module_id == 5 && $permissions[4]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',0)
                                    ->where('testdetails.is_cancel',0)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',0)
                                    ->where('testdetails.is_cancel',0)
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.post_status',0)
                                    ->where('testdetails.is_cancel',0)
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_none==1)
{
               $query1    = [];
}
            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 
    }

// GET ALL TEST REPORTS
    public function get_allReports(){
            $res       = []; 
            $query1    = [];
$role_id               = $this->session->userdata('user')['role'];
$lab_id                = $this->session->userdata('user')['lab_id'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[4]->module_id == 5 && $permissions[4]->show_all==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[4]->module_id == 5 && $permissions[4]->show_none==1)
{
               $query1    = [];
}
            if(!empty($query1))
            {
                foreach($query1 as $q)
                 {
                    if($q->testHelp_id==1)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("impression_smear")
                                                        ->where("impression_smear.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==2)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("haematology")
                                                        ->where("haematology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==3)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("mastitis")
                                                        ->where("mastitis.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==4)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("culture_sensitivity")
                                                        ->where("culture_sensitivity.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }
                    else if($q->testHelp_id==5)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("urine_examination")
                                                        ->where("urine_examination.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==6)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_combine")
                                                        ->where("brucella_animal_combine.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("brucella_animal_ind")
                                                        ->where("brucella_animal_ind.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("brucella_human")
                                                                ->where("brucella_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tb_and_vph")
                                                                    ->where("tb_and_vph.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }else if($q->testHelp_id==10)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("water_bacteriology")
                                                        ->where("water_bacteriology.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }else if($q->testHelp_id==11)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("acid_fast_staining")
                                                        ->where("acid_fast_staining.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    }

                 }
                    return $res;
            }
                 

        }


//  GETING TEHSIL RECORDS 
    public function getTehsil()
    {
        return $this->db->select('*')
                         ->from('tehsil as teh')
                         ->join('districts as ds','teh.district_id=ds.district_id','left')
                         ->where('teh.is_trash',0)
                         ->where('ds.is_trash',0)
                         ->get()->result();
    }


public function today_All()
{
    $query1  =  $this->db->select("*")
                        ->from("testdetails")
                        ->join("client_info",'client_info.client_id=testdetails.client_id')
                        ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                        ->join("tests",'tests.test_id=testdetails.test_id')
                        ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                        ->join("samples",'samples.sample_id=testdetails.sample_id')
                        ->order_by('testdetails.testdetails_id','DESC')
                        ->where('DATE(testdetails.created_date)',date("Y-m-d"))
                        ->get();
                        return $query1->num_rows();
}
public function current_week_All()
{
    $date = new DateTime();
        $week  =  $this->db->select("*")
                  ->from("testdetails")
                  ->join("client_info",'client_info.client_id=testdetails.client_id')
                  ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                  ->join("tests",'tests.test_id=testdetails.test_id')
                  ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                  ->join("samples",'samples.sample_id=testdetails.sample_id')
                  ->where("DATE_FORMAT(testdetails.created_date,'%v')", $date->format('W'))
                  ->get();
               return $week->num_rows();
}
public function current_month_All()
{
    $month  =  $this->db->select("*")
                        ->from("testdetails")
                        ->join("client_info",'client_info.client_id=testdetails.client_id')
                        ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                        ->join("tests",'tests.test_id=testdetails.test_id')
                        ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                        ->join("samples",'samples.sample_id=testdetails.sample_id')
                        ->where("DATE_FORMAT(testdetails.created_date,'%Y-%m')", date("Y-m"))
                        ->get();

                     return $month->num_rows(); 
}
public function current_year_All()
{
    $year  =  $this->db->select("*")
                        ->from("testdetails")
                        ->join("client_info",'client_info.client_id=testdetails.client_id')
                        ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                        ->join("tests",'tests.test_id=testdetails.test_id')
                        ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                        ->join("samples",'samples.sample_id=testdetails.sample_id')
                        ->where("DATE_FORMAT(testdetails.created_date,'%Y')", date("Y"))
                        ->get();
        return $year->num_rows();
}


// Lab by Records
public function today_ByLab($lab_id)
{
    $query1  =  $this->db->select("*")
                        ->from("testdetails")
                        ->join("client_info",'client_info.client_id=testdetails.client_id')
                        ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                        ->join("tests",'tests.test_id=testdetails.test_id')
                        ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                        ->join("samples",'samples.sample_id=testdetails.sample_id')
                        ->where('tests.lab_id',$lab_id)
                        ->where('DATE(testdetails.created_date)',date("Y-m-d"))
                        ->get();
                        return $query1->num_rows();
}
public function current_week_ByLab($lab_id)
{
    $date = new DateTime();
        $week  =  $this->db->select("*")
                  ->from("testdetails")
                  ->join("client_info",'client_info.client_id=testdetails.client_id')
                  ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                  ->join("tests",'tests.test_id=testdetails.test_id')
                  ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                  ->join("samples",'samples.sample_id=testdetails.sample_id')
                  ->where('tests.lab_id',$lab_id)
                  ->where("DATE_FORMAT(testdetails.created_date,'%v')", $date->format('W'))
                  ->get();
               return $week->num_rows();
}
public function current_month_ByLab($lab_id)
{
    $month  =  $this->db->select("*")
                        ->from("testdetails")
                        ->join("client_info",'client_info.client_id=testdetails.client_id')
                        ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                        ->join("tests",'tests.test_id=testdetails.test_id')
                        ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                        ->join("samples",'samples.sample_id=testdetails.sample_id')
                        ->where('tests.lab_id',$lab_id)
                        ->where("DATE_FORMAT(testdetails.created_date,'%Y-%m')", date("Y-m"))
                        ->get();

                     return $month->num_rows(); 
}
public function current_year_ByLab($lab_id)
{
    $year  =  $this->db->select("*")
                        ->from("testdetails")
                        ->join("client_info",'client_info.client_id=testdetails.client_id')
                        ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                        ->join("tests",'tests.test_id=testdetails.test_id')
                        ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                        ->join("samples",'samples.sample_id=testdetails.sample_id')
                        ->where('tests.lab_id',$lab_id)
                        ->where("DATE_FORMAT(testdetails.created_date,'%Y')", date("Y"))
                        ->get();
        return $year->num_rows();
 }

}
