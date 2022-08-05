const mongoose = require("mongoose")
const GroupSchema = mongoose.Schema({

    userid : {type: mongoose.Schema.Types.ObjectId , ref: "user" },
    username: {type : String, unique : true,required : true},
    group_number:{ type: Number, default: 0 },
    role:String,
    
})

const GroupModel = mongoose.model('group',GroupSchema)

module.exports = GroupModel