const jwt = require('jsonwebtoken')

module.exports = (req,res,next)=> {

    // const token = req.body.token || req.query.token || req.headers["x-access-token"];
    const authHeader = req.headers['authorization']
    const token = authHeader && authHeader.split(' ')[1]  // Send JWT in Authorization header

    if (!token) {
        // Forbidden 
        return res.status(403).json({Error:"A token is required for authentication"});
      }
    
      // SIGNING OPTIONS
    var VerifyOptions = {
        issuer:  "https://example.com",       //Software organization that issues the token
        subject:  "uniqueUserId",
        audience:  "myapp.com",
        expiresIn: process.env.jwtExpiry,
        algorithms: ['sha1', 'RS256', 'HS256']
    };

     jwt.verify(token , publicKey , VerifyOptions ,  async (err , decoded)=>{
        
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
    })

}