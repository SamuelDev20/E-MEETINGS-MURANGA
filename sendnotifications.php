<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width"/>
<title>Murang'a Management system</title>
<link rel="manifest" href="manifest.json">

<link rel="stylesheet" href="stylesheets/skins/blue.css">
<link rel="stylesheet" href="stylesheets/responsive.css">
</head>
<style>
.message_box{
width: 500px;
}
</style>
<body>
<div class ="container">
<div class ="jumbutton">
<h3>Send notifications to Users</h3>
<hr>
<div class="row">
<div class="col-md-6">
<form action ="sendmessage.php" method = "POST">
<div class="form group">
<label for="phonenumber">Subject</label>
<input type ="text" class="form-control" id="subject" name="Subject" placeholder="Enter your Subject">
</div>
<div class="form group">
<label for="message">Message</label>
<textarea class="form-control" id="message" name="Message" cols="20" rows="10" ></textarea>
</div>
<div class="form group">
<label for="phonenumber">From</label>
<input type ="text" class="form-control" id="from" name="From" placeholder="Enter senders name">
</div>
<div class="form group">
<label for="phonenumber">Date</label>
<input type ="date" class="form-control" id="from" name="Date" placeholder="Enter your Subject">
</div>
<button type="send" class="btn btn-primary">send message</button>
</form>
</div>
</div>
</div>
</div>
</body>   
</html>
