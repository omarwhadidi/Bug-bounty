const UserRouter = require('express').Router()
const UserContr = require('../controller/user.contr')
const auth = require('../controller/auth')


UserRouter.get('/home', auth , UserContr.home);

UserRouter.get('/profile', auth, UserContr.profile);

UserRouter.get('/GetUserPosts/:user', UserContr.getuserposts);


UserRouter.get('/searchpost', auth, UserContr.searchpost);

UserRouter.post('/AddPost', auth, UserContr.addpost);

UserRouter.post('/DeleteUserPost', auth,UserContr.deletepost);





module.exports = UserRouter