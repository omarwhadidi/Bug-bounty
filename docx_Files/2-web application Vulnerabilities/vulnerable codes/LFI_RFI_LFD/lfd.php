
<?php
  echo '<h1 align="center">Local File Disclosure</h1>';

//----------------     read_file()  ---------------------//
	
  if(isset($_GET['page'])){
   
      $page=$_GET['page'];
      readfile($page);

  }
//----------------     read_file()  ---------------------//
  

//----------------    File_get_contents()  ---------------------//

   if(isset($_GET['page2'])){
   
      $page=$_GET['page2'];
      echo(file_get_contents($page));

  }
//----------------    File_get_contents()  ---------------------//



//----------------    highlight_file()  ---------------------//

   if(isset($_GET['page3'])){
   
      $page=$_GET['page3'];
      highlight_file($page);

  }
//----------------    highlight_file()  ---------------------//



//----------------    show_source()  ---------------------//

   if(isset($_GET['page4'])){
   
      $page=$_GET['page4'];
      show_source($page);

  }
//----------------    show_source()  ---------------------//
  

//----------------    file()  ---------------------//

   if(isset($_GET['page5'])){
   
      $page=$_GET['page5'];
      print_r(file($page));  // print_r is used to output values of array

  }
//----------------    file()  ---------------------//



//----------------    fopen()  ---------------------//

   if(isset($_GET['page6'])){
   
      $page=$_GET['page6'];
      $vuln=fopen($page, "r") or exit("unable to open the specified file");
      /* you can use "r", instead of "r+" but not "w","w+" as it clears the file , as well as "a","a+","x",and"x+" as they are not for file reading.*/
      while(!feof($vuln)) {
        echo fgets($vuln) . "<br \>";
      }

      fclose($vuln);

  }
//----------------    fopen()  ---------------------//
?>
