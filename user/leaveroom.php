<?php
	include('session.php');
	if (isset($_POST['leave'])){
		$id=$_POST['id'];
		$id = mysqli_real_escape_string($lnk, $id);
		
		mysqli_query($lnk,"delete from chat_member where userid='".$userid."' and chatroomid='$id'");
		
		//remove room if no more member
		$r=mysqli_query($lnk,"select * from chat_member where chatroomid='$id'");
		if (mysqli_num_rows($r)<1){
			mysqli_query($lnk,"delete from chatroom where chatroomid='$id'");
		}
		
	}

?>