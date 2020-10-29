<?php

echo "Example 1\n\n";
echo "Get wallet information:\n";
$wallet_id = "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/state/".$wallet_id,
  CURLOPT_RETURNTRANSFER => true
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}



echo "Example 2\n\n";
echo "Get wallet information using wallet_id_hash:\n";
$wallet_id = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/state/".$wallet_id,
  CURLOPT_RETURNTRANSFER => true
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}


echo "Example 3\n\n";
echo "Get wallet information with password:\n";

$password = "secret";
$wallet_id = "BTCvvwqKQWefFEGJ3F4Sqxr789ebdYmcB34wKpFXiGUSv958gHsvB";
$wallet_id_hash = "06c9927385d35f812d1822c3bc0d32d38a9d82b1319ce1784c1f9d76fb757ded";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.bitaps.phd/btc/v1/wallet/state/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array("Access-Nonce: ".$nonce,"Access-Signature: ".$signature),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}





echo "Example 4\n\n";
echo "Create wallet information old style API:\n";
$params = array("redeemcode"=> "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA");

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://bitaps.com/api/get/redeemcode/info",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}
