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
    $slno = $_POST['slno'];
    $title = $_POST['title'];
    
    $stmt = $conn->prepare("SELECT * FROM AddnewOne");
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User authenticated successfully
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Display the fetched data
        foreach ($data as $row) {
            echo "<b>Slno: </b>" . ($row['SlNo']) . "<br>";//use Column names
            echo "<b>Title: </b>" . ($row['Title']) . "<br>";
            echo "<b>Description: </b>" . ($row['Description']) . "<br>";
            echo "<b>FileUploaded: </b>" . ($row['UploadFile']) . "<br>";
            // Add more fields as needed
            echo "<hr>";
        }
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