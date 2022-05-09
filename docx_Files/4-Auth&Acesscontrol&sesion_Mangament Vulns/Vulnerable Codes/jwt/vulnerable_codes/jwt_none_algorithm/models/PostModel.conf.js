const mongoose = require("mongoose")
const PostSchema = mongoose.Schema({

    userid : { type: mongoose.Schema.Types.ObjectId , ref: "user" },
    username:String,
    post:String,
    likes:{ type: Number, default: 0 },
    post_date : { type : Date, required : true, index: true  }
})

const PostModel = mongoose.model('post',PostSchema)

module.exports = PostModel