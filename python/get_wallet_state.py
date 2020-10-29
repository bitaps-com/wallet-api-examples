import requests
import json
import time
import hashlib
import hmac


wallet_id = "BTCvzHmmL1ijiBou7U8u9Ye1F4PxDtDQccYSvzAYNvJz866kCv9KA"
url = "https://api.bitaps.com/btc/v1/wallet/state/" + wallet_id

response = requests.request("GET", url)
result = json.loads(response.text)
print("Example 1")
print("Get wallet information:")
print(result)
print("\n\n")


wallet_id_hash = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a"
url = "https://api.bitaps.com/btc/v1/wallet/state/" + wallet_id_hash

response = requests.request("GET", url)
result = json.loads(response.text)
print("Example 2")
print("Get wallet information using wallet_id_hash:")
print(result)
print("\n\n")

password = "secret"
wallet_id = "BTCvvwqKQWefFEGJ3F4Sqxr789ebdYmcB34wKpFXiGUSv958gHsvB"
wallet_id_hash = "0ddfcc11d0cd9490b23944b3648268981176eb8ebd04f7bbd29506bc2b8dba5a"
nonce=int(time.time() * 1000)
key = hashlib.sha256(hashlib.sha256((wallet_id+password).encode()).digest()).digest()
msg =wallet_id_hash + str(nonce)

signature = hmac.new(key, msg=msg.encode(), digestmod=hashlib.sha256).hexdigest()

url = "https://api.bitaps.com/btc/v1/wallet/state/" + wallet_id_hash
headers = {"Access-Nonce": str(nonce), "Access-Signature": signature}
response = requests.request("GET", url, headers = headers)
result = json.loads(response.text)
print("Example 3")
print("Get wallet information using wallet_id_hash:")
print(result)
print("\n\n")
