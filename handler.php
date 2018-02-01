<?php
require_once 'config.php';



/*echo '<pre>';
var_dump($_POST);
echo '</pre>';*/
if(empty($_POST['email']) OR empty($_POST['password']))
{
	die('Пожалуйста, заполните все поля');
}
else
{
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$flag = $_POST['remember_me'];
	if($email == $dbEmail)
	{
		$passHash = md5($pass);
		if ($passHash == $dbPass AND $flag == true)
		{
			$expires = time() + (60*60*24*7);
			setcookie('token', $passHash, $expires, '/');
			die('Добро пожаловать');
		}
		if ($passHash == $dbPass AND $flag == false)
		{
			session_start();
			$_SESSION['email'] = $dbEmail;
			$_SESSION['token'] = $passHash;
			
			/*echo '<pre>';
			var_dump($_SESSION);
			echo '</pre>';*/

			die('Добро пожаловать');

		}
		else
		{
			die('Email или пароль введен неверно');
		}

	}
	else
	{
		die('Такого пользователя нет');
	}
}
