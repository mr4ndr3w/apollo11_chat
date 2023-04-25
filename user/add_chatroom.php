<?php 
	include('session.php');
	
	if (isset($_POST['chatname']) and $_POST['chatpass']!=""){
	$cid="";
	$chat_name=$_POST['chatname'];
	$chat_name = mysqli_real_escape_string($lnk, $chat_name);
	$chat_password=$_POST['chatpass'];
	$chat_password = mysqli_real_escape_string($lnk, $chat_password);
	
	mysqli_query($lnk,"insert into chatroom (chat_name, chat_password, date_created, userid) values ('$chat_name', '$chat_password', NOW(), '".$userid."')");
	$cid=mysqli_insert_id($lnk);
	$cid = mysqli_real_escape_string($lnk, $cid);
	
	mysqli_query($lnk,"insert into chat_member (chatroomid, userid) values ('$cid', '".$userid."')");
	$cid = h1($cid);
	echo 'chatroom.php?id='.$cid;
	}
	else {
	echo '/user/index.php';
	}
?>