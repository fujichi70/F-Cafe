<?php

require 'functions.php';

session_start();

header('X-FRAME-OPTIONS:DENY');

setToken();


if (!empty($_POST['cartin'])) {
	// checkToken();
	// setToken();
	header('Location: cart.php');
}

if (!empty($_POST['delete'])) {
	unset($_SESSION['item']);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F Cafe - スマホ注文</title>
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

	<main id="mobileorder">

		<!-- ページ下部に固定 -->
		<a href="top.php">
			<div class="mobileorder icon">
				<div class="mobileorder-img--parts"><img class="mobileorder-img" src="img/beans.png" alt="コーヒー豆画像"></div>
				<p class="mobileorder-text">TOP</p>
			</div>
		</a>

		<?php if (!empty($_SESSION['error'])): ?>
			<p><?php echo h($_SESSION['error']); ?></p>
			<?php unset($_SESSION['error']); ?>
		<?php endif; ?>

		<!-- <div class="mobileorder-visual--parts"><img class="mobileordermain-visual" src="img/back-coffee.png"
				alt="コーヒーの画像"></div> -->

		<section id="menu">
			<div class="main-title--box">
				<h1 class="main-title">Menu</h1>
			</div>

			<div class="main-text--box">
				<p class="main-text">数量を指定してカートを追加するボタンを押してください。</p>
				<span>※それぞれカートを追加するを押していないと反映されませんのでご了承ください。</span>
			</div>

			<!-- <form action="" method="post">
				<input type="submit" name="delete" class="delete-btn" value="カートを空にする">
			</form> -->

			<div class="menu-list">
				<form action="cart.php" method="post">
					<div class="menu-type--box">
						<div class="wrapper">
							<div class="menu-parts">
								<div class="menu-icon"><img class="menu-icon--img" src="img/coffee-solid_bw.png" alt="ドリンクアイコン">
								</div>
								<p class="menu-text">drink</p>
							</div>
						</div><!-- .wrapper -->


						<div class="drink">
							<div class="drink-size">
								<p class="contents-text">size</p>
								<div class="size-img">
									<img src="img/drink_size_bw.png" alt="ドリンクサイズ画像">
								</div>
							</div>

							<p class="contents-text">HOT</p>

							<div class="drink-box grid">
								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/hot-coffee.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">ブレンドコーヒー</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥300</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="1" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="2" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="3" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/hot-late.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">カフェラテ</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥350</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="4" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥450</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="5" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥550</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="6" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/hot-espresso.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">エスプレッソ</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="7" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="8" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥600</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="9" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/hot-cappuccino.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">カプチーノ</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="10" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="11" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥600</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="12" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/hot-lemontea.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">レモンティー</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="13" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="14" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥600</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="15" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/hot-cocoa.png" class="card-img--parts" alt="ホットココア画像"></div>
									<div class="card-title">ホットココア</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥300</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="16" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="17" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="18" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->
							</div><!-- .drink-box -->


							<p class="contents-text">ICE</p>

							<div class="drink-box grid">
								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/ice-coffee.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">アイスコーヒー</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥300</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="19" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="20" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="21" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/ice-late.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">アイスカフェラテ</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥350</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="22" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥450</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="23" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥550</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="24" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/ice-cocoa.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">アイスココア</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥300</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="25" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="26" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="27" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/ice-tea.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">アイスティー</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥350</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="28" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥450</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="29" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥550</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="30" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/ice-lemontea.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">アイスレモンティー</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥300</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="31" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥400</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="32" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="33" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->

								<div class="drink-box--parts">
									<div class="card-img"><img src="img/drink/ice-coffeefloat.png" class="card-img--parts" alt="ブレンドコーヒー画像"></div>
									<div class="card-title">コーヒーフロート</div>
									<dl class="card-parts">
										<dt class="card-sizeprice">S ¥500</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner01" name="34" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">M ¥600</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner02" name="35" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
									<dl class="card-parts">
										<dt class="card-sizeprice">L ¥700</dt>

										<div class="spinner-container">
											<span class="spinner-minus disabled">-</span>
											<input class="spinner spinner03" name="36" type="number" min="0" max="20" value="0">
											<span class="spinner-plus">+</span>
										</div>
									</dl>
								</div><!-- .drink-box--parts -->


							</div><!-- .drink-box -->
						</div><!-- .drink-group -->
					</div><!-- .menu-type--box -->

					<div class="menu-type--box">

						<div class="food">
							<div class="menu-type--box">
								<div class="wrapper">


									<div class="menu-parts">
										<div class="menu-icon"><img class="menu-icon--img" src="img/hamburger-solid_bw.png" alt="フードアイコン"></div>
										<p class="menu-text">food</p>
									</div>
								</div><!-- .wrapper -->

								<p class="contents-text">main</p>

								<div class="food-type flex">
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/sandwich2.jpg" alt="サンドイッチ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">サンドイッチ</li>
												<li class="food-price">¥400</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="101" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/hamburger.jpg" alt="ハンバーガー"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">ハンバーガー</li>
												<li class="food-price">¥400</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="102" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/rice.jpg" alt="ピラフ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">キッシュ</li>
												<li class="food-price">¥500</li>
											</ul>

											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="103" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/doria.jpg" alt="ドリア"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">ピラフ</li>
												<li class="food-price">¥800</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="104" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/pizza.jpg" alt="ピザ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">ドリア</li>
												<li class="food-price">¥800</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="105" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/quiche.jpg" alt="キッシュ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">ピザ</li>
												<li class="food-price">¥1000</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="106" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
								</div>


								<p class="contents-text">dessert</p>

								<div class="food-type flex">
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/cake5.png" alt="いちごチーズケーキ"></div>
										<p class="special-text">期間限定</p>
										<div>
											<ul class="food-parts">
												<li class="food-text">いちごチーズケーキ</li>
												<li class="food-price">¥550</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="1001" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/croissants.jpg" alt="クロワッサン"></div>
										<p class="special-text">new！</p>
										<div>
											<ul class="food-parts">
												<li class="food-text">クロワッサン</li>
												<li class="food-price">¥400</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="112" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/cake1.png" alt="チョコケーキ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">チョコケーキ</li>
												<li class="food-price">¥500</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="107" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/cake2.png" alt="チーズケーキ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">チーズケーキ</li>
												<li class="food-price">¥500</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="108" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/cake4.png" alt="レアチーズケーキ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">レアチーズケーキ</li>
												<li class="food-price">¥500</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="109" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/cake6.png" alt="ティラミス"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">ティラミス</li>
												<li class="food-price">¥500</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="110" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>
									<div class="food-list">
										<div class="food-img--parts"><img src="img/food/pancake.jpg" alt="パンケーキ"></div>
										<div>
											<ul class="food-parts">
												<li class="food-text">パンケーキ</li>
												<li class="food-price">¥1000</li>
											</ul>
											<div class="spinner-container">
												<span class="spinner-minus disabled">-</span>
												<input class="spinner spinner01" name="111" type="number" min="0" max="20" value="0">
												<span class="spinner-plus">+</span>
											</div>
										</div>
									</div>

								</div><!-- .food-type -->
							</div><!-- .food -->

						</div><!-- .menu-type--box -->
					</div><!-- .menu-list -->

					<!-- 下部に固定 -->
					<div class="btn--parts">
						<input type="submit" name="cartin" class="btn cart-btn" value="カートに追加">
						<input type="hidden" name="csrf" value="<?php echo h($_SESSION['token']); ?>">
					</div>


				</form>
		</section>

	</main>


	<!-- ページ共通（フッター） -->
	<?php include "./include/footer.php"; ?>

</body>

</html>