<?php

echo "Example 1\n\n";
echo "Create wallet address:\n";
$params = array("wallet_id"=> "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA");

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet/payment/address",
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



echo "Example 2\n\n";
echo "Create wallet bech32 address:\n";
$params = array("wallet_id"=> "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA",
                "bech32" => true);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet/payment/address",
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





echo "Example 3\n\n";
echo "Create wallet address use wallet_id_hash:\n";
$params = array("wallet_id"=> "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a");

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet/payment/address",
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



echo "Example 4\n\n";
echo "Create wallet address with callback link:\n";
$params = array("wallet_id"=> "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a",
                "callback_link" => "http://testx.bitaps.com/simple/callback");

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet/payment/address",
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




echo "Example 5\n\n";
echo "Create wallet address with exactly count of confirmation notifications:\n";
$params = array("wallet_id"=> "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a",
                "callback_link" => "http://testx.bitaps.com/simple/callback",
                "confirmations" => 4);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet/payment/address",
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




