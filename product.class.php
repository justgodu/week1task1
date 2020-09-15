<?php 

class Product{
    private $_name;
    private $_description;

    function __construct($name, $description){
        $this->_name = $name;
        $this->_description = $description;
    }

    function sendPorductToDatabase($conn){
        
        $sql = "INSERT INTO `products`(`product_name`, `description`) 
        VALUES ('$this->_name', '$this->_description')";

        if($conn->query($sql) === TRUE){
            return TRUE;
        }else{
            return FALSE;
        }

    }
}