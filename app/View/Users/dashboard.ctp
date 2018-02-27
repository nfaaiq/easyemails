
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
			<th>Email</th>
			<th>Status</td>
	</tr>

	<?php  for($i=0; $i < count($invites); ++$i) { ?>
		<tr>
			<td><?php print $invites[$i]['invites']['email'];?></td>
			<td><?php print $invites[$i]['invites']['status'];?></td>
		</tr>
	<?php	} ?>
	
</table>



	<form action="/easyemails/users/invite" method="post">
	<input type="text" name="email_address" placeholder="Enter email address to invite"><br/>
	<input type="submit" value="Invite">
</form>
