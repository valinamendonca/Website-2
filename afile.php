<?php
$con=new mysqli("localhost","root","","dad");
if ($con->connect_error)
	die("Connection failed: " . $con->connect_error);
if($_POST['submit']){
	$cname=$_POST['companyname'];
	$email=$_POST['email'];
	$cno=$_POST['cno'];
	$name=$_POST['name'];
	$add=$_POST['message'];

	$coat1=$_POST['type'];
	$diameter1=$_POST['diameter'];
	$length1=$_POST['length'];
	$tlength1=$_POST['total'];
	$qty1=$_POST['q1'];

	$coat2=$_POST['type2'];
	$diameter2=$_POST['diameter2'];
	$length2=$_POST['length2'];
	$tlength2=$_POST['total2'];
	$qty2=$_POST['q2'];
	$spclreq=$_POST['req'];
	$db="select max(id) from details";
	$result=$con->query($db); 
	if(!$result)
		echo " error in select query execution".$conn->error;
	if($result->num_rows==0)
		$id=1;
	 else
	 {
		 $row=$result->fetch_assoc();
		 $id=$row['max(id)']+1;
	 } 
	$ins="insert into details values('$cname', '$_POST[email]', '$cno', '$name', '$coat1', '$diameter1', '$length1', '$tlength1', '$qty1', '$coat2', '$diameter2', '$length2', '$tlength2', '$qty2', '$_POST[req]', '$_POST[req]', '$id')";
	$res=$con->query($ins);
	if(!$res)
	 	echo $con->error;
	
	?>

	<!DOCTYPE html>
	<html lang="en-us">
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" >
		<title>Place order</title>
		<link rel="stylesheet" type="text/css" href="try.css">
		<link rel="shortcut icon" href="images/favicon.ico" />
	</head>
	<body>
		<div class="box-1">
			<h1>Velmen Engineers</h1>
			<div class="meh">
				<p>-</p>
			</div>
		</div>

		<ul class="all">
			<li class="all"><a href="index.html">Home</a></li>
			<li class="all"><a href="about.html">About</a></li>
			<li class="all"><a href="trackyourorder.html">Track your order</a></li>
			<li class="all"><a href="more.html">More info</a></li>
		</ul>
		<br>
		<div class="box-3" style="font-size: 20px;">
		The qoutation will be mailed to you within 24 hours.<br>
		Data sent:<br><br>
		<div style="background-color: lightblue; padding: 10px; border-radius: 10px;">
				<legend><b>Personal Information:</b></legend>
				<br><span style="padding-right: 50px;">
	 		<b>Company Name: </b><td><?php echo $cname; ?></span>
			 <span style="padding-right: 50px;"><b>Email Id: </b><td><?php echo $email; ?></span>
			 <span style="padding-right: 50px;"><b>Contact Number: </b><td><?php echo $cno; ?></span><br><br>
			 <span style="padding-right: 50px;"><b>Contact Person Name: </b><td><?php echo $cname; ?></span>
			 <span style="padding-right: 50px;"><b>Delivery Address: </b><td><?php echo $add; ?></span>
	</div>	<br>

			<b>Requirements:</b><br><br>
			<div style="margin-right: 10px; width: 48%;background-color: lightblue; padding: 10px; border-radius: 10px; float: left;">
			<b>Copper Rollers:</b><br>
			<span style="padding-right: 50px;"><b>Coating:</b> <?php echo $coat1; ?></span><span style="padding-right: 50px;">
			<b>Diameter:</b> <?php echo $diameter1; ?>mm</span>
			<b>Length:</b> <?php echo $length1; ?>mm<br><br>
			<b>Total Length: </b><?php echo $tlength1; ?>mm
			<b>Quantity: </b><?php echo $qty1; ?>
	</div>
	<div style="width: 48%; background-color: lightblue; padding: 10px; border-radius: 10px; float: left;">
			<b>Rubber Rollers:</b><br><span style="padding-right: 50px;">
			<b>Coating: </b><?php echo $coat2; ?></span><span style="padding-right: 50px;">
			<b>Diameter:</b> <?php echo $diameter2; ?>mm</span>
			<b>Length:</b> <?php echo $length2; ?>mm<br><br>
			<b>Total Length:</b> <?php echo $tlength2; ?>mm
			<b>Quantity: </b><?php echo $qty2; ?>
	</div><br><br>
	<div style="margin-left:40%; background-color:lightblue; padding: 10px; overflow: hidden; margin-top: 80px; border-radius: 10px; width: 20%;">
			<br><b>Special Request: </b><?php echo $spclreq; ?>
	</div>
<br><br><br>
		<footer id="main-footer">
			<p>Copyright &copy; 2021, Velmen Engineers</p>
		</footer>
	</body>
	</html>
	<?php
}
?>
