<?php

require 'functions.php';
require 'db_connection.php';

header('X-FRAME-OPTIONS:DENY');


session_start();

setToken();

$errors = [];
$messages = [];
$params = [];

// バリデーション
if (!empty($_POST['login'])) {
	if (empty($_POST['user_id']) || mb_strlen($_POST['user_id']) !== 7) {
		$errors['user_id'] = 'IDを正しく入力してください';
	}
	if (empty($_POST['password']) || !preg_match('/^(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,}$/i', $_POST['password'])) {

		$errors['password'] = 'パスワードは半角英数字が混在している8文字以上を入力してください';
	}

	if (empty($error)) {
		$params = [
			'id' => null,
			'user_id' => $_POST['user_id'],
			'password' => $_POST['password'],
			'created_at' => null,
		];

		$sql = "SELECT * FROM staffs WHERE user_id=:user_id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':user_id', $params['user_id']);
		$stmt->execute();
		$row = $stmt->fetch();
		if (empty($row)) {
			$errors['user_id'] = '登録されていないIDです。';
		} elseif (!password_verify($params['password'], $row['password'])) {
			$errors['password'] = 'パスワードが間違っています';
		}
		if (empty($errors)) {
			session_regenerate_id(true);
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['info'] = 'ログイン';
			header("Location: staff_orderconfirm.php");
		}
	}
}






?>


<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F Cafe - ログイン画面</title>
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
	<section id="login">
		<div class="wrapper">
			<div class="login-title--group">
				<h1 class="staff-title">ログインページ</h1>
				<p class="staff-text">スタッフの注文管理ページです。</p>
			</div>

			<form action="" method="post">
				<div class="login-group">
					<dl>
						<dt><label for="user_id">ID</label></dt>
						<dd><input type="text" name="user_id" class="login-inputarea" placeholder="IDを入力してください" value="<?php if (!empty($_POST['user_id'])) {
																															echo h($_POST['user_id']);
																														} ?>"></dd>
					</dl>
						<?php if (!empty($_POST["login"]) && !empty($errors['user_id'])) {
							echo '<p class="error">' . $errors['user_id'] . '</p>';
						} ?>

					<dl>
						<dt><label for="pass">パスワード</label></dt>
						<dd><input type="password" name="password" class="login-inputarea" placeholder="パスワードをを入力してください" value="<?php if (!empty($_POST['password'])) {
																																	echo h($_POST['password']);
																																} ?>"></dd>
					</dl>
						<?php if (!empty($_POST["login"]) && !empty($errors['password'])) {
							echo '<p class="error">' . $errors['password'] . '</p>';
						} ?>
					<div class="login-btn--parts"><input type="submit" name="login" class="btn" value="ログイン"></div>
				</div>
			</form>
		</div>
	</section>
</body>

</html>