<?php
require_once('../model/model_user.php');

if (isset($_POST['username']) && isset($_POST['password']))
{
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);

	$login_model = new LoginModel();
	$user = $login_model->getUser($username, $password);

	if ($user)
	{
		session_start();
		$_SESSION['user_id'] = $user['user_id'];
		$_SESSION['firstname'] = $user['firstname'];
		$_SESSION['user_id'] = $user['lastname'];
	}
	else
	{

	}
}
else
{
	header('location: ../view/login/index.php');
	die();
}