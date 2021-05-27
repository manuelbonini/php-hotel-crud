<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "db_hotel";

    // connect
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
        die();  // die fa morire il programma se non funziona e tutto il resto dopo non va e muore il programma
    }

    $sql = "SELECT `room_number`, `floor` FROM `stanze`;";
    $result = $conn->query($sql);

    $rooms = [];
    if ($result && $result->num_rows >0) {
        while($row = $result->fetch_assoc()) {
            $rooms[] = $row;
            // echo "stanza n. ". $row['room_number']. "Piano: ".$row['floor'];
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stanze Hotel</title>
</head>
<body>
    
    <h1>Stanze Hotel</h1>

    <ul>
        <?php foreach($rooms as $room) { ?>
            <li>
                Stanza numero: <?php echo $room['room_number']; ?><br>
                Piano: <?php echo $room['floor']; ?>
            </li>
        <?php } ?>
    </ul>

</body>
</html>