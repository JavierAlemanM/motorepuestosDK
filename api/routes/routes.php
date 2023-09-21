<?php
    $listRoutes = array(
        array("controller" => "private", "route" => "brands"),
        array("controller" => "private", "route" => "categories"),
        array("controller" => "private", "route" => "company"),
        array("controller" => "private", "route" => "media"),
        array("controller" => "private", "route" => "products"), 
        array("controller" => "private", "route" => "usersadmin"),  
        array("controller" => "private", "route" => "usersapp"),


        
        array("controller" => "admin", "route" => "products") 
        
        
    );
    foreach ($listRoutes as $routeData) {
        $controller = $routeData["controller"];
        $route = $routeData["route"];
        $filename = 'routes/'.$controller . '/route.' . $route . '.php';
        if (file_exists($filename)) {
            require $filename;
        } else {
            echo "La ruta '$filename' no existe. <br>";
        }
    }
?>