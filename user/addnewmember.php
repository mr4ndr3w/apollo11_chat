<?php
	include('../classes/db.php');
	$id=$_REQUEST['id'];
	$id = mysqli_real_escape_string($lnk, $id);
	$user=$_POST['user'];
	$user = mysqli_real_escape_string($lnk, $user);
	
	if (empty($user)){
	?>
		<script>
			window.alert('Please select user');
			window.history.back();
		</script>
	<?php
	}
	else{
	mysqli_query($lnk,"insert into chat_member (userid, chatroomid) values ('$user','$id')");
	
	?>
		<script>
			window.alert('Member Added Successfully');
			window.history.back();
		</script>
	<?php
	}
?>