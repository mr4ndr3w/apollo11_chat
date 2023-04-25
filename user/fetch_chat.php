<?php
	include('../classes/db.php');
	include('rc4.php');
	function h1($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$keyn = "s3cr3t_crypto_KEY";
	if(isset($_POST['fetch'])){
		$id = $_POST['id'];
		$id = mysqli_real_escape_string($lnk, $id);
		
		$query=mysqli_query($lnk,"select * from `chat` left join `user` on user.userid=chat.userid where chatroomid='$id' order by chat_date asc") or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		?>	
		<div>
			<img src="../<?php if(empty($row['photo'])){echo "upload/profile.jpg";}else{echo h1($row['photo']);} ?>" style="height:30px; width:30px; position:relative; top:15px; left:10px;">
			<span style="font-size:10px; position:relative; top:7px; left:15px;"><i><?php echo h1(date('M-d-Y h:i A',strtotime($row['chat_date']))); ?></i></span><br>

	
			<span style="font-size:11px; position:relative; top:-2px; left:50px;"><strong><?php echo h1($row['username']); ?></strong>: <?php if(isset($_POST['password'])){ echo rc4(h1($_POST['password']), base64_decode(h1($row['message'])));} else { echo (h1($row['message']));} ?></span><br>
		</div>
		<div style="height:5px;"></div>
		<?php
		}
	}	
?>