<?php
    
//create a function to connect to the database
function DBConnect($dbhost, $dbuser, $dbpass, $dbname) {
    $dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$dbconn) {
        die("Connection to DB could not be made! " . mysqli_connect_error());
    }

    return $dbconn;
}

function disconnectDb($mysqli)
{
    $mysqli->close();
}

?>