<?php

if (!function_exists('session')) {
	function endSession()
	{
		session_destroy();
		session_unset();
		setcookie('APPSESSID', '', time() - 3600, '/');
	}
}
