<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM meetings where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid" id="new_meeting">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="messagedata.php" method="POST">
      <div class="modal-body">
                          <div class="form-group">
  							<label for="projectname" class="control-label">Subject</label>
  							<input type="text" id="subject" name="subject" required class="form-control">
  						</div>
                          <div class="form-group">
  							<label for="dateallocated" class="control-label">Message</label>
  							<input type="text" id="message" name="message" required class="form-control">
  						</div>
						  <div class="form-group">
  							<label for="dateallocated" class="control-label">From</label>
  							<input type="text" id="from" name="from" required class="form-control">
  						</div>
                          <div class="form-group">
  							<label for="datedue" class="control-label">Date</label>
  							<input type="date" id="datedue" name="date" required class="form-control">
  						</div>
                         
  					</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="save" name="send" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
</div></td>
									
										
									</td>
								</tr>
