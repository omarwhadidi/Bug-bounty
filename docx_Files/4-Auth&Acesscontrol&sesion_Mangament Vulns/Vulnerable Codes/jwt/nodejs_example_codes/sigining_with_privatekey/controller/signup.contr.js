
const UserModel = require('../models/UserModel.conf')
const GroupModel = require('../models/GroupModel.conf');



module.exports.adduser = async (req, res) => {

    const {firstname,lastname,username,email,password,password2,gender} = req.body

     // Validate user input
     if (!(firstname && lastname && username && email && password && password2 && gender )) {
      res.status(400).json({Error:"All input is required"});
    }
   else {
 
     let checkemail = await UserModel.findOne({email})
 
     if (checkemail == null){
     
          let checkuser = await UserModel.findOne({username})
          if (checkuser == null){
  
              // insert user code

                await UserModel.insertMany({
            
                    firstname: firstname,
                    lastname: lastname,
                    username: username,
                    email: email,
                    password: password,
                    gender: gender,
            
                })              
              
              res.status(201).json({Message:"user inserted"})
  
          }
          else {
              
            res.status(409).json({Message:"user exists"})

          }
     }
     else {
         
        res.status(409).json({Message:"email exists"})

     }
 
   }
   
 }

 module.exports.addgroup = async (req, res) => {

    const {username} = req.body
    let usergroup = await  UserModel.findOne({username})
    console.log(usergroup._id)
    await GroupModel.insertMany({

        userid : usergroup._id,
        username: username,
        role: 'User',

    }) 
    res.json({message:"Group Added "})
}