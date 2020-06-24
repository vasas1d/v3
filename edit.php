<?php
// including the database connection file
include_once("config.php");

if (isset($_POST['update'])) {
    $id           = mysqli_real_escape_string($mysqli, $_POST['id']);
    $jerseyNumber = mysqli_real_escape_string($mysqli, $_POST['jerseyNumber']);
    $soccerName   = mysqli_real_escape_string($mysqli, $_POST['soccerName']);
    $teamName     = mysqli_real_escape_string($mysqli, $_POST['teamName']);
    
    // checking empty fields
    if (empty($jerseyNumber) || empty($soccerName) || empty($teamName)) {
        
        if (empty($jerseyNumber)) {
            echo "<font color='red'>jerseyNumber field is empty.</font><br/>";
        }
        
        if (empty($soccerName)) {
            echo "<font color='red'>soccerName field is empty.</font><br/>";
        }
        
        if (empty($soccerName)) {
            echo "<font color='red'>teamName field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE soccerplayer SET jerseyNumber='$jerseyNumber',soccerName='$soccerName',teamName='$teamName' WHERE id=$id");
        
        //redirectig to the display pjerseyNumber. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM soccerplayer WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $jerseyNumber = $res['jerseyNumber'];
    $soccerName   = $res['soccerName'];
    $teamName     = $res['teamName'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="index.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>jerseyNumber</td>
            <td><input type="text" name="jerseyNumber" value="<?php
echo $jerseyNumber;
?>"></td>
        </tr>
        <tr>
            <td>soccerName</td>
            <td><input type="text" name="soccerName" value="<?php
echo $soccerName;
?>"></td>
        </tr>
        <tr>
            <td>teamName</td>
            <td><input type="text" name="teamName" value="<?php
echo $teamName;
?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php
echo $_GET['id'];
?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>