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

jwks = {}
jwks = json.loads(public_key)
jwks['alg'] = 'RS256'
jwks['use'] = 'sig'
public_jwk_str = json.dumps(jwks)
print(public_jwk_str)

with open("jwks.json", "w") as h:
    h.write(json.dumps(jwks))

# Dontt Forget To put the json object in {
#  "keys": [
#        paste here
#  ]}
#


Token = jwt.JWT(
    header={
    "alg": "RS256",
    "typ": "JWT",
    "kid": key.key_id,
    "jku": "http://localhost/well-known/jwks.json",   # host your file in this location 
    },
    claims={"userid": "324565543" , "user":"root","role":"Admin" ,"iat": 1627389731,"exp": 9999999999})   # change here based on JWT payload  claims

Token.make_signed_token(key)
print (Token.serialize())