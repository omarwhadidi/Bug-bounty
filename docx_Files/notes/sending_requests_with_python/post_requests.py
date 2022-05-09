import requests

url = "http://ptl-ac1366c8-e6754dc4.libcurl.so/pentesterlab"

cookie = {'key':'please'}
header= {'Content-Type':'application/xml'}

xml = """<?xml version='1.0' encoding='utf-8'?>
<key value='&#x22;please'></key>"""
jsondata = {'key': 'please\u0022'}

myobj = {'key':'please'}
myobj2 = [('key','please'),('key','please')]

#response = requests.post(url,cookies=cookie)
#response = requests.post(url,json=jsondata,headers=header)
response = requests.post(url, data = xml , headers=header)

print("Status Code: ", response.status_code)
#print("Response",response.content)
print("Response: ",response.text)