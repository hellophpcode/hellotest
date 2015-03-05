<?php
class GCalendar {

    private $API_KEY = NULL;
    private $CLIENT_ID = NULL;
    private $CLIENT_SECRET = NULL;
    private $AUTH_TOKEN = NULL;
    private $AUTH_REDIRECT_URL = NULL;
    private $LOGOUT_REDIRECT_URL='/';
    private $AUTH_SCOPES = array(
	'https://www.googleapis.com/auth/calendar',
    );
    private $hasError = 0;
    private $errorText = '';
    private $attendies = array();
    private $gclient = NULL;
    private $ci=null;

    public function __construct() {
	$this->ci=&get_instance();
	$this->AUTH_TOKEN = $this->ci->session->userdata('AUTH_TOKEN');
	$this->AUTH_REDIRECT_URL = ((!empty($_SERVER['HTTPS'])) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . '/' . $_SERVER['REQUEST_URI'];
	$this->gclient = new Google_Client();
    }
    function getLOGOUT_REDIRECTURL() {
	return $this->LOGOUT_REDIRECTURL;
    }

    function setLOGOUT_REDIRECTURL($LOGOUT_REDIRECT) {
	$this->LOGOUT_REDIRECT_URL = $LOGOUT_REDIRECT;
    }

   function getAPI_KEY() {
	return $this->API_KEY;
    }

    function getCLIENT_ID() {
	return $this->CLIENT_ID;
    }

    function getCLIENT_SECRET() {
	return $this->CLIENT_SECRET;
    }

    function getAUTH_REDIRECT_URL() {
	return $this->AUTH_REDIRECT_URL;
    }

    function getAUTH_SCOPES() {
	return $this->AUTH_SCOPES;
    }

    function setAPI_KEY($API_KEY) {
	$this->API_KEY = $API_KEY;
    }

    function setCLIENT_ID($CLIENT_ID) {
	$this->CLIENT_ID = $CLIENT_ID;
    }

    function setCLIENT_SECRET($CLIENT_SECRET) {
	$this->CLIENT_SECRET = $CLIENT_SECRET;
    }

    function setAUTH_REDIRECT_URL($AUTH_REDIRECT_URL) {
	$this->AUTH_REDIRECT_URL = $AUTH_REDIRECT_URL;
    }

    function setAUTH_SCOPES($AUTH_SCOPES) {
	$this->AUTH_SCOPES = $AUTH_SCOPES;
    }

    public function init() {
	$this->events = array();
	try {
	    $this->gclient->setClientId($this->CLIENT_ID);
	    $this->gclient->setClientSecret($this->CLIENT_SECRET);
	    $this->gclient->setScopes($this->AUTH_SCOPES);
	    $this->gclient->setDeveloperKey($this->API_KEY);
	    $this->gclient->setRedirectUri($this->AUTH_REDIRECT_URL);
	    if ($this->ci->input->get('logout')) {
		$this->gclient->revokeToken($this->AUTH_TOKEN);
		$this->unsetAuthToken();
		header("Location: " . $this->LOGOUT_REDIRECT_URL);
		die;
	    }
	    if ($this->ci->input->get('code')) {
		$code = $this->ci->input->get('code');
		if ($this->gclient->authenticate($code)) {
		    $this->AUTH_TOKEN = $this->gclient->getAccessToken();
		    $this->setAuthToken($this->AUTH_TOKEN);
		}
	    }
	    if ($this->AUTH_TOKEN) {
		$this->gclient->setAccessToken($this->AUTH_TOKEN);
	    }
	    if (!$this->gclient->getAccessToken()) { // auth call to google
		$authUrl = $this->gclient->createAuthUrl();
		header("Location: " . $authUrl);
		die;
	    }
	} catch (Exception $e) {
	    $this->errorText = $e->getMessage();
	    $this->hasError = 1;
	}
    }

    public function insertEvent($data) {
	$data = (object) $data;
	if (empty($data->calendarId) || !isset($data->start_datetime) || !isset($data->end_datetime)) {
	    return 0;
	}
	$this->gclient->setAccessToken($this->AUTH_TOKEN);
	$service = new Google_Service_Calendar($this->gclient);
	$event = new Google_Service_Calendar_Event();
	$event->setSummary("No Title");
	if (isset($data->summery)) {
	    $event->setSummary($data->summery);
	}
	if (isset($data->attendies)) {
	    $event->setAttendees($data->attendies);
	}
	if (isset($data->description)) {
	    $event->setDescription($data->description);
	}
	if (isset($data->location)) {
	    $event->setLocation($data->location);
	}
	$start = $this->googleDateTime($data->start_datetime);
	$end = $this->googleDateTime($data->end_datetime);
	$event->setStart($start);
	$event->setEnd($end);
	$events = $service->events->insert($data->calendarId, $event);
	return $events->getId();
    }

    public function updateEvent($data) {
	$data = (object) $data;
	if (empty($data->calendarId) || empty($data->eventId)) {
	    return 0;
	}
	$service = new Google_Service_Calendar($this->gclient);
	$event = $service->events->get($data->calendarId, $data->eventId);
	if (isset($data->summery)) {
	    $event->setSummary($data->summery);
	}
	if (isset($data->attendies)) {
	    $event->setAttendees($data->attendies);
	}
	if (isset($data->description)) {
	    $event->setDescription($data->description);
	}
	if (isset($data->location)) {
	    $event->setLocation($data->location);
	}
	if (isset($data->start_datetime)) {
	    $start = $this->googleDateTime($data->start_datetime);
	    $event->setStart($start);
	}
	if (isset($data->end_datetime)) {
	    $end = $this->googleDateTime($data->end_datetime);
	    $event->setEnd($end);
	}
	$updatedEvent = $service->events->update($data->calendarId, $event);
	return $updatedEvent->getUpdated();
    }

    public function listEvents($calendarId = 0) {
	if (!$calendarId) {
	    return 0;
	}
	$service = new Google_Service_Calendar($this->gclient);
	try{
	$events = $service->events->listEvents($calendarId);
	return $events;
	}catch(Exception $e){
	    echo $e->getMessage();
	}
	
    }

    private function setAuthToken($value) {
	$this->ci->session->set_userdata('AUTH_TOKEN', $value);
    }

    private function unsetAuthToken() {
	$this->ci->session->unset_userdata('AUTH_TOKEN');
    }

    public function hasError() {
	if ($this->hasError) {
	    return $this->errorText;
	} else {
	    return $this->hasError;
	}
    }

    private function googleDateTime($datetimestr = '', $gmtoffset = '') {
	$gdatetime = new Google_Service_Calendar_EventDateTime();
	$datetime = @strtotime($datetimestr);
	$outputformat = date('Y-m-dTH:i:s.000' . $gmtoffset);
	$gdatetime->setDateTime($outputformat);
	return $gdatetime;
    }

    public function createAttende($data) {
	$data = (object) $data;
	$attendee = new Google_Service_Calendar_EventAttendee();
	if (!isset($data->email)) {
	    return 0;
	}
	$attendee->setEmail($data['email']);
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
