<?php

require 'functions.php';
require 'db_connection.php';

header('X-FRAME-OPTIONS:DENY');

session_start();

setToken();


$sql = 'SELECT orders.order_id, orders.item_number, orders.item_quantity, orders.pay, orders.created_at, orders.deleted_flag, items.item_id, items.name, items.size, items.price FROM items INNER JOIN orders ON orders.item_number = items.item_id WHERE deleted_flag=0 ORDER BY created_at ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F Cafe - 注文確認ページ</title>
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
	<section id="orderConfirm">
		<div class="wrapper">
			<?php if (!empty($_SESSION['user_id'])) : ?>
				<div class="login-title--group">
					<h1 class="staff-title">お客様ご注文確認ページ</h1>
				</div>

				<p>注文</p>
				<table class="order-table">
					<thead>
						<tr>
							<th>注文日付</th>
							<th>注文時間</th>
							<th>注文番号</th>
							<th>商品</th>
							<th>数量</th>
							<th>支払い</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$key = 0;
						// foreach ($stmt as $row) {
						// 	var_dump($row);
						// }
						// die;
						foreach ($rows as $row) {
							$keys[$key] = $row['order_id'];
							$key++;
						}
						// var_dump($keys);
						// die;

						$keys = array_values(array_unique($keys));
						foreach ($keys as $value) {
							$num = [];
							foreach ($rows as $row) {
								if ($row['order_id'] == $value) {
									$num['item_number'] = $row['item_number'];
									$num['item_quantity'] = $row['item_quantity'];
									$num['pay'] = $row['pay'];
									$num['created_at'] = $row['created_at'];
									$num['deleted_flag'] = $row['deleted_flag'];
									$num['item_id'] = $row['item_id'];
									$num['size'] = $row['size'];
									$num['price'] = $row['price'];
								}
							}
							$order[$value] = $num;
						}

						$orderKey = array_keys($order);
						?>

						<tr>
							<?php for ($i = 0; $i < count($orderKey); $i++): ?> 
							<?php
							// $dateTime = explode(" ", $row['created_at']);
							
							?>
							<td><?php echo h($dateTime[0]); ?></td>
							<td><?php echo h($dateTime[1]); ?></td>
							<td><?php echo h($row['order_id']); ?></td>
							<td><?php echo h($row['name']); ?></td>
							<td><?php echo h($row['item_quantity']); ?></td>
							<td>
								<?php
								if ($row['pay'] === 0) : ?>
									<p class="pay-text">料金未払い</p>
								<?php else : ?>
									<p>料金支払い済み</p>
								<?php endif; ?>
							</td>
							<td>
								<form action="deleted.php" method="post">
									<div class="back-btn--parts"><input type="submit" name="delete" class="btn back-btn" value="削除"></div>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
		</div>
	<?php else : ?>
		<p>ログインしてません。</p>
		<div><a href="staff_login.php" class="btn">ログイン画面</a></div>
	<?php endif; ?>
	</section>
</body>

</html>