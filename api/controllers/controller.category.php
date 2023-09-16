<?php

    function getCategories() {
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql = "SELECT * FROM `categories`  ";
        $result = $conDb->query($sql);
        $num = mysqli_num_rows($result);
        if ($num >= 1) {
            while ($d = mysqli_fetch_assoc($result)) {
                $data['data'][] =  $d;
            }
            $data['status'] = true;
        } else {
            $data['status'] = false;
        } 
        $data['data_num'] = $num;
        json_print($data);
    }

?>