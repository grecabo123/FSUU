<?php  


	include 'connector/connect.php';
	if (isset($_POST['view'])) {
		if ($_POST['view'] != '') {
			$update = "UPDATE collegiate SET status = 1 WHERE status = 0";
			mysqli_query($conn,$update);
		}
		$sql = "SELECT *from collegiate order by date_msg DESC";
		$result = mysqli_query($conn,$sql);

		$output ="";

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    $output .='
			    <li id="display_form">
			    	<button id="click" value="'.$row['ID'].'">'.$row['ID'].'</button>
			    	<strong>Name: '.$row['first_name'].' '.$row['last_name'].'</strong><br>
			    	<span>Submitted: Application form</span><br>
			    	<small><em>Date: '.$row['date_msg'].'</em></small>
			    	</li>
			    	<hr>
			    	<br>
			    ';
			}
		}
		else{
			$output .='<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
		}

		$query_count = "SELECT *from collegiate WHERE status = 0";
		$result_q = mysqli_query($conn,$query_count);
		$count = mysqli_num_rows($result_q);
		
		$data = array(
			'notification'	=> $output,
			'unseen_notification'	=> $count
		);
		echo json_encode($data);
	}

?>