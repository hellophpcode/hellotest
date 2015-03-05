<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| 
|--------------------------------------------------------------------------
|
|
*/
$config['topnav_doctor'] = array(
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/my_patients', 'text' => 'Akte', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24at/index.php/admin/calendar', 'text' => 'Termin', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/profile', 'text' => 'Profil', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/iconsult', 'text' => 'eConsult', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/my_patients', 'text' => 'Patient', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/vaccination', 'text' => 'Impfungen', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/diagnosis', 'text' => 'Diagnosis', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/weight_bmi', 'text' => 'BMI', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/doctors/document', 'text' => 'Documente', ), 'submenu' => array(), ),
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => site_url('both/logout?d'), 'text' => 'Abmelden', ), 'submenu' => array(), ),
);

/*
|--------------------------------------------------------------------------
| 
|--------------------------------------------------------------------------
|
|
*/
$config['topnav_patient'] = array(
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/overview', 'text' => 'Akte', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => 'http://cyomed.com', 'text' => 'cyomed Home', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/profile', 'text' => 'Profil', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/iconsult', 'text' => 'eConsult', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/my_doctors', 'text' => 'Ärzte', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/vaccination', 'text' => 'Impfungen', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/diagnosis', 'text' => 'Diagnosen', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/weight_bmi', 'text' => 'BMI', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => base_url().'../ia24akte/index.php/patients/document', 'text' => 'Dokumente', ), 'submenu' => array(), ), 
	array('li' => array('class' => 'visible-xs hidden-sm', ), 'a' => array('href' => site_url('both/logout?p'), 'text' => 'Abmelden', ), 'submenu' => array(), ), 
);


/* End of file topnav.php */
/* Location: ./application/config/topnav.php */