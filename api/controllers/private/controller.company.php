<?php
    function company_direction_create(){
        $return['process']= "create table company_direction";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  company_direction( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            name varchar(40) NOT NULL,
            country varchar(40) NOT NULL,
            city varchar(40) NOT NULL,
            district varchar(40) NOT NULL,
            direction varchar(60) NOT NULL,
            map varchar(2000) NOT NULL
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

    function company_direction_truncate(){
        $return['process']= "truncate table company_direction";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  company_direction";
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

    function company_direction_drop(){
        $return['process']= "drop table company_direction";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `company_direction`";
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










    function company_phone_create(){
        $return['process']= "create table company_phone";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  company_phone( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            direction varchar(40) NOT NULL,
            phone varchar(40) NOT NULL
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

    function company_phone_truncate(){
        $return['process']= "truncate table company_phone";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  company_phone";
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

    function company_phone_drop(){
        $return['process']= "drop table company_phone";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `company_phone`";
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






    function company_social_create(){
        $return['process']= "create table company_social";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  company_social( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            social varchar(40) NOT NULL,
            url varchar(200) NOT NULL
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

    function company_social_truncate(){
        $return['process']= "truncate table company_social";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  company_social";
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

    function company_social_drop(){
        $return['process']= "drop table company_social";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `company_social`";
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