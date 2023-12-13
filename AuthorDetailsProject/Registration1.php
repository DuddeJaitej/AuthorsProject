<?php
$host = "localhost";
$user = "root";
$password = "Jai1421tej@333";
$dbname = "InternationalConference";

$conn = mysqli_connect($host, $user, $password , $dbname);
if(!$conn){
    die ("Connection failed ".mysqli_connect_error());
}
echo 'Connected successfully';

if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
    $AuthorName = $_POST["authorName"];
    $Email = $_POST["email"];
    $BookName = $_POST["bookname"];
    $PublishedDate = $_POST["published_date"];
    $MobileNumber = $_POST["phone"];

    $msql = "insert into AuthorDetails values('$AuthorName','$Email','$BookName','$PublishedDate','$MobileNumber')";

    if(mysqli_query($conn, $msql)){
        header("Location: HomePage.html");
        exit();
    }else{
        header("Location: Registration.html");
        exit();
    }
}else {
    echo "Invalid request method";
}
?>