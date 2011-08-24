<?php

include "defcon.php";
$queryString = $db->real_escape_string($_POST['quebuscas']);
if (strlen($queryString) > 0) {
    $query = $db->query("SELECT * FROM libro WHERE titulo LIKE '$quebuscas%' LIMIT 10");
    if ($query) {
        while ($result = $query->fetch_object()) {
            echo '<li onClick="fill(\'' . $result->titulo . '\');">' . $result->titulo . '</li>';
        }
    } else {
        echo 'ERROR al executar la query.';
    }
} else {
    
}
?>