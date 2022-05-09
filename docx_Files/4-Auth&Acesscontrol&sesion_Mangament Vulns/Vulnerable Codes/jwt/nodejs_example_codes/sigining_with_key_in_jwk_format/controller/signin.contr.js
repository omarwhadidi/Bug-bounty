const UserModel = require('../models/UserModel.conf')
const GroupModel = require('../models/GroupModel.conf');
const jwt = require('jsonwebtoken');




module.exports.signin = async (req, res) => {

    const {username,password} = req.body
    
    //console.log(req.body)
    // Validate user input
    if (!(username && password)) {
        res.status(400).json({Error:"All input is required"});
      }

    let user = await UserModel.findOne({username})
    if (user !== null){
        
        if(user.password == password){
            
            let permissions = await GroupModel.findOne({username})

            // SIGNING OPTIONS
            var signOptions = {
                header : {
                    kid: "1",
                    jku:"http://localhost:3003/.well-known/jwks.json"
                } ,
                issuer:  "https://example.com",       //Software organization that issues the token
                subject:  "uniqueUserId",
                audience:  "myapp.com",
                expiresIn: process.env.jwtExpiry,
                algorithm: 'RS256',
               };
            

            if (permissions.group_number == 2){
    
                //  send token

               let token =  jwt.sign({userid:user._id , user:user.username , role:permissions.role } , privateKey , signOptions )
                res.status(200).json({Admin:user.username, JWT : token})
            }
            else {
                //  send token
                let token =  jwt.sign({userid:user._id , user:user.username , role:permissions.role } , privateKey , signOptions )
                res.status(200).json({User:user.username, JWT : token})

            }
                    
        }
        else {
            
            res.status(401).json({message:"wrong password"})
        }

    }
    else {
       
        res.status(401).json({message:"Username not found"})

    }
    
}