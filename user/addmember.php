<?php
	include('session.php');
	if (isset($_POST['id'])){
		$id=$_POST['id'];
		$id = mysqli_real_escape_string($lnk, $id);
		
		$query=mysqli_query($lnk,"select * from chat_member where chatroom='$id' and userid='".$userid."'");
		if (mysqli_num_rows($query)<1){
			mysqli_query($lnk,"insert into chat_member (chatroomid, userid) values ('$id', '".$userid."')");
		}
	}
?>