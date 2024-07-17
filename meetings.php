<!DOCTYPE html>
<html lang = "en">
<head>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
.card{
    padding-left:-160px;
    margin-left:-30px;
}
select{
	width:100%;
	height:40px;
	border:1px 	grey;
	border-radius: .5px;
	box-shadow: 1px 1px 2px 1px darkgrey;
}
</style>
<?php include('db_connect.php') ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				<br />
				<br />
				<div class="card">
					<div class="card-header">
                      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newmeeting">
  Add Meeting
</button>

<!-- Modal -->
<div class="modal fade" id="newmeeting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Meeting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="meetingdata.php" method="POST">
      <div class="modal-body">
      <select class="custom-select browser-default select2" name="type" id="type">
            <option value=""></option>
            <?php
            $dept = $conn->query("SELECT * from department order by name asc");
            while($row = $dept->fetch_assoc()):
            ?>
                <option value="<?php echo $row['name'] ?>" <?php echo isset($type) && $type == $row['type'] ? "selected" : "" ?>><?php echo $row['name'] ?></option>
            <?php endwhile; ?>
        </select>
		<div class="form-group">
			<label>Date:</label>
			<input type="date" name="date" id="date" required="required" class="form-control" value="<?php echo isset($date) ? $date : "" ?>" />
		</div>
		<div class="form-group">
			<label>Time</label>
			<input type="time" name="time" id="time" required="required" class="form-control" value="<?php echo isset($time) ? $time : "" ?>" />
		</div>
		<div class="form-group">
			<label>Agenda</label>
			<input type="text" name ="agenda" id="agenda" placeholder="required" class="form-control" value="<?php echo isset($agenda) ? $agenda : "" ?>" />
		</div>
		<div class="form-group">
			<label>absent</label>
			<input type="text" name ="absent" id="absent" placeholder="required" class="form-control" value="<?php echo isset($absent) ? $absent : "" ?>" />
		</div>
		<div class="form-group">
			<label>Attendees</label>
			<input type="text" name ="attendees" id="attendees" placeholder="required" class="form-control" value="<?php echo isset($attendees) ? $attendees : "" ?>" />
		</div>
		<div class="form-group">
			<label>Content</label>
			<input type="text" name ="content" id="content" placeholder="required" class="form-control" value="<?php echo isset($content) ? $content : "" ?>" />
		</div>
        <div class="form-group">
        <label for="file">Upload File:</label>
        <input type="file" name="file" id="file" class="form-control" >
    </div>
  					</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="save" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
</div>
					
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
									<th>Agenda</th>
									<th>Absent</th>
									<th>Attendees</th>
                                    <th>Content</th>
                                    <th>File</th>
                                     <th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
			
				$sql ="SELECT * FROM `meetings`";
				$gotResults = mysqli_query($conn,$sql);
				if($gotResults){
					if(mysqli_num_rows($gotResults)>0){
						while ($row = mysqli_fetch_array($gotResults)) {
					
							//print_r($row['firstname']);
									
								?>
							<tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['type'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['time'];?></td>
							<td><?php echo $row['agenda'];?></td>
							<td><?php echo $row['absent'];?></td>
							<td><?php echo $row['attendees'];?></td>
                            <td><?php echo $row['content'];?></td>
                            <td>
							<?php
$file = $row['file'];
if (!empty($file)) {
    // File exists, provide download link
    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array(strtolower($fileExtension), ['pdf', 'doc', 'docx', 'txt'])) {
        // If the file is a PDF, Word document, or text file, provide a direct link to the file
        echo "<a href='" . htmlspecialchars($file) . "' target='_blank'>Open Document</a>";
    } else {
        // For other file types, display a message that the file cannot be opened directly
        echo "This file type cannot be opened directly. Please download the file to view it.";
    }
} else {
    // No document uploaded
    echo "Empty";
}
?>


</td>

				<td>
				<center>
				<a href="meeting_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Generate Document</a>
			</center>
									</td>    
								<?php
									}
								}
							}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</body>	
		</html>
		</script>
	<script type="text/javascript">
		$(document).ready(function(){

			

			
			$('.edit_meeting').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Edit Meetings","edit_meeting.php?id="+$id)
				
			});
			$('.view_meeting').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Employee Details","view_meeting.php?id="+$id,"mid-large")
				
			});
			$('#new_meeting_btn').click(function(){
				uni_modal("New Meeting","new_meeting.php")
			})
			$('.remove_meeting').click(function(){
				_conf("Are you sure to delete this meeting?","remove_meeting",[$(this).attr('data-id')])
			})
		});
		function remove_meeting(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_meeting',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Meeting's data successfully deleted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
					}
			})
		}
	</script>