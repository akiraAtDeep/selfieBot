<?php 
if(!isset(glob(date('Y-m-d') . "*.jpg")[0])){
	$chatId = '<id_utente>';
	$what = 'Non hai ancora mandato il selfie di oggi!';
	$context  = stream_context_create(
		array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-Type: application/x-www-form-urlencoded',
				'content' => http_build_query(array(
					'chat_id' => $chatId,
					'text' => $what
					)
				)
			)
		)
	);
	return file_get_contents("https://api.telegram.org/bot<id_bot>" . "/sendmessage", false, $context);
	}
?> 
