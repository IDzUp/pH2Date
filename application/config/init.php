<?php
define('BASEPATH', 1);

require 'config.php';
require 'database.php';

// Set General constants
define('PH2DATE_BASE_URL', $config['base_url']);


// Set DB useful constants
define('PH2DATE_DB_HOST', $db['default']['hostname']);
define('PH2DATE_DB_USR', $db['default']['username']);
define('PH2DATE_DB_NAME', $db['default']['database']);
define('PH2DATE_DB_PWD', $db['default']['password']);