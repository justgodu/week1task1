<?php
    require_once 'db.php';
    
    $sql = "SELECT * FROM `products` WHERE 1";
    $result = $conn->query($sql);
    $data = array();
    while($row = $result->fetch_assoc()){
        array_push($data,$row);
    }
    echo json_encode($data);
?>