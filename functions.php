<?php

/**
 * xss対策発行
 * @param [string] xss対策が必要な引数
 */
function h($str)
{
	return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

/**
 * トークン発行
 * @param integer $_SESSION['token'] ランダムな32桁の数字を格納
 */
function setToken()
{
	if (!isset($_SESSION['token'])) {
		$token = bin2hex(random_bytes(32));
		$_SESSION['token'] = $token;
	}
}

/**
 * トークン確認
 * 誤りだった場合飛んできたページに戻す、またはトップに戻す
 * 二重送信防止のため、確認後トークンを空にする
 */
function checkToken()
{
	if (empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['csrf'])) {
		header('Location: top.php');
		$_POST = '';
	} else {
		unset($_SESSION['token']);
	}
}

/**
 * カートに追加した商品を配列に格納
 * 誤りだった場合飛んできたページに戻す、またはトップに戻す
 * 二重送信防止のため、確認後トークンを空にする
 */
function itemsArray()
{
	if (!empty($_POST['item'])) {
	}
}
