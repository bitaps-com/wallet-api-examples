<?php

echo "Example 1\n\n";
echo "Get wallet daily statistics:\n";
$wallet_id = "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/daily/statistic/".$wallet_id."?page=1&limit=5",
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
echo "Get wallet daily statistics using wallet_id_hash:\n";
$wallet_id = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/daily/statistic/".$wallet_id."?page=1&limit=5",
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
echo "Get wallet daily statistics with password:\n";

$password = "secret";
$wallet_id = "BTCvvwqKQWefFEGJ3F4Sqxr789ebdYmcB34wKpFXiGUSv958gHsvB";
$wallet_id_hash = "b9d3f36ed1e241b5b7f38ef7cb61b28edc6bf4a2b7e926306ca61d1ea8e41ad0";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/daily/statistic/".$wallet_id_hash,
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
echo "Get wallet wallet daily statistics 2019.03.10 -> 2019.03.12:\n";
$wallet_id = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a";
$get_param = "?from_date=1552176000&to_date=1552348800&page=1&limit=5";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/daily/statistic/".$wallet_id.$get_param ,
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
