<?php 
session_start();

function login_check() {

	if( isset($_SESSION['user_id']) )  {
		return true;
	}

	return false;
}


function user_login($id) {

	$_SESSION['user_id'] = $id;

}

function logout() {

	unset( $_SESSION['user_id'] );

}
