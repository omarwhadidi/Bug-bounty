const SignUpRouter = require('express').Router()
const SignUpContr = require('../controller/signup.contr')


SignUpRouter.post('/AddUser' , SignUpContr.adduser);

SignUpRouter.post('/AddGroup', SignUpContr.addgroup);

module.exports = SignUpRouter
