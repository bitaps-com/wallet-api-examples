##PHP Examples for wallet API

### Step 1 Create wallet:

To create wallet use this API endoints:

  - https://api.bitaps.com/btc/testnet/v1/create/wallet  (testnet)
  - https://api.bitaps.com/btc/v1/create/wallet
  - https://bitaps.com/api/create/redeemcode (old style API)
  
Example:

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{}"));
    $response = curl_exec($curl);
    print_r(json_decode($response));

Result:

    Create wallet:
    stdClass Object
    (
        [wallet_id] => BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA
        [wallet_id_hash] => 0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a
        [currency] => BTC
    )
