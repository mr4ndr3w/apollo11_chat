<div class="col-lg-4">
	<div class="panel panel-default">
	<?php
		$me=mysqli_query($lnk,"select * from chat_member left join chatroom on chatroom.chatroomid=chat_member.chatroomid where chat_member.userid='".$userid."' order by chatroom.date_created desc");
		$numme=mysqli_num_rows($me);
	?>
		<div class="panel-heading"><center><strong>My Chatrooms <span class="badge"><?php echo h1($numme); ?></span></strong></center></div>
		<div class="panel-body">
		<table width="100%" class="table table-striped table-bordered table-hover" id="myChatRoom">
			<thead>
			<th>Chat Room Name</th>
			<th></th>
			</thead>
			<tbody>
			<?php
				$my=mysqli_query($lnk,"select * from chat_member left join chatroom on chatroom.chatroomid=chat_member.chatroomid where chat_member.userid='".$userid."' order by chatroom.date_created desc");
					while($myrow=mysqli_fetch_array($my)){
						$qw = mysqli_real_escape_string($lnk, $myrow['chatroomid']);
						$nq=mysqli_query($lnk,"select * from chat_member where chatroomid='$qw'");
						?>
						<tr>
							<td><span class="glyphicon glyphicon-user"></span><span class="badge"><?php echo h1(mysqli_num_rows($nq)); ?></span> <a href="chatroom.php?id=<?php echo h1($qw); ?>"><?php echo h1($myrow['chat_name']); ?></a></td>
							<td>
								<?php
									$memb=mysqli_query($lnk,"select * from chatroom where userid='".$userid."' and chatroomid='$qw'");
									if (mysqli_num_rows($memb)>0){
										?>
										<button type="button" class="btn btn-danger btn-sm delete2" value="<?php echo h1($qw); ?>">Delete</button>
										<?php
									}
									else{
										?>
										<button type="button" class="btn btn-warning btn-sm leave2" value="<?php echo h1($qw); ?>">Leave</button>
										<?php
									}
								?>
							</td>
						</tr>
						<?php
					}
			?>
			</tbody>
		</table>
		</div>
	</div>
</div>