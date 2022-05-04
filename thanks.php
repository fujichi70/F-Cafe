<?php

require 'functions.php';

header('X-FRAME-OPTIONS:DENY');

session_start();

$order_id = 0;

if (!empty($_SESSION['order_id'])) {
	$order_id = $_SESSION['order_id'];
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F Cafe</title>
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

	<section id="thanks">
		<h1 class="thanks-title">thank you for order!</h1>
		<p class="thanks-text">ご注文いただきありがとうございました！<br>以下注文番号をお控えください！<br>ご注文のお品を準備してお待ちしております。</p>
		<p class="order-id">注文番号： <?php echo h($order_id); ?></p>

		<div class="thanks-btn--parts"><a href="top.php" class="btn thanks-back-btn">トップページに戻る</a></div>

	</section>


	<!-- ページ共通（フッター） -->
	<?php include "./include/footer.php"; ?>
</body>

</html>