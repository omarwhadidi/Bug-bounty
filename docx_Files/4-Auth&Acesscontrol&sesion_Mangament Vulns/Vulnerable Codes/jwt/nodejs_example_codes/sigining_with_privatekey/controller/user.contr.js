const UserModel = require('../models/UserModel.conf')
const PostModel = require('../models/PostModel.conf')


module.exports.home =  async(req, res) => {
    
    let data = await PostModel.find().sort({post_date:-1})
    res.json(data) 

}

module.exports.profile = async (req, res) => {
      
    let user = req.header('Username');
    
        let data = await PostModel.find({username : req.username}).sort({post_date:-1})
        res.json(data)

}


module.exports.getuserposts = async (req, res) => {
    
        let user = req.params.user
        let data = await PostModel.find({username : user}).sort({post_date:-1})
        res.json(data)
    
}

module.exports.searchpost = async (req, res) => {

        let name = req.query.userpost ;
        let data = await PostModel.find({username : {'$regex': name}}).sort({post_date:-1})
        res.json(data)
    
}

module.exports.addpost = async (req, res) => {
    
        let newDate = new Date();
        const {userpost } = req.body 
        
       try {
        
        await PostModel.insertMany({
                userid: req.userID,
                username: req.username,
                post: userpost,
                post_date: newDate
        
                })
        
        res.json({Message: "Post Inserted"})  

       } catch (error) {
               res.json({error})
       } 
        
           
    
}

module.exports.deletepost = async (req, res) => {
    
        let post_id = req.body.postid;

        await PostModel.deleteOne({
            
            _id : post_id,

        })
        
        res.json({Message: "Post Deleted"})

    
}

