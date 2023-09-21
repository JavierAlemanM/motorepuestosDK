<?php
	set_time_limit(0);
	class Conn extends mysqli{
		function __construct(){
			parent::__construct("localhost","root","","motorepuestosdk"); 
			if (mysqli_connect_error()) {
				print("error de conexion");
			}
		}
	}
?>