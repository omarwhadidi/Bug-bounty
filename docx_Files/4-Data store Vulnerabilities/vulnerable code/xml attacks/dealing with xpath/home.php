<!--  ------------------------ Get Product Brand Name (XPATH with Domapi) -------------------------- -->

<?php

$result = '';


if(isset($_POST['getbrand'])){

    //Create object to read the XML file
    $doc = new DOMDocument;
    $doc->load('products.xml');

    //Search all BRAND node values
    $xpath = new DOMXPath($doc);
    $query = "/PRODUCTS/PRODUCT/BRAND";
    $result = $xpath->query($query);
    #$result = isset($xpath->query($query)) ? $xpath->query($query) : '';

    //Print the array values
    echo "<h3>The list of brand names are:</h3>";
   
    foreach($result as $name) {
        echo ' ';
        echo "- $name->nodeValue<br />";
    }
    echo '<hr>';



}

?>

<div class="well">
    <div class="col-lg-6"> 
        <p><b>Get All Brand Name</b>
            <form method='POST' action=''>
                <div class="form-group"> 
                    <div align="right"> <button class="btn btn-default" name="getbrand" type="submit">Search</button></div>
               </div> 
            </form>
        
        </p>

    </div>

<!--  ------------------------ Get Product Brand Name  (XPATH with Domapi)-------------------------- -->


<!--  ----------------------- Get All Product Details (XPATH with Domapi)  ------------------------- -->
<?php

if(isset($_POST['getall'])){
  
  //Create object to read the XML file
    $doc = new DOMDocument;
    $doc->load('products.xml');
   
  //Search all PRODUCT node values
     $xpath = new DOMXPath($doc);
     $query = "/PRODUCTS/PRODUCT";
     $result = $xpath->query($query);

    echo "<h3>The list of product name and price:</h3>";
    echo "<table>";
    echo "<tr><th align='left'>Product ID</th><th>Brand Name</th><th>Name</th><th>Price</th></tr>";
   
    //Print the array values
    foreach($result as $product) {
        echo "<tr><td>".$product->getElementsByTagName('ID')->item(0)->nodeValue."</td><td>".$product->getElementsByTagName('BRAND')->item(0)->nodeValue."</td><td>".$product->getElementsByTagName('NAME')->item(0)->nodeValue."</td><td>".$product->getElementsByTagName('PRICE')->item(0)->nodeValue."</td></tr>";
    }
    echo "</table>";
    echo '<hr>';




}


?>


    <div class="col-lg-6"> 
        <p><b>Get All product Details</b>
            <form method='POST' action=''>
                <div class="form-group"> 
                    <div align="right"> <button class="btn btn-default" name="getall" type="submit">Search</button></div>
               </div> 
            </form>
        
        </p>

    </div>

<!--  ----------------------- Get All Product Details (XPATH with Domapi)  ------------------------- -->

<!--  ------------------------------ Get Products By attribute   ------------------------------------ -->

<?php

if(isset($_POST['gethigherthan'])){
  
  //Create object to read the XML file
    $xml = simplexml_load_file('products.xml');
   
  //Search all PRODUCT node values
    $products = $xml->xpath('/PRODUCTS/PRODUCT[PRICE > 500]');
    echo "<h3>The list of product name and price:</h3>";
    echo "<table>";
    echo "<tr><th align='left'>Product ID</th><th>Brand Name</th><th>Name</th><th>Price</th></tr>";
    //Print the array values
    foreach($products as $product) {
        echo "<tr><td>$product->ID</td><td>$product->BRAND</td><td>$product->NAME</td><td> $product->PRICE</td></tr>";
    }
    echo "</table>";
    echo '<hr>';
}

if(isset($_POST['getlowerthan'])){
  
  //Create object to read the XML file
    $xml = simplexml_load_file('products.xml');
   
  //Search all PRODUCT node values
    $products = $xml->xpath('/PRODUCTS/PRODUCT[PRICE < 500]');
    echo "<h3>The list of product name and price:</h3>";
    echo "<table>";
    echo "<tr><th align='left'>Product ID</th><th>Brand Name</th><th>Name</th><th>Price</th></tr>";
    //Print the array values
    foreach($products as $product) {
        echo "<tr><td>$product->ID</td><td>$product->BRAND</td><td>$product->NAME</td><td> $product->PRICE</td></tr>";
    }
    echo "</table>";
    echo '<hr>';
}

?>

<div class="col-lg-6"> 
    <p><b>Get All product Details With Price Lower than 500</b>
        <form method='POST' action=''>
            <div class="form-group"> 
                <div align="right"> <button class="btn btn-default" name="getlowerthan" type="submit">Search</button></div>
           </div> 
        </form>
    
    </p>

</div>

 <div class="col-lg-6"> 
    <p><b>Get All product Details With Price higher than 500 </b>
        <form method='POST' action=''>
            <div class="form-group"> 
                <div align="right"> <button class="btn btn-default" name="gethigherthan" type="submit">Search</button></div>
           </div> 
        </form>
    
    </p>

    </div>

<!--  ------------------------------ Get Products By attribute   ------------------------------------ -->


<!--  ----------------- Get Products By Condition (using SimpleXMLElement Class)  ----------------- -->

<?php

if(isset($_POST['getallbycondition'])){
  
  //Create object to read the XML file
   // $xml = simplexml_load_file('products.xml');
    $xml = new SimpleXMLElement('products.xml', 0, TRUE);
   
  //Search all PRODUCT node values
    $products = $xml->xpath('/PRODUCTS/PRODUCT[@category="Mouse"]');
    echo "<h3>The list of product name and price:</h3>";
    echo "<table>";
    echo "<tr><th align='left'>Product ID</th><th>Brand Name</th><th>Name</th><th>Price</th></tr>";
    //Print the array values
    foreach($products as $product) {
        echo "<tr><td>$product->ID</td><td>$product->BRAND</td><td>$product->NAME</td><td> $product->PRICE</td></tr>";
    }
    echo "</table>";
    echo '<hr>';
}



?>


<div class="col-lg-6"> 
    <p><b>Get All product Details By Attribute</b>
        <form method='POST' action=''>
            <div class="form-group"> 
                <div align="right"> <button class="btn btn-default" name="getallbycondition" type="submit">Search</button></div>
           </div> 
        </form>
    
    </p>

</div>

<!--  ---------------------- Get input From User into XPath Statement  -------------------------- -->

<?php 

if(isset($_POST['userinput'])){

  
  //Create object to read the XML file
    $xml = simplexml_load_file('products.xml');
   
  //Search all PRODUCT node values
    $products = $xml->xpath('/PRODUCTS/PRODUCT[@category="'.$_POST['search'].'"]');
    echo "<h3>The list of product name and price:</h3>";
    echo "<table>";
    echo "<tr><th align='left'>Product ID</th><th>Brand Name</th><th>Name</th><th>Price</th></tr>";
    //Print the array values
    foreach($products as $product) {
        echo "<tr><td>$product->ID</td><td>$product->BRAND</td><td>$product->NAME</td><td> $product->PRICE</td></tr>";
    }
    echo "</table>";
    echo '<hr>';
}

?>


    <div class="col-lg-6"> 
        <p><b>Get Your product Details</b>
            <form method='POST' action=''>
                <div class="form-group"> 
                    <label></label> 
                    <input type="text" class="form-control" placeholder="" name="search" value="<?php if(isset($input)){echo $input;}?>"> </input> <br>
                    <div align="right"> <button class="btn btn-default" name="userinput" type="submit">Search</button></div>
               </div> 
            </form>
        
        </p>

    </div>
      


<!--  ---------------------- Get input From User into XPath Statement  -------------------------- -->

