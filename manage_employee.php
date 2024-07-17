<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM register where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

<div class="container-fluid">
	<form id='employee_frm'>
		<div class="form-group">
			<label>Firstname</label>
			<input type="hidden" name="user_id" value="<?php echo isset($id) ? $id : "" ?>" />
			<input type="text" name="firstname" required="required" class="form-control" value="<?php echo isset($firstname) ? $firstname : "" ?>" />
		</div>
		<div class="form-group">
			<label>Lastname:</label>
			<input type="text" name="lastname" required="required" class="form-control" value="<?php echo isset($lastname) ? $lastname : "" ?>" />
		</div>
		<div class="form-group">
			<label>Work_id</label>
			<input type="text" name="work_id" required="required" class="form-control" value="<?php echo isset($work_id) ? $work_id : "" ?>" />
		</div>
		<div class="form-group">
			<label>Work_email</label>
			<input type="text" name ="work_email" placeholder="required" class="form-control" value="<?php echo isset($work_email) ? $work_email : "" ?>" />
		</div>
		<div class="form-group">
			<label>Phone Number</label>
			<input type="text" name ="phonenumber" placeholder="required" class="form-control" value="<?php echo isset($phonenumber) ? $phonenumber : "" ?>" />
		</div>

	</form>
</div>
<script>
	$('[name="id"]').change(function(){
		var did = $(this).val()
		$('[name="id"] .opt').each(function(){
			if($(this).attr('data-did') == did){
				$(this).attr('disabled',false)
			}else{
				$(this).attr('disabled',true)
			}
		})
	})
	$(document).ready(function(){
		$('.select2').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
		$('#employee_frm').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				url:'ajax.php?action=save_employee',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Employee's data successfully saved","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
				}
			})
		})
	})
</script>