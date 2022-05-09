import json
from jwcrypto import jwk , jwt
from Crypto.PublicKey import RSA

#key = RSA.generate(4096)
#private_key = key.exportKey()
#public_key = key.publickey().exportKey()
#print(public_key)
#print(private_key)

with open("rsa.private", "rb") as pemfile:
    key  = jwk.JWK.from_pem(pemfile.read())

public_key = key.export(private_key=False)


Token = jwt.JWT(
    header={
    "typ": "JWT",
    "alg": "RS256",
    "jwk": { "kty": "RSA", 
    	     "kid": "KlusWiSICC7lhV-o8G7uRcNt4oXLH3z4RRb6FHrJk9A", 
    	     "use": "sig",
    	     "n": "3tTHI-f7RyZpFHQID0YDf3GlfEaDGEWAl5VZ7mFy07sGF-AQU26-0U4iIap4ajvpUS3BTZwA0fMHLl9jk9EBkpBBkhuJcFcqZ4m0cOcsmTwHCn5E-W40xQLBqiDhAuyXfkDO7tWa-b4aEbP-Ho9wbUw97zHMitUHfguJZv8zndM", 
    	     "e": "AQAB", 
    	     }   
    },
    claims={"user":"admin"})   # change here based on JWT payload  claims

Token.make_signed_token(key)
print (Token.serialize())