<?php

ini_set('session.name', 'APPSESSID');
ini_set('session.gc_maxlifetime', 86400);  // 86400 = 1 day;
ini_set('session.cookie_lifetime', 86400);  // 86400 = 1 day;
ini_set('upload_max_filesize', '5M');
ini_set('post_max_size', '12M');
ini_set('memory_limit', '128M');
