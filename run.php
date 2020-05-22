<?php  
// Created by yudha tira pamungkas
function get($url = null, $headers = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	if ($headers != "") {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}

	return $result = curl_exec($ch);
	curl_close($ch);
}


echo "Url Sticker : ";
$url = trim(fgets(STDIN));

if ($url != "") {
	$explode_id = explode('/', $url);
	$file = get('https://stickershop.line-scdn.net/stickershop/v1/product/'.$explode_id[5].'/PC/stickers.zip');
	if (!file_exists('sticker')) {
		mkdir('sticker');
		file_put_contents('sticker/sticker_'.$explode_id[5].'.zip', $file);
	} else {
		file_put_contents('sticker/sticker_'.$explode_id[5].'.zip', $file);
	}
	echo "Success download sticker_".$explode_id[5].".zip in folder sticker!\n";
} else {
	echo "Cannot be blank!\n";
}


?>
