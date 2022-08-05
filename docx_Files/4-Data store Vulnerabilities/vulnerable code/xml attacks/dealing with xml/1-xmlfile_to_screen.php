<?php
// Here we parse Data From XML File then print it out 

$posts = simplexml_load_file('test.xml');
if(!$posts){
    echo 'Fail to load XML file';
}
else{
    foreach($posts as $post){
        echo 'postid: '.$post->postid.'<br/>';
        echo 'username: '.$post->username.'<br/>';
        echo 'post: '.$post->post.'<br/>';
        echo 'Date: '.$post->Date.'<br/><br/>';
    }
}
?>    