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
$r = json_decode($response);
print_r($r);
$wallet_id = $r->{"wallet_id"};
$wallet_id_hash =  $r->{"wallet_id_hash"};

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}

echo "Set wallet password:\n";
$params = array("password" => "secret",
                "wallet_id" => $wallet_id );
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/set/password/".$wallet_id_hash,
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



echo "Remove wallet password:\n";
$params = array();
$curl = curl_init();

$password = "secret";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);



curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/delete/password/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params),
  CURLOPT_HTTPHEADER => array("Access-Nonce: ".$nonce,"Access-Signature: ".$signature)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}



echo "Set wallet OTP (one time passwords):\n";
$params = array("wallet_id" => $wallet_id );
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/set/otp/".$wallet_id_hash,
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




echo "Set wallet password:\n";
$params = array("password" => "secret",
                "wallet_id" => $wallet_id );
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/set/password/".$wallet_id_hash,
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




echo "Set wallet OTP (one time passwords) with password:\n";
$params = array();
$curl = curl_init();

$password = "secret";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/set/otp/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params),
  CURLOPT_HTTPHEADER => array("Access-Nonce: ".$nonce,"Access-Signature: ".$signature)
));


$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}



echo "Only after confirmations OTP password is activated\n";
echo "Confirm wallet OTP (one time passwords):\n";
$params = array("otp" => "446243" );
$curl = curl_init();
$password = "secret";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/confirm/otp/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array("Access-Nonce: ".$nonce,"Access-Signature: ".$signature),
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





echo "Remove wallet password:\n";
$params = array();
$curl = curl_init();

$password = "secret";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);



curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/delete/password/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params),
  CURLOPT_HTTPHEADER => array("Access-Nonce: ".$nonce,"Access-Signature: ".$signature)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}


echo "Confirm otp without password on wallet\n";
echo "Confirm wallet OTP (one time passwords):\n";
$params = array("otp" => "446243" );
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/confirm/otp/".$wallet_id_hash,
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




echo "Remove otp wallet:\n";
$params = array("otp" => "446243",
                "wallet_id" => $wallet_id );
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/delete/otp/".$wallet_id_hash,
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

