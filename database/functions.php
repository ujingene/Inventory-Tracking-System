<?php

	// Setup SQL functions for MySQLi extension if we have it.
	if (function_exists("mysqli_connect")) {
		function sqlconnect() {
			include "db.php";
			return mysqli_connect($server,$username,$password,$database);
		}

		function sqlselectdb($DB_NAME) {
			global $sql_connection;
			return $sql_connection->select_db($DB_NAME);
		}

		function sqlquery($query) {
			global $sql_connection;
			return $sql_connection->query($query);
		}

		function sqlescape($string) {
			global $sql_connection;
			return $sql_connection->real_escape_string($string);
		}
		function sqlfetcharray($result){
			if($result){
				return mysqli_fetch_array($result);
			}
			else
			{	return Array();	}
		}
		function sqlnumrows($result){
			return mysqli_num_rows($result);
		}
		function sqlerror(){
			return mysqli_error();
		}
	}

function logged_in(){
  if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
    return true;
  } else {
    return false;
  }
}

function redirect($location){
  return header("Location: {$location}");
}
?>