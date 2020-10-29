
<?php



echo "Example 3\n\n";
echo "Get wallet information with password:\n";

$password = "HellOPaSS-TeStNeT-WaLlET-biTaPs-Yes";
$wallet_id = "BTCvHeQUyVvtJa1EvCe6MYPQLkiL4prCa3Q5ftHDbZBcyrJEXkgvB";
$wallet_id_hash = "12d9418e7808d94573020be90193e09c056adb1726a28f4c3de9e9a368c53d7b";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/testnet/v1/wallet/state/".$wallet_id_hash,
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


echo "Example 3\n\n";
echo "Get wallet transactions with password:\n";

$password = "HellOPaSS-TeStNeT-WaLlET-biTaPs-Yes";
$wallet_id = "BTCvHeQUyVvtJa1EvCe6MYPQLkiL4prCa3Q5ftHDbZBcyrJEXkgvB";
$wallet_id_hash = "12d9418e7808d94573020be90193e09c056adb1726a28f4c3de9e9a368c53d7b";
$nonce=round(microtime(true) * 1000);
$key = hash("sha256",(hash("sha256",$wallet_id.$password,true)),true);
$msg = $wallet_id_hash.$nonce;
$signature = hash_hmac("sha256",$msg,$key);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.bitaps.com/btc/testnet/v1/wallet/transactions/".$wallet_id_hash,
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



