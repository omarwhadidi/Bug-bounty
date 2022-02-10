<?php
session_start();
 $_SESSION['token'] = md5(uniqid(mt_rand(), true));
 //$_SESSION["token"] = md5(session_id().time());
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<div  class="wrapper col-sm-4">
<form action="token.php" method="POST">
<div class="form-group">
<label class="control-label col-sm-4" for="textinput">Name</label>  
<div  class="col-sm-8">
<input id="textinput" name="name" placeholder="Enter your name" class="form-control input-md" required="" type="text">
</div>
</div>    
<div class="form-group">
<label class="control-label col-sm-4" for="textinput">Age</label>  
<div  class="col-sm-8">
<input id="textinput" name="age" placeholder="Enter your age" class="form-control input-md" required="" type="text">
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-4" for="textinput">Phone</label>  
<div  class="col-sm-8">
<input id="textinput" name="phone" placeholder="Enter your phone" class="form-control input-md" required="" type="text">
</div>
</div>  
<div class="form-group">
<div  class="col-sm-8">
<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
<input type="submit" value="Submit" />
</div>    
 </div>    
</form>    
</div>