<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calendar extends CI_Controller {
    private $hasToken=0;
    private $client = null;
    private $scope = "https://www.googleapis.com/auth/calendar";
    private $calendarID = 'primary';
    private $htmlURL = 'https://www.google.com/calendar/embed?src=';
    private $timezone='Asia/Kolkata';
    public function __construct() {
	parent::__construct();
	$this->hasToken=$this->session->userdata('auth_token');
	$this->load->helper('form');
	$this->load->library('form_validation');
	try{
	$this->client = new Google_Client();
	$this->client->setApplicationName("Calendar Sync Sandbox");
	$this->client->setClientId(GOOGLE_CLIENT_ID);
	$this->client->setClientSecret(GOOGLE_CLIENT_SECRET);
	$this->client->setDeveloperKey(GOOGLE_API_KEY);
	$this->client->setRedirectUri(GOOGLE_REDIRECT_URI);
	
	}catch (Exception $e){
	    $this->unsetAuthToken();
	}
    }
    public function index() {
	if ($this->input->get('code') && !$this->session->userdata('auth_token')) {
	    $this->gAuth();
	    return;
	}
	if ($this->session->userdata('auth_token')) {
	    $data['action'] = $this->urlToBase() . 'API';
	    $data['calviewurl']=  $this->htmlURL.  
	    $this->load->view('calendar_view', $data);
	    return;
	} else {
	    $this->load->view('gauth_view');
	    return;
	}
    }

    public function gAuth() {
	if ($this->session->userdata('auth_token') && !$this->input->get('logout')) {
	    echo "Should show action screen";
	    return;
	}
	
	$this->client->setScopes($this->scope);
	if ($this->input->get('logout')) {
	    $token = $this->session->userdata('auth_token');
	    $this->client->revokeToken($token);
	    $this->unsetAuthToken();
	    redirect($this->urlToBase());
	    die();
	}
	if ($this->input->get('code')) {
	    $code = $this->input->get('code');
	    if ($this->client->authenticate($code)) {
		$this->session->set_userdata('auth_token', $this->client->getAccessToken());
	    }
	}
	if (!$this->client->getAccessToken()) {
	    $authUrl = $this->client->createAuthUrl();
	    redirect($authUrl);
	    die();
	    die;
	} else {
	    redirect($this->urlToBase());
	}
    }

    public function API() {
	$submiteed = $this->input->post('save');
	$title=$this->input->post('title',true);
	$description=$this->input->post('description',true);
	$start=$this->input->post('start_datetime',true);
	$end=$this->input->post('end_datetime',true);
	$participant=$this->input->post('participant',true);
	if ($submiteed) {
	    $this->form_validation->set_rules('title', 'Appointment Title', 'required');
	    $this->form_validation->set_rules('start_datetime', 'Start Date Time', 'required');
	    $this->form_validation->set_rules('end_datetime', 'End Date Time', 'required');
	    $this->form_validation->set_rules('participant', 'Patient Email', 'required|valid_email');
	}
	if ($this->form_validation->run() == FALSE) {
	    $this->session->set_flashdata('error_msg',validation_errors('<div style="color:red" class="">*', '</div>'));
	} else {   
	    $gstart_datetime = new Google_Service_Calendar_EventDateTime();
	    $gstart_datetime->setTimeZone($this->timezone);
	    $gstart_datetime->setDateTime($this->googleDateTime($start));
	    
	    $gend_datetime = new Google_Service_Calendar_EventDateTime();
	    $gend_datetime->setTimeZone($this->timezone);
	    $gend_datetime->setDateTime($this->googleDateTime($end));
	    
	    $participants=$this->createAttende(array('email'=>$participant));
	    try{
	    $this->client->setAccessToken($this->session->userdata('auth_token'));
	    $service= new Google_Service_Calendar($this->client);
	    $event= new Google_Service_Calendar_Event();
	    $event->setSummary($title);
	    $event->setDescription($description);
	    $event->setAttendees($participants);
	    $event->setStart($gstart_datetime);
	    $event->setEnd($gend_datetime);
	    $inserted_appointment=$service->events->insert($this->calendarID,$event);
	    $this->session->set_flashdata('success_msg',"<strong>".$event->getSummary()."</strong> Sucessfully Added");	    
	    redirect($this->urlToBase().'API');
	    }catch (Exception $e){
		 $this->session->set_flashdata('error_msg',$e->getMessage());
	    }
	}
	$data['action'] = $this->urlToBase() . 'API';
	$this->load->view('calendar_view', $data);
	return;
    }

    private function urlToBase() {
	return site_url(strtolower(__CLASS__)) . '/';
    }

    private function unsetAuthToken() {
	$this->session->unset_userdata('auth_token');
    }

    private function doOAuthAction() {
	
    }
     private function googleDateTime($datetimestr = '', $gmtoffset = '') {
	$datetime = @strtotime($datetimestr);
	$outputformat = date('Y-m-d H:i:s',$datetime);
	$outputformat=  str_replace(' ', 'T', $outputformat);
	return $outputformat;
    }
    public function createAttende($data) {
	$data = (object) $data;
	$attendee = new Google_Service_Calendar_EventAttendee();
	if (!isset($data->email)) {
	    return 0;
	}
	$attendee->setEmail($data->email);
	if (isset($data->display_name)) {
	    $attendee->setDisplayName($data->display_name);
	}
	if (isset($data->comment)) {
	    $attendee->setComment($data->comment);
	}
	if (isset($data->comment)) {
	    $attendee->setComment($data->comment);
	}
	if (isset($data->comment)) {
	    $attendee->setComment($data->comment);
	}
	if (isset($data->comment)) {
	    $attendee->setComment($data->comment);
	}
	return $attendee;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */