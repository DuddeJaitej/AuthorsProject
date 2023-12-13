<?php
$host = "localhost";
$user = "root";
$password = "Jai1421tej@333";
$dbname = "InternationalConference";

$conn = mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
echo "Connection Success";

if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
    $slno = $_POST['slno'];
    $title = $_POST['tile'];
    $description = $_POST['desc'];
    $file = $_POST['file'];

    $sql = "insert into AddnewOne values('$slno','$title','$description','$file')";
    if(mysqli_query($conn,$sql)){
        header("Location:Successfull.html");
        exit();
    }else{
        header("Location:AuthorProject1.html");
        exit();
    }
}else{
    echo "Invalid request method";
}

?>