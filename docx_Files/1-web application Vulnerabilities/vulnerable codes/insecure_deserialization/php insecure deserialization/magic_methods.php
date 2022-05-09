<?php
class test {
    public $s = "This is a test";
    public function displaystring(){
        echo $this->s.'<br />';
    }
    public function __toString()
    {
        echo '__toString method called <br />';  //__toString uses object as string but also can be used to read file or more than that based on function call inside it.
    }
    public function __construct(){
        echo "__construct method called <br />";
    }
   
    
    public function __sleep(){
        echo "__sleep method called <br />";  // __sleep is called when an object is serialized and must be returned to array Magic method used with deserialization

        return array("s"); #The "s" makes references to the public attribute
    }

    public function __wakeup(){
        echo "__wakeup method called <br />";   // __wakeup is called when an object is deserialized.
        
    }

     public function __destruct(){
        echo "__destruct method called <br />"; //__destruct is called when PHP script end and object is destroyed.
    }
}

$o = new test();
$o->displaystring();

$ser=serialize($o);
echo $ser."</br>";
$unser=unserialize($ser);
$unser->displaystring();


/*
php > $o = new test();
    __construct method called
    __destruct method called

php > $o = new test();
php > $o->displaystring();
    __construct method called  
    This is a test
    __destruct method called

php > $o = new test();
php > $o->displaystring();
php > $ser=serialize($o);
    __construct method called  
    This is a test
    __sleep method called
    __destruct method called

php > $o = new test();
php > $o->displaystring();
php > $ser=serialize($o);
php > echo $ser;
    __construct method called
    This is a test
    __sleep method called
    O:4:"test":1:{s:1:"s";s:14:"This is a test";}
    __destruct method called

php > $o = new test();
php > $o->displaystring();
php > $ser=serialize($o);
php > echo $ser;
php > $unser=unserialize($ser);
    __construct method called
    This is a test
    __sleep method called
    O:4:"test":1:{s:1:"s";s:14:"This is a test";}
    __wakeup method called
    __destruct method called

php > $o = new test();
php > $o->displaystring();
php > $ser=serialize($o);
php > echo $ser;
php > $unser=unserialize($ser);
php > $unser->displaystring();
    __construct method called
    This is a test
    __sleep method called
    O:4:"test":1:{s:1:"s";s:14:"This is a test";}
    __wakeup method called
    This is a test
    __destruct method called


Notes:
    If you look to the results you can see that the functions __wakeup and __destruct are called when the object is deserialized. Note that in several tutorials you will find that the __toString function is called when trying yo print some attribute, but apparently that's not happening anymore.
*/

?>