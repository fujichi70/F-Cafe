<?php

require 'functions.php';
require 'db_connection.php';

header('X-FRAME-OPTIONS:DENY');

session_start();

setToken();


$sql = 'SELECT orders.order_id, orders.item_number, orders.item_quantity, orders.pay, orders.created_at, orders.ready, orders.completed_flag, orders.deleted_flag, items.item_id, items.name, items.size, items.price FROM items INNER JOIN orders ON orders.item_number = items.item_id WHERE completed_flag=0 AND deleted_flag=0 ORDER BY created_at ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

$key = 0;

foreach ($rows as $row) {
	$keys[$key] = $row['order_id'];
	$key++;
}

$keys = array_values(array_unique($keys));
foreach ($keys as $value) {
	$items = [];
	$num = 0;
	foreach ($rows as $row) {
		if ($row['order_id'] == $value) {
			$items['item_number'] = $row['item_number'];
			$items['item_quantity'] = $row['item_quantity'];
			$items['pay'] = $row['pay'];
			$items['created_at'] = $row['created_at'];
			$items['ready'] = $row['ready'];
			$items['completed_flag'] = $row['completed_flag'];
			$items['deleted_flag'] = $row['deleted_flag'];
			$items['item_id'] = $row['item_id'];
			$items['size'] = $row['size'];
			$items['name'] = $row['name'];
			$items['price'] = $row['price'];
			$order[$value][$num] = $items;
			$num++;
		}
	}
}
$orderKey = array_keys($order);


if (!empty($_POST['complete'])) {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		checkToken();
		setToken();

		$order_id = $_POST['order_num'];
		$params = [
			'order_id' => $order_id,
			'pay' => '1',
			'completed_flag' => '1',
		];

		try {
			$sql = 'UPDATE orders SET pay=:pay, completed_flag=:completed_flag WHERE order_id=:order_id';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':order_id', $params['order_id']);
			$stmt->bindValue(':completed_flag', $params['completed_flag']);
			$stmt->bindValue(':pay', $params['pay']);
			$stmt->execute();
			$res = $stmt->fetch();
			if (empty($res)) {
				$errors['complete'] = 'エラーが発生しました。';
			}
			header('Location: staff_orderconfirm.php');
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}

if (!empty($_POST['done'])) {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		checkToken();
		setToken();

		$user_name = $_SESSION['user_name'];
		$order_id = $_POST['order_num'];
		$params = [
			'order_id' => $order_id,
			'ready' => $user_name,
		];

		try {
			$sql = 'UPDATE orders SET ready=:ready WHERE order_id=:order_id';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':order_id', $params['order_id']);
			$stmt->bindValue(':ready', $params['ready']);
			$stmt->execute();
			$res = $stmt->fetch();
			if (empty($res)) {
				$errors['done'] = 'エラーが発生しました。';
			}
			header('Location: staff_orderconfirm.php');
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}

if (!empty($_POST['logout'])) {
	if (!empty($_SESSION['user_id'])) {

		$_SESSION = [];

		if (isset($_COOKIE["PHPSESSID"])) {
			setcookie("PHPSESSID", '', time() - 1800, '/');
		}

		session_destroy();
		header('Location: staff_login.php');
	}
}

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


				<div>
					<p class="order-title">注文一覧</p>
					<a href="staff_completed.php" class="btn">受け渡し済み注文はこちら</a>
				</div>
				<?php for ($i = 0; $i < count($orderKey); $i++) : ?>
					<?php
					$dateTime = explode(" ", $order[$orderKey[$i]][0]['created_at']);
					$itemCount = 0;
					$payment = 0;
					?>
					<div class="order-box">
						<div class="order-text--group">
							<p class="order-number">注文番号：<?php echo h($orderKey[$i]); ?></p>
							<form action="" method="post">
								<input type="submit" name="complete" class="btn" value="完了">
								<input type="hidden" name="order_num" value="<?php echo h($orderKey[$i]); ?>">
								<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
							</form>
						</div>
						<div class="ready-group">
							<?php if ($order[$orderKey[$i]][0]['ready'] !== "0") : ?>
								<div>
									<p><?php echo h($order[$orderKey[$i]][0]['ready']); ?>準備</p>
								</div>
							<?php else : ?>
								<form action="" method="post">
									<div class="back-btn--parts"><input type="submit" name="done" class="btn" value="対応"></div>
									<input type="hidden" name="order_num" value="<?php echo h($orderKey[$i]); ?>">
									<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
								</form>
							<?php endif; ?>
						</div>
					</div>
					<table class="order-table">
						<thead>
							<tr>
								<th>注文日付</th>
								<th>注文時間</th>
								<th>商品</th>
								<th>サイズ</th>
								<th>数量</th>
								<th>支払い</th>
								<th>
									<form action="staff_deleted.php" method="post">
										<div class="back-btn--parts"><input type="submit" name="all-delete" class="btn back-btn" value="注文削除"></div>
										<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
									</form>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td rowspan="<?php echo h(count($order[$orderKey[$i]])); ?>"><?php echo h($dateTime[0]); ?></td>
								<td rowspan="<?php echo h(count($order[$orderKey[$i]])); ?>"><?php echo h($dateTime[1]); ?></td>
								<?php foreach ($order[$orderKey[$i]] as $key => $val) : ?>
									<td><?php echo h($val['name']); ?></td>
									<td><?php echo h($val['size']); ?></td>
									<td><?php echo h($val['item_quantity']); ?></td>
									<td>
										<?php
										if ($val['pay'] === 0) : ?>
											<p class="pay-text">料金未払い</p>
										<?php else : ?>
											<p>料金支払い済み</p>
										<?php endif; ?>
									</td>
									<td>
										<form action="staff_deleted.php" method="post">
											<div class="back-btn--parts"><input type="submit" name="delete" class="btn back-btn" value="削除"></div>
											<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
											<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
										</form>
									</td>
									<?php
									$itemCount += $val['item_quantity'];
									$payment += $val['price'];
									?>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
					<p>商品：<?php echo h($itemCount); ?> 点</p>
					<p>支払金額：<?php echo number_format(h($payment)); ?>円</p>
				<?php endfor; ?>

		</div>
		<div id="logout">
			<form action="" method="post">
				<div class="logout-btn--parts"><input type="submit" name="logout" value="ログアウト" class="btn logout-btn"></div>
			</form>
		</div>

	<?php else : ?>
		<p>ログインしてません。</p>
		<div><a href="staff_login.php" class="btn">ログイン画面</a></div>
	<?php endif; ?>
	</section>
</body>

</html>