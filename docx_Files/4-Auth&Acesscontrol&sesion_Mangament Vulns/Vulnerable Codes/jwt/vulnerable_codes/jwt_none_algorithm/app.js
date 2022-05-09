const express = require('express')
const app = express()
let PORT = process.env.PORT || 3003;
const mongoose = require("mongoose")
mongoose.connect('mongodb://localhost:27017/myapp',{ useNewUrlParser: true , useUnifiedTopology: true });


const dotenv = require('dotenv');
dotenv.config();

app.use(express.json())
app.set("view engine","ejs")

app.use(require('./routes/signup.routes'))
app.use(require('./routes/signin.routes'))
app.use(require('./routes/user.routes'))
app.use(require('./routes/admin.routes'))


app.get('*', (req, res) => {
    res.send('not found page 404')
});


app.listen(PORT, () => {
    console.log('App listening on port 3003!');
});