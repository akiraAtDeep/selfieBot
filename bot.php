<?php
$update = json_decode(file_get_contents("php://input"), TRUE);
$chatId = $update["message"]["chat"]["id"];

if($chatid = '<id_utente>' && isset($update["message"]["photo"])) {
	$id = $update['message']['photo'][3]['file_id'];
	$context  = stream_context_create(
		array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-Type: application/x-www-form-urlencoded',
				'content' => http_build_query(array('file_id' => $id))
			)
		)
	);
	$res = json_decode(file_get_contents("https://api.telegram.org/bot<id_bot>/getFile", false, $context), TRUE);
	$url = 'https://api.telegram.org/file/bot<id_bot>/' . $res['result']['file_path'];
	file_put_contents(date('Y-m-d_H:i:s') . ".jpg", file_get_contents($url));
}
?>