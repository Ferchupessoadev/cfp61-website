<?php

ini_set('session.name', 'APPSESSID');
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	http_response_code(200);
	exit;
}
