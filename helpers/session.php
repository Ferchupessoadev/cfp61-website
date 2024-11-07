<?php

if (!function_exists('startSession')) {
	function startSession()
	{
		session_start();
	}
}

if (!function_exists('session')) {
	function endSession()
	{
		session_destroy();
		session_unset();
		setcookie('APPSESSID', '', time() - 3600, '/');
	}
}

if (!function_exists("getSessionId")) {
	function getSessionId()
	{
		return session_id();
	}
}

if (!function_exists("setSessionId")) {
	function setSessionId($id)
	{
		session_id($id);
	}
}

if (!function_exists("setSession")) {
	function setSession($key, $value)
	{
		$_SESSION[$key] = $value;
	}
}

if (!function_exists("getSession")) {
	function getSession($key)
	{
		return $_SESSION[$key] ?? null;
	}
}
