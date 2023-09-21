<?php

    function categories(){
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql_delete = "DROP TABLE IF EXISTS `categories`";
        $sql_create = "CREATE TABLE categories( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            category varchar(60) NOT NULL
        )";
        $sql_insert = "INSERT INTO `categories` (`id`, `category`) 
            VALUES 
            (NULL, 'ACEITES'),
            (NULL, 'LUJOS Y ACCESORIOS'),
            (NULL, 'ELÉCTRICOS'),
            (NULL, 'KIT ARRASTRES Y CADENAS'),
            (NULL, 'LLANTAS Y NEUMÁTICOS'),
            (NULL, 'REPUESTOS GENÉRICOS'),
            (NULL, 'REPUESTOS ORIGINALES')";
        $conDb->query($sql_delete);
        $conDb->query($sql_create);
        $conDb->query($sql_insert);
    }

    function products(){
        $conDb = new conn;
        $sql_delete = "DROP TABLE IF EXISTS `products`";
        $sql_create = "CREATE TABLE products(
            code varchar(100)       PRIMARY KEY,
            category int(10)        NOT NULL,
            new int(10)             NOT NULL,
            brand int(10)           NOT NULL,
            product varchar(100)    NOT NULL,
            price int(20)           NOT NULL,
            inventory int(4)        NOT NULL,  
            discount int(4)         DEFAULT     0 ,
            oldprice int(20)        DEFAULT     0 ,
            imgp1 varchar(40)       DEFAULT     'imgdefault.png' ,
            imgp2 varchar(40)       DEFAULT     'imgdefault.png' ,
            imgp3 varchar(40)       DEFAULT     'imgdefault.png' ,
            imgp4 varchar(40)       DEFAULT     'imgdefault.png' 
        )";
        $conDb->query($sql_delete);
        $conDb->query($sql_create);
    }


    function products_masive_insert(){
		$conDb = new conn;
		$conDb->set_charset('utf8');
		$route_file = 'file/products.csv';
		chmod($route_file, 0777);
		$file = fopen($route_file,"r");
		$num=1;
		while ($d=fgetcsv($file,100000000, ";")){
			$code=$d[0];
			$category=$d[1];
            $brand=$d[2];
            $new=$d[3];
			$product=$d[5];
			$price=$d[6];
			$inventory=$d[7]; 

		    $sql="INSERT INTO `products` (`code`, `category`, `new`, `brand`, `product`, `price`, `inventory`) 
            VALUES ('$code', '$category', '$new', '$brand', '$product', '$price', '$inventory');";
			$r=$conDb->query($sql);
			if($r){
				$num++;
			}
		}
		fclose($file);
		$data['process']=$num;
		$data['result']='sucess';
		json_print($data);
	}

    function brands(){
        $conDb = new conn;
        $conDb->set_charset('utf8');
        $sql_delete = "DROP TABLE IF EXISTS `brands`";
        $sql_create = "CREATE TABLE brands( 
            id int(10) PRIMARY KEY AUTO_INCREMENT, 
            brand varchar(60) NOT NULL
        )";
        $sql_insert = "INSERT INTO `brands` (`id`, `brand`) 
            VALUES 
            (NULL, 'Yamaha'),
            (NULL, 'Honda'),
            (NULL, 'Suzuki'),
            (NULL, 'Kawasaki'),
            (NULL, 'Bajaj'),
            (NULL, 'KTM'),
            (NULL, 'Royal Enfield'),
            (NULL, 'TVS'),
            (NULL, 'Harley Davidson'),
            (NULL, 'BMW'),
            (NULL, 'Ducati'),
            (NULL, 'Triumph'),
            (NULL, 'Benelli'),
            (NULL, 'CFMoto'),
            (NULL, 'Hero'),
            (NULL, 'Jawa'),
            (NULL, 'Pirelli'),
            (NULL, 'Michelin'),
            (NULL, 'Bridgestone'),
            (NULL, 'RK Chain'),
            (NULL, 'NGK'),
            (NULL, 'Bosch'),
            (NULL, 'Motul'),
            (NULL, 'ProTaper'),
            (NULL, 'KYB'),
            (NULL, 'Brembo'),
            (NULL, 'Acerbis'),
            (NULL, 'Givi'),
            (NULL, 'Puig'),
            (NULL, 'DID'),
            (NULL, 'SBS'),
            (NULL, 'Denso'),
            (NULL, 'Bel-Ray'),
            (NULL, 'Renthal'),
            (NULL, 'HJC'),
            (NULL, 'Alpinestars')";
        $conDb->query($sql_delete);
        $conDb->query($sql_create);
        $conDb->query($sql_insert);
    }

    function all(){
        categories();
        products();
        products_masive_insert();
        brands();
    }




   

?>