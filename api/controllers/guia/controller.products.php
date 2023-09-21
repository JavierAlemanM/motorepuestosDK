<?php 

	

	function products_all($pageNum,$pageSize){
		$conDb = new conn;
		$conDb->set_charset('utf8');
		$sqlTotal = "SELECT COUNT(1) as total from  `products`  ";
        $resultTotal = $conDb->query($sqlTotal);
		$dataTotal= mysqli_fetch_assoc($resultTotal);
		$data['page'] = $pageNum;
		$data['totalProducts'] = $dataTotal['total'];
		$data['totalPage'] = intval(ceil($dataTotal['total']/$pageSize));
		$sql = "CALL getProducts(?, ?)";
		$stmt = $conDb->prepare($sql);
		$stmt->bind_param("ii", $pageNum, $pageSize);
		$stmt->execute();
		$result = $stmt->get_result();
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

	function products_products($product, $pageNum,$pageSize){
		$conDb = new conn;
		$conDb->set_charset('utf8');
		$sqlTotal = "SELECT COUNT(1) as total from  `products`  ";
        $resultTotal = $conDb->query($sqlTotal);
		$dataTotal= mysqli_fetch_assoc($resultTotal);
		$data['page'] = $pageNum;
		$data['totalProducts'] = $dataTotal['total'];
		$data['totalPage'] = intval(ceil($dataTotal['total']/$pageSize));
		$sql = "CALL getProductsProducts(?, ?, ?)";
		$stmt = $conDb->prepare($sql);
		$stmt->bind_param("sii",$product, $pageNum, $pageSize);
		$stmt->execute();
		$result = $stmt->get_result();
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

	function products_categories($category, $pageNum,$pageSize){
		$conDb = new conn;
		$conDb->set_charset('utf8');
		$sqlTotal = "SELECT COUNT(1) as total from  `products`  ";
        $resultTotal = $conDb->query($sqlTotal);
		$dataTotal= mysqli_fetch_assoc($resultTotal);
		$data['page'] = $pageNum;
		$data['totalProducts'] = $dataTotal['total'];
		$data['totalPage'] = intval(ceil($dataTotal['total']/$pageSize));
		$sql = "CALL getProductsCategories(?, ?, ?)";
		$stmt = $conDb->prepare($sql);
		$stmt->bind_param("iii",$category, $pageNum, $pageSize);
		$stmt->execute();
		$result = $stmt->get_result();
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