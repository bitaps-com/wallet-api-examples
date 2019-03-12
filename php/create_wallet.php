<?php

echo "Example 1\n\n";
echo "Create wallet:\n";
$params = array();
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet",
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
echo "Create wallet with callback url http://testx.bitaps.com/simple/callback:\n";

$params = array("callback_link" => "http://testx.bitaps.com/simple/callback");
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet",
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
echo "Create wallet with password:\n";

$params = array("callback_link" => "http://testx.bitaps.com/simple/callback",
                "password" => "secret");
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet",
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
echo "Create wallet on bitcoin testnet network:\n";
$params = array();
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/testnet/v1/create/wallet",
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
echo "Create wallet old style API:\n";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://bitaps.com/api/create/redeemcode",
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





echo "Example 1\n\n";
echo "Create wallet:\n";




