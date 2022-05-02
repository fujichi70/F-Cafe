<?php

require 'functions.php';
require 'db_connection.php';

session_start();

header('X-FRAME-OPTIONS:DENY');

setToken();

$totalPrice = 0;

$url = $_SERVER['HTTP_REFERER'];
if (strstr($url, 'mobileorder')) {
	$params = $_POST;
	$except = ["cartin", "csrf"];

	$exceptArr = array_intersect_key($params, array_flip($except));

	$itemsArr = array_diff($params, $exceptArr);
	$itemsArr = array_filter($itemsArr, function ($val) {
		return $val > 0;
	});
	$_SESSION['items'] = $itemsArr;
} elseif (strstr($url, 'cart')) {
	if (!empty($_POST['shoporderbtn'])) {
		if (!empty($_SESSION['totalPrice'])) {
			$order_id = 0;
			// checkToken();
			// setToken();

			$buyItems = $_SESSION['items'];
			$order_id = date('ymd') . sprintf("%03d", mt_rand(0, 999));
			foreach ($buyItems as $key => $buyItem) {
				$params = [
					'id' => null,
					'order_id' => $order_id,
					'item_number' => $key,
					'item_quantity' => $buyItem,
					'pay' => '0',
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
					$sql = 'insert into orders (' . $columns . ')values(' . $values . ')';

					$stmt = $pdo->prepare($sql);
					$stmt->execute($params);
				} catch (PDOException $e) {
					echo $e->getMessage();
					exit;
				}
			}
			$_SESSION['order_id'] = $order_id;
			header('Location: thanks.php');
		}
	}
}

if ($totalPrice !== 0) {
	$_SESSION['totalPrice'] = $totalPrice;
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F Cafe - カート</title>
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
	<!-- ページ共通（ナビバー） -->
	<?php include "./include/header.php"; ?>

	<main id="cart">

		<!-- ページ下部に固定 -->
		<div class="mobileorder">
			<div class="mobileorder-title">メニューへ</div>
			<a href="mobileorder.php">
				<div class="mobileorder-img--parts"><img class="mobileorder-img" src="img/beans.png" alt=""></div>
				<p class="mobileorder-text">mobile<br>order</p>
			</a>
		</div>

		<?php if (strstr($url, 'mobileorder')) : ?>
			<section id="menu">
				<div class="main-title--box">
					<h1 class="main-title">Cart</h1>
				</div>

				<p class="cart-text">ご注文内容確認</p>

				<?php if ($itemsArr == null) : ?>
					<div class="item-box">
						<p>カートに商品が入っておりません。</p>
					</div>
					<div class="cart-btn--group">
						<a href="mobileorder.php" class="btn">戻る</a>
					</div>

				<?php else : ?>
					<?php foreach ($itemsArr as $key => $val) : ?>
						<?php
						try {
							$sql = "SELECT * FROM items WHERE item_id=" . $key;
							$stmt = $pdo->prepare($sql);
							$res = $stmt->execute();
							if ($res) {
								$row = $stmt->fetch();
							}
						} catch (PDOException $e) {
							echo $e->getMessage();
							exit;
						}

						?>


						<div class="item-box">
							<div class="item-name--box">
								<?php if ($row['item_id'] <= 100) : ?>
									<div class="menu-icon"><img class="menu-icon--img" src="img/coffee-solid_bw.png" alt="フードアイコン"></div>
								<?php else : ?>
									<div class="menu-icon"><img class="menu-icon--img" src="img/hamburger-solid_bw.png" alt="フードアイコン"></div>
								<?php endif; ?>
								<p class="item-name"><?php echo $row['name']; ?></p>
							</div>
							<?php if (!empty($row['size'])) : ?>
								<dl class="item-parts">
									<dt>サイズ</dt>
									<dd><?php echo $row['size']; ?></dd>
								</dl>
							<?php endif; ?>
							<dl class="item-parts">
								<dt>個数</dt>
								<dd><?php echo $val; ?>個</dd>
							</dl>
							<dl class="item-parts">
								<dt>価格</dt>
								<dd><?php echo $row['price']; ?>円</dd>
							</dl>
						</div>

						<?php $totalPrice += $row['price'] * $val; ?>

					<?php endforeach; ?>

					<p class="totalprice">合計金額： <span><?php echo $totalPrice; ?></span> 円</p>
					<?php
					if ($totalPrice !== 0) {
						$_SESSION['totalPrice'] = $totalPrice;
					}
					?>
					<div class="cart-btn--group">
						<div class="order-btn--box">
							<div class="order-btn--items">
								<form action="" method="post">
									<input type="submit" name="shoporderbtn" class="btn order-btn" value="注文（現地でお支払い）">
								</form>
							</div>
							<div class="order-btn--items">
								<form action="charge.php" method="post">
									<script src="//checkout.stripe.com/checkout.js" class="stripe-button" name="cardorderbtn" data-key="pk_test_51KtNy2ANSB1K0zfAeeGTkUEmOsl6qSju9Y4dJIEsy1N6hkGz2LGj81tA8Ew7YLQkFk1mXVmi6uI7HQRBf1xMV2KF00sF2PD1GK" data-amount="<?php echo h($_SESSION['totalPrice']); ?>" data-locale="auto" data-allow-remember-me="false" data-label="注文（事前にクレジットカード払い）" data-name="クレジットカード払い" data-image="./img/favicon.png" data-description="デモ画面なので支払いはされません" data-currency="jpy">
									</script>
								</form>
								<p class="order-text">※Stripeという決済サイトのURLにてお支払いいただけます。</p>
							</div>
						</div>
						<div class="back-btn--parts"><a href="mobileorder.php" class="btn back-btn">商品を選び直しする</a></div>
					</div>

				<?php endif; ?>
			</section>
		<?php else : ?>
		<?php endif; ?>

	</main>


	<!-- ページ共通（フッター） -->
	<?php include "./include/footer.php"; ?>

</body>

</html>