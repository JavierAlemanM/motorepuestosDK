<?php
    function categories_create(){
        $return['process']= "create table categories";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  categories( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            category varchar(60) NOT NULL
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

    function categories_truncate(){
        $return['process']= "truncate table categories";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  categories";
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

    function categories_drop(){
        $return['process']= "drop table categories";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `categories`";
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