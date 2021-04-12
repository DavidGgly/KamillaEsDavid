<html>
<body>

<?php
    if (isset($_REQUEST['guestname'])) {
        $guestname = preg_replace('/[^a-zA-Z0-9\ ]/', '', $_REQUEST['guestname']);
        $guestname = htmlspecialchars($guestname);
    }

?>

</body>
</html>