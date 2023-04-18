<?php  
$servere = "localhost";
$username= "root";
$password="";
$database="user";

$conn = mysqli_connect($servere,$username,$password,$database);

if($conn){
}
else{
    // die("Failed ".mysqli_connect_error());
    echo "Failed";
}
?>
