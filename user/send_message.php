<?php
	include ('session.php');
	include('../classes/db.php');
	include("rc4.php");
	$id = $_POST['id'];
	$id = mysqli_real_escape_string($lnk, $id);
	$result=mysqli_query($lnk,"select chat_password from chatroom where chatroomid='$id'");
	$key=mysqli_fetch_assoc($result);
	if(isset($_POST['msg'])){
		$msg=$_POST['msg'];
		$msg = mysqli_real_escape_string($lnk, $msg);
		$msg=base64_encode(rc4($key['chat_password'], $msg));
		$id=$_POST['id'];
		$id = mysqli_real_escape_string($lnk, $id);
		mysqli_query($lnk,"insert into `chat` (chatroomid, message, userid, chat_date) values ('$id', '$msg' , '".$userid."', NOW())") or die(mysqli_error($lnk));
	}
?>