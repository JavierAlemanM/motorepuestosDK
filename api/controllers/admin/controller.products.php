<?php

    function products_create_single(){
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);
        $sql = "INSERT INTO products (code, category, brand, product, price, inventory)
        VALUES (?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            category = VALUES(category),
            brand = VALUES(brand),
            product = VALUES(product),
            price = VALUES(price),
            inventory = VALUES(inventory);";
        $code           =  $data['code'];
        $category       =  $data['category']; 
        $brand          =  $data['brand']; 
        $product        =  $data['product']; 
        $price          =  $data['price'];  
        $inventory      =  $data['inventory']; 
        $stmt = $conDb->prepare($sql);
        $stmt->bind_param("siisii", $code, $category, $brand, $product, $price,$inventory);
        $return['process']="create product single.";
        if ($stmt->execute()) {
            $return['status']=true;
            $return['code']=$data['code'];  
            //$stmt->insert_id;
        } else {
            $return['status']=false;
            $return['sql']=$stmt->sql;
            $return['error']=$stmt->error;
        }
        $stmt->close();
        $conDb->close();  
        json_print($return); 
    }


    function products_create_masive(){
        $date = new DateTime();
        $dateformat = $date->format('Y-m-d');
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $return['process']="create product masive.";
        $file = saveFile('products/file.csv');
        if ($file['status']) {
            chmod("archives/products/file.csv", 0777);
            $fp = fopen("archives/products/file.csv","r");
            $numError= 0;
            $numSucess=0;
            $listErrors = [];
            while ($d=fgetcsv($fp,100000000, ";")){
                $code           =  utf8_encode($d[0]);
                $category       =  $d[1]; 
                $brand          =  $d[2]; 
                $product        =  utf8_encode($d[3]); 
                $price          =  $d[4];  
                $inventory      =  $d[5]; 
                $sql = "INSERT INTO products (code, category, brand, product, price, inventory)
                VALUES (?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                    category = VALUES(category),
                    brand = VALUES(brand),
                    product = VALUES(product),
                    price = VALUES(price),
                    inventory = VALUES(inventory);";
                $stmt = $conDb->prepare($sql);
                $stmt->bind_param("siisii", $code, $category, $brand, $product, $price,$inventory);
                
                if ($stmt->execute()) {
                    $numSucess++;
                } else {
                    $numError++;
                    $error['code']=false;
                    $error['sql']=$stmt->sql;
                    $error['error']=$stmt->error;
                    $listErrors[]=$error;
                }
            }
            fclose($fp);
            rename("archives/products/file.csv", "archives/products/file".$dateformat.".csv");
            $return['status']=true;
            $return['error']=$listErrors;
            $return['numerror']=$numError;
            $return['numsuccess']=$numSucess;
        } else {
            $return['status']=false;
            $return['error']=$file['error'];
        }
        json_print($return);  
    }



    
?>