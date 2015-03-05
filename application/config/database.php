<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'development';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'cws';
$db['default']['database'] = 'phpgeeks';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['development']['hostname'] = 'localhost';
$db['development']['username'] = 'root';
$db['development']['password'] = 'cws';
$db['development']['database'] = 'phpgeeks';
$db['development']['dbdriver'] = 'mysql';
$db['development']['dbprefix'] = 'ia24at_';
$db['development']['pconnect'] = TRUE;
$db['development']['db_debug'] = TRUE;
$db['development']['cache_on'] = FALSE;
$db['development']['cachedir'] = '';
$db['development']['char_set'] = 'utf8';
$db['development']['dbcollat'] = 'utf8_general_ci';
$db['development']['swap_pre'] = '';
$db['development']['autoinit'] = TRUE;
$db['development']['stricton'] = FALSE;

$db['production']['hostname'] = 'localhost';
$db['production']['username'] = 'root';
$db['production']['password'] = 'cws';
$db['production']['database'] = 'phpgeeks';
$db['production']['dbdriver'] = 'mysql';
$db['production']['dbprefix'] = 'ia24at_';
$db['production']['pconnect'] = TRUE;
$db['production']['db_debug'] = TRUE;
$db['production']['cache_on'] = FALSE;
$db['production']['cachedir'] = '';
$db['production']['char_set'] = 'utf8';
$db['production']['dbcollat'] = 'utf8_general_ci';
$db['production']['swap_pre'] = '';
$db['production']['autoinit'] = TRUE;
$db['production']['stricton'] = FALSE;

$db['port_medical']['hostname'] = 'localhost';
$db['port_medical']['username'] = 'root';
$db['port_medical']['password'] = 'cws';
$db['port_medical']['database'] = 'phpgeeks';
$db['port_medical']['dbdriver'] = 'mysql';
$db['port_medical']['dbprefix'] = '';
$db['port_medical']['pconnect'] = FALSE;
$db['port_medical']['db_debug'] = TRUE;
$db['port_medical']['cache_on'] = FALSE;
$db['port_medical']['cachedir'] = '';
$db['port_medical']['char_set'] = 'utf8';
$db['port_medical']['dbcollat'] = 'utf8_general_ci';
$db['port_medical']['swap_pre'] = '';
$db['port_medical']['autoinit'] = TRUE;
$db['port_medical']['stricton'] = FALSE;

$db['port_personal']['hostname'] = 'localhost';
$db['port_personal']['username'] = 'root';
$db['port_personal']['password'] = 'cws';
$db['port_personal']['database'] = 'phpgeeks';
$db['port_personal']['dbdriver'] = 'mysql';
$db['port_personal']['dbprefix'] = '';
$db['port_personal']['pconnect'] = FALSE;
$db['port_personal']['db_debug'] = TRUE;
$db['port_personal']['cache_on'] = FALSE;
$db['port_personal']['cachedir'] = '';
$db['port_personal']['char_set'] = 'utf8';
$db['port_personal']['dbcollat'] = 'utf8_general_ci';
$db['port_personal']['swap_pre'] = '';
$db['port_personal']['autoinit'] = TRUE;
$db['port_personal']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */
