	<?php include('password_modal.php'); ?>
		<div class="col-lg-8">
            <div class="panel panel-default" style="height:50px;">
				<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span  id="user_details"><span class="glyphicon glyphicon-user"></span><span class="badge"><?php echo h1(mysqli_num_rows($cmem)); ?></span></span> <?php echo h1($chatrow['chat_name']); ?></strong></span>
				<div class="showme hidden" style="position: absolute; left:-120px; top:20px;">
					<div class="well">
						<strong>Room Member/s:</strong>
						<div style="height: 10px;"></div>
					<?php
						$rm=mysqli_query($lnk,"select * from chat_member left join `user` on user.userid=chat_member.userid where chatroomid='$id'");
						while($rmrow=mysqli_fetch_array($rm)){
							?>
							<span>
							<?php
								$id = mysqli_real_escape_string($lnk, $id);
								$creq=mysqli_query($lnk,"select * from chatroom where chatroomid='$id'");
								$crerow=mysqli_fetch_array($creq);
								
								if ($crerow['userid']==$rmrow['userid']){
									?>
										<span class="glyphicon glyphicon-user"></span>
									<?php
								}
								
							?>
							<?php echo h1($rmrow['uname']); ?></span><br>
							<?php
						}
						
					?>
						
					</div>
				</div>
				<div class="pull-right" style="margin-right:10px; margin-top:7px;">
					<?php
						if ($chatrow['userid']==$userid){
							?>
							<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Lobby</a>
							<button class="btn btn-info decryption">Decrypt</button>
							<a href="#delete_room" data-toggle="modal" class="btn btn-danger">Delete Room</a>
							<?php
						}
						else{
							?>
							<!-- <a href="#" data-toggle="modal" class="btn btn-primary decryption">Decrypt</a> -->
							<!-- Decrypt button -->
							<button class="btn btn-info decryption">Decrypt</button> &nbsp;
							<?php
								if (!empty($row['chat_password'])){
								echo '<span class="glyphicon glyphicon-lock"></span>&nbsp;';
							}
								$rew = mysqli_real_escape_string($lnk, $row['chatroomid']);
								$qq=mysqli_query($lnk,"select * from chat_member where chatroomid='$rew' and userid='".$userid."'");
								if (mysqli_num_rows($qq)>0){
								echo '<span class="glyphicon glyphicon-user"></span>';
							}
							?>
							<!-- Decrypt button END -->
							<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Lobby</a>
							<a href="#leave_room" data-toggle="modal" class="btn btn-warning">Leave Room</a>
							<?php
						}
					?>
				</div>
			</div>
			<div>
				<div class="panel panel-default" style="height: 400px;">
					<div style="height:10px;"></div>
					<span style="margin-left:10px;">Welcome to Chatroom</span><br>
					<span style="font-size:10px; margin-left:10px;"><i>Note: Avoid using foul language and hate speech to avoid banning of account</i></span>
					<div style="height:10px;"></div>
					<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
					</div>
				</div>
				
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Type message..." id="chat_msg">
					<span class="input-group-btn">
					<button class="btn btn-success" type="submit" id="send_msg" value="<?php echo h1($id) ?>">
					<span class="glyphicon glyphicon-comment"></span> Send
					</button>
					</span>
				</div>
				
			</div>			
		</div>
		<script type="text/javascript">
			$(document).on('click', '.decryption', function(){
				var cid=$(this).val();
				$('#join_chat').modal('show');

	});



		</script>