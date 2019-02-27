import requests
import json

url = "https://api.bitaps.com/btc/v1/create/wallet"
options = {}
response = requests.request("POST", url, data=json.dumps(options))
result = json.loads(response.text)
print("Wallet without any aditional options:")
print(result)
