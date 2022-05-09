import requests

url = "http://ptl-8f48f942-4a5f44a0.libcurl.so//pentesterlab"

cookie = {'key':'please'}
header= {'X-HTTP-Method-Override':'HACK'}

myobj = {'key':'please'}


#response = requests.get(url,cookies=cookie)
#response = requests.get(url)
response = requests.get(url,auth=('key', 'please'))
#response = requests.get(url,headers=header)

print("Status Code", response.status_code)
print("Response",response.content)
