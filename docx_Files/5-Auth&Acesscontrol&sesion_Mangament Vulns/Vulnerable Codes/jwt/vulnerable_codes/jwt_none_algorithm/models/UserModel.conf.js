const mongoose = require("mongoose")
const UserSchema = mongoose.Schema({

    username:String,
    firstname:String,
    lastname:String,
    email: {type : String, unique : true,required : true },
    password:String,
    gender:String,
    regstatus:{ type: Number, default: 0 }
})

const UserModel = mongoose.model('user',UserSchema)

module.exports = UserModel