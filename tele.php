<?php


$TOKEN  = "803157391:AAEMAxw8YRAshNCHbkIWBraHgG34Mnh5B_A";  // ganti token ini dengan token bot mu
$chatid = "500376188"; // ini id saya di telegram @hasanudinhs silakan diganti dan disesuaikan
$pesan 	= "";
// ----------- code -------------
$method	= "sendMessage";
$url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method;
$post = [
 'chat_id' => $chatid,
 // 'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
 'text' => $pesan
];
$header = [
 "X-Requested-With: XMLHttpRequest",
 "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
];
// hapus 1 baris ini:
//die('Hapus baris ini sebelum bisa berjalan, terimakasih.');
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_REFERER, $refer);
//curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$datas = curl_exec($ch);
$error = curl_error($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$debug['text'] = $pesan;
$debug['code'] = $status;
$debug['status'] = $error;
$debug['respon'] = json_decode($datas, true);
print_r($debug);


echo"<h1>Tes kirim Telegram</h1>";

?>