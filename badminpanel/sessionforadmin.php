<?php 
session_start();

function login_check() {

	if( isset($_SESSION['admin']) )  {
		return true;
	}

	return false;
}


function user_login($id) {

	$_SESSION['admin'] = $id;

}

function logout() {

	unset( $_SESSION['admin'] );

}
