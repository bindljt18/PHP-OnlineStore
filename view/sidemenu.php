<!-- left column -->
      <div class='col-xs-3'>
	<?php if (isset($_SESSION['user'])) {
	?>
        <h3>Links</h3>
         <ul>
	
                <li><a href='index.php?mode=displayProducts'>List of Products</a></li>
                <li><a href='index.php?mode=updateEmail'>Update Email Address</a></li>
                <li><a href='index.php?mode=purchaseHistory&client_id=<?php echo $_SESSION['client_id']; ?>'>My Purchase History</a></li>
	
	 </ul>
	<?php } ?>
      </div>
