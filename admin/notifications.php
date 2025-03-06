<?php
require('top.inc.php');
if($_SESSION['ROLE']=='admin'||$_SESSION['ROLE']=='user'){
$sql="select * from notifications order by id desc";
$res=mysqli_query($con,$sql);
?>
<?php 

if(isset($_REQUEST['type'])&&$_REQUEST['type']=='delete'){
    $did=$_REQUEST['id'];
    mysqli_query($con,"delete from notifications where id='$did'");
    header("location:notifications.php");
}
if(isset($_REQUEST['type'])&&$_REQUEST['type']=='resend'){
    $uid=$_REQUEST['uid'];
     $cat_re=mysqli_query($con,"select * from notifications where id='$uid'");
               $cat_ar=array();
               while($ro=mysqli_fetch_assoc($cat_re)){
                 $cat_ar[]=$ro;    
               }
                foreach($cat_ar as $lis){
                    
                  $count=$lis['shoot_count'];  
                  $count++;
                  mysqli_query($con,"update notifications set shoot_count='$count' where id='$uid'");
                }
                    $cat_re=mysqli_query($con,"select * from tokens");
               $cat_ar=array();
               while($ro=mysqli_fetch_assoc($cat_re)){
                 $cat_ar[]=$ro;    
               }
                foreach($cat_ar as $lis){
                    $token=$lis['token'];
                    sendNotification($token);
 
                }?>
                
                <script>
                    window.location.href="notifications.php";
                </script>
                <?php
       
}?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Notifications</h4>
				   <h4 class="box-link"><a href="manage_notifications.php" class="btn btn-dark">Send Notification</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th width="2%">ID</th>
							   <th width="15%">Title</th>
							   <th width="15%">Description</th>
							   <th width="10">Icon</th>
							   <th width="20%">Action</th>
							   <th width="5%">Count</th>
                               <th width="15%">Date</th>
							   <th width="15%"></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
                               <td><?php echo $row['title'];?></td>
							   <td><?php echo $row['description']?></td>
							   <td><img src="<?php echo $row['icon_url'];?>"/></td>
							   <td><?php echo $row['action_url']?></td>
							   <td><?php echo $row['shoot_count'];?></td>
                               <td><?php echo $row['created_on'];?></td>						 							   
							   <td>
								<?php	
								echo "<span class='badge badge-warning'><a href='?type=resend&uid=".$row['id']."&title=".$row['title']."&description=".$row['description']."&icon_url=".$row['icon_url']."&action_url=".$row['action_url']."'>Resend</a></span>";
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
}else{
    header("location:blogs.php");
}
?>
<?php
function sendNotification($token){
    $url ="https://fcm.googleapis.com/fcm/send";

    $fields=array(
        "to"=>$token,
        "notification"=>array(
            "body"=>$_REQUEST['description'],
            "title"=>$_REQUEST['title'],
            "icon"=>$_REQUEST['icon_url'],
            "click_action"=>$_REQUEST['action_url']
            )
    );

    $headers=array(
        'Authorization: key=AAAA8nRKI6Y:APA91bGj4QiQ59fjcqQ5ryTom_Pzmf5kG0hZJQXN3326Fkg3hOiHMN1pNbEcy1nZJjSkWHr_Xq10yHPox1znB2cOuzB1BSFS5b6TTxpAtKnF1EHmO2uHOynPwW6c3k3If1wd7BA0hcd1',
        'Content-Type:application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    //print_r($result);
    curl_close($ch);
}

?>