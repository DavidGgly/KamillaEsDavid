<html>
<body>

<?php

    // Used variables
    $guestName = $_POST['guestnames'];
    $notes = $_POST['notes'];

    // MySQL connecting data
    $host="localhost";
    $dbUsername="root";
    $dbPw="";
    $dbName="gergelydavid_db1";
    
    // Create connection
    $conn = new mysqli($host, $dbUsername, $dbPw, $dbName);

    if (mysqli_connect_error()) {
        die('Connect error(' . mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $insert = "INSERT INTO guests (FullName, Notes) VALUES (?, ?)";
        mysqli_query($conn,"INSERT INTO guests (FullName, Notes) VALUES ('$guestname', '$notes')");
    }

    // Close connection
    $conn->close();

?>

</body>
</html>