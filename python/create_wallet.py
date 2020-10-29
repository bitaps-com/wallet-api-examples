import requests
import json

url = "https://api.bitaps.com/btc/v1/create/wallet"
options = {}
response = requests.request("POST", url, data=json.dumps(options))
result = json.loads(response.text)
print("Wallet without any additional options:")
print(result)


print("\n\n")
print("Example 2\n\n")
print("Create wallet with password:\n")

options = {"callback_link": "http://testx.bitaps.com/simple/callback",
           "password": "secret"}
response = requests.request("POST", url, data=json.dumps(options))
result = json.loads(response.text)
print(result)

