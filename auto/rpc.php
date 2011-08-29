<?php

$db = new mysqli('localhost', 'root', 'mircosx', 'biblos_g2');


if (!$db) {

    echo 'ERROR: Could not connect to the database.';
} else {

    if (isset($_POST['queryString'])) {
        $queryString = $db->real_escape_string($_POST['queryString']);



        if (strlen($queryString) > 0) {
            $query = $db->query("SELECT * FROM libro WHERE titulo LIKE '$queryString%' LIMIT 10");
            if ($query) {

                while ($result = $query->fetch_object()) {
                    echo '<li onClick="fill(\'' . $result->titulo . '\');">' . $result->titulo . '</li>';
                }
            } else {
                echo 'ERROR: There was a problem with the query.';
            }
        } else {
            
        }
    } else {
        echo 'There should be no direct access to this script!';
    }
}
?>