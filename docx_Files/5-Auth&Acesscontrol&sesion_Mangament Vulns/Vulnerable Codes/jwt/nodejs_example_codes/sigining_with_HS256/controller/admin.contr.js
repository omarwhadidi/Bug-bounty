const UserModel = require('../models/UserModel.conf')
const PostModel = require('../models/PostModel.conf')
const GroupModel = require('../models/GroupModel.conf')
 

module.exports.adminpage = async(req, res) => {
        
        if (req.role !== 'Admin') {
            return res.sendStatus(403);
        }

        let data = await PostModel.find().sort({post:1}).populate('userid')
        res.json(data)

}

module.exports.dashboardpage = async (req, res) => {
        
        if (req.role !== 'Admin') {
                return res.sendStatus(403);
        }

        let data = await GroupModel.find({}).populate('userid')
        res.json(data)
        //console.log(data[0].userid)

}

module.exports.upgradeuser = async(req, res) => {
    
        
        if (req.role !== 'Admin') {
            return res.sendStatus(403);
        }
        
        let username = req.body.username;
        const result = await GroupModel.updateOne({ username: username }, { $set: {group_number: 1, role: "Moderator" } });
        
        res.json({Message:"User Upgraded"})
    

}

module.exports.downgradeuser = async(req, res) => {

        if (req.role !== "Admin") {
            return res.sendStatus(403);
        }

        let name = req.body.username;
        const result = await GroupModel.updateOne({ username: name }, { $set: {group_number: 0, role: "User" } });
        
        res.json({Message:"User Downgraded"})
    

}

module.exports.activateuser = async(req, res) => {
            
        if (req.role !== "Admin") {
            return res.sendStatus(403);
        }

        let id = req.body.userid;
        const result = await UserModel.updateOne({ _id: id }, { $set: { regstatus: 1 } });

        res.json({Message:"User Activated"})
}

module.exports.deactivateuser = async(req, res) => {
        
        if (req.role !== "Admin") {
                return res.sendStatus(403);
            }

        let id = req.body.userid;
        const result = await UserModel.updateOne({ _id: id }, { $set: { regstatus: '0' } });
        
        res.json({Message:"User Deactivated"})
    

}

module.exports.deleteuser = async(req, res) => {
    

        if (req.role !== "Admin") {
            return res.sendStatus(403);
        }
       
        let id = req.body.username;
        
        await UserModel.deleteOne({ username : username})
        await GroupModel.deleteOne({ username : username})

        res.json({Message:"User Deleted"})
    

}