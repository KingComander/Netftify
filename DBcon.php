<?php

$db = new mysqli('localhost', 'root', '', 'netftify');

 if ($db->connect_error) {
     echo("Connection failed: " . $db->connect_error);
    }


?>