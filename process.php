<html>
<body>

<?php

    $pdo_dsn='mysql:dbname=guests;host=localhost;charset=utf8';
    $pdo_username='root';
    $pdo_password='';

    $guestname = $_POST['guestname'];
    $notes = $_POST['notes'];

    $host="localhost";
    $dbUsername="root";
    $dbPw="";
    $dbName="guests";

    $conn = new mysqli($host, $dbUsername, $dbPw, $dbName);

    if (mysqli_connect_error()) {
        die('Connect error(' . mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $insert = "INSERT INTO $dbName (FullName, notes) VALUES (?, ?)";

        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ss", $guestname, $notes);
    }

    if (isset($_REQUEST['guestname']) && isset($_REQUEST['notes'])) {
        $guestname = preg_replace('/[^a-zA-Z0-9\ ]/', '', $_REQUEST['guestname']);
        $guestname = htmlspecialchars($guestname);

        $notes = preg_replace('/[^a-zA-Z0-9\ ]/', '', $_REQUEST['notes']);
        $guestname = htmlspecialchars($notes);
    }

    try {
        $connection = new PDO($pdo_dsn, $pdo_username, $pdo_password);

        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $connection -> prepare('INSERT INTO guests (FullName, Notes) VALUES (:$guestname, :$notes)');

        $query -> execute(Array(":$guestname => $guestname"));
    }
    catch (PDOException $e) {
        echo 'Error: ' . $e -> getMessage() . " file: " . $e -> getFile() . " line: " . $e -> getLine();
        exit;
    }

?>

</body>
</html>