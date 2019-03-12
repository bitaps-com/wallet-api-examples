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
    
_"wallet_id" parameter you should keep safe, in case no password or otp to your wallet this code give you
 full access to wallet. We recommend setting a password for your wallet._

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
    print_r(json_decode($response));
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


### Step 4 Get wallet information:

To create wallet use this API endpoints:

  - https://api.bitaps.com/btc/testnet/v1/wallet/state/{wallet_id}  (testnet)
  - https://api.bitaps.com/btc/v1/wallet/state/{wallet_id}

Example:

    $wallet_id = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a";
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/state/".$wallet_id,
      CURLOPT_RETURNTRANSFER => true));
    $response = curl_exec($curl);
    print_r(json_decode($response));
    
Response:

    stdClass Object
    (
        [address_count] => 8
        [pending_received_amount] => 0
        [pending_sent_amount] => 0
        [received_amount] => 0
        [sent_amount] => 0
        [service_fee_paid_amount] => 0
        [sent_tx] => 0
        [received_tx] => 0
        [pending_sent_tx] => 0
        [pending_received_tx] => 0
        [invalid_tx] => 0
        [balance_amount] => 0
        [create_date] => 2019-03-12T09:27:31Z
        [create_date_timestamp] => 1552382851
        [last_used_nonce] => 
        [wallet_id_hash] => 0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a
        [notification_link_domain] => 
        [success_callbacks] => 0
        [failed_callbacks] => 0
        [currency] => BTC
    )

_For wallet with password you should provide HMAC signature for request, examples in get_wallet_state.php._


### Step 5 Send payment:

To create wallet use this API endpoints:

  - https://api.bitaps.com/btc/testnet/v1/wallet/send/payment/{wallet_id}  (testnet)
  - https://api.bitaps.com/btc/v1/wallet/send/payment/{wallet_id}

Example:

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
    print_r(json_decode($response));
    
Response:

    stdClass Object
    (
        [error_code] => 22
        [message] => not enough funds
        [details] => 
        [server_time] => 1552399683
    )


_For wallet with password you should provide HMAC signature for request, examples in send_payment.php._


More examples you can find in this files:

  - get_wallet_transaction.php  - Wallet transaction history
  - get_wallet_address_transaction - Wallet address transaction history
  - get_daily_statistics.php - Wallet dailt statistics
  - wallet_password.php - examples of set/remove wallet passwords and OTP (google auth compatible)
  - callback_logs.php - get logs for wallet address notifications
  