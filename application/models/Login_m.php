<?php
	
class Login_m extends CI_Model
{
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
    public function countAllRows($table, $arg) {
        return $this->db->where($arg)->count_all_results($table);
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

       //this function is used to verified user old password

    public function verifiedOldPassword($oldPassword) {

        $result = $this->db->from('users')
                ->where('user_email', $this->session->userdata('user')['user_email'])
                ->get();
        if ($result->num_rows() == 1) {
            $user = $result->row_array();
            if ($this->password->verify_hash($oldPassword, $user['user_password'])) {
                unset($user['user_password']);
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function getDesireLabList($temp_user_id)
    {
      return $this->db->select('*')
                         ->from('user_labs')
                         ->join('labs as dl','dl.lab_id=user_labs.ul_lab_id','left')
                         ->where('user_labs.ul_user_id',$temp_user_id)
                         ->get()->result();
           
    }
        
	
}
?>