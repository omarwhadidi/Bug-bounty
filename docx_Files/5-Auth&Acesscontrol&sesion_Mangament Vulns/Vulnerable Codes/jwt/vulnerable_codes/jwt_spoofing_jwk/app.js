/*  Generate Rsa Key Pair
        openssl genrsa -out private.pem 3072/2048
        openssl rsa -in private.pem -pubout -out public.pem
    include packages
        jsonwebtoken      => Validate and Sign JWT
        rsa-pem-to-jwk    => convert Key in PEM Format to JWK Format
        jwks-rsa          => extract public key from jwks File 
    
        copy the key in JWK format and paste it in a public folder most developer put it in 
            ".well-known" folder => ".well-known/jwks.json" 
    
    Note
        you can Convert From PEM To JWK Format with
            rsa-pem-to-pem Nodejs Library or 
            online https://mkjwk.org/
*/


const express = require('express')
const app = express()
let PORT = process.env.PORT || 3003;
const mongoose = require("mongoose")
mongoose.connect('mongodb://localhost:27017/myapp',{ useNewUrlParser: true , useUnifiedTopology: true });


const path = require('path')
app.use(express.static(path.join(__dirname,'public')))

const fs = require('fs')
global.privateKey = fs.readFileSync(path.join(__dirname, 'certs', 'private.pem'), 'utf8')
global.publicKey = fs.readFileSync(path.join(__dirname, 'certs', 'public.pem'), 'utf8')

const rsaPemToJwk = require('rsa-pem-to-jwk')    // convert Key in PEM Format to JWK Format
const jwk = rsaPemToJwk(privateKey , {use: 'sig',kid:'1',alg:'RS256'} , "public")

// console.log(jwk)     // copy what is in the console in the .well-known/jwks.json file


const dotenv = require('dotenv');
dotenv.config();

app.use(express.json())
app.set("view engine","ejs")

app.use(require('./routes/signup.routes'))
app.use(require('./routes/signin.routes'))
app.use(require('./routes/user.routes'))
app.use(require('./routes/admin.routes'))


app.get('*', (req, res) => {
    res.send('not found page 404')
});


app.listen(PORT, () => {
    console.log('App listening on port 3003!');
});