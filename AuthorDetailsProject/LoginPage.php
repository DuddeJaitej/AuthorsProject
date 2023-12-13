<?php
$host = "localhost";
$user = "root";
$password = "Jai1421tej@333";
$dbname = "InternationalConference";

$conn = mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    die("Connection Loss".mysqli_connect_errno());
}
echo "";


if(isset($_SERVER["REQUEST_METHOD"]) == 'POST'){
    $BookName = $_POST['bookname'];
    $Email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM AuthorDetails WHERE bookname = ? AND email = ?");
    $stmt->bind_param("ss",  $BookName, $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User authenticated successfully
        header("Location:HomePage.html");
        exit();
    } else {
        // No data found, handle accordingly
        header("Location: LoginPage.html");
        exit();
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($conn);
?>