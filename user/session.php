<?php
	require '../classes/db.php';
	require '../classes/phpfix.php';
	require '../classes/user.php';
	require '../cookies.php';
	function h1($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	if (isset($user)){
		$user = mysqli_real_escape_string($lnk, $user);
	$sq=mysqli_query($lnk,"select * from `user` where username='$user'");
	$srow=mysqli_fetch_array($sq);
		
	$user=$srow['username'];
	$user = mysqli_real_escape_string($lnk, $user);
	$userid=$srow['userid'];
	$userid = mysqli_real_escape_string($lnk, $userid);

}
?>