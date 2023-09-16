<?php
	set_time_limit(0);
	class Conn extends mysqli{
		function __construct(){
			parent::__construct("localhost","root","","motorepuestodk"); 
			if (mysqli_connect_error()) {
				print("error de conexion");
			}
		}
	}
	function json_print($data){
		echo json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	}
?>