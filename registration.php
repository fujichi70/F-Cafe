<?php

require 'functions.php';
require 'db_connection.php';

session_start();

header('X-FRAME-OPTIONS:DENY');


if (!empty($_POST['registration'])) {

	$params = [
		'id' => null,
		'user_id' => $_POST['user_id'],
		'user_name' => $_POST['user_name'],
		'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
		'created_at' => null,
	];

	$count = 0;
	$columns = '';
	$values = '';

	foreach (array_keys($params) as $key) {
		if ($count++ > 0) {
			$columns .= ',';
			$values .= ',';
		}
		$columns .= $key;
		$values .= ':' . $key;
	}

	try {
		$sql = 'insert into staffs (' . $columns . ')values(' . $values . ')';
		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
		header('Location: staff_login.php');
	} catch (PDOException $e) {
		echo $e->getMessage();
		exit;
	}
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F Cafe - 登録 -</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=Permanent+Marker&family=Playball&family=Kaisei+Opti&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<p>登録画面</p>
	<form method="post" action="">

		<dl class="input-area">
			<dt><label for="user_id" class="text">ID</label></dt>
			<dd>
				<input type="text" name="user_id" id="user_id" class="input">
			</dd>
		</dl>

		<dl class="input-area">
			<dt><label for="user_name" class="text">氏名</label></dt>
			<dd>
				<input type="text" name="user_name" id="user_name" class="input">
			</dd>
		</dl>

		<dl class="input-area">
			<dt><label for="password" class="text">パスワード</label></dt>
			<dd>
				<input type="password" name="password" id="password" class="input">
			</dd>
		</dl>

		<input type="submit" name="registration" class="btn" value="登録">
	</form>

</body>

</html>