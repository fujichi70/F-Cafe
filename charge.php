<?php

require 'vendor/autoload.php';
require 'db_connection.php';

session_start();

\Stripe\Stripe::setApiKey('sk_test_51KtNy2ANSB1K0zfA67O91pgQZR6wVg3VCFnwJd2RjBrJDoycuu2b12eWV1swgczdfhcWKuNKq4NWxv3ZKmvSyRmM00kAfU4fHa');

$chargeId = null;
try {
	$token = $_POST['stripeToken'];
	$charge = \Stripe\Charge::create(array(
		'amount' => $_SESSION['totalPrice'],
		'currency' => 'jpy',
		'description' => 'cafeでの支払処理（デモ）',
		'source' => $token,
		'capture' => false,
	));
	$chargeId = $charge['id'];

	$buyItems = $_SESSION['items'];
	$order_id = date('ymd') . sprintf("%03d", mt_rand(0, 999));
	foreach ($buyItems as $key => $buyItem) {
		$params = [
			'id' => null,
			'order_id' => $order_id,
			'item_number' => $key,
			'item_quantity' => $buyItem,
			'pay' => '1',
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

		$sql = 'insert into orders (' . $columns . ')values(' . $values . ')';

		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
	}
	$_SESSION['order_id'] = $order_id;
	// 売上の確定
	$charge->capture();

	header("Location: thanks.php");
	exit;
} catch (Exception $e) {
	if ($chargeId !== null) {
		\Stripe\Refund::create(array(
			'charge' => $chargeId,
		));
	}
	$_SESSION['error'] = 'エラーが発生しました。大変恐れ入りますが、再度商品を選択の上、現地にてお支払いいただけますと幸いです。';
	header("Location: mobileorder.php");
	exit;
}
