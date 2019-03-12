## PHP Examples for wallet API

### Step 1 Create wallet:

To create wallet use this API endpoints:

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
    
_ "wallet_id" parameter you should keep safe, in case no password or otp to your wallet this code give you
 full access to wallet. We recommend set password to your wallet._

### Step 2 Create wallet address:

Wallet can have an unlimited number of addresses to replenish or accept payments. Each address can be created with
individual callback link or use wallet default callback link if it was specified while creating wallet. In case no
callback links specified while creating address and wallet, payment notifications will not be sent.

Incoming payments will be credited to the wallet balance upon confirmation on bitcoin transaction. The number of 
confirmations depends on the amount of payment.

  - less than 0.1 BTC  1 confirmation required 
  - 0.1 BTC - 1 BTC  2 confirmation required 
  - more or equal 1 BTC 3 confirmation required 
  
To create wallet use this API endpoints:

  - https://api.bitaps.com/btc/testnet/v1/create/wallet/payment/address  (testnet)
  - https://api.bitaps.com/btc/v1/create/wallet/payment/address
  
Example:
  
    $params = array("wallet_id"=> "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a");
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.bitaps.com/btc/v1/create/wallet/payment/address",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($params)));
    $response = curl_exec($curl);

Response:

    stdClass Object
    (
        [invoice] => invNsPyYePpvQZfY9qFCSMwVd63oDuHRzrvvjsPvbiXGiWS2Z3ktA
        [payment_code] => PMTvKzyrTu8npZ7n1g6F6aVcmKXRza39wo9Axk4shamXppm3gmMHU
        [address] => 3AB2qrrBRcxSMNYrPAJ21WhCWcNJXpjvVx
        [confirmations] => depends on the amount
        [notification_link_domain] => 
        [wallet_id_hash] => 0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a
        [currency] => BTC
    )

_As "wallet_id" parameter you can use wallet_id or wallet_id_hash, we recommend use wallet_id_hash._