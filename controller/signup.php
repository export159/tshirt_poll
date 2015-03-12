<?php
require_once('../model/model_users.php');

if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['password']))
{
	$fullname = addslashes($_POST['fullname']);
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);

	$login_model = new Model_users();
	$user = $login_model->getUser($username, $password);

	if ($user != NULL)
	{
		header('location: ../view/login/');
		die();
	}
	else
	{
		$user['name'] = $fullname;
		$user['username'] = $username;
		$user['password'] = $password;

		$user_id = $login_model->addUser($user);

		session_start();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['name'] = $user['name'];
		$_SESSION['username'] = $user['username'];

		echo 'User Id: ' . $user_id;

		header('location: ../view/poll/');
		die();
	}
}
else
{
	header('location: ../view/login/');
	die();
}