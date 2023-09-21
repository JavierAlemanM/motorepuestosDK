<?php
    function usersadmin_create(){
        $return['process']= "create table usersadmin";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  usersadmin( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            username varchar(40) NOT NULL,
            password varchar(200) NOT NULL,
            fullname varchar(100) NOT NULL,
            identification varchar(20) NOT NULL,
            phone varchar(20) NOT NULL,
            email varchar(60) NOT NULL,
            rol varchar(40) NOT NULL,
            permissions int(10) NULL
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

    function usersadmin_truncate(){
        $return['process']= "truncate table usersadmin";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  usersadmin";
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

    function usersadmin_drop(){
        $return['process']= "drop table usersadmin";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `usersadmin`";
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