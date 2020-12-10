<?php 


	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Search extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
            date_default_timezone_set('Asia/Karachi');
			
		}
		public function index()
        {
            
        	$this->load->view('search');
        }
        public function GetTrackingID()
        {
        	$trackingID = $this->input->post('tracking_id');
        	$res        = $this->API_m->singleRecord('testdetails',['tracking_id'=> $trackingID]);
        	if(!empty($res))
        	{
        	  if($res->post_status==0 && $res->is_cancel==0)
              {
              		redirect('Search/quickReceipt/'.$res->tracking_id);
              }
              else
              {
              	   redirect('Search/TestResultReciept/'.$res->tracking_id);
              }
        	}
        	else
        	{
        		$this->session->set_flashdata('Msg', 'No Record found!');
        		redirect('Search/index');
        	}
        }
		public function TestResultReciept($trackingID)
        {
        	$data['logLab']     = $this->API_m->getSearchUserLabInfo($trackingID);
            $data['rec']        = $this->API_m->SearchResultByTrackingId($trackingID);
            $this->load->view('template_parts/header');
            $this->load->view('TestResultReciept',$data);
            $this->load->view('template_parts/footer');

        }
        public function quickReceipt($trackingID)
        {
        	$data['logLab']     = $this->API_m->getSearchUserLabInfo($trackingID);
            $data['rec']        = $this->API_m->SearchResultByTrackingId($trackingID);
            $this->load->view('template_parts/header');
            $this->load->view('quickReceipt',$data);
            $this->load->view('template_parts/footer');

        }
	
	}


	
	/* End of file districtlabscontroller.php */
	/* Location: ./application/controllers/districtlabscontroller.php */




 ?>