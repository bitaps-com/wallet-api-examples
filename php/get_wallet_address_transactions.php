<?php

echo "Example 1\n\n";
echo "Get wallet address transactions:\n";
$wallet_id = "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA";
$address = "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/address/transactions/".$wallet_id."/".$address."?page=1&limit=5",
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
echo "Get wallet transactions using wallet_id_hash:\n";
$wallet_id = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a";
$address = "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/address/transactions/".$wallet_id."/".$address."?page=1&limit=5",
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
echo "Get wallet transactions with password:\n";
$wallet_id = "BTCvvwqKQWefFEGJ3F4Sqxr789ebdYmcB34wKpFXiGUSv958gHsvB";
$wallet_id_hash = "b9d3f36ed1e241b5b7f38ef7cb61b28edc6bf4a2b7e926306ca61d1ea8e41ad0";
$password = "secret";
$address = "bc1q9fr0atjvuh90wsamk4p6qmkts3nfw2xsj8u62y";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/address/transactions/".$wallet_id_hash."/".$address."?page=1&limit=5",
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
echo "Get wallet transactions from 2019.03.10 -> 2019.03.12:\n";
$wallet_id = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a";
$address = "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK";
$get_param = "?from_date=1552176000&to_date=1552348800&page=2&limit=5";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/address/transactions/".$wallet_id."/".$address."?page=1&limit=5",
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
