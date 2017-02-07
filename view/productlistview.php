<!-- right column: content section -->

      <div class='col-xs-9'>

         <h3>List of Products</h3>
	 <?php
	if (isset($data)){
		echo "<table class='table'>";
		// display a list of customers
		for ($i=0; $i<count($data); $i++){
		// each element of $data is an associative array
			$product_info = $data[$i];
			echo "<tr><td class='col-xs-2'><img src='images/{$product_info['image']}' alt='image' /></td>
			  <td class='col-xs-2'>{$product_info['product_title']}</td>
			  <td class='col-xs-4'>{$product_info['product_description']}</td>
			  <td class='col-xs-1'>{$product_info['unit_price']}</td>
			  <td class='col-xs-3'>
			    <form action='index.php' method='post'>
			      <select name='quantity' >
				<option value='1' selected='selected'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
			      </select>
			  
				<button type='submit' class='btn btn-primary'>Purchase</button>
				<input type='hidden' name='mode' value='purchase' /> 
				<input type='hidden' name='product_id' value='{$product_info['product_id']}' />
				<input type='hidden' name='client_id'  value='{$_SESSION['client_id']}' />
			    </form>
			  </td></tr>";
		}
		echo "</table>";
	} else
	echo "Customer list is empty";
?>
  </div>
