const jwt = require('jsonwebtoken')
const jwksclient = require('jwks-rsa')

module.exports = (req,res,next)=> {

    // const token = req.body.token || req.query.token || req.headers["x-access-token"];
    const authHeader = req.headers['authorization']
    const token = authHeader && authHeader.split(' ')[1]  // Send JWT in Authorization header

    if (!token) {
        // Forbidden 
        return res.status(403).json({Error:"A token is required for authentication"});
      }
    
    var decoded = jwt.decode(token, {complete: true});
    
    jwkfile = decoded.header.jku
    kid = decoded.header.kid
    

    const client = jwksclient({
        'jwksUri': jwkfile,
        'cache': true,
        'rateLimit':true
    }) 
    
    function getKey(header, callback){
        client.getSigningKey(header.kid, function(err, key) {
          var signingKey = key.publicKey || key.rsaPublicKey;
         // console.log(key)
          //console.log(signingKey)
          callback(null, signingKey);
        });
      }


      // SIGNING OPTIONS
    var VerifyOptions = {
        issuer:  "https://example.com",       //Software organization that issues the token
        subject:  "uniqueUserId",
        audience:  "myapp.com",
        expiresIn: process.env.jwtExpiry,
        algorithms: ['sha1', 'RS256', 'HS256'],
        complete:true // return all the jwt (header,payload,signature) decoded not only payload
    };


     jwt.verify(token , getKey , VerifyOptions ,  async (err , decoded)=>{
        
        if (err){
                // Access Denied
                res.status(401).json({err})
        }
        else {
            //console.log(decoded)
            req.userID = decoded.payload.userid
            req.username = decoded.payload.user
            req.role = decoded.payload.role
            next()
        }
    })

}