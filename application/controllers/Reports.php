<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Karachi');
		if (empty($this->session->userdata('user'))) {
			redirect('Login/logout');
		}
		$role_id = $this->session->userdata('user')['role'];
		$permissions = $this->User_m->getRecordWhere('role_permissions', ['role_id' => $role_id]);
		if ($permissions[4]->module_id == 5 && $permissions[4]->show_none == 1) {
			redirect('Login/logout');
		}
	}

/******************************************************************************************************************
 *                                                                                                                 *
 *       Reports -> lab wise view center wise view datewise test records pending records                           *
 *                                                                                                                 *
 *******************************************************************************************************************/
	public function labs_report() {
		$data['logUser']    = $this->User_m->getLogUserInfo();
		$data['logLab']     = $this->User_m->getLogUserLabInfo();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/reporting');

	}

	public function datewise_test_records() {
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab']  = $this->User_m->getLogUserLabInfo();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/datewiselabreporting', $data);

	}

	public function dwisereporting() {
		# code...

		$date = $this->input->post('first_date');
		$datee = $this->input->post('second_date');
		if (empty($date) || empty($datee)) {

		} else {
			$role_id = $this->session->userdata('user')['role'];
			$lab_id = $this->session->userdata('user')['lab_id'];
			$permissions = $this->User_m->getRecordWhere('role_permissions', ['role_id' => $role_id]);
			$query1 = '';
			if ($permissions[4]->module_id == 5 && $permissions[4]->show_all == 1) {
				$query1 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
				// ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query1);
			} else if ($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by == 1) {
				$query1 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.lab_id', $lab_id)
					->where('testdetails.result_date', $date)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query1);
			} else if ($permissions[4]->module_id == 5 && $permissions[4]->show_none == 1) {
				echo json_encode($query1);
			}

		}
	}
	public function lab_wise_data() {
		# code...
		if ($this->input->post('center_station_labs') != null) {
			$query2 = $this->db->select("*")
				->from("labs")
			//->join("center_station",'center_station.center_station_id=labs.center_station_id')
				->where("center_station_id", $this->input->post('center_station_labs'))
				->get()->result();
			echo json_encode($query2);

		} else if ($this->input->post('labs_id') == "all") {

			$status = $this->input->post('statuslab');
			$date = $this->input->post('first_date');
			$datee = $this->input->post('second_date');

			$center_station_id = $this->input->post('center_id');
			$labs_id = $this->input->post('labs_id');
			if ($status == "progress") {
				$query1 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)
					->where('testdetails.post_status', 0)
					->where('testdetails.is_cancel', 0)
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)

					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query1);
			} else if ($status == "Completed") {
				$query2 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)
					->where('testdetails.post_status', 1)
					->where('testdetails.is_cancel', 0)
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query2);
			} else if ($status == "Cancelled") {
				$query3 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)

					->where('testdetails.is_cancel', 1)
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query3);
			} else if ($status == "selectall") {
				$query4 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)

					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query4);
			} else {
				$query1 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)

					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query1);
			}
		} else {
			$center_station_id = $this->input->post('center_id');
			$labs_id = $this->input->post('labs_id');
			$date = $this->input->post('first_date');
			$datee = $this->input->post('second_date');
			$status = $this->input->post('statuslab');
			if ($status == "progress") {
				$query5 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)
					->where('tests.lab_id', $labs_id)
					->where('testdetails.post_status', 0)
					->where('testdetails.is_cancel', 0)
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query5);
			} else if ($status == "Completed") {
				$query6 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)
					->where('tests.lab_id', $labs_id)
					->where('testdetails.post_status', 1)
					->where('testdetails.is_cancel', 0)
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query6);
			} else if ($status == "Cancelled") {
				$query7 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)
					->where('tests.lab_id', $labs_id)
					->where('testdetails.post_status', 0)
					->where('testdetails.is_cancel', 1)
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query7);
			} else {
				$query8 = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->where('tests.center_station_id', $center_station_id)
					->where('tests.lab_id', $labs_id)

					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
				echo json_encode($query8);
			}
		}

	}
	public function center_wise_view() {

		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center'] = $this->db->get("center_station")->result_array();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/centerstationwiserecord', $data);

	}
	public function centr_wise_data() {
		# code...
		if ($this->input->post('center_station_labs') != null) {
			$query2 = $this->db->select("*")
				->from("labs")
			//->join("center_station",'center_station.center_station_id=labs.center_station_id')
				->where("center_station_id", $this->input->post('center_station_labs'))
				->get()->result();
			echo json_encode($query2);

		} else {

			$center_station_id = $this->input->post('center_id');
			$labs_id = $this->input->post('labs_id');
			$query1 = $this->db->select("*")
				->from("testdetails")
				->join("client_info", 'client_info.client_id=testdetails.client_id')
				->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
				->join("tests", 'tests.test_id=testdetails.test_id')
				->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
				->join("samples", 'samples.sample_id=testdetails.sample_id')
				->where('tests.center_station_id', $center_station_id)
				->where('tests.lab_id', $labs_id)
				->order_by('testdetails.testdetails_id', 'DESC')
				->get()->result();
			echo json_encode($query1);
		}
	}
	public function centerstation_wise_view() {

		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center_station'] = $this->db->get("center_station")->result_array();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/centerstationwiserecord', $data);
		$this->load->view('template_parts/footer');

	}
	public function pending_report() {

		$data['records'] = $this->API_m->get_PendingReports();
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center'] = $this->db->get("center_station")->result_array();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/pending_reports', $data);
		$this->load->view('template_parts/footer');
	}
	public function pending_report_ajax() {
		# code...
		if ($this->input->post('center_station_labs') != null) {
			$query2 = $this->db->select("*")
				->from("labs")
			//->join("center_station",'center_station.center_station_id=labs.center_station_id')
				->where("center_station_id", $this->input->post('center_station_labs'))
				->get()->result();
			echo json_encode($query2);

		} else {

			$center_station_id = $this->input->post('center_id');
			$labs_id = $this->input->post('labs_id');
			$query1 = $this->db->select("*")
				->from("testdetails")
				->join("client_info", 'client_info.client_id=testdetails.client_id')
				->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
				->join("tests", 'tests.test_id=testdetails.test_id')
				->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
				->join("samples", 'samples.sample_id=testdetails.sample_id')
				->where('testdetails.post_status', 0)
				->where('testdetails.is_cancel', 0)
				->where('tests.center_station_id', $center_station_id)
				->where('tests.lab_id', $labs_id)
				->order_by('testdetails.testdetails_id', 'DESC')
				->get()->result();
			echo json_encode($query1);
		}
	}
	public function cancelled_report() {

		$data['records'] = $this->API_m->get_CancelledReports();
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center'] = $this->db->get("center_station")->result_array();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/cancelled_reports', $data);
		$this->load->view('template_parts/footer');
	}
	public function cancel_report_ajax() {
		# code...
		if ($this->input->post('center_station_labs') != null) {
			$query2 = $this->db->select("*")
				->from("labs")
			//->join("center_station",'center_station.center_station_id=labs.center_station_id')
				->where("center_station_id", $this->input->post('center_station_labs'))
				->get()->result();
			echo json_encode($query2);

		} else {

			$center_station_id = $this->input->post('center_id');
			$labs_id = $this->input->post('labs_id');
			$query1 = $this->db->select("*")
				->from("testdetails")
				->join("client_info", 'client_info.client_id=testdetails.client_id')
				->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
				->join("tests", 'tests.test_id=testdetails.test_id')
				->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
				->join("samples", 'samples.sample_id=testdetails.sample_id')
				->where('testdetails.is_cancel', 1)
				->where('tests.center_station_id', $center_station_id)
				->where('tests.lab_id', $labs_id)
				->order_by('testdetails.testdetails_id', 'DESC')
				->get()->result();
			echo json_encode($query1);
		}
	}

	public function posted_report() {

		$data['records'] = $this->API_m->get_PostedReports();
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center'] = $this->db->get("center_station")->result_array();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/posted_reports', $data);
		$this->load->view('template_parts/footer');
	}
	public function posted_report_ajax() {
		# code...
		if ($this->input->post('center_station_labs') != null) {
			$query2 = $this->db->select("*")
				->from("labs")
			//->join("center_station",'center_station.center_station_id=labs.center_station_id')
				->where("center_station_id", $this->input->post('center_station_labs'))
				->get()->result();
			echo json_encode($query2);

		} else {

			$center_station_id = $this->input->post('center_id');
			$labs_id = $this->input->post('labs_id');
			$query1 = $this->db->select("*")
				->from("testdetails")
				->join("client_info", 'client_info.client_id=testdetails.client_id')
				->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
				->join("tests", 'tests.test_id=testdetails.test_id')
				->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
				->join("samples", 'samples.sample_id=testdetails.sample_id')
				->where('tests.center_station_id', $center_station_id)
				->where('tests.lab_id', $labs_id)
				->where('testdetails.post_status', 1)
				->order_by('testdetails.testdetails_id', 'DESC')
				->get()->result();
			echo json_encode($query1);
		}
	}

	public function test_reports() {

		$data['records'] = $this->API_m->get_allReports();
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center'] = $this->db->get("center_station")->result_array();
		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/alltest_reports', $data);
		$this->load->view('template_parts/footer');
	}
	public function test_report_ajax() {
		# code...
		if ($this->input->post('center_station_labs') != null) {
			$query2 = $this->db->select("*")
				->from("labs")
			//->join("center_station",'center_station.center_station_id=labs.center_station_id')
				->where("center_station_id", $this->input->post('center_station_labs'))
				->get()->result();
			echo json_encode($query2);

		} else {

			$center_station_id = $this->input->post('center_id');
			$labs_id = $this->input->post('labs_id');
			$query1 = $this->db->select("*")
				->from("testdetails")
				->join("client_info", 'client_info.client_id=testdetails.client_id')
				->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
				->join("tests", 'tests.test_id=testdetails.test_id')
				->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
				->join("samples", 'samples.sample_id=testdetails.sample_id')
				->where('tests.center_station_id', $center_station_id)
				->where('tests.lab_id', $labs_id)
				->order_by('testdetails.testdetails_id', 'DESC')
				->get()->result();
			echo json_encode($query1);
		}
	}

	public function pending_test() {
		$center_station_id = $this->input->post('center_id');
		$labs_id = $this->input->post('labs');
		if ($labs_id == "all") {
			$data['records'] = $this->db->select("*")
				->from("testdetails")
				->join("client_info", 'client_info.client_id=testdetails.client_id')
				->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
				->join("tests", 'tests.test_id=testdetails.test_id')
				->join("labs", 'labs.lab_id=tests.lab_id')
				->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
				->join("samples", 'samples.sample_id=testdetails.sample_id')
				->join("sections", 'sections.section_id =tests.section_id')
				->join("sectionhelp", 'sectionhelp.sectionHelp_id =sections.sectionHelp_id')
				->join("center_station", 'center_station.center_station_id =sections.center_station_id')
				->where('tests.center_station_id', $center_station_id)

				->where('testdetails.post_status', 0)
				->where('testdetails.is_cancel', 0)
				->order_by('testdetails.testdetails_id', 'DESC')
				->get()->result();
			$data['logUser'] = $this->User_m->getLogUserInfo();
			$data['logLab'] = $this->User_m->getLogUserLabInfo();
			$data['center'] = $this->db->get("center_station")->result_array();
			$this->load->view('template_parts/header', $data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/pending_tests', $data);
			$this->load->view('template_parts/footer');
		} else {

			$data['records'] = $this->db->select("*")
				->from("testdetails")
				->join("client_info", 'client_info.client_id=testdetails.client_id')
				->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
				->join("tests", 'tests.test_id=testdetails.test_id')
				->join("labs", 'labs.lab_id=tests.lab_id')
				->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
				->join("samples", 'samples.sample_id=testdetails.sample_id')
				->join("sections", 'sections.section_id =tests.section_id')
				->join("sectionhelp", 'sectionhelp.sectionHelp_id =sections.sectionHelp_id')
				->join("center_station", 'center_station.center_station_id =sections.center_station_id')
				->where('tests.center_station_id', $center_station_id)
				->where('tests.lab_id', $labs_id)
				->where('testdetails.post_status', 0)
				->where('testdetails.is_cancel', 0)
				->order_by('testdetails.testdetails_id', 'DESC')
				->get()->result();
			$data['logUser'] = $this->User_m->getLogUserInfo();
			$data['logLab'] = $this->User_m->getLogUserLabInfo();
			$data['center'] = $this->db->get("center_station")->result_array();
			$this->load->view('template_parts/header', $data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/pending_tests', $data);
			$this->load->view('template_parts/footer');
		}
	}
	



	
      

	public function pending_test_ajax() {
		$center_station_id = $this->input->post('center_id');
		$labs_id = $this->input->post('labs_id');
		$data = $this->db->select("*")
			->from("testdetails")
			->join("client_info", 'client_info.client_id=testdetails.client_id')
			->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join("labs", 'labs.lab_id=tests.lab_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->join("samples", 'samples.sample_id=testdetails.sample_id')
			->join("sections", 'sections.section_id =tests.section_id')
			->join("sectionhelp", 'sectionhelp.sectionHelp_id =sections.sectionHelp_id')
			->join("center_station", 'center_station.center_station_id =sections.center_station_id')
			->where('tests.center_station_id', $center_station_id)
			->where('tests.lab_id', $labs_id)
			->where('testdetails.post_status', 0)
			->where('testdetails.is_cancel', 0)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get()->result();
		echo json_encode($data);

	}

	public function countreports() {
		$testHelp_id = $this->input->post('testHelp_id');

		$data['records'] = $this->db->select("*")
			->from("testdetails")
			->join("client_info", 'client_info.client_id=testdetails.client_id')
			->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
			->join("tests", 'tests.test_id=testdetails.test_id')
			->join("labs", 'labs.lab_id=tests.lab_id')
			->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
			->join("samples", 'samples.sample_id=testdetails.sample_id')
			->join("sections", 'sections.section_id =tests.section_id')
			->join("sectionhelp", 'sectionhelp.sectionHelp_id =sections.sectionHelp_id')
			->join("center_station", 'center_station.center_station_id =sections.center_station_id')
			->where('tests.testHelp_id', $testHelp_id)
			->order_by('testdetails.testdetails_id', 'DESC')
			->get()->result();

	}
	public function district_tehsils() {
		# code...
		$district_id = $this->input->post("district_id");
		$data = $this->db->select("*")
			->from("tehsil")
			->where("district_id", $district_id)
			->get()->result();
		echo json_encode($data);

	}

	public function RepDistrict_tehsils() {
		# code...
		$district_id = $this->input->post("district_id");
		$data = $this->db->select("*")
			->from("tehsil")
			->where("district_id", $district_id)
			->where("is_trash",0)
			->get()->result();
		echo json_encode($data);

	}

	

	
	public function districtlabsreports_old() {
		$data["districtreports"] = "null";
		if ($this->input->post('first_date') == "null") {

			$date = $this->input->post('first_date');
			$datee = $this->input->post('second_date');
			$sample_id = $this->input->post('sample_id');
			$testHelp_id = $this->input->post('testHelp_id');
			$district_id = $this->input->post('district_id');
			$tehsil_id = $this->input->post('tehsil_id');
			# code...

			if ($this->input->post('district_id') == "all") {

				$data["districtreports"] = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->join("center_station", 'center_station.center_station_id =tests.center_station_id')
					->join("district", 'district.district_id=center_station.district_id')
					->join("tehsil", 'tehsil.tehsile_id=district.tehsile_id')
				// ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->where('th.testHelp_id', $testHelp_id)
					->where('testdetails.sample_id', $sample_id)
				//->where('center_station.district_id',$district_id)
				//->where('district.tehsile_id',$tehsil_id)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();
			} else {
				$data["districtreports"] = $this->db->select("*")
					->from("testdetails")
					->join("client_info", 'client_info.client_id=testdetails.client_id')
					->join("cattles", 'cattles.cattle_id=testdetails.cattle_name')
					->join("tests", 'tests.test_id=testdetails.test_id')
					->join('testhelp as th', 'th.testHelp_id=tests.testHelp_id')
					->join("samples", 'samples.sample_id=testdetails.sample_id')
					->join("center_station", 'center_station.center_station_id =tests.center_station_id')
					->join("district", 'district.district_id=center_station.district_id')
					->join("tehsil", 'tehsil.tehsile_id=district.tehsile_id')
				// ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
					->where('testdetails.result_date >=', $date)
					->where('testdetails.result_date <=', $datee)
					->where('th.testHelp_id', $testHelp_id)
					->where('testdetails.sample_id', $sample_id)
					->where('center_station.district_id', $district_id)
				//->where('district.tehsile_id',$tehsil_id)
					->order_by('testdetails.testdetails_id', 'DESC')
					->get()->result();

			}
		}
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center'] = $this->db->get("center_station")->result_array();
		$data['tests'] = $this->API_m->getAllTestTypes();
		$this->load->view('template_parts/header',$data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/districtwiselab', $data);
		$this->load->view('template_parts/footer');
	}

	public function districcountreports() {
		// $testHelp_id = $this->input->post('testHelp_id');

		//          $data['records'] =  $this->db->select("*")
		//                       ->from("testdetails")
		//                       ->join("client_info",'client_info.client_id=testdetails.client_id')
		//                       ->join("cattles",'cattles.cattle_id=testdetails.cattle_name')
		//                       ->join("tests",'tests.test_id=testdetails.test_id')
		//                       ->join("labs",'labs.lab_id=tests.lab_id')
		//                       ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
		//                       ->join("samples",'samples.sample_id=testdetails.sample_id')
		//                       ->join("sections",'sections.section_id =tests.section_id')
		//                       ->join("sectionhelp",'sectionhelp.sectionHelp_id =sections.sectionHelp_id')
		//                       ->join("center_station",'center_station.center_station_id =sections.center_station_id')
		//                       ->where('tests.testHelp_id',$testHelp_id)
		//                       ->order_by('testdetails.testdetails_id','DESC')
		//                       ->get()->result();
		$data['records'] = $this->API_m->get_allReports();
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$data['center'] = $this->db->get("center_station")->result_array();
		$data['tests'] = $this->API_m->getAllTestTypes();

		$this->load->view('template_parts/header', $data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/districtwisecountreport', $data);
		$this->load->view('template_parts/footer');

	}

	public function quarters() {
		$data['logUser'] = $this->User_m->getLogUserInfo();
		$data['logLab'] = $this->User_m->getLogUserLabInfo();
		$this->load->view('template_parts/header',$data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/quarterspage');
		$this->load->view('template_parts/footer');

	}

	public function fullReport() {

		if ($this->input->post('submit')) {

			$getTest = $this->Reports_model->getTest();
			$var_arr = array();
			foreach ($getTest as $key => $getTestInfo) {
				$var_arr[] = $this->Reports_model->details_report($getTestInfo['test_id']);
			}
			$result = [];

			foreach ($var_arr as $value) {
				$result = array_merge($result, $value);
			}
			$data["lab_wise_labreporting"] = $result;

			$role_id = $this->session->userdata('user')['role'];
			$lab_id = $this->session->userdata('user')['lab_id'];
			$permissions = $this->User_m->getRecordWhere('role_permissions', ['role_id' => $role_id]);
			$data['tests'] = '';
			$data['labs'] = '';
			if ($permissions[4]->module_id == 5 && $permissions[4]->show_all == 1) {
				$data['tests'] = $this->API_m->getTestTypes();
				$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0]);
			} else if ($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by == 1) {
				$data['tests'] = $this->API_m->getTestTypes_byLab($lab_id);
				$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0, 'lab_id' => $lab_id]);
			} else if ($permissions[4]->module_id == 5 && $permissions[4]->show_none == 1) {
				$data['tests'] = '';
				$data['labs'] = '';

			}
			
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['testItems'] = $this->API_m->getRecordWhere('testhelp', ['is_trash' => 0]);
			$data['samples'] = $this->API_m->getRecordWhere('samples', ['is_trash' => 0]);
			$data['logUser'] = $this->User_m->getLogUserInfo();
			$data['logLab'] = $this->User_m->getLogUserLabInfo();
			$this->load->view('template_parts/header', $data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/detailreports', $data);
			$this->load->view('template_parts/footer');

		} else {
			$data["lab_wise_labreporting"] = $this->Reports_model->details_report();

			$role_id = $this->session->userdata('user')['role'];
			$lab_id = $this->session->userdata('user')['lab_id'];
			$permissions = $this->User_m->getRecordWhere('role_permissions', ['role_id' => $role_id]);
			$data['tests'] = '';
			$data['labs'] = '';
			if ($permissions[4]->module_id == 5 && $permissions[4]->show_all == 1) {
				$data['tests'] = $this->API_m->getTestTypes();
				$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0]);
			} else if ($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by == 1) {
				$data['tests'] = $this->API_m->getTestTypes_byLab($lab_id);
				$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0, 'lab_id' => $lab_id]);
			} else if ($permissions[4]->module_id == 5 && $permissions[4]->show_none == 1) {
				$data['tests'] = '';
				$data['labs'] = '';
				}
			}
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['testItems'] = $this->API_m->getRecordWhere('testhelp', ['is_trash' => 0]);
			$data['samples'] = $this->API_m->getRecordWhere('samples', ['is_trash' => 0]);
			$data['logUser'] = $this->User_m->getLogUserInfo();
			$data['logLab'] = $this->User_m->getLogUserLabInfo();
			$data['center'] = $this->db->get("center_station")->result_array();
			$data['tests'] = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header', $data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/detailreports', $data);
			$this->load->view('template_parts/footer');

	}



 public function testtypereports() {
 		$condition = '';
		if ($this->input->post('submit')) {
				
				$first_date        = $this->input->post('first_date');
				$second_date       = $this->input->post('second_date');
				$client_type       = $this->input->post('client_type');
				$district_id       = $this->input->post('district_id');
				$directorate_id    = $this->input->post('directorate_id');
				$center_station_id = $this->input->post('center_station_id');
				$section_id        = $this->input->post('section_id');
				$lab_id            = $this->input->post('lab_id');
				$testHelp_id       = $this->input->post('testHelp_id');

				
			if ($first_date != '' && $second_date != '') {

				$condition = " testdetails.posted_date BETWEEN '" . $first_date . "' and '" . $second_date . "' ";
			}
			 if(!empty($client_type))
			 {
			 	if($client_type!='all')
			 	{
			 		$condition.= ' and client_info.type = "'.$client_type.'"';
			 	}else
			 	{ 
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($district_id))
			 {
			 	if($district_id!='all')
			 	{
			 		$condition.= ' and  client_info.district_id ='.$district_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($directorate_id))
			 {
			 	if($directorate_id!='all')
			 	{
			 		$condition.= ' and   tests.directorate_id ='.$directorate_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($center_station_id))
			 {
			 	if($center_station_id!='all')
			 	{
			 		$condition.= ' and tests.center_station_id ='.$center_station_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($section_id))
			 {
			 	if($section_id!='all')
			 	{
			 		$condition.= ' and  tests.section_id ='.$section_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($lab_id))
			 {
			 	if($lab_id!='all')
			 	{
			 		$condition.= ' and  tests.lab_id ='.$lab_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($testHelp_id))
			 {
			 	if($testHelp_id!='all')
			 	{
			 		$condition.= ' and tests.testHelp_id ='.$testHelp_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }

			
			// $data["reports"] = $this->Reports_model->get_FilterDetails($condition);
	       	// echo "<pre>";
	       	// print_r($data["reports"]);
	       	// exit();
			$data["reports"]         = $this->Reports_model->get_FilterDetails($condition);
			$data['directorates']    = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['logUser']         = $this->User_m->getLogUserInfo();
			$data['logLab']          = $this->User_m->getLogUserLabInfo();
			// $data['center']          = $this->db->get("center_station")->result_array();
			// $data['tests']           = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/testtypewisereports', $data);
			$this->load->view('template_parts/footer');

	}else
	{
		$data["reports"] = '';
		// $data["districtreports"] = "null";
		$data['directorates']    = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
		$data['logUser']         = $this->User_m->getLogUserInfo();
		$data['logLab']          = $this->User_m->getLogUserLabInfo();
		// $data['center']          = $this->db->get("center_station")->result_array();
		// $data['tests']           = $this->API_m->getAllTestTypes();
		$this->load->view('template_parts/header',$data);
		$this->load->view('template_parts/menu');
		$this->load->view('template_parts/asidemenu');
		$this->load->view('pages/testtypewisereports', $data);
		$this->load->view('template_parts/footer');
	}
}

	public function samplereports(){

			$condition = '';
		if ($this->input->post('submit')) {
				
				$first_date        = $this->input->post('first_date');
				$second_date       = $this->input->post('second_date');
				$client_type       = $this->input->post('client_type');
				$district_id       = $this->input->post('district_id');
				$directorate_id    = $this->input->post('directorate_id');
				$center_station_id = $this->input->post('center_station_id');
				$section_id        = $this->input->post('section_id');
				$lab_id            = $this->input->post('lab_id');
				$sample_id         = $this->input->post('sample_id');

				
			if ($first_date != '' && $second_date != '') {

				$condition = " testdetails.created_date BETWEEN '" .$first_date. "' and '" .$second_date. "' ";
			}
			 if(!empty($client_type))
			 {
			 	if($client_type!='all')
			 	{
			 		$condition.= ' and client_info.type = "'.$client_type.'"';
			 	}else
			 	{ 
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($district_id))
			 {
			 	if($district_id!='all')
			 	{
			 		$condition.= ' and  client_info.district_id ='.$district_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($directorate_id))
			 {
			 	if($directorate_id!='all')
			 	{
			 		$condition.= ' and   tests.directorate_id ='.$directorate_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($center_station_id))
			 {
			 	if($center_station_id!='all')
			 	{
			 		$condition.= ' and tests.center_station_id ='.$center_station_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($section_id))
			 {
			 	if($section_id!='all')
			 	{
			 		$condition.= ' and  tests.section_id ='.$section_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($lab_id))
			 {
			 	if($lab_id!='all')
			 	{
			 		$condition.= ' and  tests.lab_id ='.$lab_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($sample_id))
			 {
			 	if($sample_id!='all')
			 	{
			 		$condition.= ' and testdetails.sample_id ='.$sample_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }

			// $getDistrictTehsilWise = $this->Reports_model->getDistrictTehsilWise();
			// $var_arr = array();
			// foreach ($getDistrictTehsilWise as $key => $getDistrictTehsilWiseInfo) {
			// 	$var_arr[] = $this->Reports_model->districtlabsreports($getDistrictTehsilWiseInfo['client_id']);
			// }
			// $result = [];

			// foreach ($var_arr as $value) {
			// 	$result = array_merge($result, $value);
			// }
			// $data["districtreports"] = $result;
			$data["reports"]         = $this->Reports_model->get_FilterDetails($condition);
			$data['directorates']    = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['logUser']         = $this->User_m->getLogUserInfo();
			$data['logLab']          = $this->User_m->getLogUserLabInfo();
			// $data['center']          = $this->db->get("center_station")->result_array();
			// $data['tests']           = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/samplereports', $data);
			$this->load->view('template_parts/footer');

		} else {
			$data["reports"]      = '';
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['logUser']      = $this->User_m->getLogUserInfo();
			$data['logLab']       = $this->User_m->getLogUserLabInfo();
			// $data['center']       = $this->db->get("center_station")->result_array();
			// $data['tests']        = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/samplereports', $data);
			$this->load->view('template_parts/footer');
		}
	}


	public function Animalreports() {

			$condition = '';
		if ($this->input->post('submit')) {
				
				$first_date        = $this->input->post('first_date');
				$second_date       = $this->input->post('second_date');
				$client_type       = $this->input->post('client_type');
				$district_id       = $this->input->post('district_id');
				$directorate_id    = $this->input->post('directorate_id');
				$center_station_id = $this->input->post('center_station_id');
				$section_id        = $this->input->post('section_id');
				$lab_id            = $this->input->post('lab_id');
				$cattle_id         = $this->input->post('cattle_id');

				
			if ($first_date != '' && $second_date != '') {

				$condition = " testdetails.posted_date BETWEEN '" . $first_date . "' and '" . $second_date . "' ";
			}
			 if(!empty($client_type))
			 {
			 	if($client_type!='all')
			 	{
			 		$condition.= ' and client_info.type = "'.$client_type.'"';
			 	}else
			 	{ 
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($district_id))
			 {
			 	if($district_id!='all')
			 	{
			 		$condition.= ' and  client_info.district_id ='.$district_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($directorate_id))
			 {
			 	if($directorate_id!='all')
			 	{
			 		$condition.= ' and   tests.directorate_id ='.$directorate_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($center_station_id))
			 {
			 	if($center_station_id!='all')
			 	{
			 		$condition.= ' and tests.center_station_id ='.$center_station_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($section_id))
			 {
			 	if($section_id!='all')
			 	{
			 		$condition.= ' and  tests.section_id ='.$section_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($lab_id))
			 {
			 	if($lab_id!='all')
			 	{
			 		$condition.= ' and  tests.lab_id ='.$lab_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($cattle_id))
			 {
			 	if($cattle_id!='all')
			 	{
			 		$condition.= ' and testdetails.cattle_name ='.$cattle_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }


			// $getDistrictTehsilWise = $this->Reports_model->getDistrictTehsilWise();
			// $var_arr = array();
			// foreach ($getDistrictTehsilWise as $key => $getDistrictTehsilWiseInfo) {
			// 	$var_arr[] = $this->Reports_model->districtlabsreports($getDistrictTehsilWiseInfo['client_id']);
			// }
			// $result = [];

			// foreach ($var_arr as $value) {
			// 	$result = array_merge($result, $value);
			// }
			// $data["districtreports"] = $result;
			///////////
			 $data["reports"]     = $this->Reports_model->get_FilterDetails($condition);
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['logUser']      = $this->User_m->getLogUserInfo();
			$data['logLab']       = $this->User_m->getLogUserLabInfo();
			// $data['center'] = $this->db->get("center_station")->result_array();
			// $data['tests'] = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/aminalreports', $data);
			$this->load->view('template_parts/footer');

		} else {
			$data["reports"]      = '';
			// $data["districtreports"] = "null";
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['logUser']      = $this->User_m->getLogUserInfo();
			$data['logLab']       = $this->User_m->getLogUserLabInfo();
			// $data['center']       = $this->db->get("center_station")->result_array();
			// $data['tests']        = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/aminalreports', $data);
			$this->load->view('template_parts/footer');
		}

	}
public function lab_wise_view() {

	$condition = '';
		if ($this->input->post('submit')) {
				
				$first_date        = $this->input->post('first_date');
				$second_date       = $this->input->post('second_date');
				$client_type       = $this->input->post('client_type');
				$district_id       = $this->input->post('district_id');
				$directorate_id    = $this->input->post('directorate_id');
				$center_station_id = $this->input->post('center_station_id');
				$section_id        = $this->input->post('section_id');
				$lab_id            = $this->input->post('lab_id');
				$status            = $this->input->post('status');

				
			if ($first_date != '' && $second_date != '') {

				$condition = " testdetails.created_date BETWEEN '" . $first_date . "' and '" . $second_date . "' ";
			}
			 if(!empty($client_type))
			 {
			 	if($client_type!='all')
			 	{
			 		$condition.= ' and client_info.type = "'.$client_type.'"';
			 	}else
			 	{ 
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($district_id))
			 {
			 	if($district_id!='all')
			 	{
			 		$condition.= ' and  client_info.district_id ='.$district_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($directorate_id))
			 {
			 	if($directorate_id!='all')
			 	{
			 		$condition.= ' and   tests.directorate_id ='.$directorate_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($center_station_id))
			 {
			 	if($center_station_id!='all')
			 	{
			 		$condition.= ' and tests.center_station_id ='.$center_station_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($section_id))
			 {
			 	if($section_id!='all')
			 	{
			 		$condition.= ' and  tests.section_id ='.$section_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($lab_id))
			 {
			 	if($lab_id!='all')
			 	{
			 		$condition.= ' and  tests.lab_id ='.$lab_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 
		 	if($status!='all')
		 	{
		 		if($status==0)
		 		{
		 			$condition.= ' and testdetails.post_status ='.$status;
		 		}else if($status==1)
		 		{
		 			$condition.= ' and testdetails.post_status ='.$status;
		 		}else if($status==2)
		 		{
		 			$condition.= ' and testdetails.is_cancel =1';
		 		}
		 	}else
		 	{
		 		$condition.= ' ';
		 	}
		


			// $getTest = $this->Reports_model->getTest();
			// $var_arr = array();
			// foreach ($getTest as $key => $getTestInfo) {
			// 	$var_arr[] = $this->Reports_model->lab_wise_view_report($getTestInfo['test_id']);
			// }
			// $result = [];

			// foreach ($var_arr as $value) {
			// 	$result = array_merge($result, $value);
			// }
			// $data["lab_wise_labreporting"] = $result;

			// $role_id = $this->session->userdata('user')['role'];
			// $lab_id = $this->session->userdata('user')['lab_id'];
			// $permissions = $this->User_m->getRecordWhere('role_permissions', ['role_id' => $role_id]);
			// $data['tests'] = '';
			// $data['labs'] = '';
			// if ($permissions[4]->module_id == 5 && $permissions[4]->show_all == 1) {
			// 	$data['tests'] = $this->API_m->getTestTypes();
			// 	$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0]);
			// } else if ($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by == 1) {
			// 	$data['tests'] = $this->API_m->getTestTypes_byLab($lab_id);
			// 	$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0, 'lab_id' => $lab_id]);
			// } else if ($permissions[4]->module_id == 5 && $permissions[4]->show_none == 1) {
			// 	$data['tests'] = '';
			// 	$data['labs'] = '';

			// }
			$data["reports"]      = $this->Reports_model->get_FilterDetails($condition);
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			// $data['testItems']    = $this->API_m->getRecordWhere('testhelp', ['is_trash' => 0]);
			// $data['samples']      = $this->API_m->getRecordWhere('samples', ['is_trash' => 0]);
			$data['logUser']      = $this->User_m->getLogUserInfo();
			$data['logLab']       = $this->User_m->getLogUserLabInfo();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/lab_wise_labreporting', $data);
			$this->load->view('template_parts/footer');

		} else {
			$data["reports"] = "";

			// $role_id = $this->session->userdata('user')['role'];
			// $lab_id = $this->session->userdata('user')['lab_id'];
			// $permissions = $this->User_m->getRecordWhere('role_permissions', ['role_id' => $role_id]);
			// $data['tests'] = '';
			// $data['labs'] = '';
			// if ($permissions[4]->module_id == 5 && $permissions[4]->show_all == 1) {
			// 	$data['tests'] = $this->API_m->getTestTypes();
			// 	$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0]);
			// } else if ($permissions[4]->module_id == 5 && $permissions[4]->show_lab_by == 1) {
			// 	$data['tests'] = $this->API_m->getTestTypes_byLab($lab_id);
			// 	$data['labs'] = $this->API_m->getRecordWhere('labs', ['is_trash' => 0, 'lab_id' => $lab_id]);
			// } else if ($permissions[4]->module_id == 5 && $permissions[4]->show_none == 1) {
			// 	$data['tests'] = '';
			// 	$data['labs'] = '';

			// }
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			// $data['testItems']    = $this->API_m->getRecordWhere('testhelp', ['is_trash' => 0]);
			// $data['samples']      = $this->API_m->getRecordWhere('samples', ['is_trash' => 0]);
			$data['logUser']      = $this->User_m->getLogUserInfo();
			$data['logLab']       = $this->User_m->getLogUserLabInfo();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/lab_wise_labreporting', $data);
			$this->load->view('template_parts/footer');
		}

	}
	public function districtlabsreports() {
		$condition = '';
		if ($this->input->post('submit')) {
				
				$first_date        = $this->input->post('first_date');
				$second_date       = $this->input->post('second_date');
				$district_id       = $this->input->post('district_id');
				$tehsil_id         = $this->input->post('tehsil_id');
				$test_id           = $this->input->post('test_id');
				$sample_id         = $this->input->post('sample_id');

				
			if ($first_date != '' && $second_date != '') {

				$condition = " testdetails.created_date BETWEEN '" . $first_date . "' and '" . $second_date . "' ";
			}
			 
			 if(!empty($district_id))
			 {
			 	if($district_id!='all')
			 	{
			 		$condition.= ' and  client_info.district_id ='.$district_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($tehsil_id))
			 {
			 	if($tehsil_id!='all')
			 	{
			 		$condition.= ' and   client_info.tehsil_id ='.$tehsil_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($test_id))
			 {
			 	if($test_id!='all')
			 	{
			 		$condition.= ' and testdetails.test_id ='.$test_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 if(!empty($sample_id))
			 {
			 	if($sample_id!='all')
			 	{
			 		$condition.= ' and  testdetails.sample_id ='.$sample_id;
			 	}else
			 	{
			 		$condition.= ' ';
			 	}
			 }
			 
			// $getDistrictTehsilWise = $this->Reports_model->getDistrictTehsilWise();
			// $var_arr = array();
			// foreach ($getDistrictTehsilWise as $key => $getDistrictTehsilWiseInfo) {
			// 	$var_arr[] = $this->Reports_model->districtlabsreports($getDistrictTehsilWiseInfo['client_id']);
			// }
			// $result = [];

			// foreach ($var_arr as $value) {
			// 	$result = array_merge($result, $value);
			// }
			// $data["districtreports"] = $result;
			///////////
			$data["reports"]  = $this->Reports_model->get_FilterDetails($condition);
			$data['logUser']  = $this->User_m->getLogUserInfo();
			$data['logLab']   = $this->User_m->getLogUserLabInfo();
			// $data['center']   = $this->db->get("center_station")->result_array();
			$data['tests']    = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/districtwiselab', $data);
			$this->load->view('template_parts/footer');

		} else {
			$data["reports"]  = "";
			// $data["districtreports"] = "null";
			$data['logUser']  = $this->User_m->getLogUserInfo();
			$data['logLab']   = $this->User_m->getLogUserLabInfo();
			// $data['center']   = $this->db->get("center_station")->result_array();
			$data['tests']    = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/districtwiselab', $data);
			$this->load->view('template_parts/footer');
		}
	}

	public function searchSampleReports() {

		if ($this->input->post('submit')) {

			$getDistrictTehsilWise = $this->Reports_model->getDistrictTehsilWise();
			$var_arr = array();
			foreach ($getDistrictTehsilWise as $key => $getDistrictTehsilWiseInfo) {
				$var_arr[] = $this->Reports_model->districtlabsreports($getDistrictTehsilWiseInfo['client_id']);
			}
			$result = [];

			foreach ($var_arr as $value) {
				$result = array_merge($result, $value);
			}
			$data["districtreports"] = $result;
			///////////
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['logUser'] = $this->User_m->getLogUserInfo();
			$data['logLab'] = $this->User_m->getLogUserLabInfo();
			$data['center'] = $this->db->get("center_station")->result_array();
			$data['tests'] = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/samplereports', $data);
			$this->load->view('template_parts/footer');

		} else {
			$data["districtreports"] = $this->Reports_model->districtlabsreports();
			// $data["districtreports"] = "null";
			$data['directorates'] = $this->API_m->getRecordWhere('directorates', ['is_trash' => 0]);
			$data['logUser'] = $this->User_m->getLogUserInfo();
			$data['logLab'] = $this->User_m->getLogUserLabInfo();
			$data['center'] = $this->db->get("center_station")->result_array();
			$data['tests'] = $this->API_m->getAllTestTypes();
			$this->load->view('template_parts/header',$data);
			$this->load->view('template_parts/menu');
			$this->load->view('template_parts/asidemenu');
			$this->load->view('pages/samplereports', $data);
			$this->load->view('template_parts/footer');
		}

	}


// ************************ Start methods for Reports through ajax operation 

    public function getStations()
    {
         $stations ='';
         $id       = $this->input->post('directorate_id');
        if($id=='all')
        {
          $stations = $this->API_m->getRecordWhere('center_station',['is_trash' => 0]);
        }else
        {
          $stations = $this->API_m->getRecordWhere('center_station',['directorate_id' => $id,'is_trash' => 0]);
        }
        echo json_encode($stations);
    }
    public function GetSections()
    {
    	$section  = '';
        $id       = $this->input->post('center_station_id');
    	if($id=='all')
		{
          $section  = $this->API_m->GetRepSectionsItems();
		}else
		{
          $section  = $this->API_m->GetSectionsItems($id);
		}
        // echo "<pre>";
        echo json_encode($section);
    }
    public function GetLabs()
    {
    	$labs     = '';
        $id       = $this->input->post('section_id');
        if($id=='all')
		{
           $labs  = $this->API_m->getRecordWhere('labs',['is_trash' => 0]);
		}else
		{
           $labs  = $this->API_m->getRecordWhere('labs',['section_id' => $id,'is_trash' => 0]);
		}
        echo json_encode($labs);
    }
    public function getTestNames()
    {
    	$testNames     = '';
        $id            = $this->input->post('lab_id');
        if($id=='all')
		{
           $testNames  = $this->API_m->getRepTestNames();
		}else
		{
           $testNames  = $this->API_m->getTestNames($id);
		}
        echo json_encode($testNames);
    }
    public function getRepTehsil()
    {
    	$tehils     = '';
        $id         = $this->input->post('district_id');
        if($id=='all')
		{
           $tehils  = $this->API_m->getRecordWhere('tehsil',['is_trash' => 0]);
		}else
		{
           $tehils  = $this->API_m->getRecordWhere('tehsil',['district_id' => $id, 'is_trash' => 0]);
		}
        echo json_encode($tehils);
    }



// ********************* ./end methods for Reports through ajax operation 


}


?>