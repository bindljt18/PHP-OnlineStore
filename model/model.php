<?php

 function checkValidUser(){
	// validate user
	$sql = "select client_id, first_name, last_name from clients where
		username=:username and pwd = :pwd";
	// define values for parameters
	$values = array(':username'=>$_POST['username'], ':pwd'=>md5($_POST['pwd']));
	$result = getOne($sql, $values);
	return $result;
 }
 
  function getProductList(){
	// define SQL statement
	$sql = 'select * from products ORDER BY product_type';
	$data= getAll($sql);
	return $data;
  }
  
  function checkSale($product_id, $client_id){
	//define SQL
	$sql = 'SELECT sales_id, quantity FROM `sales` WHERE client_id= :client_id AND
		product_id= :product_id';
	$parameters = array(':client_id'=>$client_id, ':product_id'=>$product_id);
	$data = getAll($sql, $parameters);

	if($data != null)
		return array($data[0]['sales_id'], $data[0]['quantity']);
	else
		return '0';
  }

  function updateSale($sales_id, $old_quantity, $new_quantity){
	global $db;
	//calculate total quantity
	$total_quantity = $old_quantity + $new_quantity;
	//prepare SQL
	$sql = "UPDATE `sales` SET quantity=:quantity WHERE sales_id= :sales_id";
	$parameters = array(':quantity'=>$total_quantity, ':sales_id'=>$sales_id);

	$stm = $db->prepare($sql);
	
	$stm->execute($parameters);
	return true;
  }

  function insertNewSale($product_id, $client_id, $quantity){
	global $db;
	//define SQL
	$sql = "INSERT INTO `sales` (client_id, product_id, quantity) VALUES (:client_id,
		:product_id, :quantity)";
	$stm = $db->prepare($sql);
	$parameters = array(':client_id'=>$client_id, ':product_id'=>$product_id, ':quantity'=>$quantity);
	$stm->execute($parameters);
	return true;
  }

  function getProductsPurchased($client_id){
	//define SQL
	$sql = "SELECT products.product_title, products.unit_price, sales.quantity
		FROM `products`, `sales`, `clients` WHERE sales.client_id = :client_id AND
		sales.product_id = products.product_id AND sales.client_id = clients.client_id";
	$parameters = array(':client_id'=>$client_id);
	$data = getAll($sql, $parameters);
	return $data;
  }

  function updateEmail($email, $client_id){
	global $db;
	//Prepare SQL statement
	$sql = "UPDATE `clients` SET email=:email WHERE client_id= :client_id";
	$stm = $db->prepare($sql);
	$parameters = array(':email'=>$email, ':client_id'=>$client_id);
	$stm->execute($parameters);
	return true;
  }

  function getOne($sql, $parameter = null){
        global $db;
        $statement = $db->prepare($sql);
        // execute the SQL statement
        $statement->execute($parameter);
        // return result
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
  }


  function getAll($sql, $parameter = null){
        global $db;
        $statement = $db->prepare($sql);
        // execute the SQL statement
        $statement->execute($parameter);
        // return result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
  }

?>
