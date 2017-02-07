<!-- right column: content section -->

      <div class='col-xs-9'>

        <h3>Update Email address:</h3>

	<form action='index.php' method='post'>
		<p>Email:<input type='text' class="form-control" name='email'
		value='<?php echo $client_data['email'];?>' /></p>
	<p><button type='submit' class='btn btn-primary'>Modify</button></p>
	<input type='hidden' name='mode' value='confirmUpdate' />
	</form>
      </div>

