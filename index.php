<?php
    session_start();
     // include database connection info
     include('pdo_connect.php');
    // include functions needed to data from the database
     include('model/model.php');
     // Read the main task using the primary key 'mode'
     $mode = '';
      if (isset($_REQUEST['mode']))
           $mode = $_REQUEST['mode'];


     switch ($mode) {
	case 'checkLogin' :

		$data = checkValidUser();
		if (isset($data) && isset($data['client_id'])){
			$_SESSION['user'] = $data['last_name'].', '.$data['first_name'];
			$_SESSION['client_id'] = $data['client_id'];
		}
		include('view/header.php');
                include('view/sidemenu.php');
		include('view/defaultview.php');
		include('view/footer.php');
		break;

	case 'logout' :
		// destroy session variables and display login form
		session_destroy();
		setcookie(session_name(), '', time()-1000, '/');
        	$_SESSION = array();
		// display default view
                include('view/header.php');
                include('view/sidemenu.php');
                include('view/defaultview.php');
                include('view/footer.php');
		break;

	case 'displayProducts' :
     		include('view/header.php');
     		// include menu
     		include('view/sidemenu.php');
		$data = getProductList();
		include('view/productlistview.php');
                // include footer
                include('view/footer.php');
		break;
	
	case 'purchase' :
		//get product id, client id, and quantity
		$product_id = (isset($_POST['product_id'])) ? $_POST['product_id'] : '-1';
		$client_id = (isset($_POST['client_id'])) ? $_POST['client_id'] : '-1';
		$quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : '-1';
		/*
		  Check whether client already purchased item.
		  IF client already has update the sale with updateSale()
		  ELSE insert a new sale into the table with insertNewSale()
		*/
		$check = checkSale($product_id, $client_id);
		if($check == '0'){	
		  $result = insertNewSale($product_id, $client_id, $quantity);
		} else {
		  //		      (sales_id, old quantity, new quantity)
		  $result = updateSale($check[0], $check[1], $quantity);
		}
		include('view/header.php');
                include('view/sidemenu.php');

		if($result)
			echo "Added new product to cart.";
		else
			echo "Could not add product to cart.";

                include('view/footer.php');
		break;

	case 'purchaseHistory' :
		//get the client_id of current session
		$client_id = '';
		if (isset($_REQUEST['client_id']))
			$client_id = $_REQUEST['client_id'];

		//get list of products purchased by the client id
		//method in model.php
		$data = getProductsPurchased($client_id);

		// display default view
                include('view/header.php');
                // include menu
                include('view/sidemenu.php');
                include('view/productsPurchased.php');
                // include footer
                include('view/footer.php');
	case 'updateEmail' :
		//get the client id
		$client_id = '';
		if (isset($_SESSION['client_id']))
			$client_id = $_SESSION['client_id'];
		
		//SQL statement
		$sql = "SELECT email FROM `clients` WHERE client_id= :client_id";
		$parameters = array(':client_id'=>$client_id);

		//only need one record so use the 'getOne' method
		$client_data = getOne($sql, $parameters);
 
		// display default view
                include('view/header.php');
		// include menu
                include('view/sidemenu.php');
		// include form
		include('view/selectedClientView.php');
		// include footer
                include('view/footer.php');
	
	case 'confirmUpdate' :
		//get the client id
                $client_id = '';
                if (isset($_SESSION['client_id']))
                        $client_id = $_SESSION['client_id'];

		//get the new email
		$email = (isset($_POST['email'])) ? $_POST['email'] : -1;	
		//call method in model.php to update the email
		$result = updateEmail($email, $client_id);

		// display default view
                include('view/header.php');
                // include menu
                include('view/sidemenu.php');

		if($result)
                        echo "Successfully updated email.";
                else
                        echo "Could not update email.";

                include('view/footer.php');
                break;


        default :
                // display default view
    		include('view/header.php');
     		// include menu
     		include('view/sidemenu.php');
		include('view/defaultview.php');
		// include footer
        	include('view/footer.php');

                break;
        }
?>
