
<?php 
require_once 'config.php';
$isAuth = false;
if(isset($_COOKIE['token']))
{
	$token = $_COOKIE['token'];
	if($token == $dbPass)
		$isAuth=true;
}

?>
<?php if($isAuth): ?>
<h1>
Здравствуйте, <?=$dbEmail ?>
</h1>
<?php else: ?>
	<form method="post" action="handler.php">
	<input type="email" name="email" value="pupkin@example.com"><br>
	<input type="password" name="password" value="1234">
	<br>
	<label>
		<input type="checkbox" name="remember_me" value="1">
		Запомнить меня
	</label><br>
	<button type="submit">Войти</button>
</form>
<?php endif; ?>