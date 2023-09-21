<?php
    function media_create(){
        $return['process']= "create table media";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "CREATE TABLE IF NOT EXISTS  media( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            codeproduct varchar(100) NOT NULL,
            type varchar(20) NOT NULL,
            url  varchar(100) NOT NULL,
            reference varchar(40) NOT NULL
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

    function media_truncate(){
        $return['process']= "truncate table media";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "TRUNCATE TABLE  media";
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

    function media_drop(){
        $return['process']= "drop table media";
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "DROP TABLE IF EXISTS `media`";
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