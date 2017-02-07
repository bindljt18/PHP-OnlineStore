<!-- right column: content section -->

      <div class='col-xs-9'>
	<div id='page-content'></div>
 <?php 
	if (isset($_SESSION['user'])){
		echo "Please select a task";
  }  else {
?>
         <h3>Welcome to Members Section</h3>
	 <h4>Please sign in</h4>
	<form action='index.php?mode=checkLogin' method='post'>
	<table class='table'>
	  <tr>
		<td>Username: </td>
	<td><input type='text' name='username' placeholder='Enter username' /></td>
	  </tr>
	  <tr>
		<td>Password:</td>
		<td><input type='password' placeholder='Enter password' name='pwd' /></td>
	   </tr>
	</table>
	<p><button type='submit' class='btn btn-primary' >Sign in </button>
	   <button type='reset' class='btn' >Clear</button>
	</p>
	</form> 
     </div>
<?php
} // end if else
