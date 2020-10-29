<?php

echo "Example 1\n\n";
echo "Send payment:\n";
$params = array("receivers_list"=> [array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                                         "amount" =>  "30000000")]);
$wallet_id = "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/payment/".$wallet_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}



echo "Example 2\n\n";
echo "Send payment using wallet_id_hash:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";
$wallet_id_hash = "133bfd12162c5a560d95bda0b0ed8b4f2d4b3d4c1d814c2d2100f03a5e71ae1e";

$params = array("receivers_list"=> array(array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                                               "amount" =>  "30000000"),),
                "wallet_id" => $wallet_id );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/payment/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}


echo "Example 3\n\n";
echo "Send payment with message:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";
$wallet_id_hash = "133bfd12162c5a560d95bda0b0ed8b4f2d4b3d4c1d814c2d2100f03a5e71ae1e";

$params = array("receivers_list"=> array(array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                                               "amount" =>  "30000000"),),
                "message" => array("type" => "text",
                                   "payload" => "hello"),
                "wallet_id" => $wallet_id );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/payment/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}




echo "Example 4\n\n";
echo "Send  message:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";
$wallet_id_hash = "133bfd12162c5a560d95bda0b0ed8b4f2d4b3d4c1d814c2d2100f03a5e71ae1e";

$params = array(
                "message" => array("type" => "text",
                                   "payload" => "hello"),
                "wallet_id" => $wallet_id );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/payment/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}





echo "Example 5\n\n";
echo "Send  mass payment:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";
$wallet_id_hash = "133bfd12162c5a560d95bda0b0ed8b4f2d4b3d4c1d814c2d2100f03a5e71ae1e";

$params = array("receivers_list"=> array(array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                                               "amount" =>  "30000000"),
                                         array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                                               "amount" =>  "30000000"),
                                         array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                                               "amount" =>  "30000000")),
                "wallet_id" => $wallet_id );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/payment/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}






echo "Example 6\n\n";
echo "Send payment with password:\n";

$params = array("receivers_list"=> array(array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                                               "amount" =>  "30000000"),) );
$params = json_encode($params);
$password = "123";
$wallet_id = "BTCvvwqKQWefFEGJ3F4Sqxr789ebdYmcB34wKpFXiGUSv958gHsvB";
$wallet_id_hash = "31d361f0c2afe84edc821b864c1d2186d83a17811d01c2de3a3a1a06bae47410";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$params.$nonce;
$signature = hash_hmac("sha256",$msg,$key);



$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/payment/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array("Access-Nonce: ".$nonce,"Access-Signature: ".$signature),
  CURLOPT_POSTFIELDS => $params
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}


echo "Example 7\n\n";
echo "Send payment all balance:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";
$wallet_id_hash = "133bfd12162c5a560d95bda0b0ed8b4f2d4b3d4c1d814c2d2100f03a5e71ae1e";

$params =  array("address" => "3LwCq87PVvE3jAuikrMyqiMnPjX3k9mPjK",
                 "amount" =>  "30000000" );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/all/balance/".$wallet_id_hash,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}


echo "Example 7\n\n";
echo "Send payment old style API:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";

$params =  array("redeemcode" => $wallet_id,
                 "address" => "3Ny6mBqMhB8S8F4v4ozgJiwHC1JXENW1bz",
                 "amount" => 300000 );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://bitaps.com/api/use/redeemcode",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}



echo "Example 8\n\n";
echo "Send all balance old style API:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";

$params =  array("redeemcode" => $wallet_id,
                 "address" => "3Ny6mBqMhB8S8F4v4ozgJiwHC1JXENW1bz",
                 "amount" => "All available" );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://bitaps.com/api/use/redeemcode",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}


echo "Example 8\n\n";
echo "Send mass payment old style API:\n";
$wallet_id = "BTCup8vxNE9tcJLjSyYJtzQgkjQFqMpAess4k76GKnTW3kbn8Ydtv";

$params =  array("redeemcode" => $wallet_id,
                 "payment_list" => [array("address" => "3Ny6mBqMhB8S8F4v4ozgJiwHC1JXENW1bz",
                                               "amount" => 7000000),
                                         array("address" => "bc1q8n7kungmzl9h5mnmgjfxchyadaaau3qv5ptvtv",
                                               "amount" => 7000000)],
                 "data" => "3131313131" );

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://bitaps.com/api/use/redeemcode/list",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($params)
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print_r ($err);
} else {
  print_r(json_decode($response));
}

