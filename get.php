<?php
$servername = "localhost";
$username = "root";
$password = "**********";
$dbname = "leaderboard";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//上傳
$gerName = $_GET["name"];
$getScore = $_GET["score"];
$todaynow = date("Y-m-d H:i:s");

$uploadMeeage = "error";
$jsonResultsArray = array();
$intoQuery = "INSERT INTO pirats (name,score,datetime) VALUES ('$gerName','$getScore','$todaynow')";

if (mysqli_query($conn, $intoQuery)) {
    $uploadMeeage = "success";
    //echo "New record created successfully";
} else {
    $uploadMeeage = "error";
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//查詢
$selectQuery = "SELECT * FROM pirats order by score DESC LIMIT 50";
$result = $conn->query($selectQuery);
 
$num_cnt = 0;

$resultsArray = array();

if ($result->num_rows > 0) {
    
    // 输出数据
    while($row = $result->fetch_assoc()) {
        
        array_push($resultsArray, array("name"=> $row["name"],"score"=>(int)$row["score"],"datetime"=>$row["datetime"]));
        
        $num_cnt += 1;
    }

} else {
    //echo "{}";
}

$jsonResultsArray = array("upload"=>$uploadMeeage,"results"=>$resultsArray);

echo json_encode($jsonResultsArray);

mysqli_close($conn);
?>
