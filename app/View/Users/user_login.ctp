<h2>Set Your new username and password</h2>
<form method="post" action="/easyemails/users/userupdate">
	<input type="hidden" name="id" value="<?php print $id ;?>">
	<input type="text" name="username" placeholder="Username"><br/>
	<input type="passowrd" name="password" placeholder="Password"><br/>
	<input type="submit" value="Submit"><br/>
</form>