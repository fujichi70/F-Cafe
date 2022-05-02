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


	<!-- ページ下部に固定 -->
	<a href="mobileorder.php">
		<div class="mobileorder">
			<div class="mobileorder-title">スマホ注文</div>
			<div class="mobileorder-img--parts"><img class="mobileorder-img" src="img/beans.png" alt=""></div>
			<p class="mobileorder-text">mobile<br>order</p>
		</div>
	</a>

	<main>
		<section id="main">
			<div class="main-imgs">
				<div class="main-text">
					<span class="chars">I</span>
					<span class="chars">Love</span>
					<span class="chars">Coffee</span>
					<span class="chars">.</span>
				</div>
			</div>
		</section>
	</main>

	<section id="store">
		<div class="wrapper">
			<div class="main-title--box">
				<h1 class="main-title">Store</h1>
			</div>
			<div class="store-group">
				<div class="store-img--box fade">
					<img class="store-img" src="img/storeoutside.png" alt="">
					<img class="store-img" src="img/store1.png" alt="">
					<img class="store-img" src="img/store2.png" alt="">
					<img class="store-img" src="img/store3.png" alt="">
					<img class="store-img" src="img/store4.png" alt="">
				</div>
				<div class="store-text--box">
					<h2 class="store-title fade">140席もあるゆったりとした<br class="store-br">一軒家cafe</h2>
					<p class="store-text fade">地下鉄表参道駅から徒歩７分の絵本の世界のようなおしゃれなcafe。</h>
					<p class="store-text fade">4階建ての大きなお店なので、お仕事やお勉強、お茶会、ブレイクタイム…リラックスしながらご使用いただけます。</p>
					<p class="store-text fade">ゆっくりとした時間をご堪能ください。</p>
				</div>
			</div>
		</div>

	</section>
	<section id="news">
		<div class="wrapper">
			<div class="main-title--box">
				<h1 class="main-title">news</h1>
			</div>
			<div class="grid">
				<div class="card card01">
					<h3 class="card-title">期間限定</h3>
					<div class="bar">
						<div class="emptybar"></div>
						<div class="filledbar"></div>
						<p class="card-text">1日限定15食！<br>いちごチーズケーキ新登場！是非ご賞味ください♪</p>
					</div>
				</div>
				<div class="card card02">
					<h3 class="card-title">New Release！</h3>
					<div class="bar">
						<div class="emptybar"></div>
						<div class="filledbar"></div>
						<p class="card-text">いちごクロワッサン新発売♪サクサクふわふわ♪</p>
					</div>
				</div>
				<div class="card card03">
					<h3 class="card-title">営業時間について</h3>
					<div class="bar">
						<div class="emptybar"></div>
						<div class="filledbar"></div>
						<p class="card-text">当面営業時間を<br>朝10時00分～夜9時00分<br>までとさせていただきます。</p>
					</div>
				</div>
				<div class="card card04">
					<h3 class="card-title">当店のコロナ対策について</h3>
					<div class="bar">
						<div class="emptybar"></div>
						<div class="filledbar"></div>
						<p class="card-text">随時アルコール除菌を行っております。<br>また、マスク装着の上でご入店をお願いしております。</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="menu">

		<div class="main-title--box">
			<h1 class="main-title">Menu</h1>
		</div>

		<div class="menu-list">
			<div class="menu-type--box">
				<div class="wrapper">
					<div class="menu-parts fade">
						<div class="menu-icon"><img class="menu-icon--img" src="img/coffee-solid.png" alt="フードアイコン">
						</div>
						<p class="menu-text">drink</p>
					</div>
				</div><!-- .wrapper -->


				<div class="drink">
					<div class="drink-size">
						<p class="contents-text fade">size</p>
						<div class="size-img fade">
							<img src="img/drink_size.png" alt="ドリンクサイズ画像">
						</div>
					</div>

					<p class="contents-text fade">HOT</p>

					<dl class="drink-parts">
						<div class="drink-list fade">
							<dt>name</dt>
							<dd>S</dd>
							<dd>M</dd>
							<dd>L</dd>
						</div>
						<div class="drink-list fade">
							<dt>ブレンドコーヒー</dt>
							<dd>¥300</dd>
							<dd>¥400</dd>
							<dd>¥500</dd>
						</div>
						<div class="drink-list fade">
							<dt>カフェラテ</dt>
							<dd>¥350</dd>
							<dd>¥450</dd>
							<dd>¥550</dd>
						</div>
						<div class="drink-list fade">
							<dt>エスプレッソ</dt>
							<dd>¥400</dd>
							<dd>¥500</dd>
							<dd>¥600</dd>
						</div>
						<div class="drink-list fade">
							<dt>カプチーノ</dt>
							<dd>¥400</dd>
							<dd>¥500</dd>
							<dd>¥600</dd>
						</div>
						<div class="drink-list fade">
							<dt>レモンティー</dt>
							<dd>¥400</dd>
							<dd>¥500</dd>
							<dd>¥600</dd>
						</div>
						<div class="drink-list fade">
							<dt>ホットココア</dt>
							<dd>¥300</dd>
							<dd>¥400</dd>
							<dd>¥500</dd>
						</div>
					</dl>

					<p class="contents-text fade">ICE</p>

					<dl class="drink-parts">
						<div class="drink-list fade">
							<dt>name</dt>
							<dd>S</dd>
							<dd>M</dd>
							<dd>L</dd>
						</div>
						<div class="drink-list fade">
							<dt>アイスコーヒー</dt>
							<dd>¥300</dd>
							<dd>¥400</dd>
							<dd>¥500</dd>
						</div>
						<div class="drink-list fade">
							<dt>アイスカフェラテ</dt>
							<dd>¥450</dd>
							<dd>¥550</dd>
							<dd>¥650</dd>
						</div>
						<div class="drink-list fade">
							<dt>アイスココア</dt>
							<dd>¥300</dd>
							<dd>¥400</dd>
							<dd>¥500</dd>
						</div>
						<div class="drink-list fade">
							<dt>アイスティー</dt>
							<dd>¥350</dd>
							<dd>¥450</dd>
							<dd>¥550</dd>
						</div>
						<div class="drink-list fade">
							<dt>アイスレモンティー</dt>
							<dd>¥400</dd>
							<dd>¥500</dd>
							<dd>¥600</dd>
						</div>
						<div class="drink-list fade">
							<dt>コーヒーフロート</dt>
							<dd>¥500</dd>
							<dd>¥600</dd>
							<dd>¥700</dd>
						</div>
					</dl>

				</div><!-- .drink -->
			</div><!-- .menu-type--box -->

			<div class="food">
				<div class="menu-type--box">
					<div class="wrapper">

						<div class="menu-parts fade">
							<div class="menu-icon"><img class="menu-icon--img" src="img/coffee-solid.png" alt="フードアイコン">
							</div>
							<p class="menu-text">drink</p>
						</div>
					</div><!-- .wrapper -->

					<p class="contents-text fade">main</p>

					<div class="food-type flex">
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/sandwich2.jpg" alt="サンドイッチ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">サンドイッチ</li>
									<li class="food-text">¥400</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/hamburger.jpg" alt="ハンバーガー"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">ハンバーガー</li>
									<li class="food-text">¥400</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/rice.jpg" alt="ピラフ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">キッシュ</li>
									<li class="food-text">¥500</li>
								</ul>

							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/doria.jpg" alt="ドリア"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">ピラフ</li>
									<li class="food-text">¥800</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/pizza.jpg" alt="ピザ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">ドリア</li>
									<li class="food-text">¥800</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/quiche.jpg" alt="キッシュ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">ピザ</li>
									<li class="food-text">¥1000</li>
								</ul>
							</div>
						</div>
					</div><!-- .food-type -->

					<p class="contents-text fade">dessert</p>

					<div class="food-type flex">

						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/cake5.png" alt="いちごチーズケーキ"></div>
							<p class="special-text">期間限定</p>
							<div>
								<ul class="food-parts">
									<li class="food-text">いちごチーズケーキ</li>
									<li class="food-text">¥550</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/croissants.jpg" alt="クロワッサン"></div>
							<p class="special-text">new!</p>
							<div>
								<ul class="food-parts">
									<li class="food-text">クロワッサン</li>
									<li class="food-text">¥400</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/cake1.png" alt="チョコケーキ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">チョコケーキ</li>
									<li class="food-text">¥500</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/cake2.png" alt="チーズケーキ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">チーズケーキ</li>
									<li class="food-text">¥500</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/cake4.png" alt="レアチーズケーキ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">レアチーズケーキ</li>
									<li class="food-text">¥500</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/cake6.png" alt="ティラミス"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">ティラミス</li>
									<li class="food-text">¥500</li>
								</ul>
							</div>
						</div>
						<div class="food-list fade">
							<div class="food-img--parts"><img src="img/food/pancake.jpg" alt="パンケーキ"></div>
							<div>
								<ul class="food-parts">
									<li class="food-text">パンケーキ</li>
									<li class="food-text">¥1000</li>
								</ul>
							</div>
						</div>

					</div><!-- .food-type -->

				</div><!-- .menu-type--box -->
			</div><!-- .food -->

		</div><!-- .menu-list -->
	</section>

	<section id="map">
		<div class="wrapper">
			<div class="main-title--box">
				<h1 class="main-title">access・map</h1>
			</div>

			<div class="map-text--box fade">
				<h3 class="map-title">住所</h3>
				<p class="map-text">〒１５０－０００１ 東京都渋谷区神宮前４丁目１８−１２</p>
			</div>
			<div class="map-text--box fade">
				<h3 class="map-title">電話</h3>
				<p class="map-text">０３－１２３４ー××××</p>
			</div>
			<div class="map-text--box fade">
				<h3 class="map-title">営業時間</h3>
				<p class="map-text">朝１０時００分～夜９時００分</p>
			</div>

			<div class="map-google--parts">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3446.5194032441887!2d139.7076284949066!3d35.668188226523355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ca2324b1ff5%3A0x6c0fe8580626c7c2!2z44CSMTUwLTAwMDEg5p2x5Lqs6YO95riL6LC35Yy656We5a6u5YmN77yU5LiB55uu77yR77yY4oiS77yR77yS!5e0!3m2!1sja!2sjp!4v1646443766240!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="map-google"></iframe>
			</div>
		</div>
	</section>


	<!-- ページ共通（フッター） -->
	<?php include "./include/footer.php"; ?>


</body>

</html>