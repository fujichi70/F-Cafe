<?php

require 'db_connection.php';

if (!empty($_POST['registration'])) {
	$params = [
		'id' => null,
		'user_id' => $_POST['user_id'],
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
		$sql = 'insert into users (' . $columns . ')values(' . $values . ')';

		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
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
	<title>registration</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<p>登録画面</p>
	<form method="post" action="" enctype="multipart/form-data">

		<dl class="input-area">
			<dt><label for="user_id" class="text">ID</label></dt>
			<dd>
				<input type="text" name="user_id" id="user_id" class="input">
			</dd>
		</dl>

		<dl class="input-area">
			<dt><label for="password" class="text">パスワード</label></dt>
			<dd>
				<input type="text" name="password" id="password" class="input">
			</dd>
		</dl>

		<input type="submit" name="registration" class="btn" value="登録">
	</form>

</body>

</html>