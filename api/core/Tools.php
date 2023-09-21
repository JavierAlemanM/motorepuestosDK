<?php

   date_default_timezone_set('America/Bogota');

   function json_print($data){
      echo json_encode($data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
   }

   function saveFile($fileRoute) {
		$result= [];
      if (isset($_FILES['file'])) {
         $file = $_FILES['file'];
         if ($file['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($file['tmp_name'],"archives/".$fileRoute)) {
               $result['status']=true;
            } else {
               $result['status']=false;
					$result['error']='no se pudo guardar el archivo';
            }
         } else {
            $result['status']=false;
				$result['error']='el archivo se subio con errores';
         }
      } else {
			$result['status']=false;
			$result['error']='no existe archivo con nombre file';
      }
		return $result;
	}










	
?>