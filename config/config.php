<?php

ini_set('session.name', 'APPSESSID');
ini_set('session.gc_maxlifetime', 86400); // 86400 = 1 day;
ini_set('session.cookie_lifetime', 86400); // 86400 = 1 day;
ini_set('upload_max_filesize', '5M');
ini_set('post_max_size', '12M');
ini_set('memory_limit', '128M');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	http_response_code(200);
	exit;
}
