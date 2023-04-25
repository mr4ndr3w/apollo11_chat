<?php
	include('session.php');
	
	$mname=$_POST['mname'];
	$cpassword=md5("myseedgoeshere".$_POST['cpassword']);
	$apassword=md5("myseedgoeshere".$_POST['apassword']);
	$mpassword=$_POST['mpassword'];
	$musername=$_POST['musername'];
	
	$myq=mysqli_query($lnk,"select * from `user` where userid='".$userid."'");
	$myqrow=mysqli_fetch_array($myq);
	
	if ($cpassword!=$apassword){
		?>
		<script>
			window.alert('Verification Password did not match!');
			window.history.back();
		</script>
		<?php
	}
	
	elseif ($cpassword!=$myqrow['password']){
		?>
		<script>
			window.alert('Current Password did not match!');
			window.history.back();
		</script>
		<?php
	}
	
	else{
		if ($mpassword==$myqrow['password']){
			$newpassword=$mpassword;
		}
		else{
			$newpassword=md5("myseedgoeshere".$mpassword);
		}
		
		$musername = mysqli_real_escape_string($lnk, $musername);
		$newpassword = mysqli_real_escape_string($lnk, $newpassword);
		mysqli_query($lnk,"update `user` set username='$musername', password='$newpassword' where userid='".$userid."'");
		?>
		<script>
			window.alert('Changes Saved!');
			window.history.back();
		</script>
		<?php
	}

?>