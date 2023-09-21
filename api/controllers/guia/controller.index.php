<?php
    function index(){
        $data['status']=true;
        $data['message']='located in index';
        json_print($data);
    }
?>