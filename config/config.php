<?php

require_once __DIR__ . '/ini.php';
require_once __DIR__ . '/headers.php';

// CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}
