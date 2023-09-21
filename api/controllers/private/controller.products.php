<?php
    function products_create(){
        $return['process']= "create table products";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  products(
            code varchar(100)       PRIMARY KEY,
            category int(10)        NOT NULL,
            brand int(10)           NOT NULL,
            product varchar(200)    NOT NULL,
            price int(20)           NOT NULL,
            oldprice int(20)        DEFAULT     0 ,
            inventory int(10)       NOT NULL, 
            new BOOLEAN             DEFAULT     false ,
            discount BOOLEAN        DEFAULT     false ,
            description text        NULL,
            img varchar(40)         DEFAULT     'imgdefault.png'
        )";
        if ($conDb->query($sql)) {
            $return['status']=true;
        } else {
            $return['status']=false;
            $return['sql']=$sql;
            $return['error']=$conDb->error;
        }
        $conDb->close();
        json_print($return);
    }

    function products_truncate(){
        $return['process']= "truncate table products";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  products";
        if ($conDb->query($sql)) {
            $return['status']=true;
        } else {
            $return['status']=false;
            $return['sql']=$sql;
            $return['error']=$conDb->error;
        }
        $conDb->close();
        json_print($return);
    }

    function products_drop(){
        $return['process']= "drop table products";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `products`";
        if ($conDb->query($sql)) {
            $return['status']=true;
        } else {
            $return['status']=false;
            $return['sql']=$sql;
            $return['error']=$conDb->error;
        }
        $conDb->close();
        json_print($return);
    }
    
?>