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
    }
    else {
        // Iterate through array and insert into DB all elements.
        foreach ($guestName as $i => $oneGuest) {
            $insert = "INSERT INTO Guests (FullName, Notes) VALUES (?, ?)";
            mysqli_query($conn,"INSERT INTO Guests (FullName, Notes) VALUES ('$oneGuest', '$notes[$i]')");
        }
    }

    // Close connection
    $conn->close();

?>

</body>
</html>