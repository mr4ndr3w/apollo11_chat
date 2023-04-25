<div class="col-lg-8">
    <div class="panel panel-default" style="height:50px;">
		<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span class="glyphicon glyphicon-list"></span> List of Chat Rooms</strong></span>
		<div class="pull-right" style="margin-right:10px; margin-top:7px;">
			<a href="#add_chatroom" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</a>
		</div>
	</div>
	<table width="100%" class="table table-striped table-bordered table-hover" id="chatRoom">
        <thead>
            <tr>
                <th>Chat Room Name</th>
				<th>Date Created</th>
				<th><span class="glyphicon glyphicon-lock"></span> Password || <span class="glyphicon glyphicon-user"></span> Member</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query=mysqli_query($lnk,"select * from chatroom order by date_created desc");
			while($row=mysqli_fetch_array($query)){
			?>
			<tr>
				<input type="hidden" value="
				<?php
				$usera=array();
				$m=mysqli_query($lnk,"select * from chat_member where chatroomid='".$row['chatroomid']."'");
				while($mrow=mysqli_fetch_array($m)){
					$usera[]=$mrow['userid'];
				}
				if (in_array($userid, $usera)){
					echo "1";
				}	
				else{
						echo "3";
					}
				?>
				
				"  id="status<?php echo h1($row['chatroomid']); ?>">
				<td>
					<?php
					$chatroomid = mysqli_real_escape_string($lnk, $row['chatroomid']);
					$num=mysqli_query($lnk,"select * from chat_member where chatroomid='".$row['chatroomid']."'");
					?>
					<span class="badge"><?php echo mysqli_num_rows($num); ?></span> <?php echo h1($row['chat_name']); ?>
				</td>
				<td><?php echo date('M d, Y - h:i A', strtotime($row['date_created'])); ?></td>
				<td><button value="<?php echo $row['chatroomid']; ?>" class="btn btn-info join_chat"><span class="glyphicon glyphicon-comment"></span> Join</button> &nbsp;
					<?php
					if (!empty($row['chat_password'])){
						echo '<span class="glyphicon glyphicon-lock"></span>&nbsp;';
					}
					$chatroomid = mysqli_real_escape_string($lnk, $row['chatroomid']);
					$qq=mysqli_query($lnk,"select * from chat_member where chatroomid='".$row['chatroomid']."' and userid='".$userid."'");
					if (mysqli_num_rows($qq)>0){
						echo '<span class="glyphicon glyphicon-user"></span>';
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