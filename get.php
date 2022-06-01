<?php
$servername = "localhost";
$username = "root";
$password = "********";
$dbname = "leaderboard";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//上傳
$myName = "j94w。６";
$myScore = 37465;
$today = date("Y-m-d H:i:s");

$intoQuery = "INSERT INTO pirats (name,score,time) VALUES ('$myName','$myScore','$today')";

if (mysqli_query($conn, $intoQuery)) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//查詢
$selectQuery = "SELECT * FROM pirats order by score";
//$selectQuery = "SELECT name, score, time FROM pirats";
$result = $conn->query($selectQuery);
 
$num_cnt = 0;
$responsejsonString = "{\"results\":";
$responsejsonString .= "[";

if ($result->num_rows > 0) {
    
    $responsejsonString .= "[";
    
    // 输出数据
    while($row = $result->fetch_assoc()) {
        
        
        if($num_cnt != 0){
            $responsejsonString .= ",";
        }
         
        $num_cnt += 1;
        
        //echo "{name:" . $row["name"]. ",score:" . $row["score"]. ",time:" . $row["time"]. "}";
        $responsejsonString .= "{\"name\":\"" . $row["name"]. "\",\"score\":" . $row["score"]. ",\"time\":\"" . $row["time"]. "\"}";
    }

} else {
    echo "{}";
}

$responsejsonString .= "]";
$responsejsonString .= "}";

echo $responsejsonString;

mysqli_close($conn);
?>
