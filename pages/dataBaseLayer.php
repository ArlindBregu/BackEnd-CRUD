<?php

    function countR(){
        require('db.php');
        $query = "SELECT COUNT(*) as num FROM employees";
        $result = $mysqli->query($query);
        $row= $result-> fetch_array();
        return $row[0];
    }

    function GET($first, $lenght){
        require('db.php');
        $query = "SELECT * FROM employees ORDER BY id LIMIT $first, $lenght";
        $result = $mysqli->query($query);
        $rows = array();
        while ($row= $result-> fetch_assoc()) {
            $rows[]=$row;
        }
        return $rows;
    }

?>