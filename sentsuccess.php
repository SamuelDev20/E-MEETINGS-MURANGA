<!DOCTYPE <html>
    <title>Success message</title>
	<link rel="shortcut icon" type="image/ico" href="assets/img/logo.png" />
  <title>MURANG'A MANAGEMENT SYSTEM</title>
    <head>
    </head>
    <style>
        body {
    background: url(assets/img/register.jpg);
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}
*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}

h2 {
	text-align: center;
	margin-bottom: 40px;
    color:black;
}

input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
label {
	color: #888;
	font-size: 18px;
	padding: 10px;
}

button {
	float: right;
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
button:hover{
	opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
	text-align: center;
	color: #fff;
}

.ca {
	font-size: 14px;
	display: inline-block;
	padding: 10px;
	text-decoration: none;
	color: #444;
}
.ca:hover {
	text-decoration: underline;
} 

.home-nav a {
	padding: 10px;
	color: #f7bd65;
	text-transform: uppercase;
	text-decoration: none;
}
</style>
<head>
	<title></title>
</head>
<body>
    <form action="" method="post">
        <center><img src="assest/img/tick-png.png " width="80px"></center>
     	<h2>Message sent Successfully</h2>
     	<p><center>Kindly be patient as your message is replied
             <br> You will be notified once your message gets replied
             <br><br> Regards
             <br><br>Admin
         </center> </p>

     
          <a href="index.php?page=sent_message.php" class="ca">HOME</a>
     </form>
</body>
</html>