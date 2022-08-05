const SignInRouter = require('express').Router()
const SignInContr = require('../controller/signin.contr')


SignInRouter.post('/signin', SignInContr.signin );


module.exports = SignInRouter