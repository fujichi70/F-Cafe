<?php

require 'functions.php';
require 'db_connection.php';

session_start();

setToken();

$errors = [];
$messages = [];
$params = [];

// バリデーション
if (empty($_POST['id']) || mb_strlen($_POST['id']) !== 7) {
	$errors['id'] = 'IDを正しく入力してください。';
}
if (empty($_POST['password']) || !preg_match('/^(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,}$/i', $_POST['password'])) {

	$errors['password'] = 'パスワードは半角英数字が混在している8文字以上を入力してください。';
}

$params = [
	'id' => $_POST['id'],
	'password' => $_POST['password'],
];

$sql = "SELECT * FROM staffs WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $params['id']);
$stmt->execute();
$row = $stmt->fetch();
if (empty($row)) {
	$messages['email'] = '登録されていないIDです。';
} elseif (!password_verify($params['password'], $row['password'])) {
	$messages['password'] = 'パスワードが間違っています。';
}
if (empty($messages)) {
	session_regenerate_id(true);
	$_SESSION['id'] = $row['id'];
	$_SESSION['password'] = $row['password'];
	$_SESSION['info'] = 'ログイン';
	header("Location: $url");
}




?>


<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F Cafe - login -</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&family=Permanent+Marker&family=Playball&family=Kaisei+Opti&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<section id="staff">
		<div class="wrapper">
			<h1 class="staff-title">ログインページ</h1>
			<p class="staff-text">スタッフの注文管理ページです。</p>

			<form action="" method="post">
				<dl>
					<dt><label for="id">ID</label></dt>
					<dd><input type="text" name="id" placeholder="IDを入力してください。" value="<?php if (!empty($_POST['id'])) {
																							echo h($_POST['id']);
																						} ?>"></dd>
				</dl>
				<dl>
					<dt><label for="pass">パスワード</label></dt>
					<dd><input type="password" name="password" placeholder="パスワードをを入力してください。" value="<?php if (!empty($_POST['pass'])) {
																											echo h($_POST['pass']);
																										} ?>"></dd>
				</dl>
			</form>
		</div>
	</section>
</body>

</html>