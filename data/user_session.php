<?php 
if(session_status() == PHP_SESSION_NONE)
		{
			session_start();//start session if session not start
		}
require_once('../class/Login.php');
$login->user_session();
$login->Disconnect();