<?php
	require 'session.php';
	
	if (isset($_POST['del'])){
		$id=$_POST['id'];
		$id = mysqli_real_escape_string($lnk, $id);
		
	$sq=mysqli_query($lnk,"select chatroomid from `chatroom` where userid='".$userid."'");
	
		while ($df=mysqli_fetch_array($sq)) {
			if ($id == $df['chatroomid']){
				mysqli_query($lnk,"delete from `chatroom` where chatroomid='$id'");
				mysqli_query($lnk,"delete from `chat` where chatroomid='$id'");
				mysqli_query($lnk,"delete from `chat_member` where chatroomid='$id'");
				}
		}
	}
?>