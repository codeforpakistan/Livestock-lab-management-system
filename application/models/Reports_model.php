<?php

class Reports_model extends CI_Model {

	public function getDistrictTehsilWise() {

		$district_id = $this->input->post('district_id');
		$tehsil_id   = $this->input->post('tehsil_id');

		$this->db->select('*');
		$this->db->from('client_info');
		if ($district_id) {
			$this->db->where('district_id', $district_id);
		}
		if ($tehsil_id) {
			$this->db->where('tehsil_id', $tehsil_id);
		}

		$query = $this->db->get();

		return $query->result_array();

	}

	public function getTest() {

		$directorate_id = $this->input->post('directorate_id');
		$center_station_id = $this->input->post('center_station_id');
		$section_id = $this->input->post('section_id');
		$lab_id = $this->input->post('lab_id');

		$this->db->select('*');
		$this->db->from('tests');
		if ($directorate_id) {
			$this->db->where('directorate_id', $directorate_id);
		}
		if ($center_station_id) {
			$this->db->where('center_station_id', $center_station_id);
		}
		if ($section_id) {
			$this->db->where('section_id', $section_id);
		}

		if ($lab_id) {
			$this->db->where('lab_id', $lab_id);
		}

		$query = $this->db->get();

		return $query->result_array();

	}

	public function lab_wise_view_report($test_id = null) {

		$from_date = $this->input->post('first_date');
		$to_date = $this->input->post('second_date');
		$status = $this->input->post('status');

		$query_arr = array();

		if ($from_date != '' && $to_date != '') {
			$query_arr[] = " result_date BETWEEN '" . $from_date . "' and '" . $to_date . "' ";
		}

		if ($test_id != '') {
			$query_arr[] = " test_id = '" . $test_id . "' ";
		}
		if ($status != '') {
			$query_arr[] = " post_status = '" . $status . "' ";
		}

		if (count($query_arr) > 0) {
			$searchQuery = implode(" and ", $query_arr);
			$query = $this->db->query("SELECT * from testdetails where " . $searchQuery . " order by testdetails_id desc");
		} else {
			$query = $this->db->query("SELECT * from testdetails order by testdetails_id desc");
		}

		return $query->result_array();

	}
	public function details_report($test_id = null) {

		$from_date = $this->input->post('first_date');
		$to_date = $this->input->post('second_date');
		$status = $this->input->post('status');

		$query_arr = array();

		if ($from_date != '' && $to_date != '') {
			$query_arr[] = " result_date BETWEEN '" . $from_date . "' and '" . $to_date . "' ";
		}

		if ($test_id != '') {
			$query_arr[] = " test_id = '" . $test_id . "' ";
		}
		if ($status != '') {
			$query_arr[] = " post_status = '" . $status . "' ";
		}

		if (count($query_arr) > 0) {
			$searchQuery = implode(" and ", $query_arr);
			$query = $this->db->query("SELECT * from testdetails where " . $searchQuery . " order by testdetails_id desc");
		} else {
			$query = $this->db->query("SELECT * from testdetails order by testdetails_id desc");
		}

		return $query->result_array();

	}

	public function districtlabsreports($client_id = null) {

		$from_date = $this->input->post('first_date');
		$to_date = $this->input->post('second_date');
		// $district_id = $this->input->post('district_id');
		// $tehsil_id = $this->input->post('tehsil_id');
		$test_id = $this->input->post('test_id');
		$cattle_id = $this->input->post('cattle_id');
		$test_sample_id = $this->input->post('test_sample_id');

		$query_arr = array();

		if ($from_date != '' && $to_date != '') {
			$query_arr[] = " result_date BETWEEN '" . $from_date . "' and '" . $to_date . "' ";
		}

		if ($test_id != '') {
			$query_arr[] = " test_id = '" . $test_id . "' ";
		}
		if ($cattle_id != '') {
			$query_arr[] = " cattle_name = '" . $cattle_id . "' ";
		}

		if ($test_sample_id != '') {
			$query_arr[] = " sample_id = '" . $test_sample_id . "' ";
		}

		if ($client_id != '') {
			$query_arr[] = " client_id = '" . $client_id . "' ";
		}

		if (count($query_arr) > 0) {
			$searchQuery = implode(" and ", $query_arr);
			$query = $this->db->query("SELECT * from testdetails where " . $searchQuery . " order by testdetails_id desc");
		} else {
			$query = $this->db->query("SELECT * from testdetails order by testdetails_id desc");
		}

		return $query->result_array();

	}

	public function getRecordByArray($tbl_name, $array) {
		$query = $this->db->get_where($tbl_name, $array);
		return $query->row_array();
	}

/***************************************************************************************************************************************
------------------- QUARTORS WISE REPORTS QUERIES -------------------------------------
 ****************************************************************************************************************************************/
	public function firstQuartor_t() {
		$query1 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query1->num_rows();
	}
	public function firstQuartor_Inpr() {
		$query2 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('testdetails.post_status', 0)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query2->num_rows();
	}
	public function firstQuartor_com() {
		$query3 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('testdetails.post_status', 1)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query3->num_rows();
	}
	public function firstQuartor_can() {
		$query4 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('testdetails.is_cancel', 1)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query4->num_rows();
	}

	public function firstQuartor_ims() {
		$query6 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Impression Smear")
			->get();
		return $query6->num_rows();

	}
	public function firstQuartor_hemt() {
		$query7 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Hematology")
			->get();
		return $query7->num_rows();
	}
	public function firstQuartor_mast() {
		$query8 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Mastitis")
			->get();
		return $query8->num_rows();
	}
	public function firstQuartor_urine() {
		$query9 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Urine Examination")
			->get();
		return $query9->num_rows();
	}
	public function firstQuartor_brucella() {
		$query10 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Brucella Animal Combine")
			->get();
		return $query10->num_rows();
	}
	public function firstQuartor_banimal() {
		$query12 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Brucella Animal Individual")
			->get();
		return $query12->num_rows();
	}
	public function firstQuartor_bhuman() {
		$query13 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date <=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Brucella Human")
			->get();
		return $query13->num_rows();
	}
	public function firstQuartor_tuberculin() {
		$query14 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Tuberculin Skin Test (TST)")
			->get();
		return $query14->num_rows();
	}
	public function firstQuartor_waterbact() {
		$query15 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Water Bacteriology")
			->get();
		return $query15->num_rows();
	}
	public function firstQuartor_afs() {
		$query16 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->where('th.testHelp_name', "Acid Fast Staining")
			->get();
		return $query16->num_rows();
	}

// second reports........................................................./

public function secondtQuartor_t() {
		$query1 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=', date("Y") . "-07-01")
			->where('testdetails.result_date <=', date("Y") . "-09-31")
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query1->num_rows();
	}
	public function secondQuartor_Inpr() {
		$query2 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			 ->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('testdetails.post_status', 0)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query2->num_rows();
	}
	public function secondQuartor_com() {
		$query3 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			 ->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			 ->where('testdetails.post_status', 1)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query3->num_rows();
	}
	public function secondQuartor_can() {
		$query4 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('testdetails.is_cancel', 1)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query4->num_rows();
	}

	public function secondQuartor_ims() {
		$query6 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Impression Smear")
			->get();
		return $query6->num_rows();

	}
	public function secondQuartor_hemt() {
		$query7 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Hematology")
			->get();
		return $query7->num_rows();
	}
	public function secondQuartor_mast() {
		$query8 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Mastitis")
			->get();
		return $query8->num_rows();
	}
	public function secondQuartor_urine() {
		$query9 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Urine Examination")
			->get();
		return $query9->num_rows();
	}
	public function secondQuartor_brucella() {
		$query10 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Brucella Animal Combine")
			->get();
		return $query10->num_rows();
	}
	public function secondQuartor_banimal() {
		$query12 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Brucella Animal Individual")
			->get();
		return $query12->num_rows();
	}
	public function secondQuartor_bhuman() {
		$query13 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Brucella Human")
			->get();
		return $query13->num_rows();
	}
	public function secondQuartor_tuberculin() {
		$query14 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Tuberculin Skin Test (TST)")
			->get();
		return $query14->num_rows();
	}
	public function secondQuartor_waterbact() {
		$query15 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Water Bacteriology")
			->get();
		return $query15->num_rows();
	}
	public function secondQuartor_afs() {
		$query16 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-10-01")
             ->where('testdetails.result_date <=',date("Y")."-12-31")
			->where('th.testHelp_name', "Acid Fast Staining")
			->get();
		return $query16->num_rows();
	}


// third Quartor................................................../_

public function thirdQuartor_t() {
		$query1 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query1->num_rows();
	}
	public function thirdQuartor_Inpr() {
		$query2 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			 ->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('testdetails.post_status', 0)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query2->num_rows();
	}
	public function thirdQuartor_com() {
		$query3 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			 ->where('testdetails.post_status', 1)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query3->num_rows();
	}
	public function thirdQuartor_can() {
		$query4 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('testdetails.is_cancel', 1)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query4->num_rows();
	}

	public function thirdQuartor_ims() {
		$query6 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Impression Smear")
			->get();
		return $query6->num_rows();

	}
	public function thirdQuartor_hemt() {
		$query7 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Hematology")
			->get();
		return $query7->num_rows();
	}
	public function thirdQuartor_mast() {
		$query8 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Mastitis")
			->get();
		return $query8->num_rows();
	}
	public function thirdQuartor_urine() {
		$query9 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Urine Examination")
			->get();
		return $query9->num_rows();
	}
	public function thirdQuartor_brucella() {
		$query10 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Brucella Animal Combine")
			->get();
		return $query10->num_rows();
	}
	public function thirdQuartor_banimal() {
		$query12 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Brucella Animal Individual")
			->get();
		return $query12->num_rows();
	}
	public function thirdQuartor_bhuman() {
		$query13 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Brucella Human")
			->get();
		return $query13->num_rows();
	}
	public function thirdQuartor_tuberculin() {
		$query14 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Tuberculin Skin Test (TST)")
			->get();
		return $query14->num_rows();
	}
	public function thirdQuartor_waterbact() {
		$query15 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Water Bacteriology")
			->get();
		return $query15->num_rows();
	}
	public function thirdQuartor_afs() {
		$query16 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-01-01")
            ->where('testdetails.result_date <=',date("Y")."-03-31")
			->where('th.testHelp_name', "Acid Fast Staining")
			->get();
		return $query16->num_rows();
	}


// fourth reoprts......................................./
	public function FourthQuartor_t() {
		$query1 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			 ->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query1->num_rows();
	}
	public function FourthQuartor_Inpr() {
		$query2 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			 ->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('testdetails.post_status', 0)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query2->num_rows();
	}
	public function FourthQuartor_com() {
		$query3 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			 ->where('testdetails.post_status', 1)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query3->num_rows();
	}
	public function FourthQuartor_can() {
		$query4 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('testdetails.is_cancel', 1)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get();
		return $query4->num_rows();
	}

	public function FourthQuartor_ims() {
		$query6 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Impression Smear")
			->get();
		return $query6->num_rows();

	}
	public function FourthQuartor_hemt() {
		$query7 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Hematology")
			->get();
		return $query7->num_rows();
	}
	public function FourthQuartor_mast() {
		$query8 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Mastitis")
			->get();
		return $query8->num_rows();
	}
	public function FourthQuartor_urine() {
		$query9 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Urine Examination")
			->get();
		return $query9->num_rows();
	}
	public function FourthQuartor_brucella() {
		$query10 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Brucella Animal Combine")
			->get();
		return $query10->num_rows();
	}
	public function FourthQuartor_banimal() {
		$query12 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Brucella Animal Individual")
			->get();
		return $query12->num_rows();
	}
	public function FourthQuartor_bhuman() {
		$query13 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Brucella Human")
			->get();
		return $query13->num_rows();
	}
	public function FourthQuartor_tuberculin() {
		$query14 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Tuberculin Skin Test (TST)")
			->get();
		return $query14->num_rows();
	}
	public function FourthQuartor_waterbact() {
		$query15 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Water Bacteriology")
			->get();
		return $query15->num_rows();
	}
	public function FourthQuartor_afs() {
		$query16 = $this->db->select("*")
			->from("testdetails")
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->where('testdetails.result_date >=',date("Y")."-04-01")
             ->where('testdetails.result_date <=',date("Y")."-06-31")
			->where('th.testHelp_name', "Acid Fast Staining")
			->get();
		return $query16->num_rows();
	}


	public function get_FilterDetails($condition){
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
                                    ->join("districts", 'districts.district_id=client_info.district_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("breeds",'breeds.breed_id=testdetails.cattle_breed')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->join("tehsil", 'tehsil.tehsil_id=client_info.tehsil_id')
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->where($condition)
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_lab_by==1)
{
                 $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("districts", 'districts.district_id=client_info.district_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("breeds",'breeds.breed_id=testdetails.cattle_breed')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->join("tehsil", 'tehsil.tehsil_id=client_info.tehsil_id')
                                    ->where('tests.lab_id',$lab_id)
                                    ->where($condition)
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->get()->result();
}else if($permissions[2]->module_id == 3 && $permissions[2]->show_created_by==1)
{
                $query1  =  $this->db->select("*")
                                    ->from("testdetails")
                                    ->join("client_info",'client_info.client_id=testdetails.client_id')
                                    ->join("districts", 'districts.district_id=client_info.district_id')
                                    ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
                                    ->join("breeds",'breeds.breed_id=testdetails.cattle_breed')
                                    ->join("tests",'tests.test_id=testdetails.test_id')
                                    ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                                    ->join("samples",'samples.sample_id=testdetails.sample_id')
                                    ->join("tehsil", 'tehsil.tehsil_id=client_info.tehsil_id')
                                    ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                                    ->order_by('testdetails.testdetails_id','DESC')
                                    ->where($condition)
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
                                                        ->from("mrt")
                                                        ->where("mrt.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==7)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                        ->from("rbpt")
                                                        ->where("rbpt.testDetails_id",$q->testDetails_id)
                                                        ->get()->row();
                    } else if($q->testHelp_id==8)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                ->from("spat_human")
                                                                ->where("spat_human.testDetails_id",$q->testDetails_id)
                                                                ->get()->row();
                    }else if($q->testHelp_id==9)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("tuberculin_skin_test")
                                                                    ->where("tuberculin_skin_test.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }else if($q->testHelp_id==12)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("elisa_human")
                                                                    ->where("elisa_human.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }else if($q->testHelp_id==13)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("elisa_animal")
                                                                    ->where("elisa_animal.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }else if($q->testHelp_id==14)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("pcr_human")
                                                                    ->where("pcr_human.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }else if($q->testHelp_id==15)
                    {
                        $res[$q->testDetails_id]['testDetails'] = $q;
                        $res[$q->testDetails_id]['testType']    = $this->db->select("*")
                                                                    ->from("pcr_animal")
                                                                    ->where("pcr_animal.testDetails_id",$q->testDetails_id)
                                                                    ->get()->row();
                    }

                 }
                    return $res;
            }
                 

        }



}

?>