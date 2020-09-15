<?php

    if(isset($_POST['prodname']) && isset($_POST['prodescription']) && isset($_POST['add-prod-submit'])){
        require_once 'db.php';
        require_once 'product.class.php';
        $prodName = mysqli_real_escape_string($conn,$_POST['prodname']);
        $productDescription = mysqli_real_escape_string($conn,$_POST['prodescription']);
        $product = new Product($prodName, $productDescription);

        if($result = $product->sendPorductToDatabase($conn)){
            header("Location: index.php?ans=".$result);
            exit();
        }
        
        


    }
    else{
        header("Location: index.php?ans=0&err=propnotset");
    }