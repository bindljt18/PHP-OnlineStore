<!-- right column: content section -->

      <div class='col-xs-9'>

        <h3>List of Purchased Products</h3>
	<?php
		$total_items = 0;
		$total_price = 0;
		if ($data != null){
			echo "<table class='table'>";
			for ($i=0; $i<count($data); $i++){
				$info = $data[$i];
				echo "<tr>";
				echo "<td>{$info['product_title']}</td>";
				echo "<td>{$info['unit_price']}</td>";
				echo "<td>{$info['quantity']}</td>";
				echo "</tr>";
				$total_items += $info['quantity'];
				$total_price += $info['unit_price'] * $info['quantity'];
			}
			echo "</table>";
			echo "<p>Total Items: {$total_items}</p>";
			echo "<p>Total Amount {$total_price}</p>";
		} else
			echo "<h4>This client has not purchased any products......</h4>";
	?>
	</div>

