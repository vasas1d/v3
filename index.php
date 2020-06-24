<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM soccerplayer ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM soccerplayer ORDER BY id DESC"); // using mysqli_query instead



if(isset($_GET['action']) == 'testFunction') {	
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
			
		header("location:index.php");
	}

}

?>

<html>
<head>	
	<title>Homepage</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		.hide{
			display: none;	
		}
		.button{
			background-color: grey;
			text-decoration: unset;
			padding: 5px 22px;
			border-radius: 6px;
		}
		</style>
</head>

<body>
	<div id="nav_button" class="container">
		<a id ="button-add" href="javascript:;">Add New Data</a><br/><br/>
	</div>
	<div id="add_container" class="container hide">
		
			<form action="?action=testFunction" method="post" name="form1">
				<table width="25%" border="0">
					<tr> 
						<td>jerseyNumber</td>
						<td><input type="text" name="jerseyNumber"></td>
					</tr>
					<tr> 
						<td>soccerName</td>
						<td><input type="text" name="soccerName"></td>
					</tr>
					<tr> 
						<td>teamName</td>
						<td><input type="text" name="teamName"></td>
					</tr>
					<tr> 
						<td><a class="button " href="javascript:;" id="back" >Back</button></td>
						<td><input class="" type="submit" name="testFunction" value="Add"></td>
					</tr>
				</table>
			</form>
		</div>
	<div id="list_container" class="">
		<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>jerseyNumber</td>
			<td>soccerName</td>
			<td>teamName</td>
			<td>Update</td>
		</tr>
		<?php 
		//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['jerseyNumber']."</td>";
			echo "<td>".$res['soccerName']."</td>";
			echo "<td>".$res['teamName']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
		</table>
	</div>
	
	
	
</body>


<script>

$("#button-add, #back").click(function(){
	$(".container").toggle();
});

</script>


</html>
