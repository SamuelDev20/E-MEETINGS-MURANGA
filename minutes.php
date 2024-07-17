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
  Add Minutes
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
	  <form action="generate_minutes.php" method="POST">
      <div class="modal-body">

		<div class="form-group">
			<label>Form Title</label>
			<input type="text" name="title" id="text" required="required" class="form-control" value="<?php echo isset($title) ? $title : "" ?>" />
		</div>
		<div class="form-group">
			<label>Date of Meeting</label>
			<input type="date" name="date" id="date" required="required" class="form-control" value="<?php echo isset($date) ? $date : "" ?>" />
		</div>
		<div class="form-group">
			<label>Minutes Prepared By</label>
			<input type="text" name ="prepared" id="prepared" placeholder="required" class="form-control" value="<?php echo isset($prepared) ? $prepared : "" ?>" />
		</div>
        <div class="form-group">
			<label>Location</label>
			<input type="text" name ="location" id="location" placeholder="required" class="form-control" value="<?php echo isset($location) ? $location : "" ?>" />
		</div>
        <div class="form-group">
			<label>Time</label>
			<input type="time" name ="time" id="time" placeholder="required" class="form-control" value="<?php echo isset($time) ? $time : "" ?>" />
		</div>
        <div class="form-group">
			<label>Purpose of meeting</label>
			<input type="text" name ="purpose" id="purpose" placeholder="required" class="form-control" value="<?php echo isset($purpose) ? $purpose : "" ?>" />
		</div>
        <div class="form-group">
		<label class="control-label">Those in attendance</label>
			<textarea name="attendance" id="attendance" cols="30" rows="3" class="form-control" value="<?php echo isset($attendance) ? $attendance : "" ?>" ></textarea>
				</div>
        <div class="form-group">
		<label class="control-label">Absent</label>
			<textarea name="absent" id="absent" cols="30" rows="3" class="form-control" value="<?php echo isset($absent) ? $absent : "" ?>" ></textarea>
				</div>
        <div class="form-group">
		<label class="control-label">Agendas, decisions, issues</label>
			<textarea name="content" id="content" cols="30" rows="3" class="form-control" value="<?php echo isset($content) ? $content : "" ?>" ></textarea>
				</div>
      
        <div class="form-group">
			<label>Next meeting</label>
			<input type="text" name ="next" id="next" placeholder="required" class="form-control" value="<?php echo isset($next) ? $next : "" ?>" />
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
									<th>Minute</th>
                                    <th>Title, Date, location and Time</th>
                                    <th><u>Purpose</th></U>
                                    <th>attendance</th>
                                    <th>Absent</th>
                                    <th>content</th>
                                    <th>Next</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							 <?php
                    $sql ="SELECT * FROM `minutes`";
                    $gotResults = mysqli_query($conn, $sql);
                    if ($gotResults) {
                        if (mysqli_num_rows($gotResults) > 0) {
                            while ($row = mysqli_fetch_array($gotResults)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><strong><u><?php echo $row['title']; ?></u></strong>
                                        <br><strong>Date:</strong> <?php echo $row['date']; ?>
                                        <br><strong>Location:</strong> <?php echo $row['location']; ?>
                                        <br><strong>Time:</strong> <?php echo $row['time']; ?>
                                    </td>
                                    <td><?php echo $row['purpose']; ?></td>
                                    <td><?php echo nl2br($row['attendance']); ?></td>
                                    <td><?php echo nl2br($row['absent']); ?></td>
                                    <td><?php echo nl2br($row['content']); ?></td>
                                    <td><?php echo $row['next']; ?></td>
                                    <td>
                                        <a href="generate_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Generate Document</a>
                                    </td>
                                </tr>
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
</body>
</html>
<script>
    $(function(){
        $('.view_data').click(function(){
            uni_modal('Receipt',"view_receipt.php?view_only=true&id="+$(this).attr('data-id'),'')
        })
        $('#filter').click(function(){
            location.href="./?page=sales_report&date_from="+$('#date_from').val()+"&date_to="+$('#date_to').val();
        })
        
        $('table td,table th').addClass('align-middle')

        $('#print').click(function(){
            var h = $('head').clone()
            var p = $('#outprint').clone()
            var el = $('<div>')
            el.append(h)
            if('<?php echo $dfrom ?>' == '<?php echo $dto ?>'){
                date_range = "<?php echo date('M d, Y',strtotime($dfrom)) ?>";
            }else{
                date_range = "<?php echo date('M d, Y',strtotime($dfrom)).' - '.date('M d, Y',strtotime($dto)) ?>";
            }
            el.append("<div class='text-center lh-1 fw-bold'>UEAB Bakery Sales Report<br/>As of<br/>"+date_range+"</div><hr/>")
            p.find('a').addClass('text-decoration-none')
            el.append(p)
            var nw = window.open("","","width=1500,height=900")
                nw.document.write(el.html())
                nw.document.close()
                setTimeout(() => {
                    nw.print()
                    setTimeout(() => {
                        nw.close()
                    }, 150);
                }, 200);
        })
        // $('table').dataTable({
        //     columnDefs: [
        //         { orderable: false, targets:3 }
        //     ]
        // })
    })
    
</script>