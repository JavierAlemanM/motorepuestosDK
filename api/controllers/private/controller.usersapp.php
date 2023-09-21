<?php
    function usersapp_create(){
        $return['process']= "create table usersapp";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  usersapp( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            username varchar(40) NOT NULL,
            password varchar(200) NOT NULL,
            fullname varchar(100) NOT NULL,
            identification varchar(20) NOT NULL,
            phone varchar(20) NOT NULL,
            email varchar(60) NOT NULL
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

    function usersapp_truncate(){
        $return['process']= "truncate table usersapp";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  usersapp";
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

    function usersapp_drop(){
        $return['process']= "drop table usersapp";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `usersapp`";
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




    function usersapp_direction_create(){
        $return['process']= "create table usersapp_direction";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  usersapp_direction( 
            id int(10) PRIMARY KEY AUTO_INCREMENT,
            usersapp int(10)NOT NULL, 
            name varchar(40) NOT NULL,
            country varchar(40) NOT NULL,
            city varchar(40) NOT NULL,
            district varchar(40) NOT NULL,
            direction varchar(60) NOT NULL
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

    function usersapp_direction_truncate(){
        $return['process']= "truncate table usersapp_direction";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  usersapp_direction";
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

    function usersapp_direction_drop(){
        $return['process']= "drop table usersapp_direction";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `usersapp_direction`";
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




    function usersapp_motorbike_create(){
        $return['process']= "create table usersapp_motorbike";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  usersapp_motorbike( 
            id int(10) PRIMARY KEY AUTO_INCREMENT,   
            usersapp int(10) NOT NULL, 
            brands int(10) NOT NULL,
            brandname varchar(60) NOT NULL,
            model varchar(40) NOT NULL,
            reference varchar(60) NOT NULL,
            motorbikename varchar(60) NOT NULL,
            plate varchar(40) NOT NULL,
            img varchar(40)         DEFAULT     'motorbikeimgdefault.png',
            status varchar(40) NOT NULL
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

    function usersapp_motorbike_truncate(){
        $return['process']= "truncate table usersapp_motorbike";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  usersapp_motorbike";
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

    function usersapp_motorbike_drop(){
        $return['process']= "drop table usersapp_motorbike";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `usersapp_motorbike`";
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




    function usersapp_history_create(){
        $return['process']= "create table usersapp_history";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  usersapp_history( 
            id int(10) PRIMARY KEY AUTO_INCREMENT,   
            motorbike int(10) NOT NULL, 
            creation date NOT NULL,
            description varchar(200) NOT NULL
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

    function usersapp_history_truncate(){
        $return['process']= "truncate table usersapp_history";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  usersapp_history";
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

    function usersapp_history_drop(){
        $return['process']= "drop table usersapp_history";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `usersapp_history`";
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