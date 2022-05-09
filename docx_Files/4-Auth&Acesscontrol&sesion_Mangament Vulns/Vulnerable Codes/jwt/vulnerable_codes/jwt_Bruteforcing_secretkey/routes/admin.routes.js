const AdminRouter = require('express').Router()
const AdminContr = require('../controller/admin.contr')
const auth = require('../controller/auth')

AdminRouter.get('/admin', auth , AdminContr.adminpage);

AdminRouter.get('/dashboard', auth , AdminContr.dashboardpage);



AdminRouter.post('/UpgradeUser', auth, AdminContr.upgradeuser);

AdminRouter.post('/DowngradeUser', auth , AdminContr.downgradeuser);

AdminRouter.post('/ActivateUser', auth , AdminContr.activateuser);

AdminRouter.post('/DeactivateUser', auth , AdminContr.deactivateuser);

AdminRouter.post('/DeleteUser', auth , AdminContr.deleteuser);


module.exports = AdminRouter