<?php

function db_connect($host = "localhost", $dbuser = "webdb", $pass = "test55", $dbname = "gardenDB")
{
        $link = mysqli_connect("localhost","webdb","test55","gardenDB");
        if ($link)
        {
                return $link;
        }
        else
        {
                echo "unable to connect to MySQL". PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        }
}
?>
