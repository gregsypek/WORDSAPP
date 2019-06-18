<?php 

// connect to database
$conn = mysqli_connect('localhost','root', '', 'wordsapp');

//check connection
if(!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
}


?>