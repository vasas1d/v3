<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$jerseyNumber = mysqli_real_escape_string($mysqli, $_POST['jerseyNumber']);
	$soccerName = mysqli_real_escape_string($mysqli, $_POST['soccerName']);
	$teamName = mysqli_real_escape_string($mysqli, $_POST['teamName']);
		
	// checking empty fields
	if(empty($jerseyNumber) || empty($soccerName) || empty($teamName)) {
				
		if(empty($jerseyNumber)) {
			echo "<font color='red'>jerseyNumber field is empty.</font><br/>";
		}
		
		if(empty($soccerName)) {
			echo "<font color='red'>soccerName field is empty.</font><br/>";
		}
		
		if(empty($teamName)) {
			echo "<font color='red'>teamName field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO soccerplayer(jerseyNumber,soccerName,teamName) VALUES('$jerseyNumber','$soccerName','$teamName')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
		header("Refresh:0");
	}
}
?>
</body>
</html>
