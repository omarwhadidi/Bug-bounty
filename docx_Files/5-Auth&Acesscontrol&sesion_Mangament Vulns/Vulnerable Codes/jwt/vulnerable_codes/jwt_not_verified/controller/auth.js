const jwt = require('jsonwebtoken')

module.exports = (req,res,next)=> {

    // const token = req.body.token || req.query.token || req.headers["x-access-token"];
    const authHeader = req.headers['authorization']
    const token = authHeader && authHeader.split(' ')[1]  // Send JWT in Authorization header

    if (!token) {
        // Forbidden 
        return res.status(403).json({Error:"A token is required for authentication"});
      }
      else {
        // get the decoded payload ignoring signature, no secretOrPrivateKey needed
        var decoded = jwt.decode(token);
        
        // get the decoded payload and header
        var decoded = jwt.decode(token, {complete: true});
        console.log(decoded.header);
        console.log(decoded.payload)
        req.userID = decoded.payload.userid
        req.username = decoded.payload.user
        req.role = decoded.payload.role
        next()
      }
    

      // SIGNING OPTIONS
    /* var VerifyOptions = {
        issuer:  "https://example.com",       //Software organization that issues the token
        subject:  "uniqueUserId",
        audience:  "myapp.com",
        expiresIn: process.env.jwtExpiry,
        algorithm:  'HS256'
    };

     jwt.verify(token , process.env. JWT_SECRET_KEY , VerifyOptions ,  async (err , decoded)=>{
        
        if (err){
                // Access Denied
                res.status(401).json({err})
        }
        else {
            req.userID = decoded.userid
            req.username = decoded.user
            req.role = decoded.role
            next()
        }
    }) */

}